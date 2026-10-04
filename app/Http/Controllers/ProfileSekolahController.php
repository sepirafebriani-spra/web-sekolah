<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    // TAMPIL PROFILE SEKOLAH
    public function index()
    {
        $profilSekolah = ProfileSekolah::firstOrCreate([], [
            'nama_sekolah'   => 'SMK YPC TASIKMALAYA',
            'npsn'           => '-',
            'kepala_sekolah' => '-',
            'tahun_berdiri'  => 2000,
            'kontak'         => '-',
            'alamat'         => '-',
            'deskripsi'      => '-',
            'visi_misi'      => '-',
            'logo'           => null,
            'foto'           => null,
        ]);

        // Mengarahkan ke admin/profile-sekolah/index.blade.php (pakai huruf 'e')
        return view('admin.profile-sekolah.index', [
            'title'         => 'Profile Sekolah',
            'profilSekolah' => $profilSekolah
        ]);
    }

    // SIMPAN / UPDATE PROFILE SEKOLAH
    public function save(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn'           => 'required|string|max:10',
            'tahun_berdiri'  => 'required|numeric',
            'kontak'         => 'required|string|max:15',
            'alamat'         => 'required|string',
            'visi_misi'      => 'required|string',
            'deskripsi'      => 'nullable|string',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profilSekolah = ProfileSekolah::first() ?? new ProfileSekolah();

        $profilSekolah->nama_sekolah   = $request->nama_sekolah;
        $profilSekolah->kepala_sekolah = $request->kepala_sekolah;
        $profilSekolah->npsn           = $request->npsn;
        $profilSekolah->tahun_berdiri  = $request->tahun_berdiri;
        $profilSekolah->kontak         = $request->kontak;
        $profilSekolah->alamat         = $request->alamat;
        $profilSekolah->visi_misi      = $request->visi_misi;
        $profilSekolah->deskripsi      = $request->deskripsi;

        // Upload Logo
        if ($request->hasFile('logo')) {
            if ($profilSekolah->logo && Storage::disk('public')->exists($profilSekolah->logo)) {
                Storage::disk('public')->delete($profilSekolah->logo);
            }
            $profilSekolah->logo = $request->file('logo')->store('profile', 'public');
        }

        // Upload Foto Gedung
        if ($request->hasFile('foto')) {
            if ($profilSekolah->foto && Storage::disk('public')->exists($profilSekolah->foto)) {
                Storage::disk('public')->delete($profilSekolah->foto);
            }
            $profilSekolah->foto = $request->file('foto')->store('profile', 'public');
        }

        $profilSekolah->save();

        return redirect()
            ->route('admin.profil-sekolah')
            ->with('success', 'Profile sekolah berhasil diperbarui.');
    }
}