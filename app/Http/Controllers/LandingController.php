<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\ProfileSekolah;
use App\Models\Siswa;
use App\Models\DataProfile;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class LandingController extends Controller
{
    public function index()
    {
        $profil = ProfileSekolah::first();
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEsktrakurikuler = Ekstrakurikuler::count();
        $guru = Guru::all();
        $siswa = Siswa::all();
        $berita = Berita::latest()->get();
        $ekstrakurikuler = Ekstrakurikuler::all();
        $galeri = Galeri::all();
        $dataProfile = DataProfile::all();
        // $dataProfile = dataProfile::first();

        return view('landing.index', compact(
            'profil',
            'totalSiswa',
            'totalGuru',
            'totalEsktrakurikuler',
            'guru',
            'berita',
            'ekstrakurikuler',
            'galeri'
        ));
    }

    public function profil()
    {
        $profil = ProfileSekolah::first();

        return view('public.profil', compact('profil'));
    }

    public function guru()
    {
        $profil = ProfileSekolah::first();
        $guru = Guru::all();

        return view('public.guru', compact('profil', 'guru'));
    }

    public function showGuru($id)
    {
        $guru = null;

        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::where('id_guru', $decryptedId)->first();
        } catch (DecryptException $e) {
            $guru = Guru::where('id_guru', $id)->first();
        }

        if (!$guru) {
            return redirect()->route('public.guru')->with('error', 'Data guru tidak ditemukan.');
        }

        $profil = ProfileSekolah::first();

        return view('public.guru-detail', compact('guru', 'profil'));
    }

    public function siswa()
    {
        $profil = ProfileSekolah::first();
        $siswa = Siswa::all();

        return view('public.siswa', compact('profil', 'siswa'));
    }


    public function berita()
    {
        $profil = ProfileSekolah::first();
        $berita = Berita::latest()->get();

        return view('public.berita', compact('profil', 'berita'));
    }

    public function showBerita($slug)
    {
        $profil = ProfileSekolah::first();
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('public.berita-detail', compact('profil', 'berita'));
    }

    public function ekstrakurikuler()
    {
        $profil = ProfileSekolah::first();
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('public.ekstrakurikuler', compact('profil', 'ekstrakurikuler'));
    }

    public function showEkstrakurikuler($slug)
    {
        $profil = ProfileSekolah::first();

        // Pastikan variabelnya bernama $ekskul
        $ekstrakurikuler = Ekstrakurikuler::where('slug', $slug)->firstOrFail();

        // Pastikan menggunakan compact('profil', 'ekskul')
        return view('public.ekstrakurikuler-detail', compact('profil', 'ekstrakurikuler'));
    }

    public function galeri()
    {
        $profil = ProfileSekolah::first();
        $galeri = Galeri::all();

        return view('public.galeri', compact('profil', 'galeri'));
    }

    public function showGaleri($id)
    {
        $galeri = null;

        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::where('id_galeri', $decryptedId)->first();
        } catch (DecryptException $e) {
            $galeri = Galeri::where('id_galeri', $id)->first();
        }

        if (!$galeri) {
            return redirect()->route('galeri')->with('error', 'Data galeri tidak ditemukan.');
        }

        $profil = ProfileSekolah::first();

        return view('public.galeri-detail', compact('galeri', 'profil'));
    }

    public function dataProfile()
    {
        $profil = ProfileSekolah::first();

        // Masukkan data Anda di sini
        $student = (object) [
            'nama' => 'Febriani Sepira',
            'nisn' => '0085512455',
            'kelas' => 'XI RPL II',
            'deskripsi' => 'Halo! Saya Febriani Sepira, pengembang perangkat lunak yang merancang dan membangun sistem website resmi sekolah ini. Menggunakan teknologi modern seperti Laravel dan Tailwind CSS, saya berdedikasi untuk menciptakan platform digital yang cepat, responsif, aman, dan mudah digunakan bagi seluruh warga sekolah.',
            'foto' => 'febriani.jpeg', // Opsional
        ];

        return view('public.data-profile', compact('profil', 'student'));
    }

    /**
     * Menampilkan detail siswa untuk halaman publik.
     */
    public function showSiswa($id)
    {
        try {
            // Dekripsi ID dari URL
            $resolvedId = Crypt::decrypt($id);
        } catch (\Exception $e) {
            $resolvedId = $id;
        }

        // Ambil data profil sekolah untuk header/footer
        $profil = ProfileSekolah::first(); 

        // Cari data siswa berdasarkan ID
        $siswa = Siswa::where('id', $resolvedId)->first();

        if (!$siswa) {
            return redirect()->route('public.siswa')->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('public.siswa-detail', compact('siswa', 'profil'));
    }
}
