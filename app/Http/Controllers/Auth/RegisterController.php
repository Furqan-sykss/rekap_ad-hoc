<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserAdmin;
use App\Models\UserOperatorKabko;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user_admins|unique:user_operatorkabkos',
            'password' => 'required|string|min:3|confirmed',
            'level' => 'required|integer',
            'provinsi_wilayah_kerja' => 'required_if:level,1|required_if:level,2|string',
            'kabko_wilayah_kerja' => 'required_if:level,2|string',
            'nik' => 'required|string|size:16|unique:user_admins|unique:user_operatorkabkos',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_bpjs_kesehatan' => 'required|string|max:255|unique:user_admins|unique:user_operatorkabkos',
            'no_bpjs_ketenagakerjaan' => 'required|string|max:255|unique:user_admins|unique:user_operatorkabkos',
            'npwp' => 'required|string|max:255|unique:user_admins|unique:user_operatorkabkos',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'agama' => 'required|string',
        ]);

        if ($request->level == 1) {
            UserAdmin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
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
                'provinsi_wilayah_kerja' => $request->provinsi_wilayah_kerja,
            ]);
        } else if ($request->level == 2) {
            UserOperatorKabko::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
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
                'provinsi_wilayah_kerja' => $request->provinsi_wilayah_kerja,
                'kabko_wilayah_kerja' => $request->kabko_wilayah_kerja,
            ]);
        }

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}