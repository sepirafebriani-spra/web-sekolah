@extends('admin_app')

@section('title', 'Kelola Berita')

@section('content')
    <!-- CARD UTAMA -->
    <div class="card shadow-sm border-0" style="background-color: #ffffff; border-radius: 16px; padding: 24px;">
        
        <!-- HEADER DALAM CARD -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <div>
                <h4 style="margin: 0; font-weight: 700; color: #344767; font-size: 1.25rem;">
                    Kelola Berita & Informasi Sekolah
                </h4>
                <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                    Kelola dan publikasikan berita terbaru untuk informasi sekolah Anda.
                </p>
            </div>
            <a href="{{ route('admin.berita.addEdit') }}" 
               style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; box-shadow: 0 4px 6px rgba(50,50,93,.11); display: inline-flex; align-items: center;">
                + Tambah Berita Baru
            </a>
        </div>

        <!-- NOTIFIKASI SUKSES -->
        @if (session('success'))
            <div style="background-color: #d1e7dd; border: 1px solid #badbcc; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM HAPUS GLOBAL (UNTUK MENGHINDARI BUG NESTED FORM IN TABLE) -->
        <form id="globalDeleteForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <!-- TABEL -->
        <div class="table-responsive">
            <table id="tableBerita" class="table align-items-center mb-0" style="width: 100%;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th class="text-center" style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">NO</th>
                        <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">COVER</th>
                        <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">JUDUL & RINGKASAN</th>
                        <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">TANGGAL</th>
                        <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">PENULIS</th>
                        <th class="text-center" style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $index => $item)
                        @php
                            $encryptedId = Crypt::encrypt($item->id_berita ?? $item->id);
                        @endphp
                        <tr>
                            <!-- NOMOR -->
                            <td class="text-center" style="vertical-align: middle; font-weight: 600; color: #344767; font-size: 0.875rem; padding: 12px;">
                                {{ $index + 1 }}
                            </td>

                            <!-- COVER / GAMBAR -->
                            <td style="vertical-align: middle; padding: 12px;">
                                @if ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Cover"
                                        style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid #e9ecef;">
                                @else
                                    <img src="https://via.placeholder.com/44" alt="Default"
                                        style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid #e9ecef;">
                                @endif
                            </td>

                            <!-- JUDUL & RINGKASAN -->
                            <td style="vertical-align: middle; padding: 12px;">
                                <h6 style="margin: 0; font-weight: 700; color: #344767; font-size: 0.875rem; line-height: 1.3;">
                                    {{ $item->judul }}
                                </h6>
                                <p style="margin: 2px 0 0 0; color: #8392ab; font-size: 0.78rem; line-height: 1.3;">
                                    {{ Str::limit(strip_tags($item->isi ?? $item->ringkasan), 50, '...') }}
                                </p>
                            </td>

                            <!-- TANGGAL -->
                            <td style="vertical-align: middle; color: #8392ab; font-size: 0.825rem; padding: 12px; white-space: nowrap;">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                            </td>

                            <!-- PENULIS -->
                            <td style="vertical-align: middle; color: #8392ab; font-size: 0.825rem; padding: 12px;">
                                {{ $item->penulis ?? ($item->user->name ?? 'Admin') }}
                            </td>

                            <!-- AKSI -->
                            <td class="text-center" style="vertical-align: middle; padding: 12px; white-space: nowrap;">
                                <div style="display: flex; gap: 6px; align-items: center; justify-content: center;">
                                    
                                    <!-- DETAIL -->
                                    <a href="{{ route('admin.berita.show', $encryptedId) }}" 
                                       class="btn btn-sm text-white font-weight-bold"
                                       style="background-color: #17a2b8; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0;">
                                        Detail
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.berita.addEdit', $encryptedId) }}" 
                                       class="btn btn-sm text-white font-weight-bold"
                                       style="background-color: #ffc107; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0;">
                                        Edit
                                    </a>

                                    <!-- HAPUS (MEMANGGIL JS) -->
                                    <button type="button" 
                                            onclick="konfirmasiHapus('{{ route('admin.berita.delete', $encryptedId) }}')" 
                                            class="btn btn-sm text-white font-weight-bold"
                                            style="background-color: #dc3545; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0; border: none;">
                                        Hapus
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- SCRIPT KHUSUS UNTUK MEMASTIKAN DIKLIK -->
    <script>
        function konfirmasiHapus(url) {
            if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                var form = document.getElementById('globalDeleteForm');
                form.action = url;
                form.submit();
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            if (typeof $ !== 'undefined' && $.fn.DataTable) {
                $('#tableBerita').DataTable({
                    "language": {
                        "lengthMenu": "_MENU_ entries per page",
                        "zeroRecords": "Tidak ada data berita ditemukan",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        "search": "Search:",
                        "paginate": {
                            "previous": "<",
                            "next": ">"
                        }
                    },
                    "pageLength": 10,
                    "ordering": true,
                    "autoWidth": false
                });
            }
        });
    </script>
@endsection