<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use App\Models\Refund;
use App\Models\RefundProof;
use App\Models\ReturnProduct;
use App\Models\ReturnProductProof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Checkouts::with('user')->orderBy('tanggal_pembayaran', 'asc');

            if (auth()->user()->type == 'Pelanggan') {
                $query->where('user_id', auth()->user()->id);
            }

            if (request()->filled('start_date') && request()->filled('end_date')) {
                $startDate = request()->get('start_date');
                $endDate = request()->get('end_date');
                $query->whereBetween('tanggal_pembayaran', [$startDate, $endDate]);
            }

            $checkout = $query->get();

            return DataTables::of($checkout)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    return $data->user->first_name . ' ' . $data->user->last_name;
                })
                ->addColumn('total_biaya', function ($data) {
                    return 'Rp ' . number_format($data->total_biaya, 0, ',', '.');
                })
                ->addColumn('status', function ($data) {
                    $status = '';
                    if ($data->status == 'pending') {
                        $status = '<span class="badge badge-outline-secondary rounded-pill">Pending</span>';
                    } elseif ($data->status == 'process') {
                        $status = '<span class="badge badge-outline-primary rounded-pill">Proses</span>';
                    } elseif ($data->status == 'completed') {
                        $status = '<span class="badge badge-outline-success rounded-pill">Selesai</span>';
                    } elseif ($data->status == 'return') {
                        $status = '<span class="badge badge-outline-warning rounded-pill">Pengembalian</span>';
                    } else {
                        $status = '<span class="badge badge-outline-danger rounded-pill">Gagal</span>';
                    }
                    return $status;
                })
                ->addColumn('aksi', function ($data) {
                    if (auth()->user()->type == 'Administrator') {
                        $btn = '<a href="' . route('transaksi.detail', $data->id) . '" class="btn btn-info btn-sm me-1" id="btnEdit"><i class="ri-eye-line"></i></a>';
                        $btn .= '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                        return $btn;
                    } else {
                        $btn = '<a href="' . route('transaksi.detail', $data->id) . '" class="btn btn-info btn-sm me-1" id="btnEdit"><i class="ri-eye-line"></i></a>';
                        return $btn;
                    }
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }

        return view('backend.checkout.index');
    }

    public function detail($id)
    {
        $checkout = Checkouts::with('user', 'returnProduct')->find($id);
        if ($checkout) {
            $items = $checkout->items()->with('product')->get();
            $address = $checkout->addressWithDetails();
        } else {
            $items = collect();
        }

        $subtotal = $items->sum(function ($row) {
            return $row->quantity * $row->product->harga_jual;
        });
        return view('backend.checkout.detail', compact(['checkout', 'items', 'subtotal', 'address']));
    }

    public function destroy(Request $request)
    {
        $checkout = Checkouts::find($request->id);

        if ($checkout) {
            if ($checkout->bukti_pembayaran && Storage::disk('public')->exists('bukti_pembayaran/' . $checkout->bukti_pembayaran)) {
                Storage::disk('public')->delete('bukti_pembayaran/' . $checkout->bukti_pembayaran);
            }

            if ($checkout->bukti_penerimaan && Storage::disk('public')->exists('bukti_penerimaan/' . $checkout->bukti_penerimaan)) {
                Storage::disk('public')->delete('bukti_penerimaan/' . $checkout->bukti_penerimaan);
            }

            $checkout->items()->delete();
            $checkout->delete();
            return response()->json(['success' => 'Data checkout berhasil dihapus.']);
        }

        return response()->json(['error' => 'Data checkout tidak ditemukan.'], 404);
    }


    public function tolak(Request $request)
    {
        $checkout = Checkouts::find($request->id);
        $checkout->status = 'failed';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
    }

    public function proses(Request $request)
    {
        $checkout = Checkouts::find($request->id);
        $checkout->status = 'process';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
    }

    public function selesai(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'bukti_penerimaan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'bukti_penerimaan.required' => 'Foto harus diisi.',
                'bukti_penerimaan.image' => 'Bukti penerimaan harus berupa gambar.',
                'bukti_penerimaan.mimes' => 'Format gambar yang diizinkan adalah jpeg, png, jpg, gif, svg.',
                'bukti_penerimaan.max' => 'Ukuran gambar maksimal adalah 2 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $checkout = Checkouts::find($id);

            if ($checkout) {
                if ($request->hasFile('bukti_penerimaan')) {
                    $file = $request->file('bukti_penerimaan');
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('bukti_penerimaan', $fileName, 'public');
                    $checkout->bukti_penerimaan = $fileName;
                }

                $checkout->status = 'completed';
                $checkout->save();

                return response()->json(['message' => 'Data berhasil disimpan.']);
            } else {
                return response()->json(['error' => 'Checkout tidak ditemukan.']);
            }
        }
    }


    public function updateResi(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'no_resi' => 'required|unique:checkouts,resi,' . $id,
            ],
            [
                'no_resi.required' => 'Silakan isi no resi terlebih dahulu.',
                'no_resi.unique' => 'No resi sudah tersedia.'
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $checkout = Checkouts::find($id);
            $checkout->resi = $request->no_resi;
            $checkout->save();
            return response()->json(['message' => 'Data berhasil di simpan.']);
        }
    }

    public function return(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'alasan' => 'required',
                'bukti_pengembalian' => 'required|max:5120',
                'bukti_pengembalian.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
            ],
            [
                'alasan.required' => 'Silakan isi alasan terlebih dahulu.',
                'bukti_pengembalian.required' => 'Silakan isi foto terlebih dahulu.',
                'bukti_pengembalian.image' => 'File harus berupa gambar.',
                'bukti_pengembalian.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'bukti_pengembalian.file' => 'File harus berupa gambar.',
                'bukti_pengembalian.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $checkout = Checkouts::find($id);
            $checkout->status = 'return';
            $checkout->save();

            $return = new ReturnProduct();
            $return->checkout_id = $checkout->id;
            $return->user_id = $checkout->user_id;
            $return->reason = $request->alasan;
            $return->return_date = now();
            $return->save();

            if ($request->hasFile('bukti_pengembalian')) {
                foreach ($request->file('bukti_pengembalian') as $file) {
                    $filename = 'return_' . time() . '_' . $file->getClientOriginalName();
                    $file->storeAs('uploads/returns', $filename, 'public');

                    $returnProof = new ReturnProductProof();
                    $returnProof->return_product_id = $return->id;
                    $returnProof->file_return = $filename;
                    $returnProof->save();
                }
            }

            return response()->json(['message' => 'Permintaan berhasil dikirim']);
        }
    }
}
