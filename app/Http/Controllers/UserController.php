<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua pengguna sistem.
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Menampilkan form tambah atau ubah data pengguna.
     */
    public function addEdit($id = null)
    {
        try {
            $user = $id
                ? User::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }

        return view('admin.user.form', compact('user'));
    }

    /**
     * Menyimpan data baru atau perubahan pengguna.
     */
    public function save(Request $request, $id = null)
    {
        // Jika ada ID, berarti sedang mengubah data.
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $user = User::findOrFail($id);

            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.user.index')
                    ->with('error', 'Data pengguna tidak ditemukan.');
            }

        } else {
            // Jika tidak ada ID, berarti menambah pengguna baru.
            $user = new User();
        }

        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:50',
            'username' => 'nullable|string|max:30|unique:users,username,' . ($id ?? 'NULL') . ',id',
            'email'    => 'required|email|unique:users,email,' . ($id ?? 'NULL') . ',id',
            'role'     => 'required|in:Admin,Operator,admin,operator',
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'username.unique'   => 'Username sudah digunakan oleh akun lain.',
            'email.required'    => 'Alamat email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email sudah terdaftar pada akun lain.',
            'role.required'     => 'Pilih role pengguna (Admin atau Operator).',
            'role.in'           => 'Pilihan role tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal terdiri dari 6 karakter.',
        ]);

        // Masukkan data ke model
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->role  = ucfirst(strtolower($request->role));

        // Pengaturan username jika belum ada
        if ($request->filled('username')) {
            $user->username = $request->username;
        } elseif (!$id) {
            $baseUsername = strtolower(explode('@', $request->email)[0]);
            $username = $baseUsername;
            $counter = 1;
            while (User::where('username', $username)->exists()) {
                $username = $baseUsername . $counter;
                $counter++;
            }
            $user->username = $username;
        }

        // Password hanya di-hash jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan ke database
        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                $id
                    ? 'Data pengguna berhasil diperbarui.'
                    : 'Data pengguna berhasil disimpan.'
            );
    }

    /**
     * Menampilkan detail informasi pengguna.
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }

        return view('admin.user.show', compact('user'));
    }

    /**
     * Menghapus pengguna dari database.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }

        // Proteksi: jangan izinkan menghapus diri sendiri
        if ($user->id == auth()->$id()) {
            return redirect()
                ->route('admin.user.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data pengguna berhasil dihapus.');
    }
}