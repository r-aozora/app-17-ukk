<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('kategori')
            ->orderBy('judul')
            ->get();

        confirmDelete('Hapus Buku', 'Anda yakin ingin menghapus buku?');

        return view('dashboard.buku.index')
            ->with([
                'title' => 'Koleksi Buku',
                'active' => 'buku',
                'buku' => $buku,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::orderBy('kategori')
            ->get();

        return view('dashboard.buku.create')
            ->with([
                'title' => 'Tambah Buku',
                'active' => 'buku',
                'kategori' => $kategori,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255', 'unique:buku,judul'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'deskripsi' => ['required', 'string'],
            'kategori' => ['required', 'integer'],
        ]);

        $buku = [
            'judul' => $judul = $request->input('judul'),
            'slug' => $slug = Str::slug($judul),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun' => $request->input('tahun'),
            'stok' => $request->input('stok'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori_id' => $request->input('kategori'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png,svg,gif,webp'],
            ]);

            $file = $request->file('image');
            $gambar = $slug. '.' . $file->extension();
            $file->move(public_path('images/buku'), $gambar);
            $buku['gambar'] = '/images/buku/' . $gambar;
        }

        try {
            Buku::create($buku);

            toast('Buku berhasil ditambahkan!', 'success');

            return redirect()->route('buku.index');
        } catch (\Throwable $th) {
            toast('Buku gagal ditambahkan!', 'error');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        $buku->load(['kategori']);

        return view('dashboard.buku.show')
            ->with([
                'title' => 'Detail Buku',
                'active' => 'buku',
                'buku' => $buku,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::orderBy('kategori')
            ->get();

        return view('dashboard.buku.edit')
            ->with([
                'title' => 'Edit Buku',
                'active' => 'buku',
                'buku' => $buku,
                'kategori' => $kategori,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255', 'unique:buku,judul'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer'],
            'stok' => ['required', 'integer'],
            'deskripsi' => ['required', 'string'],
            'kategori' => ['required', 'integer'],
        ]);

        $updatedBuku = [
            'judul' => $judul = $request->input('judul'),
            'slug' => $slug = Str::slug($judul),
            'penulis' => $request->input('penulis'),
            'penerbit' => $request->input('penerbit'),
            'tahun' => $request->input('tahun'),
            'stok' => $request->input('stok'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori_id' => $request->input('kategori'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png,svg,gif,webp'],
            ]);

            $file = $request->file('image');
            $gambar = $slug. '.' . $file->extension();

            if ($buku->gambar !== '/images/buku.png') {
                File::delete(public_path($buku->gambar));
            }

            $file->move(public_path('images/buku'), $gambar);
            $updatedBuku['gambar'] = '/images/buku/' . $gambar;
        }

        try {
            $buku->update($updatedBuku);

            toast('Buku berhasil diedit!', 'success');

            return redirect()->route('buku.index');
        } catch (\Throwable $th) {
            dd($th);

            toast('Buku gagal diedit!', 'error');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->gambar !== '/images/buku.png') {
            File::delete(public_path($buku->gambar));
        }

        $buku->delete();

        toast('Buku berhasil dihapus.', 'success');

        return redirect()->route('buku.index');
    }
}
