<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class BadanAdhocDetail extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nama',
        'posisi',
        'tps',
        'pekerjaan',
        'pendidikan_terakhir',
        'program_studi',
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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}