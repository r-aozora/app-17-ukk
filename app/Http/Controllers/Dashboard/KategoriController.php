<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::withCount('buku')
            ->orderBy('kategori')
            ->get();

        confirmDelete('Hapus Kategori?', 'Anda yakin ingin menghapus Kategori?');

        return view('dashboard.kategori.index')
            ->with([
                'title' => 'Kategori Buku',
                'active' => 'kategori',
                'kategori' => $kategori
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,kategori']
        ]);

        try {
            Kategori::create([
                'kategori' => $request->input('nama_kategori')
            ]);

            toast('Kategori berhasil ditambahkan!', 'success');
        } catch (\Throwable $th) {
            toast('Kategori gagal ditambahkan.', 'error');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,kategori,'.$kategori->id]
        ]);

        try {
            $kategori->update([
                'kategori' => $request->input('nama_kategori')
            ]);

            toast('Kategori berhasil diedit!', 'success');
        } catch (\Throwable $th) {
            toast('Kategori gagal diedit.', 'error');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        toast('Kategori berhasil dihapus!', 'success');

        return redirect()->back();
    }
}
