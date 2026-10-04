@extends('admin_app')

@section('title', 'User')

@section('content')
<div class="card card-outline card-primary shadow-sm mb-4">
    {{-- Header card: judul di kiri, tombol tambah di kanan --}}
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h3 class="card-title mb-0">
                Daftar User
            </h3>

            <a href="{{ route('admin.user.addEdit') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah User
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="tableUser" class="table table-bordered table-striped table-hover align-middle responsive nowrap" width="100%">
            <thead class="table-light">
                <tr>
                    <th class="text-center" data-priority="1" style="width: 40px;">No</th>
                    <th data-priority="1">Nama</th>
                    <th data-priority="3">Email</th>
                    <th class="text-center" data-priority="2" style="width: 120px;">Role</th>
                    <th class="text-center" data-priority="1" style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            <div class="fw-semibold">{{ $item->name }}</div>
                            <small class="text-muted">Username: {{ $item->username ?? '-' }}</small>
                        </td>
                        <td>{{ $item->email }}</td>
                        <td class="text-center">
                            @if (strcasecmp($item->role, 'admin') === 0)
                                <span class="badge bg-primary">
                                    <i class="bi bi-shield-check me-1"></i> Admin
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="bi bi-person me-1"></i> Operator
                                </span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-aksi-group" role="group">
                                <a href="{{ route('admin.user.show', Crypt::encrypt($item->id)) }}" class="btn btn-info btn-sm text-white" title="Detail User" aria-label="Detail">
                                    <i class="bi bi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                </a>
                                <a href="{{ route('admin.user.addEdit', Crypt::encrypt($item->id)) }}" class="btn btn-warning btn-sm" title="Edit User" aria-label="Edit">
                                    <i class="bi bi-pencil-square"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                </a>
                                @if ($item->id !== auth()->id())
                                    <form action="{{ route('admin.user.delete', Crypt::encrypt($item->id)) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus User" aria-label="Hapus">
                                            <i class="bi bi-trash"></i> <span class="d-none d-md-inline ms-1">Hapus</span>
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled title="Akun yang sedang login tidak dapat dihapus" aria-label="Terkunci">
                                        <i class="bi bi-lock"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#tableUser').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                search: "Cari Data:",
                lengthMenu: "Tampilkan _MENU_ baris",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data yang ditampilkan",
                zeroRecords: "Data tidak ditemukan",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Selanjutnya"
                }
            }
        });
    });
</script>
@endpush