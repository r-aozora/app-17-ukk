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
        if (Auth::user()->role !== 'pembaca') {
            $ulasan = Ulasan::where('user_id', Auth::id())
                ->latest()
                ->get();

            $view = 'dashboard.ulasan.index';
            $title = 'Ulasan Kamu';
        } else {
            $ulasan = Ulasan::latest()
                ->get();

            $view = 'dashboard.ulasan.admin.index';
            $title = 'Ulasan';
        }

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
        //
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
        //
    }
}
