<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $category = Category::orderBy('nama', 'asc')->get();
        return view('backend.product.add', compact('category'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|unique:products,nama',
                'deskripsi' => 'required|string',
                'harga' => 'required|string',
                'stok' => 'required|string',
                'foto' => 'required|max:5120',
                'foto.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'kategori' => 'required|string',
            ],
            [
                'nama.required' => 'Silakan isi nama terlebih dahulu.',
                'nama.string' => 'Nama harus berupa teks.',
                'nama.unique' => 'Nama sudah tersedia.',
                'deskripsi.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'deskripsi.string' => 'Deskripsi harus berupa teks.',
                'harga.required' => 'Silakan isi harga terlebih dahulu.',
                'harga.string' => 'Harga harus berupa teks.',
                'stok.required' => 'Silakan isi stok terlebih dahulu.',
                'stok.string' => 'Stok harus berupa teks.',
                'kategori.required' => 'Silakan pilih kategori terlebih dahulu.',
                'kategori.string' => 'Kategori harus berupa teks.',
                'foto.required' => 'Silakan isi foto terlebih dahulu.',
                'foto.image' => 'File harus berupa gambar.',
                'foto.mimes' => 'Ekstensi file harus berupa: jpg, png, jpeg, webp, atau svg.',
                'foto.file' => 'File harus berupa gambar.',
                'foto.max' => 'Ukuran file tidak boleh lebih dari 5 MB.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $product = new Product();

            $product->nama = $request->nama;
            $product->slug = Str::slug($request->nama);
            $product->deskripsi = $request->deskripsi;
            $product->harga = str_replace(['Rp', ' ', '.'], '', $request->harga);
            $product->stok = $request->stok;
            $product->kategori_id = $request->kategori;
            $product->save();

            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::putFileAs('public/uploads/products', $image, $imageName);
                    $product->photos()->create(['photo_name' => $imageName]);
                }
            }

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }
}
