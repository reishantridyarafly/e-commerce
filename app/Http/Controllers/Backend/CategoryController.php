<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $category = Category::orderBy('nama', 'asc')->get();
            return DataTables::of($category)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-warning btn-sm me-1" data-id="' . $data->id . '" id="btnEdit"><i class="ri-pencil-line"></i></button>';
                    $btn = $btn . '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('backend.category.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'nama' => 'required|unique:categories,nama,' . $id,
            ],
            [
                'nama.required' => 'Silakan isi nama kategori terlebih dahulu.',
                'nama.unique' => 'Nama kategori sudah tersedia.'
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $category = Category::updateOrCreate([
                'id' => $id
            ], [
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
            ]);
            return response()->json($category);
        }
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->id)->delete();
        return Response()->json(['category' => $category, 'success' => 'Data berhasil dihapus']);
    }
}
