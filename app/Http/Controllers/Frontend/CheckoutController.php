<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        return view('frontend.checkout.direct', compact(['qty', 'product', 'address']));
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
            $origin = 80; // Asumsi asal pengiriman dari Kota Malang
            $destination = $request->kota;
            $weight = 200; // Asumsi berat 200 gram
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
}
