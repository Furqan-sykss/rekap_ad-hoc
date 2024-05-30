<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badan_adhoc_details', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('posisi');
            $table->string('tps')->after('kelurahan');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('program_studi');
            $table->string('email')->unique();
            $table->string('nik', 16)->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_bpjs_kesehatan')->unique();
            $table->string('no_bpjs_ketenagakerjaan')->unique();
            $table->string('npwp')->unique();
            $table->string('no_hp')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('agama');
            $table->timestamps();
        });
    }

    public function down(): void
    {

        Schema::dropIfExists('badan_adhoc_details');
    }
};