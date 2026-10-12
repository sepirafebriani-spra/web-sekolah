@extends('admin_app')

@section('title', 'Kelola Berita')

@section('content')
<div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px; position: relative;">

    <!-- HEADER & TOMBOL TAMBAH -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
        <div>
            <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
                Kelola Berita & Informasi Sekolah
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Kelola dan publikasikan berita terbaru untuk informasi sekolah.
            </p>
        </div>

        <div>
            <a href="{{ route('admin.berita.addEdit') }}"
               class="px-4 py-2 bg-[#0284c7] hover:bg-[#0369a1] text-white rounded-lg text-sm font-semibold shadow-md transition-all"
               style="text-decoration: none; position: relative; z-index: 10; display: inline-block;">
                + Tambah Berita Baru
            </a>
        </div>
    </div>

    <!-- NOTIFIKASI SUKSES / ERROR (AUTO-HIDE 3 DETIK) -->
    @if (session('success'))
        <div id="alertNotification" style="background-color: #d1e7dd; border: 1px solid #badbcc; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem; transition: opacity 0.5s ease;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="alertNotification" style="background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem; transition: opacity 0.5s ease;">
            {{ session('error') }}
        </div>
    @endif

    <!-- TABEL DATA BERITA -->
    <div style="overflow-x: auto; position: relative; z-index: 5;">
        <table id="tableBerita" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
            <thead>
                <tr style="border-bottom: 2px solid #e9ecef; background-color: #f8f9fa; color: #8392ab;">
                    <th style="padding: 14px 16px; font-weight: 700; width: 50px; text-align: center;">NO</th>
                    <th style="padding: 14px 16px; font-weight: 700; text-align: center; width: 80px;">GAMBAR</th>
                    <th style="padding: 14px 16px; font-weight: 700;">JUDUL & ISI</th>
                    <th style="padding: 14px 16px; font-weight: 700;">TANGGAL</th>
                    <th style="padding: 14px 16px; font-weight: 700;">PENULIS</th>
                    <th style="padding: 14px 16px; font-weight: 700; text-align: center;">STATUS</th>
                    <th style="padding: 14px 16px; font-weight: 700; text-align: center; width: 220px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $item)
                    @php
                        $beritaId = $item->id_berita ?? $item->id ?? null;
                        $fotoPath = $item->foto ?? ($item->gambar ?? null);
                    @endphp
                    <tr style="border-bottom: 1px solid #e9ecef;">
                        <!-- NO -->
                        <td style="padding: 16px; text-align: center; color: #344767; font-weight: 600; vertical-align: middle;">
                            {{ $loop->iteration }}
                        </td>

                        <!-- GAMBAR -->
                        <td style="padding: 16px; text-align: center; vertical-align: middle;">
                            @if ($fotoPath && file_exists(public_path('storage/' . $fotoPath)))
                                <img src="{{ asset('storage/' . $fotoPath) }}" alt="Foto Berita"
                                     style="width: 48px; height: 48px; border-radius: 12px; object-fit: cover; margin: 0 auto; border: 1px solid #cbd5e1;">
                            @else
                                <div style="width: 48px; height: 48px; border-radius: 12px; background-color: #f0f9ff; color: #0284c7; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 1px solid #bae6fd;">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <!-- JUDUL & ISI -->
                        <td style="padding: 16px; vertical-align: middle;">
                            <div style="font-weight: 700; color: #344767; margin-bottom: 2px;">{{ $item->judul }}</div>
                            <div style="color: #8392ab; font-size: 0.75rem; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $item->isi ?? $item->konten }}
                            </div>
                        </td>

                        <!-- TANGGAL -->
                        <td style="padding: 16px; color: #495057; font-weight: 500; vertical-align: middle; white-space: nowrap;">
                            <i class="fa-regular fa-calendar-days" style="color: #8392ab; margin-right: 4px;"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->format('d M Y') }}
                        </td>

                        <!-- PENULIS -->
                        <td style="padding: 16px; color: #495057; font-weight: 500; vertical-align: middle;">
                            {{ $item->penulis ?? ($item->user->name ?? 'Admin') }}
                        </td>

                        <!-- STATUS -->
                        <td style="padding: 16px; text-align: center; vertical-align: middle;">
                            <span style="background-color: #d1e7dd; color: #0f5132; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 0.75rem; display: inline-block;">
                                ● Dipublikasikan
                            </span>
                        </td>

                        <!-- AKSI -->
                        <td style="padding: 16px; text-align: center; vertical-align: middle; position: relative; z-index: 10;">
                            <div style="display: inline-flex; justify-content: center; align-items: center; gap: 6px;">
                                <!-- DETAIL -->
                                <a href="{{ route('admin.berita.show', Crypt::encrypt($beritaId)) }}"
                                   style="background-color: #17a2b8; color: #ffffff; padding: 6px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none; display: inline-block;">
                                    Detail
                                </a>

                                <!-- EDIT -->
                                <a href="{{ route('admin.berita.addEdit', Crypt::encrypt($beritaId)) }}"
                                   style="background-color: #ffc107; color: #000000; padding: 6px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none; display: inline-block;">
                                    Edit
                                </a>

                                <!-- HAPUS -->
                                <form action="{{ route('admin.berita.delete', Crypt::encrypt($beritaId)) }}"
                                      method="POST"
                                      style="margin: 0; display: inline-block;"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background-color: #dc3545; color: #ffffff; border: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 32px; color: #8392ab;">
                            Belum ada data berita terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Auto-hide notifikasi setelah 3 detik
            setTimeout(function() {
                const alertEl = document.getElementById('alertNotification');
                if (alertEl) {
                    alertEl.style.opacity = '0';
                    setTimeout(() => alertEl.remove(), 500);
                }
            }, 3000);
        });
    </script>
@endpush