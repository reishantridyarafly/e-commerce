<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function changePassword(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'old_password' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'old_password.required' => 'Silakan isi password lama terlebih dahulu.',
                'password.required' => 'Silakan isi password baru terlebih dahulu.',
                'password.min' => 'Password harus terdiri dari minimal :min karakter.',
                'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
                'password_confirmation.required' => 'Silakan isi konfirmasi password terlebih dahulu.',
            ]
        );

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        } else {
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return response()->json(['error_password' => 'Password lama salah!']);
            } else {
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                return response()->json(['success' => 'Password berhasil di simpan']);
            }
        }
    }
}
