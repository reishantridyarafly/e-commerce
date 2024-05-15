<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Carts;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $cart = Carts::where('user_id', $userId)->first();

        if ($cart) {
            $items = $cart->items()->with('product')->get();
        } else {
            $items = collect();
        }

        return view('frontend.cart.index', compact(['items']));
    }

    public function addCart($id)
    {
        $product = Product::findOrFail($id);
        $userId = auth()->id();
        $cart = Carts::firstOrCreate(['user_id' => $userId]);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->harga_jual
            ]);
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan']);
    }

    public function getCartItemCount()
    {
        $userId = auth()->id();
        $cart = Carts::where('user_id', $userId)->first();
        $itemCount = 0;

        if ($cart) {
            $itemCount = $cart->items()->count();
        }

        return response()->json(['count' => $itemCount]);
    }

    public function updateCartItem(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return response()->json(['message' => 'Keranjang berhasil diperbarui']);
    }

    public function deleteCartItem($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return response()->json(['message' => 'Item berhasil dihapus dari keranjang']);
    }
}
