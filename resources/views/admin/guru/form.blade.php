@extends('admin_app')

@section('title', isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru')

@section('content')
    <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); max-width: 800px; margin: 0 auto 24px auto;">

        <!-- HEADER FORM -->
        <div style="margin-bottom: 24px; border-bottom: 1px solid #e9ecef; padding-bottom: 16px;">
            <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
                {{ isset($guru) ? 'Form Edit Data Guru' : 'Form Tambah Data Guru Baru' }}
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Silakan isi formulir di bawah ini dengan lengkap dan benar.
            </p>
        </div>

        <!-- NOTIFIKASI ERROR VALIDASI -->
        @if ($errors->any())
            <div style="background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM UTAMA -->
        <form action="{{ isset($guru) && $guru ? route('admin.guru.save', Crypt::encrypt($guru->id_guru)) : route('admin.guru.save') }}"
              method="POST" 
              enctype="multipart/form-data">
            @csrf

            <!-- NAMA LENGKAP GURU -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Nama Lengkap Guru <span style="color: red;">*</span>
                </label>
                <input type="text" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru ?? '') }}" required
                    placeholder="Contoh: Drs. Ahmad Dahlan, M.Pd."
                    style="width: 100%; padding: 10px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none;">
            </div>

            <!-- NIP -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    NIP (Nomor Induk Pegawai) <span style="color: #8392ab; font-weight: normal;">(Opsional)</span>
                </label>
                <input type="text" name="nip" value="{{ old('nip', $guru->nip ?? '') }}"
                    placeholder="Contoh: 19850101 201001 1 001"
                    style="width: 100%; padding: 10px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none;">
            </div>

            <!-- MATA PELAJARAN -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Mata Pelajaran <span style="color: red;">*</span>
                </label>
                <input type="text" name="mapel" value="{{ old('mapel', $guru->mapel ?? '') }}" required
                    placeholder="Contoh: Pemrograman Web & Perangkat Bergerak"
                    style="width: 100%; padding: 10px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none;">
            </div>

            <!-- FOTO GURU -->
            <div style="margin-bottom: 28px;">
                <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Foto Guru <span style="color: #8392ab; font-weight: normal;">(Opsional, format: JPG, PNG, WEBP, maks: 2MB)</span>
                </label>
                @if (isset($guru) && $guru->foto && file_exists(public_path('storage/' . $guru->foto)))
                    <div style="margin-bottom: 12px;">
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Saat Ini"
                            style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover; border: 1px solid #d2d6da;">
                    </div>
                @endif
                <input type="file" name="foto" accept="image/*"
                    style="width: 100%; padding: 8px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057;">
            </div>

            <!-- TOMBOL AKSI -->
            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="{{ route('admin.guru.index') }}"
                    style="background-color: #8392ab; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
                    Kembali
                </a>
                <button type="submit"
                    style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; font-size: 0.875rem; cursor: pointer; box-shadow: 0 4px 6px rgba(50,50,93,.11);">
                    {{ isset($guru) && $guru ? 'Update Data Guru' : 'Simpan Data Guru' }}
                </button>
            </div>
        </form>
    </div>
@endsection