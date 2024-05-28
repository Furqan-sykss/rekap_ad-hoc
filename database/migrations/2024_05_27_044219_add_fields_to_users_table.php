<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_bpjs_kesehatan')->nullable()->unique();
            $table->string('no_bpjs_ketenagakerjaan')->nullable()->unique();
            $table->string('npwp')->nullable()->unique();
            $table->string('no_hp')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('agama')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tempat_lahir', 'tanggal_lahir', 'no_bpjs_kesehatan', 'no_bpjs_ketenagakerjaan',
                'npwp', 'no_hp', 'jenis_kelamin', 'alamat', 'provinsi', 'kabupaten_kota',
                'kecamatan', 'kelurahan', 'agama'
            ]);
        });
    }
};
