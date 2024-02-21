<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'title' => 'Profil',
            'active' => 'profil',
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:users,name,'.Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.Auth::user()->id],
            'telepon' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
        ]);

        $user = [
            'name' => $nama = $request->input('nama'),
            'slug' => $slug = Str::slug($nama),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'telepon' => $request->input('telepon'),
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
            User::where('id', $request->user()->id)->update($user);

            toast('Profil berhasil diperbarui!', 'success');
        } catch (\Throwable $th) {
            toast('Profil gagal diperbarui.', 'success');
        }

        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
