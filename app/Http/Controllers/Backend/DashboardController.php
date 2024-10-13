<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input tanggal awal dan akhir dari request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Hitung total pengguna dan produk
        $count_users = User::where('type', 2)->count();
        $count_product = Product::count();

        // Hitung transaksi completed, tanpa filter awal (semua data)
        $count_transaction_completed = Checkouts::where('status', 'completed')->count();

        // Ambil data checkout, tanpa filter awal (semua data)
        $checkouts_take = Checkouts::orderBy('tanggal_pembayaran', 'desc')
            ->take(10)
            ->get();

        // Jika ada input tanggal, maka terapkan filter pada count dan checkouts
        if ($startDate || $endDate) {
            $count_transaction_completed = Checkouts::where('status', 'completed')
                ->when($startDate, function ($query, $startDate) {
                    return $query->where('tanggal_pembayaran', '>=', $startDate);
                })
                ->when($endDate, function ($query, $endDate) {
                    return $query->where('tanggal_pembayaran', '<=', $endDate);
                })
                ->count();

            // Filter checkout berdasarkan tanggal
            $checkouts_take = Checkouts::when($startDate, function ($query, $startDate) {
                return $query->where('tanggal_pembayaran', '>=', $startDate);
            })
                ->when($endDate, function ($query, $endDate) {
                    return $query->where('tanggal_pembayaran', '<=', $endDate);
                })
                ->orderBy('tanggal_pembayaran', 'desc')
                ->take(10)
                ->get();
        }

        // Flatten items dari checkouts untuk menghitung total harga
        $items = $checkouts_take->flatMap->items;

        // Hitung total harga dari semua item yang diambil
        $totalHarga = $items->sum(function ($item) {
            return $item->product->harga_jual * $item->quantity;
        });

        // Hitung revenue bulanan berdasarkan checkout completed
        $monthlyRevenue = DB::table('checkout_items')
            ->join('checkouts', 'checkout_items.checkout_id', '=', 'checkouts.id')
            ->select(
                DB::raw('YEAR(checkouts.tanggal_pembayaran) as year'),
                DB::raw('MONTH(checkouts.tanggal_pembayaran) as month'),
                DB::raw('SUM(checkout_items.harga) as total')
            )
            ->where('checkouts.status', 'completed')
            ->when($startDate, function ($query, $startDate) {
                return $query->where('checkouts.tanggal_pembayaran', '>=', $startDate);
            })
            ->when($endDate, function ($query, $endDate) {
                return $query->where('checkouts.tanggal_pembayaran', '<=', $endDate);
            })
            ->groupBy(DB::raw('YEAR(checkouts.tanggal_pembayaran)'), DB::raw('MONTH(checkouts.tanggal_pembayaran)'))
            ->get();

        // Render ke view dengan data yang sudah difilter
        return view('backend.dashboard.index', compact(
            'count_users',
            'count_product',
            'count_transaction_completed',
            'totalHarga',
            'monthlyRevenue',
            'checkouts_take'
        ));
    }
}
