<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $koleksi = Koleksi::with(['buku', 'buku.kategori'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        confirmDelete('Hapus Koleksi', 'Anda yakin ingin menghapus koleksi?');

        return view('dashboard.koleksi.index')
            ->with([
                'title' => 'Koleksi Kamu',
                'active' => 'koleksi',
                'koleksi' => $koleksi,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required', 'integer'],
            'buku' => ['required', 'integer'],
        ]);

        Koleksi::create([
            'user_id' => $request->input('user'),
            'buku_id' => $request->input('buku'),
        ]);

        toast('Koleksi ditambahkan!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koleksi $koleksi)
    {
        $koleksi->delete();

        toast('Koleksi dihapus.', 'success');

        return redirect()->back();
    }
}
