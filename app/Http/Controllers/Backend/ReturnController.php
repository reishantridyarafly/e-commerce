<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use App\Models\ReturnProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ReturnController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            if (auth()->user()->type == 'Pelanggan') {
                $returnProduct = ReturnProduct::with('checkout')->where('user_id', auth()->user()->id)->orderBy('created_at', 'asc')->get();
            } else {
                $returnProduct = ReturnProduct::with('checkout')->orderBy('created_at', 'asc')->get();
            }

            return DataTables::of($returnProduct)
                ->addIndexColumn()
                ->addColumn('kode_checkout', function ($data) {
                    return $data->checkout->kode_checkout;
                })
                ->addColumn('name', function ($data) {
                    return $data->user->first_name . ' ' . $data->user->last_name;
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
                        $btn = '<a href="' . route('return.detail', $data->id) . '" class="btn btn-info btn-sm me-1"><i class="ri-eye-line"></i></i></a>';
                        $btn .= '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                        return $btn;
                    } else {
                        $btn = '<a href="' . route('return.detail', $data->id) . '" class="btn btn-info btn-sm me-1"><i class="ri-eye-line"></i></i></a>';
                        return $btn;
                    }
                })
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }
        return view('backend.return.index');
    }

    public function detail($id)
    {
        $returnProduct = ReturnProduct::with('user', 'checkout')->find($id);
        if ($returnProduct) {
            $items = $returnProduct->checkout->items()->with('product')->get();
            $address = $returnProduct->checkout->addressWithDetails();
        } else {
            $items = collect();
        }

        $subtotal = $items->sum(function ($row) {
            return $row->quantity * $row->product->harga_jual;
        });

        return view('backend.return.detail', compact(['returnProduct', 'items', 'subtotal', 'address']));
    }

    public function failed(Request $request)
    {
        $returnProduct = ReturnProduct::find($request->id);
        $returnProduct->status = 'failed';
        $returnProduct->save();

        $checkout = Checkouts::find($returnProduct->checkout_id);
        $checkout->status = 'completed';
        $checkout->save();

        return response()->json(['message' => 'Pengembalian ditolak!']);
    }

    public function process(Request $request)
    {
        $returnProduct = ReturnProduct::find($request->id);
        $returnProduct->status = 'process';
        $returnProduct->processed_date = now();
        $returnProduct->save();

        return response()->json(['message' => 'Pengembalian diproses!']);
    }

    public function completed(Request $request)
    {
        $returnProduct = ReturnProduct::find($request->id);
        $returnProduct->status = 'completed';
        $returnProduct->save();

        $checkout = Checkouts::find($returnProduct->checkout_id);
        $checkout->status = 'completed';
        $checkout->save();

        return response()->json(['message' => 'Pengembalian selesai diproses!']);
    }

    public function destroy(Request $request)
    {
        $returnProduct = ReturnProduct::findOrFail($request->id);
        $fileNames = $returnProduct->returnProductProofs()->pluck('file_return');

        foreach ($fileNames as $fileName) {
            if (Storage::disk('public')->exists('uploads/returns/' . $fileName)) {
                Storage::disk('public')->delete('uploads/returns/' . $fileName);
            }
        }

        $returnProduct->returnProductProofs()->delete();
        $returnProduct->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
