<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Str;

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

        User::insert([
            [
                'name' => $name = 'Admin',
                'slug' => Str::slug($name),
                'email' => 'admin@example.com',
                'username' => 'superAdmin',
                'password' => Hash::make('password'),
                'telepon' => '08123456789',
                'role' => 'admin',
            ], [
                'name' => $name = 'Pustakawan',
                'slug' => Str::slug($name),
                'email' => 'pustakawan@example.com',
                'username' => 'pustaKawan',
                'password' => Hash::make('password'),
                'telepon' => '08123456789',
                'role' => 'pustakawan',
            ], [
                'name' => $name = 'Muhamad Citra Hidayat',
                'slug' => Str::slug($name),
                'email' => 'zytrahidayat11@gmail.com',
                'username' => 'citrahdy',
                'password' => Hash::make('password'),
                'telepon' => '089513886227',
                'role' => 'pembaca',
            ],
        ]);

        // Kategori::insert([
        //     [
        //         'name' => 'Komik',
        //     ], [
        //         'name' => 'Novel',
        //     ]
        // ]);

        // Buku::insert([
        //     [
        //         'judul' => $judul = 'Relay',
        //         'slug' => Str::slug($judul),
        //         'penulis' => 'Rain Aozora',
        //         'penerbit' => 'Aozora Project',
        //         'tahun' => '2024',
        //         'deskripsi' => 'Relay',
        //         'stok' => 10,
        //         'kategori_id' => 2,
        //     ], [
        //         'judul' => $judul = 'Relay: Zero',
        //         'slug' => Str::slug($judul),
        //         'penulis' => 'Rain Aozora',
        //         'penerbit' => 'Aozora Project',
        //         'tahun' => '2023',
        //         'deskripsi' => 'Relay: Zero',
        //         'stok' => 10,
        //         'kategori_id' => 2,
        //     ]
        // ]);

        Kategori::factory(5)->create();
        Buku::factory(10)->create();
        User::factory(17)->create();
        Ulasan::factory(10)->create();
    }
}
