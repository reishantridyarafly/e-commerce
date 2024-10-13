<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $product = Product::orderBy('nama', 'asc')->get();
            return DataTables::of($product)
                ->addIndexColumn()
                ->addColumn('harga', function ($data) {
                    return 'Rp ' . number_format($data->harga, 0, ',', '.');
                })
                ->addColumn('harga_jual', function ($data) {
                    return 'Rp ' . number_format($data->harga_jual, 0, ',', '.');
                })
                ->addColumn('aktif_status', function ($data) {
                    $aktif_status = $data->status == 0 ? '<div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="aktif_status" name="aktif_status" data-id="' . $data->id . '" checked>
                    <label class="form-check-label" for="aktif_status">Aktif</label>
                  </div>' : '<div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="aktif_status" name="aktif_status" data-id="' . $data->id . '">
                  <label class="form-check-label" for="aktif_status">Tidak Aktif</label>
                </div>';
                    return $aktif_status;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = '<a href="' . route('produk.edit', $data->id) . '" class="btn btn-warning btn-sm me-1"><i
                class="mdi mdi-pencil"></i></a>';
                    $btn = $btn . '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i
                class="mdi mdi-trash-can"></i></button>';
                    return $btn;
                })
                ->rawColumns(['harga', 'harga_jual', 'aktif_status', 'aksi'])
                ->make(true);
        }
        return view('backend.product.index');
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
                'deskripsi_singkat' => 'required|string',
                'harga_jual' => 'required',
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
                'deskripsi_singkat.required' => 'Silakan isi deskripsi singkat terlebih dahulu.',
                'deskripsi_singkat.string' => 'Deskripsi singkat harus berupa teks.',
                'deskripsi_singkat.string' => 'Deskripsi singkat harus berupa teks.',
                'harga_jual.required' => 'Silakan isi harga jual terlebih dahulu.',
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
            $product->deskripsi_singkat = $request->deskripsi_singkat;
            $product->harga = $request->harga ? str_replace(['Rp', ' ', '.'], '', $request->harga) : null;
            $product->harga_jual = str_replace(['Rp', ' ', '.'], '', $request->harga_jual);
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

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('nama', 'asc')->get();
        return view('backend.product.edit', compact('product', 'category'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|unique:products,nama,' . $id,
                'deskripsi' => 'required|string',
                'deskripsi_singkat' => 'required|string',
                'harga_jual' => 'required',
                'stok' => 'required|string',
                'foto' => 'max:5120',
                'foto.*' => 'image|mimes:jpg,png,jpeg,webp,svg|file|max:5120',
                'kategori' => 'required|string',
            ],
            [
                'nama.required' => 'Silakan isi nama terlebih dahulu.',
                'nama.string' => 'Nama harus berupa teks.',
                'nama.unique' => 'Nama sudah tersedia.',
                'deskripsi.required' => 'Silakan isi deskripsi terlebih dahulu.',
                'deskripsi.string' => 'Deskripsi harus berupa teks.',
                'deskripsi_singkat.required' => 'Silakan isi deskripsi singkat terlebih dahulu.',
                'harga.required' => 'Silakan isi harga terlebih dahulu.',
                'harga.string' => 'Harga harus berupa teks.',
                'harga_jual.required' => 'Silakan isi harga jual terlebih dahulu.',
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
            $product = Product::find($id);

            $product->nama = $request->nama;
            $product->slug = Str::slug($request->nama);
            $product->deskripsi = $request->deskripsi;
            $product->deskripsi_singkat = $request->deskripsi_singkat;
            $product->harga = $request->harga ? str_replace(['Rp', ' ', '.'], '', $request->harga) : null;
            $product->harga_jual = str_replace(['Rp', ' ', '.'], '', $request->harga_jual);
            $product->stok = $request->stok;
            $product->kategori_id = $request->kategori;
            $product->save();

            if ($request->hasFile('foto')) {
                $this->deleteProductImages($product);
                foreach ($request->file('foto') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    Storage::putFileAs('public/uploads/products', $image, $imageName);
                    $product->photos()->create(['photo_name' => $imageName]);
                }
            }

            return response()->json(['success' => 'Data berhasil disimpan']);
        }
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $this->deleteProductImages($product);
        $product->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    private function deleteProductImages($product)
    {
        foreach ($product->photos as $photo) {
            Storage::delete('public/uploads/products/' . $photo->photo_name);
            $photo->delete();
        }
    }

    public function updateActiveStatus(Request $request)
    {
        $produk = Product::find($request->id);
        $produk->status = $request->status;
        $produk->save();
        return response()->json($produk);
    }
}
