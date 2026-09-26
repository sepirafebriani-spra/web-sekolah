<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    // =========================
    // TAMPIL DATA GURU
    public function index()
    {
        $guru = Guru::all();

        return view('admin.guru', compact('guru'));
    }


    // =========================
    // HALAMAN TAMBAH GURU
    // =========================
    public function create()
    {
        return view('admin.guru_create');
    }


    // =========================
    // SIMPAN GURU
    // =========================
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validate['foto'] = $request->file('foto')
                ->store('guru', 'public');
        }

        Guru::create($validate);

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    // =========================
    // HALAMAN EDIT GURU
    // =========================
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }


    // =========================
    // UPDATE GURU
    // =========================
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validate = $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|string|max:15',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Kalau upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            // Simpan foto baru
            $validate['foto'] = $request
                ->file('foto')
                ->store('guru', 'public');
        } else {

            // Jangan ubah foto lama
            unset($validate['foto']);
        }

        $guru->update($validate);

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil diperbarui.');
    }


    // =========================
    // HAPUS GURU
    // =========================
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
