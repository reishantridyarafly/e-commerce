<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('id', '!=', auth()->user()->id)->where('type', '!=', '2')->orderBy('first_name', 'asc')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name = $data->first_name . ' ' . $data->last_name;
                    return $name;
                })
                ->addColumn('aktif_status', function ($data) {
                    $status = $data->aktif_status == 0 ? '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="aktif_status" name="aktif_status" data-id="' . $data->id . '" checked>
                <label class="form-check-label" for="aktif_status"></label>
                </div>' : '<div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="aktif_status" data-id="' . $data->id . '" name="aktif_status">
                <label class="form-check-label" for="aktif_status"></label>
                </div>';
                    return $status;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-warning btn-sm me-1" data-id="' . $data->id . '" id="btnEdit"><i
                class="mdi mdi-pencil"></i></button>';
                    $btn = $btn . '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i
                class="mdi mdi-trash-can"></i></button>';
                    return $btn;
                })
                ->rawColumns(['name', 'aktif_status', 'aksi'])
                ->make(true);
        }
        return view('backend.pengguna.index');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validated = Validator::make(
            $request->all(),
            [
                'first_name' => 'required',
                'email' => 'required|unique:users,email,' . $id,
                'no_telepon' => 'required|min:11|max:13|unique:users,no_telepon,' . $id,
                'type' => 'required',
            ],
            [
                'first_name.required' => 'Silakan isi nama depan terlebih dahulu',
                'email.required' => 'Silakan isi email terlebih dahulu',
                'email.unique' => 'Email sudah digunakan',
                'no_telepon.required' => 'Silakan isi no telepon terlebih dahulu',
                'no_telepon.min' => 'No telepon :min karakter',
                'no_telepon.max' => 'No telepon :max karakter',
                'no_telepon.unique' => 'No telepon sudah digunakan',
                'type.required' => 'Silakan pilih type terlebih dahulu'
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $user = User::updateOrCreate([
                'id' => $id
            ], [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'password' => Hash::make(12345),
                'type' => $request->type,
            ]);
            return response()->json($user);
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->delete();
        if (Storage::exists('public/avatar/' . $user->avatar)) {
            Storage::delete('public/avatar/' . $user->avatar);
        }
        $user->avatar = null;
        $user->save();
        return Response()->json(['user' => $user, 'success' => 'Data berhasil dihapus']);
    }

    public function updateActiveStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->aktif_status = $request->aktif_status;
        $user->save();
        return response()->json($user);
    }
}
