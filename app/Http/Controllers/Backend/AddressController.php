<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
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
                'name' => 'required|string',
                'no_telepon' => 'required|string|min:11',
                'provinsi' => 'required|string',
                'kabupaten' => 'required|string',
                'kecamatan' => 'required|string',
                'desa' => 'required|string',
                'kode_pos' => 'required|numeric',
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
                'kabupaten.required' => 'Silakan pilih kabupaten terlebih dahulu.',
                'kabupaten.string' => 'Kabupaten harus berupa teks.',
                'kecamatan.required' => 'Silakan pilih kecamatan terlebih dahulu.',
                'kecamatan.string' => 'Kecamatan harus berupa teks.',
                'desa.required' => 'Silakan pilih desa terlebih dahulu.',
                'desa.string' => 'Desa harus berupa teks.',
                'kode_pos.required' => 'Silakan isi kode pos terlebih dahulu.',
                'kode_pos.numeric' => 'Kode pos harus berupa angka.',
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
            $address->kabupaten_id = $request->kabupaten;
            $address->kecamatan_id = $request->kecamatan;
            $address->desa_id = $request->desa;
            $address->kode_pos = $request->kode_pos;
            $address->jalan = $request->jalan;
            $address->detail_alamat = $request->detail_alamat;
            $address->default_alamat = 0;
            $address->user_id = auth()->user()->id;
            $address->save();

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    public function getKabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kabupaten = Regency::where('province_id', $id_provinsi)->get();
        foreach ($kabupaten as $row) {
            echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
    }

    public function getKecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatan = District::where('regency_id', $id_kabupaten)->get();
        foreach ($kecamatan as $row) {
            echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
    }

    public function getDesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $desa = Village::where('district_id', $id_kecamatan)->get();
        foreach ($desa as $row) {
            echo "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
    }
}
