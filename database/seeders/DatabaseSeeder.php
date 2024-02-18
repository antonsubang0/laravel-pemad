<?php

namespace Database\Seeders;

use App\Models\Klien;
use App\Models\Pekerjaan;
use App\Models\Proyek;
use App\Models\Tipepekerjaan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Antonius Riyanto',
            'email' => 'anton@wns.com',
            'password' => Hash::make('anton123')
        ]);
        Klien::create([
            'name'     => 'Agus',
            'hp'   => '0813207899987',
            'alamat'   => 'Yoyagkarta Pasar Legi',
            'ditambahkan_oleh' => 1,
        ]);
        Pekerjaan::create([
            'klien_id' => 1,
            'tipepekerjaan_id'     => 1,
            'pekerjaan'   => 'Membuat Website indah dan rapi'
        ]);
        Proyek::create([
            'proyek'     => 'Membuat Website indah dan rapi',
            'harga_proyek'   => 80000,
            'tipepekerjaan_id'   => 3,
            'by_klien_id' => 1,
        ]);
        Tipepekerjaan::create([
            'tipe' => 'Magang'
        ]);
        Tipepekerjaan::create([
            'tipe' => 'Freelance'
        ]);
        Tipepekerjaan::create([
            'tipe' => 'Part Time'
        ]);
        Tipepekerjaan::create([
            'tipe' => 'Fulltime'
        ]);
        Tipepekerjaan::create([
            'tipe' => 'Kontak'
        ]);
    }
}
