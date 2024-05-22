<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductViewsController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            ProductViews::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'viewed_at' => now()
            ]);

            return response()->json(['message' => 'Product view recorded successfully'], 200);
        }

        return response()->json(['message' => 'User not logged in'], 401);
    }
}
