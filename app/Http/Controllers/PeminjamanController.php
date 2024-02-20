<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPinjam;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = Peminjaman::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('dashboard.peminjaman.index')
            ->with([
                'title' => 'Peminjaman Kamu',
                'active' => 'pinjam',
                'pinjam' => $pinjam,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::whereHas('koleksi', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereColumn('pinjam', '<', 'stok')
            ->orderBy('judul')
            ->get();

        return view('dashboard.peminjaman.create')
            ->with([
                'title' => 'Buat Peminjaman',
                'active' => 'pinjam',
                'koleksi' => $buku,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'peminjam' => ['required', 'string', 'max:255'],
            'buku' => ['required', 'array', 'min:1'],
            'buku.*' => ['required', 'integer', 'exists:buku,id'],
        ]);

        $user = User::where('name', $request->input('peminjam'))->first();

        try {
            $pinjam = Peminjaman::create([
                'user_id' => $user->id,
                'invoice' => 'INV-'.Str::random(10),
            ]);

            foreach ($request->buku as $buku) {
                DetailPinjam::create([
                    'pinjam_id' => $pinjam->id,
                    'buku_id' => $buku,
                ]);
            }

            toast('Peminjaman berhasil dibuat!', 'success');

            return redirect()->route('pinjam.show', $pinjam->invoice);
        } catch (\Throwable $th) {
            toast('Peminjaman gagal dibuat.', 'success');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $pinjam)
    {
        $pinjam->load(['user', 'detail', 'detail.buku', 'detail.buku.kategori']);

        return view('dashboard.peminjaman.show')
            ->with([
                'title' => 'Detail Peminjaman',
                'active' => 'pinjam',
                'pinjam' => $pinjam,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $pinjam)
    {
        $pinjam->load(['user', 'detail', 'detail.buku']);

        $buku = Buku::whereHas('koleksi', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereColumn('pinjam', '<', 'stok')
            ->orderBy('judul')
            ->get();

        return view('dashboard.peminjaman.edit')
            ->with([
                'title' => 'Edit Peminjaman',
                'active' => 'pinjam',
                'pinjam' => $pinjam,
                'koleksi' => $buku,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $pinjam)
    {
        $request->validate([
            'peminjam' => ['required', 'string', 'max:255'],
            'buku' => ['required', 'array', 'min:1'],
            'buku.*' => ['required', 'integer', 'exists:buku,id'],
            'jumlah' => ['nullable', 'array', 'min:1'],
            'jumlah.*' => ['nullable', 'integer', 'min:1'],
        ]);

        $user = User::where('name', $request->input('peminjam'))->first();

        try {
            $pinjam->update([
                'user_id' => $user->id,
            ]);

            $pinjam->detail()->delete();

            $jumlahBuku = [];

            for ($i = 0; $i < count($request->buku); $i++) {
                $bukuId = $request->input('buku')[$i];
                $jumlah = $request->input('jumlah')[$i] ?? 1;

                if (isset($jumlahBuku[$bukuId])) {
                    $jumlahBuku[$bukuId] += $request->input('jumlah')[$i];
                } else {
                    $jumlahBuku[$bukuId] = $request->input('jumlah')[$i] ?? 1;
                }
            }

            foreach ($jumlahBuku as $bukuId => $jumlah) {
                $pinjam->detail()->create([
                    'buku_id' => $bukuId,
                    'jumlah' => $jumlah,
                ]);
            }

            toast('Peminjaman berhasil diperbarui!', 'success');

            return redirect()->route('pinjam.show', $pinjam->invoice);
        } catch (\Throwable $th) {
            dd($th);
            toast('Peminjaman gagal diperbarui.', 'success');

            return redirect()->back();
        }
    }
}
