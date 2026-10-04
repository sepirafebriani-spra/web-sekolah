@extends('admin_app')

@section('title', 'Kelola Data Guru')

@section('content')
<style>
    .action-btn-group {
        position: relative !important;
        z-index: 99999 !important;
        pointer-events: auto !important;
    }
    .action-btn-group a, 
    .action-btn-group button {
        position: relative !important;
        z-index: 99999 !important;
        pointer-events: auto !important;
        cursor: pointer !important;
    }
</style>

<div class="card shadow-sm border-0" style="background-color: #ffffff; border-radius: 16px; padding: 24px; margin-bottom: 24px;">
    
    <!-- HEADER & TOMBOL TAMBAH -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
        <div>
            <h4 style="margin: 0; font-weight: 700; color: #344767; font-size: 1.25rem;">
                Kelola Data Guru
            </h4>
            <p style="margin: 4px 0 0 0; color: #8392ab; font-size: 0.875rem;">
                Kelola informasi pengajar dan staf pengajar sekolah.
            </p>
        </div>
        <a href="{{ route('admin.guru.addEdit') }}" 
           style="background: linear-gradient(310deg, #7928ca, #370b6d); color: #ffffff; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 0.875rem; box-shadow: 0 4px 6px rgba(50,50,93,.11); display: inline-flex; align-items: center;">
            + Tambah Guru
        </a>
    </div>

    <!-- NOTIFIKASI -->
    @if (session('success'))
        <div style="background-color: #d1e7dd; border: 1px solid #badbcc; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="background-color: #f8d7da; border: 1px solid #f5c2c7; color: #842029; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.875rem;">
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM HAPUS GLOBAL -->
    <form id="globalDeleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- TABEL DATA GURU -->
    <div class="table-responsive">
        <table id="tableGuru" class="table align-items-center mb-0" style="width: 100%;">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th class="text-center" style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px; width: 50px;">NO</th>
                    <th class="text-center" style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px; width: 80px;">FOTO</th>
                    <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">NIP</th>
                    <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">NAMA GURU</th>
                    <th style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px;">MATA PELAJARAN</th>
                    <th class="text-center" style="color: #8392ab; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; padding: 12px; width: 180px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guru as $item)
                    @php
                        $idRaw = $item->id_guru;
                        $encryptedId = urlencode(Crypt::encrypt($idRaw));
                    @endphp
                    <tr>
                        <!-- NO -->
                        <td class="text-center" style="vertical-align: middle; font-weight: 600; color: #344767; font-size: 0.875rem; padding: 12px;">
                            {{ $loop->iteration }}
                        </td>

                        <!-- FOTO -->
                        <td class="text-center" style="vertical-align: middle; padding: 12px;">
                            @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_guru }}"
                                     style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 1px solid #e9ecef; display: inline-block;">
                            @else
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: #e9ecef; color: #8392ab; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; margin: 0 auto;">
                                    No Image
                                </div>
                            @endif
                        </td>

                        <!-- NIP -->
                        <td style="vertical-align: middle; color: #8392ab; font-size: 0.875rem; padding: 12px;">
                            {{ $item->nip ?? '-' }}
                        </td>

                        <!-- NAMA GURU -->
                        <td style="vertical-align: middle; padding: 12px;">
                            <h6 style="margin: 0; font-weight: 700; color: #344767; font-size: 0.875rem;">
                                {{ $item->nama_guru }}
                            </h6>
                        </td>

                        <!-- MAPEL -->
                        <td style="vertical-align: middle; color: #344767; font-size: 0.875rem; padding: 12px;">
                            <span style="background-color: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-weight: 600; font-size: 0.75rem;">
                                {{ $item->mapel ?? '-' }}
                            </span>
                        </td>

                        <!-- AKSI -->
                        <td class="text-center" style="vertical-align: middle; padding: 12px; white-space: nowrap;">
                            <div class="action-btn-group" style="display: flex; gap: 6px; align-items: center; justify-content: center;">
                                
                                <!-- DETAIL -->
                                <a href="{{ route('admin.guru.show', ['id' => $encryptedId]) }}" 
                                   class="btn btn-sm text-white font-weight-bold"
                                   style="background-color: #17a2b8; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0; text-decoration: none; display: inline-block;">
                                    Detail
                                </a>

                                <!-- EDIT -->
                                <a href="{{ route('admin.guru.addEdit', ['id' => $encryptedId]) }}" 
                                   class="btn btn-sm text-white font-weight-bold"
                                   style="background-color: #ffc107; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0; text-decoration: none; display: inline-block;">
                                    Edit
                                </a>

                                <!-- HAPUS -->
                                <button type="button" 
                                        onclick="konfirmasiHapus('{{ route('admin.guru.destroy', ['id' => $encryptedId]) }}')" 
                                        class="btn btn-sm text-white font-weight-bold"
                                        style="background-color: #dc3545; border-radius: 6px; padding: 6px 12px; font-size: 0.75rem; margin: 0; border: none; cursor: pointer;">
                                    Hapus
                                </button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center" style="padding: 32px; color: #8392ab;">
                            Belum ada data guru yang tersimpan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function konfirmasiHapus(url) {
        if (confirm('Apakah Anda yakin ingin menghapus data guru ini?')) {
            var form = document.getElementById('globalDeleteForm');
            form.action = url;
            form.submit();
        }
    }
</script>
@endsection