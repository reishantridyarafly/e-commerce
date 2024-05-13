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
        $category = Category::orderBy('nama', 'asc')->get();
        $product = Product::orderBy('nama', 'asc')->where('status', 0)->get();

        foreach ($product as $row) {
            $row->featured_photo = $row->photos()->first();
        }
        return view('frontend.shop.index', compact(['category', 'product']));
    }
}
