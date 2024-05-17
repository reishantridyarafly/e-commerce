<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function index()
    {
        $address = DB::table('address')
            ->join('provinces', 'address.provinsi_id', '=', 'provinces.id')
            ->join('cities', 'address.kota_id', '=', 'cities.id')
            ->select('address.*', 'provinces.name as province_name', 'cities.name as city_name', 'cities.postal_code as kode_pos')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('backend.address.index', compact('address'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('backend.address.add', compact('provinces'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'no_telepon' => 'required|string|min:11',
                'provinsi' => 'required|string',
                'kota' => 'required',
                'jalan' => 'required|string',
                'detail_alamat' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'no_telepon.required' => 'Silakan isi no telepon terlebih dahulu.',
                'no_telepon.string' => 'Nomor telepon harus berupa teks.',
                'no_telepon.min' => 'Nomor telepon harus memiliki minimal :min karakter.',
                'provinsi.required' => 'Silakan pilih provinsi terlebih dahulu.',
                'provinsi.string' => 'Provinsi harus berupa teks.',
                'kota.required' => 'Silakan pilih kota terlebih dahulu.',
                'jalan.required' => 'Silakan isi jalan terlebih dahulu.',
                'jalan.string' => 'Jalan harus berupa teks.',
                'detail_alamat.required' => 'Silakan isi detail alamat terlebih dahulu.',
                'detail_alamat.string' => 'Detail alamat harus berupa teks.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $address = new Address();

            $address->nama = $request->name;
            $address->no_telepon = $request->no_telepon;
            $address->provinsi_id = $request->provinsi;
            $address->kota_id = $request->kota;
            $address->jalan = $request->jalan;
            $address->detail_alamat = $request->detail_alamat;
            $address->user_id = auth()->user()->id;

            $existingDefaultAddress = Address::where('default_alamat', 0)->where('user_id', auth()->user()->id)->first();

            if ($request->default_alamat == '0') {
                $address->default_alamat = 0;
                if ($existingDefaultAddress) {
                    $existingDefaultAddress->default_alamat = 1;
                    $existingDefaultAddress->save();
                }
            } else {
                $address->default_alamat = 1;
            }
            $address->user_id = auth()->user()->id;

            $address->save();
            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    public function edit($id)
    {
        $address = Address::find($id);
        $provinces = Province::all();
        return view('backend.address.edit', compact('provinces', 'address'));
    }

    public function update(Request $request)
    {

        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'name' => 'required|string',
                'no_telepon' => 'required|string|min:11',
                'provinsi' => 'required|string',
                'kota' => 'required|string',
                'jalan' => 'required|string',
                'detail_alamat' => 'required|string',
            ],
            [
                'name.required' => 'Silakan isi nama terlebih dahulu.',
                'name.string' => 'Nama harus berupa teks.',
                'no_telepon.required' => 'Silakan isi no telepon terlebih dahulu.',
                'no_telepon.string' => 'Nomor telepon harus berupa teks.',
                'no_telepon.min' => 'Nomor telepon harus memiliki minimal :min karakter.',
                'provinsi.required' => 'Silakan pilih provinsi terlebih dahulu.',
                'provinsi.string' => 'Provinsi harus berupa teks.',
                'kota.required' => 'Silakan pilih kota terlebih dahulu.',
                'kota.string' => 'Kota harus berupa teks.',
                'jalan.required' => 'Silakan isi jalan terlebih dahulu.',
                'jalan.string' => 'Jalan harus berupa teks.',
                'detail_alamat.required' => 'Silakan isi detail alamat terlebih dahulu.',
                'detail_alamat.string' => 'Detail alamat harus berupa teks.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $id = $request->id;
            $address = Address::find($id);
            $address->nama = $request->name;
            $address->no_telepon = $request->no_telepon;
            $address->provinsi_id = $request->provinsi;
            $address->kota_id = $request->kota;
            $address->jalan = $request->jalan;
            $address->detail_alamat = $request->detail_alamat;
            $existingDefaultAddress = Address::where('default_alamat', 0)->where('user_id', auth()->user()->id)->first();

            if ($request->default_alamat == '0') {
                $address->default_alamat = 0;
                if ($existingDefaultAddress) {
                    $existingDefaultAddress->default_alamat = 1;
                    $existingDefaultAddress->save();
                }
            } else {
                $address->default_alamat = 1;
            }
            $address->user_id = auth()->user()->id;

            $address->save();

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }


    public function destroy(Request $request)
    {
        $address = Address::where('id', $request->id)->delete();
        return Response()->json(['address' => $address, 'success' => 'Data berhasil dihapus!']);
    }

    public function getKota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kota = City::where('province_id', $id_provinsi)->get();
        echo "<option value=''>-- Pilih Kota --</option>";
        foreach ($kota as $row) {
            echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
    }
}
