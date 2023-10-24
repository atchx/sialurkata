<?php

namespace Database\Seeders;

use App\Models\Decree;
use App\Models\Document;
use App\Models\Keputusan;
use App\Models\Report;
use App\Models\Result;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Membuat Data User
        User::create([
            'name' => 'Admin 01',
            'nip' => '123456789',
            'username' => 'admin1',
            'password' => bcrypt('admin'),
            'roles' => 'Admin'
        ]);
        User::create([
            'name' => 'Admin 02',
            'nip' => '987654321',
            'username' => 'admin2',
            'password' => bcrypt('admin'),
            'roles' => 'Admin'
        ]);
        User::create([
            'name' => 'Deli Serdang',
            'nip' => '0',
            'username' => 'deliserdang',
            'password' => bcrypt('deliserdang'),
            'roles' => 'User'
        ]);
        User::create([
            'name' => 'Medan',
            'nip' => '0',
            'username' => 'medan',
            'password' => bcrypt('medan'),
            'roles' => 'User'
        ]);

        // //Membuat data Keputusan
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'APBD',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'PAPB',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'Pertanggung Jawab',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'APBD',
        //     'tahun' => '2021'
        // ]);
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'PAPB',
        //     'tahun' => '2021'
        // ]);
        // Keputusan::create([
        //     'user_id' => '3',
        //     'jenis' => 'Pertanggung Jawab',
        //     'tahun' => '2021'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'APBD',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'PAPB',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'Pertanggung Jawab',
        //     'tahun' => '2020'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'APBD',
        //     'tahun' => '2021'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'PAPB',
        //     'tahun' => '2021'
        // ]);
        // Keputusan::create([
        //     'user_id' => '4',
        //     'jenis' => 'Pertanggung Jawab',
        //     'tahun' => '2021'
        // ]);

        // //Membuat data dokumen
        // Document::create([
        //     'keputusan_id' => '1',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '1',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '2',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '2',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '3',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '3',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '4',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '4',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '5',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '5',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '6',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '6',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '7',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '7',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '8',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '8',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '9',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '9',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '10',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '10',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '11',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '11',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);
        // Document::create([
        //     'keputusan_id' => '12',
        //     'nomor' => '1',
        //     'name' => 'Surat Pengantar'
        // ]);
        // Document::create([
        //     'keputusan_id' => '12',
        //     'nomor' => '2',
        //     'name' => 'Surat Kepala Desa'
        // ]);

        //Membuat Data Hasil Tindak Lanjut
        // Result::create([
        //     'keputusan_id' => '1',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '2',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '3',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '4',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '5',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '6',
        //     'user_id' => '3'
        // ]);
        // Result::create([
        //     'keputusan_id' => '7',
        //     'user_id' => '4'
        // ]);
        // Result::create([
        //     'keputusan_id' => '8',
        //     'user_id' => '4'
        // ]);
        // Result::create([
        //     'keputusan_id' => '9',
        //     'user_id' => '4'
        // ]);
        // Result::create([
        //     'keputusan_id' => '10',
        //     'user_id' => '4'
        // ]);
        // Result::create([
        //     'keputusan_id' => '11',
        //     'user_id' => '4'
        // ]);
        // Result::create([
        //     'keputusan_id' => '12',
        //     'user_id' => '4'
        // ]);

        //Membuat Data Laporan Realisasi
        // Report::create([
        //     'keputusan_id' => '1',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '2',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '3',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '4',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '5',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '6',
        //     'user_id' => '3'
        // ]);
        // Report::create([
        //     'keputusan_id' => '7',
        //     'user_id' => '4'
        // ]);
        // Report::create([
        //     'keputusan_id' => '8',
        //     'user_id' => '4'
        // ]);
        // Report::create([
        //     'keputusan_id' => '9',
        //     'user_id' => '4'
        // ]);
        // Report::create([
        //     'keputusan_id' => '10',
        //     'user_id' => '4'
        // ]);
        // Report::create([
        //     'keputusan_id' => '11',
        //     'user_id' => '4'
        // ]);
        // Report::create([
        //     'keputusan_id' => '12',
        //     'user_id' => '4'
        // ]);

    }
}
