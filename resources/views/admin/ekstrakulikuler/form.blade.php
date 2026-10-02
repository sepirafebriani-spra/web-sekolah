@extends('admin_app')

@section('title', isset($ekstrakurikuler) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px; max-width: 900px; margin-left: auto; margin-right: auto;">

    <!-- HEADER FORM -->
    <div style="margin-bottom: 24px; border-bottom: 1px solid #e9ecef; padding-bottom: 16px;">
        <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
            {{ isset($ekstrakurikuler) ? 'Edit Data Ekstrakurikuler' : 'Tambah Ekstrakurikuler Baru' }}
        </h4>
        <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
            Isi formulir berikut untuk {{ isset($ekstrakurikuler) ? 'memperbarui' : 'menambahkan' }} informasi ekstrakurikuler.
        </p>
    </div>

    <!-- FORM INPUT -->
    <form action="{{ route('admin.ekstrakurikuler.save', isset($ekstrakurikuler) ? Crypt::encrypt($ekstrakurikuler->id_ekskul) : '') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 20px;">

            <!-- NAMA EKSKUL -->
            <div>
                <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Nama Ekstrakurikuler <span style="color: #ea0606;">*</span>
                </label>
                <input type="text" name="nama_ekskul" value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul ?? '') }}" required placeholder="Contoh: Paskibra, Pramuka"
                       style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem; outline: none; box-sizing: border-box;">
            </div>

            <!-- JADWAL LATIHAN -->
            <div>
                <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Jadwal Latihan
                </label>
                <input type="text" name="jadwal_latihan" value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan ?? '') }}" placeholder="Contoh: Jumat, 15.00 WIB"
                       style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem; outline: none; box-sizing: border-box;">
            </div>

            <!-- PILIH GURU (OPTIONAL FOREIGN KEY) -->
            <div>
                <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Pembina Utama (Dari Data Guru)
                </label>
                <select name="id_guru" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem; outline: none; box-sizing: border-box; background-color: #fff;">
                    <option value="">-- Pilih Guru Pembina (Opsional) --</option>
                    @foreach($guruList as $g)
                        <option value="{{ $g->id_guru }}" {{ old('id_guru', $ekstrakurikuler->id_guru ?? '') == $g->id_guru ? 'selected' : '' }}>
                            {{ $g->nama_guru }} {{ $g->nip ? '('.$g->nip.')' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- NAMA PEMBINA (TEXT MANUAL/EXTERNAL) -->
            <div>
                <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                    Nama Pembina / Pelatih Manual
                </label>
                <input type="text" name="pembina" value="{{ old('pembina', $ekstrakurikuler->pembina ?? '') }}" placeholder="Isi jika pembina bukan guru internal"
                       style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem; outline: none; box-sizing: border-box;">
            </div>

        </div>

        <!-- DESKRIPSI -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Deskripsi Kegiatan
            </label>
            <textarea name="deskripsi" rows="4" placeholder="Tuliskan gambaran umum atau deskripsi ekskul..."
                      style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem; outline: none; box-sizing: border-box; resize: vertical;">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
        </div>

        <!-- UPLOAD GAMBAR -->
        <div style="margin-bottom: 28px;">
            <label style="display: block; font-weight: 700; color: #344767; font-size: 0.875rem; margin-bottom: 8px;">
                Gambar / Logo Ekskul
            </label>
            @if(isset($ekstrakurikuler) && $ekstrakurikuler->gambar && file_exists(public_path('storage/' . $ekstrakurikuler->gambar)))
                <div style="margin-bottom: 12px;">
                    <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="Preview Gambar" style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover; border: 1px solid #d2d6da;">
                </div>
            @endif
            <input type="file" name="gambar" accept="image/*"
                   style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #d2d6da; font-size: 0.875rem;">
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; justify-content: flex-end; gap: 12px;">
            <a href="{{ route('admin.ekstrakurikuler.index') }}"
               style="background-color: #8392ab; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
                Batal
            </a>
            <button type="submit"
                    style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; font-size: 0.875rem; cursor: pointer; box-shadow: 0 4px 6px rgba(50,50,93,.11);">
                {{ isset($ekstrakurikuler) ? 'Simpan Perubahan' : 'Tambah Data' }}
            </button>
        </div>

    </form>
</div>
@endsection
