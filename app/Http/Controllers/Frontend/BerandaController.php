<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerSettings;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori yang memiliki produk dengan status aktif dan stok lebih dari 0
        $categories = Category::whereHas('products', function ($query) {
            $query->where('status', 0)->where('stok', '>', 0);
        })->orderBy('nama', 'asc')->get();

        // Mengambil 10 produk terlaris secara keseluruhan
        $popular_products = Product::with('ratings')
            ->select('products.id', 'products.nama', 'products.slug', 'products.harga', 'products.harga_jual', 'products.stok', 'products.status', DB::raw('SUM(checkout_items.quantity) as total_sold'))
            ->join('checkout_items', 'products.id', '=', 'checkout_items.product_id')
            ->where('products.status', 0)
            ->where('products.stok', '>', 0)
            ->groupBy('products.id', 'products.nama', 'products.slug', 'products.harga', 'products.harga_jual', 'products.stok', 'products.status')
            ->orderBy('total_sold', 'desc')
            ->take(10)
            ->get()
            ->map(function ($product) {
                $product->average_rating = $product->ratings->avg('rating');
                $product->ratings_count = $product->ratings->count();
                return $product;
            });

        // Mengambil 10 populer bedasarkan category
        $top_products_by_category = [];
        foreach ($categories as $category) {
            $top_products = Product::with('ratings')
                ->select('products.id', 'products.nama', 'products.slug', 'products.harga', 'products.harga_jual', 'products.stok', 'products.status', DB::raw('SUM(checkout_items.quantity) as total_sold'))
                ->join('checkout_items', 'products.id', '=', 'checkout_items.product_id')
                ->where('products.kategori_id', $category->id)
                ->where('products.status', 0)
                ->where('products.stok', '>', 0)
                ->groupBy('products.id', 'products.nama', 'products.slug', 'products.harga', 'products.harga_jual', 'products.stok', 'products.status')
                ->orderBy('total_sold', 'desc')
                ->take(10)
                ->get()
                ->map(function ($product) {
                    $product->average_rating = $product->ratings->avg('rating');
                    $product->ratings_count = $product->ratings->count();
                    return $product;
                });

            $top_products_by_category[$category->id] = $top_products;
        }

        $latest_products = Product::orderBy('created_at', 'desc')->get();

        $banner_1 = BannerSettings::with('product')->where('type', 1)->first();
        $banner_2 = BannerSettings::with('product')->where('type', 2)->first();

        return view('frontend.beranda.index', compact('categories', 'popular_products', 'top_products_by_category', 'latest_products', 'banner_1', 'banner_2'));
    }
}
