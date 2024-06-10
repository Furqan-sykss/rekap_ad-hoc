<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasApiTokens, HasFactory, Notifiable;

    public const ADMIN = 1;
    public const OPERATOR = 2;

    protected $fillable = [
        'name',
        'email',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'no_bpjs_kesehatan',
        'no_bpjs_ketenagakerjaan',
        'npwp',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'provinsi',
        'kabupaten_kota',
        'kecamatan',
        'kelurahan',
        'agama',
        'password',
        'level',
        'provinsi_wilayah_kerja',
        'kabko_wilayah_kerja',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}