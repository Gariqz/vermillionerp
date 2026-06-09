<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('facility_requests', function (Blueprint $table) {
            // Kita tambah kolomnya langsung tanpa cek, biar kalo error ketauan di log migrate
            $table->string('nama_barang')->nullable()->after('user_id');
            $table->string('link_toko')->nullable()->after('nama_barang');
            $table->text('deskripsi')->nullable()->after('link_toko');
            
            // Kita coba bikin nullable kolom lamanya
            $table->foreignId('facility_id')->nullable()->change();
            $table->date('request_date')->nullable()->change();
            $table->dateTime('start_datetime')->nullable()->change();
            $table->dateTime('end_datetime')->nullable()->change();
            $table->text('purpose')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('facility_requests', function (Blueprint $table) {
            $table->dropColumn(['nama_barang', 'link_toko', 'deskripsi']);
        });
    }
};
