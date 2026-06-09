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
    Schema::create('facility_requests', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained('users');

        // Tambahan buat request barang baru
        $table->string('nama_barang')->nullable();
        $table->string('link_toko')->nullable();
        $table->text('deskripsi')->nullable();

        $table->foreignId('facility_id')
            ->nullable() // Dibikin nullable karena request barang baru ga punya facility_id
            ->constrained('facilities');

        $table->date('request_date')->nullable();

        $table->dateTime('start_datetime')->nullable();

        $table->dateTime('end_datetime')->nullable();

        $table->text('purpose')->nullable();

        $table->enum('status', [
            'Pending',
            'Approved',
            'Rejected',
            'Completed',
            'Cancelled'
        ])->default('Pending');

        $table->foreignId('approved_by')
            ->nullable()
            ->constrained('users');

        $table->text('notes')->nullable();

        $table->timestamps(); // Pake timestamps standar aja
    });
}
};
