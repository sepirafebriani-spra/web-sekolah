@extends('admin_app')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
<div class="row">
    {{-- Form dibuat full width (col-12) agar leluasa dan rapi --}}
    <div class="col-12">
        <div class="card {{ isset($user) ? 'card-warning' : 'card-primary' }} card-outline shadow-sm mb-4">
            {{-- Header card: judul form di sebelah kiri --}}
            <div class="card-header">
                <h3 class="card-title mb-0">
                    <i class="bi {{ isset($user) ? 'bi-pencil-square' : 'bi-plus-lg' }} me-1"></i>
                    {{ isset($user) ? 'Form Edit Data User' : 'Form Tambah User Baru' }}
                </h3>
            </div>

            <form action="{{ route('admin.user.save', isset($user) ? Crypt::encrypt($user->id) : null) }}" method="POST">
                @csrf

                <div class="card-body">
                    <!-- Nama Lengkap -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Pengguna <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Contoh: Ahmad Fauzi" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Contoh: user@sekolah.sch.id" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Username -->
                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Kosongkan jika ingin dibuat otomatis">
                            <small class="text-muted">Opsional (Maksimal 30 karakter).</small>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label fw-semibold">Role / Hak Akses <span class="text-danger">*</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="Admin" {{ old('role', strtolower($user->role ?? '')) == 'admin' ? 'selected' : '' }}>
                                    Admin (Akses Penuh Seluruh Sistem)
                                </option>
                                <option value="Operator" {{ old('role', strtolower($user->role ?? '')) == 'operator' ? 'selected' : '' }}>
                                    Operator (Akses Operasional Sekolah)
                                </option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                            Password
                            @if(!isset($user)) <span class="text-danger">*</span> @endif
                        </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Minimal 6 karakter" {{ !isset($user) ? 'required' : '' }}>
                        @if(isset($user))
                            <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengubah password.</small>
                        @endif
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Footer card: tombol kembali di kiri, tombol simpan di kanan --}}
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn {{ isset($user) ? 'btn-warning' : 'btn-primary' }}">
                            <i class="bi bi-save me-1"></i> {{ isset($user) ? 'Simpan Perubahan' : 'Simpan Data User' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection