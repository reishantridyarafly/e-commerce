<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'no_telepon' => 'required|max:15',
                'pesan' => 'required|string',
            ],
            [
                'nama.required' => 'Silakan isi nama terlebih dahulu!',
                'email.required' => 'Silakan isi email terlebih dahulu!',
                'email.email' => 'Format email tidak valid!',
                'no_telepon.required' => 'Silakan isi nomor telepon terlebih dahulu!',
                'no_telepon.numeric' => 'Nomor telepon harus berupa angka!',
                'no_telepon.max' => 'Nomor telepon maksimal 15 karakter!',
                'pesan.required' => 'Silakan isi pesan terlebih dahulu!',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            $contact = new ContactMessage();
            $contact->nama = $request->nama;
            $contact->email = $request->email;
            $contact->no_telepon = $request->no_telepon;
            $contact->pesan = $request->pesan;
            $contact->save();
            return response()->json(['message' => 'Pesan berhasil dikirim']);
        }
    }
}
