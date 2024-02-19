<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')
            ->orderBy('pinjam')
            ->get();

        return view('home')
            ->with([
                'title' => 'Home',
                'buku' => $buku
            ]);
    }
}
