<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CheckoutController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $checkout = Checkouts::with('user')->orderBy('tanggal_pembayaran', 'asc')->get();
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
                    } else {
                        $status = '<span class="badge badge-outline-danger rounded-pill">Gagal</span>';
                    }
                    return $status;
                })
                ->addColumn('aksi', function ($data) {
                    if (auth()->user()->type == 'Administrator') {
                        $btn = '<a href="' . route('transaksi.detail', $data->id) . '" class="btn btn-info btn-sm me-1" id="btnEdit"><i class="ri-eye-line"></i></i></a>';
                        $btn .= '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                        return $btn;
                    } else {
                        $btn = '<a href="' . route('transaksi.detail', $data->id) . '" class="btn btn-info btn-sm me-1" id="btnEdit"><i class="ri-eye-line"></i></i></a>';
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
        $checkout = Checkouts::with('user')->find($id);
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
            if ($checkout->bukti_pembayaran && Storage::exists('bukti_pembayaran/' . $checkout->bukti_pembayaran)) {
                Storage::delete('bukti_pembayaran/' . $checkout->bukti_pembayaran);
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
        $checkout = Checkouts::find($request->id);
        $checkout->status = 'completed';
        $checkout->save();
        return response()->json(['message' => 'Data berhasil di simpan.']);
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
}
