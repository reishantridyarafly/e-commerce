<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $category = Category::whereHas('products', function ($query) {
            $query->where('status', 0)
                ->where('stok', '>', 0);
        })->orderBy('nama', 'asc')->get();

        $product = Product::where('status', 0)
            ->where('stok', '>', 0)
            ->orderBy('created_at', 'asc')
            ->paginate(12);

        foreach ($product as $row) {
            $row->featured_photo = $row->photos()->first();
        }
        return view('frontend.shop.index', compact(['category', 'product']));
    }

    public function detail($slug)
    {
        $product = Product::with('category', 'photos')->where('slug', $slug)->first();
        return view('frontend.shop.detail', compact(['product']));
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
