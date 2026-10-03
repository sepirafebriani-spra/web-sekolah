<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class GuruController extends Controller
{
    // 1. TAMPILKAN DAFTAR GURU
    public function index()
    {
        // $guru HARUS berupa Collection/Array dari semua data guru
        $guru = Guru::all();

        return view('admin.guru.index', compact('guru'));
    }

    // 2. FORM TAMBAH / EDIT GURU
    public function addEdit($id = null)
    {
        $guru = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $guru = Guru::where('id_guru', $decryptedId)->first();
            } catch (DecryptException $e) {
                $guru = Guru::where('id_guru', $id)->first();
            }

            if (!$guru) {
                return redirect()->route('admin.guru.index')->with('error', 'Data guru tidak ditemukan.');
            }
        }

        // Arahkan ke view FORM tambah/edit (add_edit.blade.php)
        return view('admin.guru.form', compact('guru'));
    }

    public function save(Request $request, $id = null)
    {
        $guruId = null;

        // Dekripsi ID jika ada (Proses Edit)
        if ($id) {
            try {
                $guruId = Crypt::decrypt($id);
            } catch (DecryptException $e) {
                $guruId = $id;
            }
        }

        // Validasi input
        // Rule 'unique:guru,nip,'.$guruId.',id_guru' mengabaikan NIP milik sendiri saat Edit
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip'       => 'nullable|string|max:50|unique:guru,nip,' . $guruId . ',id_guru',
            'mapel'     => 'required|string|max:255',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nip.unique' => 'NIP sudah digunakan oleh guru lain. Silakan gunakan NIP yang berbeda.',
        ]);

        // Cari data jika edit, atau buat instance baru jika tambah
        $guru = $guruId ? Guru::where('id_guru', $guruId)->first() : new Guru();

        if (!$guru) {
            $guru = new Guru();
        }

        $guru->nama_guru = $request->nama_guru;
        $guru->nip       = $request->nip;
        $guru->mapel     = $request->mapel;

        // Upload Foto
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->save();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil disimpan.');
    }

    // Method untuk menampilkan halaman Detail Guru
    public function show($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::where('id_guru', $decryptedId)->firstOrFail();
        } catch (DecryptException $e) {
            $guru = Guru::where('id_guru', $id)->firstOrFail();
        }

        return view('admin.guru.show', compact('guru'));
    }

    // Method untuk menghapus data guru beserta fotonya
    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::where('id_guru', $decryptedId)->firstOrFail();
        } catch (DecryptException $e) {
            $guru = Guru::where('id_guru', $id)->firstOrFail();
        }

        // Hapus file foto dari storage jika ada
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        // Hapus data dari database
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
