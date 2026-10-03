@extends('admin_app')

@section('title', 'Detail Ekstrakurikuler')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px; max-width: 800px; margin-left: auto; margin-right: auto;">

    <!-- HEADER DETAIL -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; border-bottom: 1px solid #e9ecef; padding-bottom: 16px;">
        <div>
            <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
                Detail Ekstrakurikuler
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Informasi rinci kegiatan ekstrakurikuler.
            </p>
        </div>
        <a href="{{ route('admin.ekstrakurikuler.index') }}"
           style="background-color: #8392ab; color: #ffffff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
            &larr; Kembali
        </a>
    </div>

    <!-- KONTEN DETAIL -->
    <div style="display: flex; gap: 24px; flex-wrap: wrap;">

        <!-- FOTO/GAMBAR -->
        <div style="text-align: center; flex: 0 0 150px;">
            @if(!empty($ekstrakurikuler->gambar) && file_exists(public_path('storage/' . $ekstrakurikuler->gambar)))
                <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="{{ $ekstrakurikuler->nama_ekskul }}"
                     style="width: 150px; height: 150px; border-radius: 12px; object-fit: cover; border: 1px solid #d2d6da;">
            @else
                <div style="width: 150px; height: 150px; border-radius: 12px; background-color: #f3e8ff; color: #7928ca; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 2.5rem; margin: 0 auto;">
                    {{ strtoupper(substr($ekstrakurikuler->nama_ekskul ?? 'E', 0, 1)) }}
                </div>
            @endif
        </div>

        <!-- RINCIAN DATA -->
        <div style="flex: 1; min-width: 250px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem;">
                <tr>
                    <td style="padding: 8px 0; color: #8392ab; font-weight: bold; width: 140px;">Nama Ekskul</td>
                    <td style="padding: 8px 0; color: #344767; font-weight: bold;">: {{ $ekstrakurikuler->nama_ekskul }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #8392ab; font-weight: bold;">Guru Pembina</td>
                    <td style="padding: 8px 0; color: #344767;">: {{ $ekstrakurikuler->guru->nama_guru ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #8392ab; font-weight: bold;">Pembina / Pelatih</td>
                    <td style="padding: 8px 0; color: #344767;">: {{ $ekstrakurikuler->pembina ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #8392ab; font-weight: bold;">Jadwal Latihan</td>
                    <td style="padding: 8px 0; color: #344767;">:
                        <span style="background-color: #f3e8ff; color: #6b21a8; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 0.75rem;">
                            {{ $ekstrakurikuler->jadwal_latihan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 8px 0; color: #8392ab; font-weight: bold; vertical-align: top;">Deskripsi</td>
                    <td style="padding: 8px 0; color: #344767; line-height: 1.5; vertical-align: top;">: {{ $ekstrakurikuler->deskripsi ?? 'Belum ada deskripsi.' }}</td>
                </tr>
            </table>
        </div>

    </div>

    <!-- TOMBOL EDIT DI HALAMAN DETAIL -->
    <div style="margin-top: 32px; border-top: 1px solid #e9ecef; padding-top: 16px; text-align: right;">
        <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekstrakurikuler->id_ekskul)) }}"
           style="background-color: #cb0c9f; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
            Edit Data Ini
        </a>
    </div>

</div>
@endsection
