<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user  = [
            'pembaca' => User::where('role', 'pembaca')
                ->orderBy('name')
                ->get(),
            'petugas' => User::whereIn('role', ['admin', 'pustakawan'])
                ->orderBy('name')
                ->get(),
        ];

        confirmDelete('Hapus Pengguna?', 'Anda yakin ingin menghapus pengguna?');

        return view('dashboard.user.index')
            ->with([
                'title' => 'Manajemen Pengguna',
                'active' => 'user',
                'user' => $user
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create')
            ->with([
                'title' => 'Tambah Pengguna',
                'active' => 'user',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:users,name'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'telepon' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],
            'alamat' => ['nullable', 'string',],
        ]);

        $user = [
            'name' => $nama = $request->input('nama'),
            'slug' => $slug = Str::slug($nama),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'telepon' => $request->input('telepon'),
            'role' => $request->input('role'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto_profil')) {
            $request->validate([
                'foto_profil' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png,svg,gif,webp'],
            ]);

            $file = $request->file('foto_profil');
            $gambar = $slug. '.' . $file->extension();
            $file->move(public_path('storage/user'), $gambar);
            $user['foto'] = '/storage/user/' . $gambar;
        }

        try {
            User::create($user);

            toast('Pengguna berhasil ditambahkan!', 'success');

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            toast('Pengguna gagal ditambahkan.', 'error');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        confirmDelete('Hapus Pengguna?', 'Anda yakin ingin menghapus pengguna?');

        return view('dashboard.user.show')
            ->with([
                'title' => 'Detail Pengguna',
                'active' => 'user',
                'user' => $user
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit')
            ->with([
                'title' => 'Edit Pengguna',
                'active' => 'user',
                'user' => $user
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:users,name,' . $user->id],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'telepon' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],
            'alamat' => ['nullable', 'string',],
        ]);

        $updatedUser = [
            'name' => $nama = $request->input('nama'),
            'slug' => $slug = Str::slug($nama),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'telepon' => $request->input('telepon'),
            'role' => $request->input('role'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto_profil')) {
            $request->validate([
                'foto_profil' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png,svg,gif,webp'],
            ]);

            $file = $request->file('foto_profil');
            $gambar = $slug. '.' . $file->extension();

            if ($user->foto !== '/images/user.png') {
                File::delete(public_path($user->foto));
            }

            $file->move(public_path('storage/user'), $gambar);
            $updatedUser['foto'] = '/storage/user/' . $gambar;
        }

        try {
            $user->update($updatedUser);

            toast('Pengguna berhasil diedit!', 'success');

            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            toast('Pengguna gagal diedit.', 'error');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->foto !== '/images/user.png') {
            File::delete(public_path($user->foto));
        }

        $user->delete();

        toast('Pengguna berhasil dihapus.', 'success');

        return redirect()->route('user.index');
    }
}
