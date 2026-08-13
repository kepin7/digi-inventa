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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->string('nama_peminjam');
            $table->string('guru_kelas')->nullable();
            $table->string('jabatan');
            $table->integer('jumlah')->default(1);
            $table->date('tanggal_pinjam');
            $table->date('tanggal_rencana_kembali');
            $table->string('lokasi_selama_dipinjam');
            $table->string('foto_peminjam');
            $table->enum('status', ['menunggu_persetujuan', 'disetujui', 'ditolak', 'selesai']);
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->onDelete('set null');
            $table->dateTime('tanggal_disetujui')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->string('foto_bukti_pengembalian')->nullable();
            $table->text('catatan_pengembalian')->nullable();
            $table->dateTime('tanggal_dikembalikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
