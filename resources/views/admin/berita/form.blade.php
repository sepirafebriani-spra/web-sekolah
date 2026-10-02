@extends('admin_app')

@section('title', isset($berita) ? 'Edit Data Berita' : 'Tambah Data Berita')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); max-width: 850px; margin: 0 auto 24px auto;">

    <!-- HEADER FORM -->
    <div style="margin-bottom: 24px; border-bottom: 1px solid #e9ecef; padding-bottom: 16px;">
        <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
            {{ isset($berita) ? 'Form Edit Data Berita' : 'Form Tambah Data Berita Baru' }}
        </h4>
        <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
            Silakan isi formulir berita di bawah ini dengan lengkap dan benar.
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
    <form action="{{ route('admin.berita.save', isset($berita) ? Crypt::encrypt($berita->id_berita) : '') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <!-- JUDUL BERITA -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Judul Berita <span style="color: red;">*</span>
            </label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" required placeholder="Contoh: Kegiatan Workshop Digital Marketing di SMK YPC"
                   style="width: 100%; padding: 10px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none;">
        </div>

        <!-- TANGGAL BERITA -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Tanggal Berita
            </label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal ?? date('Y-m-d')) }}"
                   style="width: 100%; padding: 10px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none;">
        </div>

        <!-- GAMBAR BERITA -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Gambar Header / Cover <span style="font-weight: normal; color: #8392ab;">(Opsional, Maks 2MB)</span>
            </label>
            @if(isset($berita) && $berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Preview" style="max-width: 150px; border-radius: 8px; border: 1px solid #d2d6da;">
                </div>
            @endif
            <input type="file" name="gambar" accept="image/*"
                   style="width: 100%; padding: 8px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none; background-color: #fff;">
        </div>

        <!-- ISI BERITA -->
        <div style="margin-bottom: 28px;">
            <label style="display: block; font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Isi Berita Lengkap <span style="color: red;">*</span>
            </label>
            <textarea name="isi" rows="8" required placeholder="Tuliskan isi berita atau pengumuman secara rinci di sini..."
                      style="width: 100%; padding: 12px 14px; border: 1px solid #d2d6da; border-radius: 8px; font-size: 0.875rem; color: #495057; outline: none; line-height: 1.5;">{{ old('isi', $berita->isi ?? '') }}</textarea>
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #e9ecef; padding-top: 20px;">
            <a href="{{ route('admin.berita.index') }}"
               style="background-color: #8392ab; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; display: inline-block;">
                Kembali
            </a>
            <button type="submit"
                    style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; border: none; padding: 10px 24px; border-radius: 8px; font-weight: bold; font-size: 0.875rem; cursor: pointer; box-shadow: 0 4px 6px rgba(50,50,93,.11);">
                {{ isset($berita) ? 'Update Berita' : 'Simpan Berita' }}
            </button>
        </div>
    </form>
</div>
@endsection
