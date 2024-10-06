<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Carts;
use App\Models\CheckoutItem;
use App\Models\Checkouts;
use App\Models\Product;
use App\Models\Rekening;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function directCheckout(Request $request)
    {
        $product = Product::find($request->id);
        $address = DB::table('address')
            ->join('provinces', 'address.provinsi_id', '=', 'provinces.id')
            ->join('cities', 'address.kota_id', '=', 'cities.id')
            ->select('address.*', 'provinces.name as province_name', 'cities.name as city_name', 'cities.postal_code as kode_pos')
            ->where('user_id', auth()->user()->id)
            ->get();
        $qty = $request->qty;
        $rekening = Rekening::all();
        return view('frontend.checkout.direct', compact(['qty', 'product', 'address', 'rekening']));
    }


    public function cartCheckout(Request $request)
    {
        $userId = auth()->id();
        $cart = Carts::where('user_id', $userId)->first();

        $selectedItems = $request->input('selected_items', []);

        if ($cart) {
            $items = $cart->items()->with('product')
                ->whereIn('product_id', $selectedItems)
                ->get();
        } else {
            $items = collect();
        }

        $address = DB::table('address')
            ->join('provinces', 'address.provinsi_id', '=', 'provinces.id')
            ->join('cities', 'address.kota_id', '=', 'cities.id')
            ->select('address.*', 'provinces.name as province_name', 'cities.name as city_name', 'cities.postal_code as kode_pos')
            ->where('user_id', auth()->user()->id)
            ->get();

        $rekening = Rekening::all();

        // Hitung subtotal hanya untuk item yang dipilih
        $subtotal = $items->sum(function ($row) {
            return $row->quantity * $row->product->harga_jual;
        });

        return view('frontend.checkout.cart', compact(['items', 'address', 'rekening', 'subtotal']));
    }


    public function getAddressDetails(Request $request)
    {
        $address = DB::table('address')
            ->join('provinces', 'address.provinsi_id', '=', 'provinces.id')
            ->join('cities', 'address.kota_id', '=', 'cities.id')
            ->select('provinces.name as province_name', 'cities.name as city_name', 'cities.id as city_id',)
            ->where('address.id', $request->id)
            ->first();
        if ($address) {
            return response()->json($address);
        } else {
            return response()->json(['error' => 'Alamat tidak ditemukan'], 404);
        }
    }

    public function checkOngkir(Request $request)
    {
        try {
            $origin = 80;
            $destination = $request->kota;
            $weight = 1000;
            $courier = $request->kurir;

            $response = Http::withOptions(['verify' => false,])
                ->withHeaders([
                    'key' => env('RAJAONGKIR_API_KEY')
                ])
                ->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $origin,
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier
                ])
                ->json()['rajaongkir']['results'][0]['costs'];

            $shippingOptions = '<option value="">Pilih Ongkos Kirim&hellip;</option>';
            foreach ($response as $val) {
                $cost = $val['cost'][0]['value'];
                $formattedCost = number_format($cost, 0, ',', '.');
                $shippingOptions .= "<option value='{$val['cost'][0]['value']}'>{$val['service']} | {$val['description']} | Rp {$formattedCost} | Estimasi {$val['cost'][0]['etd']}</option>";
            }

            return response()->json(['status' => true, 'ongkir' => $shippingOptions]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'data' => []
            ]);
        }
    }


    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'address' => 'required',
                'kurir' => 'required|string',
                'ongkir' => 'required|string',
                'bukti_pembayaran' => 'required|max:5120|image|mimes:jpg,png,jpeg,webp,svg|file',
            ],
            [
                'address.required' => 'Silakan pilih alamat terlebih dahulu.',
                'kurir.required' => 'Silakan pilih kurir terlebih dahulu.',
                'ongkir.required' => 'Silakan pilih ongkos kirim terlebih dahulu.',
                'bukti_pembayaran.required' => 'Silakan isi bukti pembayaran terlebih dahulu.',
                'bukti_pembayaran.image' => 'File harus berupa gambar.',
                'bukti_pembayaran.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'bukti_pembayaran.file' => 'File harus berupa gambar.',
                'bukti_pembayaran.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                if ($file->isValid()) {
                    $randomFileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran/', $randomFileName, 'public');

                    $currentDateTime = Carbon::now();
                    $formattedDate = $currentDateTime->format('YmdHi');
                    $transactionCount = Checkouts::count();
                    $transactionCode = $formattedDate . str_pad($transactionCount + 1, 4, '0', STR_PAD_LEFT);

                    $checkouts = Checkouts::firstOrCreate(
                        [
                            'kode_checkout' => $transactionCode,
                            'user_id' => auth()->user()->id,
                            'address_id' => $request->address,
                            'ongkir' => $request->total_ongkir,
                            'total_biaya' => $request->total_pembayaran,
                            'bukti_pembayaran' => $randomFileName,
                            'tanggal_pembayaran' => now(),
                            'kurir' => $request->kurir,
                        ]
                    );

                    $checkouts->items()->create([
                        'product_id' => $request->product_id,
                        'quantity' => $request->qty,
                        'harga' => $request->harga,
                    ]);

                    $product = Product::find($request->product_id);
                    if ($product) {
                        $product->stok -= $request->qty;
                        $product->save();
                    } else {
                        return response()->json(['message' => 'Produk tidak ditemukan'], 404);
                    }

                    return response()->json(['message' => 'Transaksi berhasil ditambahkan']);
                }
            }
        }
    }

    public function storeCart(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'address' => 'required',
                'kurir' => 'required|string',
                'ongkir' => 'required|string',
                'bukti_pembayaran' => 'required|max:5120|image|mimes:jpg,png,jpeg,webp,svg|file',
                'product_id' => 'required|array',
                'qty' => 'required|array',
                'harga' => 'required|array',
            ],
            [
                'address.required' => 'Silakan pilih alamat terlebih dahulu.',
                'kurir.required' => 'Silakan pilih kurir terlebih dahulu.',
                'ongkir.required' => 'Silakan pilih ongkos kirim terlebih dahulu.',
                'bukti_pembayaran.required' => 'Silakan isi bukti pembayaran terlebih dahulu.',
                'bukti_pembayaran.image' => 'File harus berupa gambar.',
                'bukti_pembayaran.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'bukti_pembayaran.file' => 'File harus berupa gambar.',
                'bukti_pembayaran.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
                'product_id.required' => 'Produk tidak boleh kosong.',
                'qty.required' => 'Kuantitas tidak boleh kosong.',
                'harga.required' => 'Harga tidak boleh kosong.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                if ($file->isValid()) {
                    $randomFileName = uniqid() . '.' . $file->getClientOriginalExtension();
                    $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran/', $randomFileName, 'public');

                    $currentDateTime = Carbon::now();
                    $formattedDate = $currentDateTime->format('YmdHi');
                    $transactionCount = Checkouts::count();
                    $transactionCode = $formattedDate . str_pad($transactionCount + 1, 4, '0', STR_PAD_LEFT);

                    $checkouts = Checkouts::create([
                        'kode_checkout' => $transactionCode,
                        'user_id' => auth()->user()->id,
                        'address_id' => $request->address,
                        'ongkir' => $request->total_ongkir,
                        'total_biaya' => $request->total_pembayaran,
                        'bukti_pembayaran' => $randomFileName,
                        'tanggal_pembayaran' => now(),
                        'kurir' => $request->kurir,
                    ]);

                    foreach ($request->product_id as $key => $product_id) {
                        $checkoutItem = new CheckoutItem();
                        $checkoutItem->checkout_id = $checkouts->id;
                        $checkoutItem->product_id = $product_id;
                        $checkoutItem->quantity = $request->qty[$key];
                        $checkoutItem->harga = $request->harga[$key];
                        $checkoutItem->save();

                        $product = Product::find($product_id);
                        $product->stok -= $request->qty[$key];
                        $product->save();

                        $cartItem = CartItem::where('id', $request->cart_id[$key])
                            ->where('product_id', $product_id)
                            ->first();
                        if ($cartItem) {
                            $cartItem->delete();
                        }
                    }

                    return response()->json(['message' => 'Transaksi berhasil ditambahkan']);
                }
            }
        }
    }
}
