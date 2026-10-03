@extends('admin_app')

@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')
<div class="card shadow-sm border-0" style="background-color: #ffffff; border-radius: 16px; padding: 28px; margin-bottom: 24px; max-width: 800px; margin-left: auto; margin-right: auto;">
    
    <div style="margin-bottom: 24px;">
        <h4 style="margin: 0; font-weight: 700; color: #344767; font-size: 1.25rem;">
            {{ isset($galeri) ? 'Edit Data Galeri' : 'Tambah Data Galeri' }}
        </h4>
        <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
            Isi formulir di bawah ini untuk {{ isset($galeri) ? 'memperbarui' : 'menambahkan' }} galeri sekolah.
        </p>
    </div>

    @if ($errors->any())
        <div style="background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ACTION DISESUAIKAN DENGAN ROUTE admin.galeri.save -->
    <form action="{{ route('admin.galeri.save', isset($galeri) ? ['id' => Crypt::encrypt($galeri->id_galeri)] : []) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- JUDUL -->
        <div style="margin-bottom: 16px;">
            <label style="font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 6px; display: block;">Judul Galeri (Maks 50 karakter)</label>
            <input type="text" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" maxlength="50" required
                   style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">
        </div>

        <!-- KATEGORI -->
        <div style="margin-bottom: 16px;">
            <label style="font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 6px; display: block;">Kategori</label>
            <select name="kategori" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">
                <option value="">-- Pilih Kategori --</option>
                <option value="Foto" {{ old('kategori', $galeri->kategori ?? '') == 'Foto' ? 'selected' : '' }}>Foto</option>
                <option value="Video" {{ old('kategori', $galeri->kategori ?? '') == 'Video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>

        <!-- TANGGAL -->
        <div style="margin-bottom: 16px;">
            <label style="font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 6px; display: block;">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $galeri->tanggal ?? date('Y-m-d')) }}" required
                   style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">
        </div>

        <!-- KETERANGAN -->
        <div style="margin-bottom: 16px;">
            <label style="font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 6px; display: block;">Keterangan</label>
            <textarea name="keterangan" rows="4" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">{{ old('keterangan', $galeri->keterangan ?? '') }}</textarea>
        </div>

        <!-- FILE -->
        <div style="margin-bottom: 24px;">
            <label style="font-weight: 600; color: #344767; font-size: 0.875rem; margin-bottom: 6px; display: block;">File (Foto/Video)</label>
            <input type="file" name="file" {{ isset($galeri) ? '' : 'required' }}
                   style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">
            @if(isset($galeri) && $galeri->file)
                <small style="color: #8392ab; display: block; margin-top: 4px;">File saat ini: {{ $galeri->file }}</small>
            @endif
        </div>

        <!-- TOMBOL -->
        <div style="display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('admin.galeri.index') }}" 
               style="background-color: #8392ab; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
                Batal
            </a>
            <button type="submit" 
                    style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #fff; padding: 10px 20px; border-radius: 8px; border: none; font-weight: bold; font-size: 0.875rem; cursor: pointer;">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection