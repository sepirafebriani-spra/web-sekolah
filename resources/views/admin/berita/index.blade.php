@extends('admin_app')

@section('title', 'Kelola Berita')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px;">

    <!-- HEADER & TOMBOL TAMBAH -->
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e9ecef; padding-bottom: 16px; margin-bottom: 24px; flex-wrap: wrap; gap: 12px;">
        <div>
            <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">Data Berita</h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">Kelola artikel dan berita sekolah SMK YPC Tasikmalaya.</p>
        </div>
        <a href="{{ route('admin.berita.addEdit') }}" 
           style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; box-shadow: 0 4px 6px rgba(50,50,93,.11);">
            + Tambah Berita
        </a>
    </div>

    <!-- NOTIFIKASI SUKSES -->
    @if(session('success'))
        <div style="background-color: #d1e7dd; border: 1px solid #badbcc; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABEL DATA BERITA -->
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; font-size: 0.875rem; text-align: left;">
            <thead>
                <tr style="border-bottom: 2px solid #e9ecef; background-color: #f8f9fa; color: #8392ab;">
                    <th style="padding: 12px 16px; width: 50px;">No</th>
                    <th style="padding: 12px 16px; width: 90px;">Gambar</th>
                    <th style="padding: 12px 16px;">Judul Berita</th>
                    <th style="padding: 12px 16px; width: 140px;">Tanggal</th>
                    <th style="padding: 12px 16px; width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($berita as $key => $item)
                    <tr style="border-bottom: 1px solid #e9ecef;">
                        <td style="padding: 14px 16px; color: #344767; font-weight: bold;">{{ $key + 1 }}</td>
                        <td style="padding: 14px 16px;">
                            @if($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita" style="width: 60px; height: 45px; object-fit: cover; border-radius: 6px;">
                            @else
                                <div style="width: 60px; height: 45px; background-color: #e9ecef; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #8392ab; font-size: 0.75rem;">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td style="padding: 14px 16px; color: #344767; font-weight: 600;">
                            {{ Str::limit($item->judul, 60) }}
                        </td>
                        <td style="padding: 14px 16px; color: #495057;">
                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y') : '-' }}
                        </td>
                        <td style="padding: 14px 16px; text-align: center;">
                            <div style="display: flex; gap: 6px; justify-content: center;">
                                <a href="{{ route('admin.berita.show', Crypt::encrypt($item->id_berita)) }}" 
                                   style="background-color: #17a2b8; color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.75rem; font-weight: bold;">
                                    Detail
                                </a>
                                <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($item->id_berita)) }}" 
                                   style="background-color: #ffc107; color: #000; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.75rem; font-weight: bold;">
                                    Edit
                                </a>
                                <form action="{{ route('admin.berita.delete', Crypt::encrypt($item->id_berita)) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-size: 0.75rem; font-weight: bold;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 24px; color: #8392ab;">Belum ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection