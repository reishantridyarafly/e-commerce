<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactMessageController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $contact = ContactMessage::orderBy('created_at', 'asc')->get();
            return DataTables::of($contact)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $btn = '<button type="button" class="btn btn-danger btn-sm" data-id="' . $data->id . '" id="btnDelete"><i class="ri-delete-bin-line"></i></button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('backend.contact.index');
    }

    public function destroy(Request $request)
    {
        $contact = ContactMessage::where('id', $request->id)->delete();
        return Response()->json(['contact' => $contact, 'success' => 'Data berhasil dihapus']);
    }
}
