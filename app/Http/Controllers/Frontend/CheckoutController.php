<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        return view('frontend.checkout.index', compact('provinces'));
    }

    public function city(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $city = City::where('province_id', $id_provinsi)->get();
        echo '<option value="">Pilih Kota&hellip;</option>';
        foreach ($city as $row) {
            echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
    }

    public function checkOngkir(Request $request)
    {
        try {
            $response = Http::withOptions(['verify' => false,])->withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin'        => 80,
                'destination'   => $request->kota,
                'weight'        => 200,
                'courier'       => $request->kurir
            ])
                ->json()['rajaongkir']['results'][0]['costs'];

            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
                'data'    => []
            ]);
        }
    }
}
