@extends('admin_app')

@section('title', 'Data Guru')

@section('content')
    <div style="padding: 15px 20px;">
        <!-- Container Utama Putih Bersih Card -->
        <div style="background-color: #ffffff; border-radius: 16px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">

            {{-- HEADER: Judul di Kiri & Tombol Tambah di Kanan Atas --}}
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #e9ecef;">
                <div>
                    <h4 style="font-weight: 700; color: #212529; margin: 0 0 4px 0; font-size: 18px;">Data Guru</h4>
                    <p style="color: #6c757d; font-size: 13px; margin: 0;">Daftar data guru sekolah.</p>
                </div>

                <div>
                    <a href="{{ route('admin.guru.addEdit') }}"
                       style="display: inline-block; background-color: #0d6efd; color: #ffffff; padding: 8px 18px; border-radius: 8px; font-weight: 600; font-size: 13px; text-decoration: none; box-shadow: 0 2px 4px rgba(13,110,253,0.2);">
                        + Tambah Guru
                    </a>
                </div>
            </div>

            {{-- NOTIFIKASI SUKSES (AUTO-HIDE 3 DETIK) --}}
            @if (session('success'))
                <div id="success-alert" style="background-color: #d1e7dd; border: 1px solid #badbcc; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- NOTIFIKASI ERROR --}}
            @if (session('error'))
                <div style="background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- TABEL DATA --}}
            <div class="table-responsive">
                <table id="tableGuru" class="table table-hover align-middle w-100">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>FOTO</th>
                            <th>NAMA GURU</th>
                            <th>NIP</th>
                            <th>MATA PELAJARAN</th>
                            <th class="text-center" style="width: 150px;">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($guru as $item)
                            @php
                                $guruId = $item->getKey();
                                $namaGuru = $item->nama_guru ?? $item->nama ?? $item->name ?? 'Guru';
                                $fotoGuru = $item->foto ?? $item->gambar ?? $item->foto_guru ?? null;
                                if ($fotoGuru) {
                                    $fotoGuru = str_replace(['public/', 'storage/'], '', $fotoGuru);
                                }
                            @endphp
                            <tr>
                                {{-- NOMOR --}}
                                <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>

                                {{-- FOTO --}}
                                <td>
                                    @if (!empty($fotoGuru) && file_exists(public_path('storage/' . $fotoGuru)))
                                        <img src="{{ asset('storage/' . $fotoGuru) }}" alt="Foto"
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($namaGuru) }}&background=0d6efd&color=fff"
                                             alt="Avatar"
                                             style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @endif
                                </td>

                                {{-- NAMA GURU --}}
                                <td>
                                    <div style="font-weight: 600; color: #212529; font-size: 14px;">
                                        {{ $namaGuru }}
                                    </div>
                                </td>

                                {{-- NIP --}}
                                <td style="font-size: 14px; color: #495057;">{{ $item->nip ?? '-' }}</td>

                                {{-- MATA PELAJARAN --}}
                                <td style="font-size: 14px; color: #495057;">{{ $item->mapel ?? '-' }}</td>

                                {{-- AKSI --}}
                                <td class="text-center">
                                    <div style="display: flex; align-items: center; justify-content: center; gap: 6px;">
                                        {{-- DETAIL --}}
                                        <a href="{{ route('admin.guru.show', Crypt::encrypt($guruId)) }}"
                                           style="display: inline-block; background-color: #17a2b8; color: #ffffff; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none;"
                                           title="Detail">
                                            Detail
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.guru.addEdit', Crypt::encrypt($guruId)) }}"
                                           style="display: inline-block; background-color: #ffc107; color: #000000; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none;"
                                           title="Edit">
                                            Edit
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('admin.guru.destroy', Crypt::encrypt($guruId)) }}" method="POST"
                                              style="display: inline-block; margin: 0; padding: 0;"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    style="background-color: #dc3545; color: #ffffff; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; border: none; cursor: pointer;"
                                                    title="Hapus">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    Belum ada data guru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

{{-- DATATABLES SCRIPT & AUTO-HIDE ALERT --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            // Auto-hide alert sukses setelah 3 detik
            const alertBox = document.getElementById('success-alert');
            if (alertBox) {
                setTimeout(function () {
                    alertBox.style.transition = 'opacity 0.5s ease';
                    alertBox.style.opacity = '0';
                    setTimeout(function () {
                        alertBox.style.display = 'none';
                    }, 500);
                }, 3000);
            }

            if (typeof $ === 'undefined' || !$.fn.DataTable) {
                return;
            }

            if ($.fn.DataTable.isDataTable('#tableGuru')) {
                $('#tableGuru').DataTable().destroy();
            }

            $('#tableGuru').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                order: [],

                columnDefs: [{
                    targets: [0, 1, 5],
                    orderable: false,
                    searchable: false
                }],

                language: {
                    search: 'Cari:',
                    searchPlaceholder: '...',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data yang ditampilkan',
                    zeroRecords: 'Data tidak ditemukan',
                    emptyTable: 'Belum ada data guru',

                    paginate: {
                        previous: 'Kembali',
                        next: 'Lanjut'
                    }
                }
            });
        });
    </script>
@endpush