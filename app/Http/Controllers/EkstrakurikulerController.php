<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class EkstrakurikulerController extends Controller
{
    // 1. Tampil Daftar Ekskul
    public function index()
    {
        // Mengurutkan berdasarkan id_ekskul secara descending (terbaru)
        $ekstrakurikuler = Ekstrakurikuler::with('guru')->orderBy('id_ekskul', 'desc')->get();

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    // 2. Form Tambah / Edit Ekskul
    public function addEdit($id = null)
    {
        $ekstrakurikuler = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', $decryptedId)->first();
            } catch (DecryptException $e) {
                $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', $id)->first();
            }

            if (!$ekstrakurikuler) {
                return redirect()->route('admin.ekstrakurikuler.index')->with('error', 'Data ekstrakurikuler tidak ditemukan.');
            }
        }

        // Ambil daftar guru untuk dropdown pembina
        $guruList = Guru::all();

        return view('admin.ekstrakurikuler.add_edit', compact('ekstrakurikuler', 'guruList'));
    }

    // 3. Simpan / Update Data
    public function save(Request $request, $id = null)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ekstrakurikuler = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $ekstrakurikuler = Ekstrakurikuler::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                $ekstrakurikuler = Ekstrakurikuler::find($id);
            }
        }

        if (!$ekstrakurikuler) {
            $ekstrakurikuler = new Ekstrakurikuler();
        }

        $ekstrakurikuler->nama_ekskul = $request->nama_ekskul;
        $ekstrakurikuler->id_guru = $request->id_guru ?? null;
        $ekstrakurikuler->pembina = $request->pembina;
        $ekstrakurikuler->jadwal_latihan = $request->jadwal_latihan;
        $ekstrakurikuler->deskripsi = $request->deskripsi;

        // Upload Gambar jika ada
        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $ekstrakurikuler->gambar = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->save();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Data ekstrakurikuler berhasil disimpan.');
    }

    // 4. Detail Ekskul
    public function show($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $ekstrakurikuler = Ekstrakurikuler::with('guru')->where('id_ekskul', $decryptedId)->firstOrFail();
        } catch (DecryptException $e) {
            $ekstrakurikuler = Ekstrakurikuler::with('guru')->where('id_ekskul', $id)->firstOrFail();
        }

        return view('admin.ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    // 5. Hapus Ekskul
    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', $decryptedId)->firstOrFail();
        } catch (DecryptException $e) {
            $ekstrakurikuler = Ekstrakurikuler::where('id_ekskul', $id)->firstOrFail();
        }

        if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }

        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
