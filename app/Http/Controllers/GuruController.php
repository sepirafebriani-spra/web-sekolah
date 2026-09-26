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
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $guru = new Guru();

        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mapel = $request->mapel;

        if ($request->hasFile('foto')) {
            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->save();

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

        return view('admin.guru_edit', compact('guru'));
    }


   // =========================
    // UPDATE GURU
    // =========================
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nip'       => 'required|string|max:255',
            'mapel'     => 'required|string|max:255',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->nip = $request->nip;
        $guru->mapel = $request->mapel;

        if ($request->hasFile('foto')) {

            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->save();

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

        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
