<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAdmin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'nik', 'tempat_lahir', 'tanggal_lahir', 'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan', 'npwp', 'no_hp', 'jenis_kelamin', 'alamat', 'provinsi',
        'kabupaten_kota', 'kecamatan', 'kelurahan', 'agama', 'provinsi_wilayah_kerja'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}