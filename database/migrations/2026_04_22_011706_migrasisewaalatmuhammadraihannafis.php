<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ======================
        // USER (ADMIN & PETUGAS)
        // ======================
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); // ❌ nama dihapus
            $table->string('password');
            $table->enum('role', ['admin', 'petugas']);
            $table->timestamps();
        });

        // ======================
        // PENYEWA
        // ======================
        Schema::create('penyewa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nohp')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });

        // ======================
        // MASTER DATA
        // ======================
        Schema::create('merk', function (Blueprint $table) {
            $table->id();
            $table->string('namamerk');
            $table->timestamps();
        });

        Schema::create('kondisi', function (Blueprint $table) {
            $table->id();
            $table->string('namakondisi');
            $table->timestamps();
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('namakategori');
            $table->timestamps();
        });

        // ======================
        // ALAT
        // ======================
        Schema::create('alat', function (Blueprint $table) {
            $table->id();
            $table->string('namaalat');
            $table->foreignId('merkid')->constrained('merk')->cascadeOnDelete();
            $table->foreignId('kondisiid')->constrained('kondisi')->cascadeOnDelete();
            $table->foreignId('kategoriid')->constrained('kategori')->cascadeOnDelete();
            $table->integer('stok')->default(0);
            $table->integer('hargasewa');
            $table->timestamps();
        });

        // ======================
        // DENDA
        // ======================
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            $table->string('jenisdenda');
            $table->integer('nominal');
            $table->timestamps();
        });

        // ======================
        // PEMESANAN
        // ======================
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->constrained('user')->cascadeOnDelete();
            $table->foreignId('penyewaid')->constrained('penyewa')->cascadeOnDelete();
            $table->date('tanggalpesan');
            $table->date('tanggalkembali');
            $table->enum('status', ['pending', 'dipinjam', 'selesai']);
            $table->timestamps();
        });

        // ======================
        // DETAIL PEMESANAN
        // ======================
        Schema::create('detailpemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')->constrained('pemesanan')->cascadeOnDelete();
            $table->foreignId('alatid')->constrained('alat')->cascadeOnDelete();
            $table->foreignId('dendaid')->nullable()->constrained('denda')->nullOnDelete();
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });

        // ======================
        // ARTIKEL
        // ======================
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable();
            $table->foreignId('userid')->constrained('user')->cascadeOnDelete();
            $table->timestamps();
        });

        // ======================
        // KOMENTAR
        // ======================
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artikelid')->constrained('artikel')->cascadeOnDelete();
            $table->foreignId('penyewaid')->constrained('penyewa')->cascadeOnDelete();
            $table->text('isikomentar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('artikel');
        Schema::dropIfExists('detailpemesanan');
        Schema::dropIfExists('pemesanan');
        Schema::dropIfExists('denda');
        Schema::dropIfExists('alat');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('kondisi');
        Schema::dropIfExists('merk');
        Schema::dropIfExists('penyewa');
        Schema::dropIfExists('user');
    }
};
