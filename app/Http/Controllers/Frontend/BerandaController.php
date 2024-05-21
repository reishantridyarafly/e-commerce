<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $category = Category::whereHas('products', function ($query) {
            $query->where('status', 0)
                ->where('stok', '>', 0);
        })->orderBy('nama', 'asc')->get();

        $products = Product::with('ratings')->where('status', 0)
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($product) {
                $product->average_rating = $product->ratings->avg('rating');
                $product->ratings_count = $product->ratings->count();
                return $product;
            });

        return view('frontend.beranda.index', compact(['category', 'products']));
    }
}
