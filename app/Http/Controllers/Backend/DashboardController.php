<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_users = User::where('type', 2)->count();
        $count_product = Product::count();
        $count_transaction_completed = Checkouts::where('status', 'completed')->count();
        $checkouts = Checkouts::with('items.product')->get();
        $items = $checkouts->flatMap->items;
        $totalHarga = $items->sum(function ($item) {
            return $item->product->harga_jual * $item->quantity;
        });
        return view('backend.dashboard.index', compact(['count_users', 'count_product', 'count_transaction_completed', 'totalHarga']));
    }
}
