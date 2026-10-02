@extends('admin_app')

@section('title', 'Detail Berita')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px; max-width: 900px; margin-left: auto; margin-right: auto;">

    <!-- HEADER DETAIL -->
    <div style="border-bottom: 1px solid #e9ecef; padding-bottom: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
        <div>
            <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
                Detail Berita
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Diterbitkan pada: {{ $berita->tanggal ? \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') : '-' }}
            </p>
        </div>
        <div>
            <a href="{{ route('admin.berita.index') }}"
               style="background-color: #8392ab; color: #ffffff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; display: inline-block;">
                &larr; Kembali
            </a>
        </div>
    </div>

    <!-- COVER / HERO BANNER -->
    @if($berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
        <div style="margin-bottom: 24px; text-align: center;">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 100%; height: auto; max-height: 400px; border-radius: 12px; object-fit: cover; width: 100%;">
        </div>
    @endif

    <!-- JUDUL -->
    <h2 style="font-weight: bold; color: #344767; font-size: 1.75rem; margin-top: 0; margin-bottom: 16px; line-height: 1.3;">
        {{ $berita->judul }}
    </h2>

    <!-- ISI BERITA -->
    <div style="color: #495057; font-size: 1rem; line-height: 1.8; margin-bottom: 28px; white-space: pre-line; border-top: 1px solid #f0f0f0; padding-top: 20px;">
        {!! nl2br(e($berita->isi)) !!}
    </div>

    <!-- ACTION BUTTONS -->
    <div style="display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #e9ecef; padding-top: 20px;">
        <a href="{{ route('admin.berita.index') }}"
           style="background-color: #8392ab; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem;">
            Kembali
        </a>
        <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($berita->id_berita)) }}"
           style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; box-shadow: 0 4px 6px rgba(50,50,93,.11);">
            Edit Berita
        </a>
    </div>

</div>
@endsection
