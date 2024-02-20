<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PeminjamanExport implements FromView
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function view(): View
    {
        $pinjam = Peminjaman::with('user')
            ->where('status', $this->status)
            ->latest()
            ->get();

        dd($pinjam);

        return view('dashboard.peminjaman.admin.export')
            ->with(['pinjam' => $pinjam]);
    }
}
