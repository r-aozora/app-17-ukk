<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PeminjamanExport;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KelolaPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['user'])
            ->latest()
            ->get();

        return view('dashboard.peminjaman.admin.index')
            ->with([
                'title' => 'Kelola Peminjaman',
                'active' => 'peminjaman',
                'pinjam' => $peminjaman,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['user', 'detail', 'detail.buku', 'detail.buku.kategori']);

        return view('dashboard.peminjaman.admin.show')
            ->with([
                'title' => 'Detail Peminjaman',
                'active' => 'peminjaman',
                'pinjam' => $peminjaman,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        if ($request->status === '1') {
            $peminjaman->update([
                'tgl_pinjam' => now(),
                'tenggat' => now()->addDays(14),
                'status' => $request->status,
            ]);

            foreach ($peminjaman->detail as $detail) {
                $buku = Buku::find($detail->buku_id);
                if ($buku) {
                    $buku->pinjam += $detail->jumlah;
                    $buku->save();
                }
            }
        } else if ($request->status === '2') {
            $peminjaman->update([
                'tgl_kembali' => now(),
                'status' => $request->status,
            ]);

            foreach ($peminjaman->detail as $detail) {
                $buku = Buku::find($detail->buku_id);
                if ($buku) {
                    $buku->pinjam -= $detail->jumlah;
                    $buku->save();
                }
            }
        }

        toast('Peminjaman berhasil diupdate!', 'success');

        return redirect()->back();
    }

    public function export(Request $request)
    {
        return Excel::download(new PeminjamanExport($request->status), 'Data Peminjaman.xlsx');
    }
}
