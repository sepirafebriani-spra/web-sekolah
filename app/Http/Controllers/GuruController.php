<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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

        // PASTIKAN di sini merujuk ke view form edit/tambah kamu,
        // contoh: 'admin.guru.form' atau 'admin.guru.add_edit'
        // BUKAN 'admin.guru.index'
        return view('admin.guru.index', compact('guru'));
    }
}
