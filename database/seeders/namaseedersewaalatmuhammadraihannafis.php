<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class namaseedersewaalatmuhammadraihannafis extends Seeder
{
    public function run(): void
    {
        // USER
        DB::table('user')->insert([
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Petugas',
                'username' => 'petugas',
                'password' => Hash::make('123'),
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // PENYEWA
        DB::table('penyewa')->insert([
            [
                'nama' => 'Rizka',
                'username' => 'rizka',
                'password' => Hash::make('123'),
                'nohp' => '08123456789',
                'alamat' => 'Medan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // MASTER
        DB::table('merk')->insert([
            ['namamerk' => 'Canon', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('kondisi')->insert([
            ['namakondisi' => 'Baru', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('kategori')->insert([
            ['namakategori' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $merk = DB::table('merk')->first();
        $kondisi = DB::table('kondisi')->first();
        $kategori = DB::table('kategori')->first();

        // ALAT
        DB::table('alat')->insert([
            [
                'namaalat' => 'Kamera DSLR',
                'merkid' => $merk->id,
                'kondisiid' => $kondisi->id,
                'kategoriid' => $kategori->id,
                'stok' => 5,
                'hargasewa' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // DENDA
        DB::table('denda')->insert([
            [
                'jenisdenda' => 'Terlambat',
                'nominal' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ARTIKEL
        $user = DB::table('user')->first();

        DB::table('artikel')->insert([
            [
                'judul' => 'Tips Sewa Kamera',
                'isi' => 'Gunakan kamera sesuai kebutuhan...',
                'gambar' => null,
                'userid' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // KOMENTAR
        $artikel = DB::table('artikel')->first();
        $penyewa = DB::table('penyewa')->first();

        DB::table('komentar')->insert([
            [
                'artikelid' => $artikel->id,
                'penyewaid' => $penyewa->id,
                'isikomentar' => 'Artikel sangat membantu!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // PEMESANAN
        DB::table('pemesanan')->insert([
            [
                'userid' => $user->id,
                'penyewaid' => $penyewa->id,
                'tanggalpesan' => Carbon::now(),
                'tanggalkembali' => Carbon::now()->addDays(3),
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // DETAIL PEMESANAN
        $pemesanan = DB::table('pemesanan')->first();
        $alat = DB::table('alat')->first();
        $denda = DB::table('denda')->first();

        DB::table('detailpemesanan')->insert([
            [
                'pemesanan_id' => $pemesanan->id,
                'alatid' => $alat->id,
                'dendaid' => $denda->id,
                'jumlah' => 1,
                'subtotal' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}