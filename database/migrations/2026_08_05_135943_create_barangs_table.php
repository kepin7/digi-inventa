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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique()->nullable();
            $table->string('nama');
            $table->string('kategori');
            $table->enum('jenis_barang', ['modal', 'habis_pakai']);
            $table->integer('jumlah')->default(1);
            $table->string('merk')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->year('tahun_perolehan')->nullable();
            $table->decimal('harga_perolehan', 15, 2)->nullable();
            $table->string('sumber_dana')->nullable();
            $table->enum('kondisi', ['baik', 'perlu_perbaikan', 'rusak']);
            $table->enum('status', ['tersedia', 'dipinjam', 'dihapus']);
            $table->string('lokasi_saat_ini');
            $table->string('gambar')->nullable();
            $table->foreignId('dibuat_oleh')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
