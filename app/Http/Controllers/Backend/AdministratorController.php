<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdministratorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('id', '!=', auth()->user()->id)->where('type', '1')->orderBy('first_name', 'asc')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name = $data->first_name . ' ' . $data->last_name;
                    return $name;
                })
                ->addColumn('aksi', function ($data) {
                    $btn = '<a class="btn btn-warning btn-sm me-1" href="' . route('user', $data->id) . '" target="_blank"><i
                class="mdi mdi-message-text"></i></a>';
                    return $btn;
                })
                ->rawColumns(['name', 'aksi'])
                ->make(true);
        }
        return view('backend.admin.index');
    }
}
