<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PeminjamanExport implements FromView
{
    public function view(): View
    {
        $pinjam = Peminjaman::with('user')
            ->latest()
            ->get();

        return view('dashboard.peminjaman.admin.export')
            ->with(['pinjam' => $pinjam]);
    }
}
