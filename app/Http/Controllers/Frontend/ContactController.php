<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $category_header = Category::orderBy('nama', 'asc')->get();
        return view('frontend.contact.index', compact('category_header'));
    }
}
