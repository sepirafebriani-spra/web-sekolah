@extends('admin_app')

@section('title', 'Detail Galeri')

@section('content')
<div class="card shadow-sm border-0" style="background-color: #ffffff; border-radius: 16px; padding: 28px; margin-bottom: 24px; max-width: 800px; margin-left: auto; margin-right: auto;">
    
    <!-- HEADER DETAIL & TOMBOL KEMBALI -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 1px solid #e9ecef; padding-bottom: 16px;">
        <div>
            <h4 style="margin: 0; font-weight: 700; color: #344767; font-size: 1.25rem;">
                Detail Informasi Galeri
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Melihat detail foto atau video yang diunggah.
            </p>
        </div>
        <a href="{{ route('admin.galeri.index') }}" 
           style="background-color: #8392ab; color: #ffffff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; display: inline-flex; align-items: center;">
            &larr; Kembali
        </a>
    </div>

    <!-- PREVIEW FILE (FOTO / VIDEO) -->
    <div style="text-align: center; margin-bottom: 24px; background-color: #f8f9fa; padding: 20px; border-radius: 12px; border: 1px dashed #d2d6da;">
        @if ($galeri->file && file_exists(public_path('storage/' . $galeri->file)))
            @if ($galeri->kategori == 'Foto')
                <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}" 
                     style="max-width: 100%; max-height: 450px; border-radius: 8px; object-fit: contain; box-shadow: 0 4px 10px rgba(0,0,0,0.08);">
            @else
                <video controls style="max-width: 100%; max-height: 450px; border-radius: 8px; width: 100%;">
                    <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutaran video ini.
                </video>
            @endif
        @else
            <div style="padding: 30px; color: #8392ab;">
                <p style="margin: 0; font-weight: 600;">File media tidak ditemukan atau telah dihapus.</p>
            </div>
        @endif
    </div>

    <!-- TABEL INFORMASI GALERI -->
    <div style="background-color: #ffffff; border-radius: 12px; border: 1px solid #f0f2f5; padding: 16px;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
            <tr style="border-bottom: 1px solid #f0f2f5;">
                <th style="text-align: left; padding: 12px 8px; color: #8392ab; width: 180px; font-weight: 600;">Judul</th>
                <td style="padding: 12px 8px; color: #344767; font-weight: 700;">{{ $galeri->judul }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f2f5;">
                <th style="text-align: left; padding: 12px 8px; color: #8392ab; font-weight: 600;">Kategori</th>
                <td style="padding: 12px 8px;">
                    <span style="padding: 4px 12px; border-radius: 6px; font-weight: 700; font-size: 0.75rem; display: inline-block; {{ $galeri->kategori == 'Foto' ? 'background-color: #e0f2fe; color: #0369a1;' : 'background-color: #fef3c7; color: #b45309;' }}">
                        {{ $galeri->kategori }}
                    </span>
                </td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f2f5;">
                <th style="text-align: left; padding: 12px 8px; color: #8392ab; font-weight: 600;">Tanggal</th>
                <td style="padding: 12px 8px; color: #344767; font-weight: 600;">
                    {{ \Carbon\Carbon::parse($galeri->tanggal)->format('d F Y') }}
                </td>
            </tr>
            <tr>
                <th style="text-align: left; padding: 12px 8px; color: #8392ab; vertical-align: top; font-weight: 600;">Keterangan</th>
                <td style="padding: 12px 8px; color: #344767; line-height: 1.6;">
                    {!! nl2br(e($galeri->keterangan)) !!}
                </td>
            </tr>
        </table>
    </div>

    <!-- TOMBOL AKSI CEPAT (EDIT) -->
    <div style="margin-top: 24px; display: flex; justify-content: flex-end; gap: 10px;">
        <a href="{{ route('admin.galeri.addEdit', ['id' => Crypt::encrypt($galeri->id_galeri)]) }}" 
           style="background-color: #ffc107; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
            Edit Galeri Ini
        </a>
    </div>

</div>
@endsection