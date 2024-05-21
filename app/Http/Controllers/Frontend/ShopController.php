<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $category = Category::whereHas('products', function ($query) {
            $query->where('status', 0)
                ->where('stok', '>', 0);
        })->orderBy('nama', 'asc')->get();

        $product = Product::with('ratings')->where('status', 0)
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'asc')
            ->paginate(12);

        $product->getCollection()->transform(function ($product) {
            $product->average_rating = $product->ratings->avg('rating');
            $product->ratings_count = $product->ratings->count();
            return $product;
        });

        foreach ($product as $row) {
            $row->featured_photo = $row->photos()->first();
        }
        return view('frontend.shop.index', compact(['category', 'product']));
    }

    public function detail($slug)
    {
        $product = Product::with('category', 'photos')->where('slug', $slug)->first();
        if ($product) {
            $product->average_rating = $product->ratings->avg('rating');
            $product->ratings_count = $product->ratings->count();

            $reviews = Rating::where('product_id', $product->id)->get();
        }

        return view('frontend.shop.detail', compact(['product', 'reviews']));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $category = Category::orderBy('nama', 'asc')->get();
        $product = Product::where('nama', 'LIKE', "%{$keyword}%")
            ->orWhere('deskripsi', 'LIKE', "%{$keyword}%")
            ->where('status', 0)
            ->paginate(12);

        foreach ($product as $row) {
            $row->featured_photo = $row->photos()->first();
        }
        return view('frontend.shop.index', compact(['category', 'product']));
    }

    public function category($slug)
    {
        $category = Category::orderBy('nama', 'asc')->get();
        $categoryId = Category::where('slug', $slug)->first()->id;
        $product = Product::where('kategori_id', $categoryId)->where('status', 0)->paginate(12);

        foreach ($product as $row) {
            $row->featured_photo = $row->photos()->first();
        }
        return view('frontend.shop.index', compact(['category', 'product']));
    }
}
