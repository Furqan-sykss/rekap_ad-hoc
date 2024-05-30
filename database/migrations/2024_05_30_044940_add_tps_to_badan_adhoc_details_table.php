<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('badan_adhoc_details', function (Blueprint $table) {
            $table->string('tps')->after('kelurahan'); // Sesuaikan penempatan kolom jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('badan_adhoc_details', function (Blueprint $table) {
            $table->dropColumn('tps');
        });
    }
};