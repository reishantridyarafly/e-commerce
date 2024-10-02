<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class RekeningController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $rekekning = Rekening::orderBy('nama', 'asc')->get();
            return DataTables::of($rekekning)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-warning btn-sm me-1" data-id="' . $data->id . '" id="btnEdit"><i class="ri-pencil-line"></i></button>';
                    $btn = $btn . '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('backend.rekening.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'no_rekening' => 'required|unique:rekening,no_rekening,' . $id,
                'nama_bank' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'nama.required' => 'Silakan isi nama terlebih dahulu.',
                'no_rekening.required' => 'Silakan isi no rekening terlebih dahulu.',
                'no_rekening.unique' => 'No rekening sudah tersedia.',
                'nama_bank.required' => 'Silakan isi nama bank terlebih dahulu.',
                'foto.required' => 'Silakan isi foto katalog terlebih dahulu.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
                'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $rekening = Rekening::find($id);
            $filename = $rekening ? $rekening->foto : null;
            if ($request->hasFile('foto')) {
                if ($rekening && $rekening->foto) {
                    Storage::disk('public')->delete('uploads/bank/' . $rekening->foto);
                }
                $foto = $request->file('foto');
                $filename = time() . '_' . $foto->getClientOriginalName();
                $foto->storeAs('uploads/bank', $filename, 'public');
            }

            $rekening = Rekening::updateOrCreate([
                'id' => $id
            ], [
                'nama_bank' => $request->nama_bank,
                'nama' => $request->nama,
                'no_rekening' => $request->no_rekening,
                'foto' => $filename
            ]);

            return response()->json($rekening);
        }
    }

    public function edit($id)
    {
        $data = Rekening::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $rekening = Rekening::find($request->id);

        if ($rekening) {
            if ($rekening->foto) {
                Storage::disk('public')->delete('uploads/bank/' . $rekening->foto);
            }
            $rekening->delete();
            return response()->json(['success' => 'Data dan foto berhasil dihapus']);
        }

        return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
    }
}
