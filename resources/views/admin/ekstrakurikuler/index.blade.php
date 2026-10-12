@extends('admin_app')

@section('title', 'Kelola Ekstrakurikuler')

@section('content')
    <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 20px 27px 0 rgba(0,0,0,0.05); margin-bottom: 24px;">

        <!-- HEADER & TOMBOL TAMBAH -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
            <div>
                <h4 style="margin: 0; font-weight: bold; color: #344767; font-size: 1.25rem;">
                    Daftar Ekstrakurikuler
                </h4>
                <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                    Kelola kegiatan ekstrakurikuler dan pembina sekolah.
                </p>
            </div>

            <div>
                <a href="{{ route('admin.ekstrakurikuler.addEdit') }}"
                   class="px-4 py-2 bg-[#0284c7] hover:bg-[#0369a1] text-white rounded-lg text-sm font-semibold shadow-md transition-all"
                   style="text-decoration: none; display: inline-block;">
                    + Tambah Ekskul Baru
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

        <!-- TABEL DATA EKSTRAKURIKULER -->
        <div style="overflow-x: auto;">
            <table id="tableEkskul" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
                <thead>
                    <tr style="border-bottom: 2px solid #e9ecef; background-color: #f8f9fa; color: #8392ab;">
                        <th style="padding: 14px 16px; font-weight: 700; width: 50px; text-align: center;">NO</th>
                        <th style="padding: 14px 16px; font-weight: 700; text-align: center; width: 80px;">GAMBAR</th>
                        <th style="padding: 14px 16px; font-weight: 700;">NAMA EKSKUL</th>
                        <th style="padding: 14px 16px; font-weight: 700;">PEMBINA</th>
                        <th style="padding: 14px 16px; font-weight: 700;">JADWAL LATIHAN</th>
                        <th style="padding: 14px 16px; font-weight: 700; text-align: center; width: 180px;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ekstrakurikuler as $item)
                        @php
                            $ekskulId = $item->id_ekskul ?? $item->id;
                            $fotoPath = $item->foto ?? ($item->gambar ?? ($item->logo ?? null));
                        @endphp
                        <tr style="border-bottom: 1px solid #e9ecef;">
                            <!-- NO -->
                            <td style="padding: 16px; text-align: center; color: #344767; font-weight: 600; vertical-align: middle;">
                                {{ $loop->iteration }}
                            </td>

                            <!-- GAMBAR -->
                            <td class="py-3.5 px-4 text-center" style="vertical-align: middle;">
                                @if ($fotoPath && file_exists(public_path('storage/' . $fotoPath)))
                                    <img src="{{ asset('storage/' . $fotoPath) }}" alt="Foto Ekskul"
                                         class="w-12 h-12 rounded-xl object-cover mx-auto shadow-sm border border-slate-200">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center mx-auto border border-sky-100 shadow-sm">
                                        <i class="fa-solid fa-shapes text-lg"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- NAMA EKSKUL -->
                            <td style="padding: 16px; vertical-align: middle; color: #344767; font-weight: 600;">
                                {{ $item->nama_ekskul }}
                            </td>

                            <!-- PEMBINA -->
                            <td style="padding: 16px; color: #495057; font-weight: 500; vertical-align: middle;">
                                {{ $item->pembina ?? ($item->guru->nama_guru ?? '-') }}
                            </td>

                            <!-- JADWAL LATIHAN -->
                            <td style="padding: 16px; vertical-align: middle;">
                                <span style="background-color: #f3e8ff; color: #6b21a8; padding: 4px 10px; border-radius: 6px; font-weight: 700; font-size: 0.75rem; display: inline-block;">
                                    {{ $item->jadwal_latihan ?? '-' }}
                                </span>
                            </td>

                            <!-- AKSI -->
                            <td style="padding: 16px; text-align: center; vertical-align: middle;">
                                <div style="display: flex; justify-content: center; align-items: center; gap: 6px;">
                                    <!-- DETAIL -->
                                    <a href="{{ route('admin.ekstrakurikuler.show', Crypt::encrypt($ekskulId)) }}"
                                       style="display: inline-block; background-color: #17a2b8; color: #ffffff; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none;"
                                       title="Detail">
                                        Detail
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('admin.ekstrakurikuler.addEdit', Crypt::encrypt($ekskulId)) }}"
                                       style="display: inline-block; background-color: #ffc107; color: #000000; padding: 5px 12px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none;"
                                       title="Edit">
                                        Edit
                                    </a>

                                    <!-- HAPUS -->
                                    <form action="{{ route('admin.ekstrakurikuler.destroy', Crypt::encrypt($ekskulId)) }}"
                                          method="POST"
                                          style="margin: 0; display: inline-block;"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus ekstrakurikuler ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="background-color: #dc3545; color: #ffffff; border: none; padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;"
                                                title="Hapus">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 32px; color: #8392ab;">
                                Belum ada data ekstrakurikuler terdaftar.
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
        $(document).ready(function () {
            // Auto hide notification after 3 seconds
            setTimeout(function() {
                const alertEl = document.getElementById('alertNotification');
                if (alertEl) {
                    alertEl.style.opacity = '0';
                    setTimeout(() => alertEl.remove(), 500);
                }
            }, 3000);

            if (typeof $ === 'undefined' || !$.fn.DataTable) {
                return;
            }

            if ($.fn.DataTable.isDataTable('#tableEkskul')) {
                $('#tableEkskul').DataTable().destroy();
            }

            $('#tableEkskul').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                order: [],

                columnDefs: [
                    {
                        targets: [0, 1, 5],
                        orderable: false,
                        searchable: false
                    }
                ],

                language: {
                    search: 'Cari:',
                    searchPlaceholder: '...',
                    lengthMenu: 'Tampilkan _MENU_ data',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Tidak ada data yang ditampilkan',
                    zeroRecords: 'Data tidak ditemukan',
                    emptyTable: 'Belum ada data ekstrakurikuler',

                    paginate: {
                        previous: 'Kembali',
                        next: 'Lanjut'
                    }
                }
            });
        });
    </script>
@endpush