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
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropColumn('guru_id');
            $table->string('nama_peminjam')->after('barang_id');
            $table->string('guru_kelas')->after('nama_peminjam');
            $table->string('jabatan')->after('guru_kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropColumn(['nama_peminjam', 'guru_kelas', 'jabatan']);
            $table->foreignId('guru_id')->nullable()->after('barang_id')->constrained('users')->onDelete('cascade');
        });
    }
};
