<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PustakaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pustaka = Buku::with('kategori')
            ->when(strlen($search), function ($query) use ($search) {
                $query->where('judul', 'like', "%$search%")
                    ->orWhere('penulis', 'like', "%$search%")
                    ->orWhere('penerbit', 'like', "%$search%")
                    ->orWhereHas('kategori', function ($query) use ($search) {
                        $query->orWhere('kategori', 'like', "%$search%");
                    });
            })
            ->withAvg('ulasan', 'rating')
            ->orderByDesc('pinjam')
            ->get();

        return view('dashboard.pustaka.index')
            ->with([
                'active' => 'pustaka',
                'title' => 'Pustaka Buku',
                'pustaka' => $pustaka,
            ]);
    }

    public function show(Buku $buku)
    {
        $pustaka = Buku::where('id', $buku->id)
            ->with(['kategori', 'ulasan', 'ulasan.user'])
            ->withAvg('ulasan', 'rating')
            ->first();

        $koleksi = Koleksi::where('user_id', Auth::id())
            ->where('buku_id', $buku->id)
            ->exists();

        $pinjam = Peminjaman::where('user_id', Auth::id())
            ->whereHas('detail', function ($query) use ($buku) {
                $query->where('buku_id', $buku->id);
            })
            ->exists();

        $ulasan = Ulasan::where('user_id', Auth::id())
            ->where('buku_id', $buku->id)
            ->first();

        return view('dashboard.pustaka.show')
            ->with([
                'active' => 'pustaka',
                'title' => $pustaka->judul,
                'pustaka' => $pustaka,
                'koleksi' => $koleksi,
                'pinjam' => $pinjam,
                'ulasan' => $ulasan,
            ]);
    }
}
