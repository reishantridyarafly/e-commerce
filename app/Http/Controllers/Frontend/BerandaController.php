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
        $category_header = Category::orderBy('nama', 'asc')->get();
        $product = Product::orderBy('created_at', 'asc')->get();
        return view('frontend.beranda.index', compact(['category_header', 'product']));
    }
}
