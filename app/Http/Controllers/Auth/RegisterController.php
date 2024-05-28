<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nik' => 'required|string|size:16|unique:users',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_bpjs_kesehatan' => 'required|string|max:255|unique:users',
            'no_bpjs_ketenagakerjaan' => 'required|string|max:255|unique:users',
            'npwp' => 'required|string|max:255|unique:users',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'agama' => 'required|string',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_bpjs_kesehatan' => $request->no_bpjs_kesehatan,
            'no_bpjs_ketenagakerjaan' => $request->no_bpjs_ketenagakerjaan,
            'npwp' => $request->npwp,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'agama' => $request->agama,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
        } else {
            return response()->json(['success' => false]);
        }
    }
}
