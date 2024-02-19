<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'pembaca') {
            $ulasan = Ulasan::with('buku')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

            $view = 'dashboard.ulasan.index';
            $title = 'Ulasan Kamu';
        } else {
            $ulasan = Ulasan::with(['user', 'buku'])
                ->latest()
                ->get();

            $view = 'dashboard.ulasan.admin.index';
            $title = 'Ulasan Buku';
        }

        confirmDelete('Hapus Ulasan?', 'Anda yakin ingin menghapus ulasan?');

        return view($view)
            ->with([
                'title' => $title,
                'active' => 'ulasan',
                'ulasan' => $ulasan,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        $ulasan->load(['user', 'buku']);

        confirmDelete('Hapus Ulasan?', 'Anda yakin ingin menghapus ulasan?');

        return view('dashboard.ulasan.admin.show')
            ->with([
                'title' => 'Detail Ulasan',
                'active' => 'ulasan',
                'ulasan' => $ulasan,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        toast('Ulasan berhasil dihapus.', 'success');

        return redirect()->route('ulasan.index');
    }
}
