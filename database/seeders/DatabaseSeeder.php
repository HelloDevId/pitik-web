<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CatatAyam;
use App\Models\DataAyam;
use App\Models\DetailPakan;
use App\Models\Distribusi;
use App\Models\LevelDetail;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use App\Models\SampleJual;
use App\Models\TenagaKerja;
use App\Models\User;
use App\Models\VaksinDetail;

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

        LevelDetail::create([
            'level' => 'Super Admin',
        ]);

        LevelDetail::create([
            'level' => 'Admin',
        ]);

        User::create([
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin'),
            'user_fullname' => 'Super Admin',
            'id_level' => '1',
        ]);

        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'user_fullname' => 'Admin',
            'id_level' => '2',
        ]);

    }
}