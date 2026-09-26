<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    // TAMPIL PROFILE
    public function index()
    {
        $profile = ProfileSekolah::first();

        // Kalau belum ada data, buat 1 data kosong
        if (!$profile) {
            $profile = new ProfileSekolah();
            $profile->save();
        }

        return view('admin.profileSekolah', [
            'title' => 'Profile Sekolah',
            'profile' => $profile
        ]);
    }


    // UPDATE DATA PROFILE
    public function update(Request $request)
    {
        $profile = ProfileSekolah::first();

        if (!$profile) {
            $profile = new ProfileSekolah();
        }

        $profile->nama_sekolah   = $request->nama_sekolah;
        $profile->npsn           = $request->npsn;
        $profile->kepala_sekolah = $request->kepala_sekolah;
        $profile->tahun_berdiri  = $request->tahun_berdiri;
        $profile->kontak         = $request->kontak;
        $profile->alamat         = $request->alamat;
        $profile->deskripsi      = $request->deskripsi;
        $profile->visi_misi      = $request->visi_misi;

        $profile->save();

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Profile sekolah berhasil diperbarui.');
    }


    // UPDATE LOGO
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $profile = ProfileSekolah::first();

        if (!$profile) {
            $profile = new ProfileSekolah();
        }

        // Hapus logo lama
        if ($profile->logo) {
            Storage::disk('public')->delete($profile->logo);
        }

        // Simpan logo baru
        $profile->logo = $request->file('logo')->store('profile', 'public');

        $profile->save();

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Logo sekolah berhasil diperbarui.');
    }
}
