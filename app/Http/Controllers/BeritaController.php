<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
    // Menggunakan default created_at
    $berita = Berita::latest()->get();

    return view('admin.berita.index', compact('berita'));
    }

    /**
     * Menampilkan form tambah atau ubah berita.
     */
    public function addEdit($id = null)
    {
        try {
            $berita = $id
                ? Berita::findOrFail(Crypt::decrypt($id))
                : null;

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.form', compact('berita'));
    }

    /**
     * Menyimpan data baru atau perubahan berita.
     */
    public function save(Request $request, $id = null)
    {
        // Validasi
        $request->validate([
            'judul'   => 'required',
            'isi'     => 'required',
            'tanggal' => 'nullable|date',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($id) {
            $realId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($realId);
        } else {
            $berita = new Berita();
            // Hapus/komentarkan baris id_user jika kolom id_user belum ada di database:
            // $berita->id_user = auth()->user()->id_user ?? 1;
        }

        $berita->judul   = $request->judul;
        $berita->isi     = $request->isi;
        $berita->tanggal = $request->tanggal;

        // Upload Gambar
        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save(); //[cite: 5]

        return redirect()->route('admin.berita.index')->with('success', 'Data berita berhasil disimpan.');
    }

    /**
     * Menampilkan detail informasi berita.
     */
    public function show($id)
    {
        try {
            $berita = Berita::with('user')->findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Menghapus berita dan file gambarnya.
     */
    public function destroy($id)
    {
        try {
            $berita = Berita::findOrFail(Crypt::decrypt($id));

        } catch (\Exception $e) {
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Data berita berhasil dihapus.');
    }
}
