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
                'slug' => $slug = Str::slug($name),
                'email' => 'admin@example.com',
                'username' => 'superAdmin',
                'password' => Hash::make('password'),
                'telepon' => '08123456789',
                'role' => 'admin',
                'alamat' => null,
                'foto' => '/images/user/' . $slug . '.png',
            ], [
                'name' => $name = 'Pustakawan',
                'slug' => $slug = Str::slug($name),
                'email' => 'pustakawan@example.com',
                'username' => 'pustaKawan',
                'password' => Hash::make('password'),
                'telepon' => '08123456789',
                'role' => 'pustakawan',
                'alamat' => null,
                'foto' => '/images/user/' . $slug . '.png',
            ], [
                'name' => $name = 'Muhamad Citra Hidayat',
                'slug' => $slug = Str::slug($name),
                'email' => 'zytrahidayat11@gmail.com',
                'username' => 'citrahdy',
                'password' => Hash::make('password'),
                'telepon' => '089513886227',
                'role' => 'pembaca',
                'alamat' => 'Jl. Pahlawan No. 1',
                'foto' => '/images/user/' . $slug . '.jpg',
            ],
        ]);

        Kategori::insert([
            [
                'kategori' => 'Manga',
            ], [
                'kategori' => 'Novel',
            ], [
                'kategori' => 'Light Novel',
            ]
        ]);

        Buku::insert([
            [
                'judul' => $judul = 'Violet Evergarden',
                'slug' => $slug = Str::slug($judul),
                'penulis' => 'Akatsuki Kana',
                'penerbit' => 'None',
                'tahun' => '2015',
                'deskripsi' => '"Auto-Memories Dolls" were created with the purpose of recording one\'s speech and emotions. First invented by Dr. Orland to bring happiness to his wife, such dolls are now being loaned by companies after knowledge of his work became public. Moved by the work of the Auto-Memories Dolls, a woman named Violet Evergarden decides to take up their duties. Beautiful, with golden hair and crystal-blue eyes, she quickly becomes the most popular doll, leaving all her clients delighted by her company. Violet Evergarden is a compilation of heartwarming short stories revolving around the life of the graceful Auto-Memories Doll as she serves her different clients.',
                'stok' => 10,
                'kategori_id' => 2,
                'gambar' => '/images/buku/' . $slug . '.jpg',
            ], [
                'judul' => $judul = 'Dr. Stone',
                'slug' => $slug = Str::slug($judul),
                'penulis' => 'Inagaki Riichiro',
                'penerbit' => 'Shounen Jump',
                'tahun' => '2017',
                'deskripsi' => 'When a mysterious light suddenly engulfs Earth, humanity is left petrified, frozen in stone. Thousands of years later, the world is teeming with vegetation, and forests have taken the places of cities that once stood proudly. One of the very first to emerge from their stone prison is Taiju Ooki, who finds that his good friend, a brilliant young scientist named Senkuu, has been preparing for his awakening. While Taiju wishes to save the girl he loves, Senkuu is determined to figure out the cause behind the strange phenomenon and restore the world to its former glory. But when they free the infamously powerful Tsukasa Shishiou in order to gain an upper hand against the dangers in an unfamiliar world, they realize that their new comrade has other plans. Tsukasa sees their predicament as a chance to start over; free from the corruption and destruction wrought by technology, he will stop at nothing to achieve his goals. With both sides unable to see eye to eye, Senkuu and his devotion to science will clash with Tsukasa and his primal nature in what will truly be a battle of the ages.',
                'stok' => 10,
                'kategori_id' => 1,
                'gambar' => '/images/buku/' . $slug . '.jpg',
            ], [
                'judul' => $judul = 'Classroom of the Elite',
                'slug' => $slug = Str::slug($judul),
                'penulis' => 'Tomose Shunsaku',
                'penerbit' => 'None',
                'tahun' => '2015',
                'deskripsi' => 'Receiving funding from the government to nurture the next generation\'s hopefuls, Tokyo Metropolitan Advanced Nurturing High School brings together the brightest youth of Japan onto a single campus. At this seemingly perfect institution, the reserved Kiyotaka Ayanokouji arrives as an incoming member of class 1-D, where he befriends one of his classmates, the antisocial Suzune Horikita. At first, his peers revel in the academy\'s leisurely lifestyle, taking advantage of all of its state-of-the-art facilities. Soon enough, however, the facade of Tokyo Metropolitan Advanced Nurturing High School gives way to its true nature—only the top scoring classes can fully utilize the school\'s offerings, and Class D is the furthest from such a status. Standing at the bottom of the hierarchy, Class D houses all of the school\'s "worst" students. Following this rude awakening, Ayanokouji, Horikita, and the rest of Class D must overcome their differences and clash against other classes in order to climb to the coveted position of Class A by any means necessary.',
                'stok' => 10,
                'kategori_id' => 3,
                'gambar' => '/images/buku/' . $slug . '.jpg',
            ], [
                'judul' => $judul = 'Mashle: Magic and Muscles',
                'slug' => $slug = Str::slug($judul),
                'penulis' => 'Koumoto Hajime',
                'penerbit' => 'Shounen Jump',
                'tahun' => '2020',
                'deskripsi' => 'To everyone else in his magic-dominated world, the young and powerless Mash Burnedead is a threat to the gene pool and must be purged. Living secretly in the forest, he spends every day training his body, building muscles strong enough to compete with magic itself! However, upon having his identity exposed and his peaceful life threatened, Mash begins his journey to becoming a "Divine Visionary," a role so powerful that society would have no choice but to accept his existence. And so, in order to maintain his peaceful life, the magicless Mash enrolls in the prestigious Easton Magic Academy, competing against the children of some of the most powerful and elite in the realm. Lacking the very skill needed to survive at Easton, magic, Mash appears to already be at a disadvantage to his fellow classmates. In order to achieve his goals, Mash will have to fight his way through every trial using his fists alone, overcoming magic with muscles, all for the illustrious title of Divine Visionary!',
                'stok' => 10,
                'kategori_id' => 1,
                'gambar' => '/images/buku/' . $slug . '.jpg',
            ], [
                'judul' => $judul = 'Classroom of the Elite: Year 2',
                'slug' => $slug = Str::slug($judul),
                'penulis' => 'Tomose Shunsaku',
                'penerbit' => 'None',
                'tahun' => '2020',
                'deskripsi' => 'As Kiyotaka Ayanokouji and his classmates begin their second-year life, changes are seen everywhere throughout Tokyo Metropolitan Advanced Nurturing High School. With the third-years having graduated and incoming first-years entering the school, alliances are well underway. Additionally, now that Miyabi Nagumo is the student council president, the promise of turning the school into a meritocracy may become a reality. Meanwhile, conflicts between classes continue to build as the class point totals draw close. With another special exam looming ahead, will Ayanokouji remain in the shadows, or will he finally enter the spotlight and help his class rise to the illustrious Class A?',
                'stok' => 10,
                'kategori_id' => 3,
                'gambar' => '/images/buku/' . $slug . '.jpg',
            ]
        ]);

        // Kategori::factory(5)->create();
        // Buku::factory(10)->create();
        // User::factory(17)->create();
        // Ulasan::factory(10)->create();
    }
}
