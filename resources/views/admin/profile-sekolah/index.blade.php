@extends('admin_app')

@section('title', 'Profile Sekolah')

@section('content')
<div class="flex flex-wrap -mx-3">
    <!-- Kolom Kiri: Preview Identitas Sekolah -->
    <div class="w-full max-w-full px-3 mb-6 lg:w-4/12 lg:mb-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border mb-6">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="font-bold text-slate-700 mb-0">
                    <i class="fas fa-info-circle mr-1 text-purple-700"></i> Identitas Sekolah
                </h6>
            </div>
            <div class="p-6 text-center">
                @if ($profilSekolah->logo && file_exists(public_path('storage/' . $profilSekolah->logo)))
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo Sekolah" class="inline-flex items-center justify-center mx-auto mb-4 h-28 w-auto object-contain p-2 bg-gray-50 rounded-xl border border-gray-100 shadow-soft-sm" />
                @else
                    <img src="{{ asset('img/smk-ypc.png') }}" alt="Logo Sekolah" class="inline-flex items-center justify-center mx-auto mb-4 h-28 w-auto object-contain p-2 bg-gray-50 rounded-xl border border-gray-100 shadow-soft-sm" />
                @endif

                <h5 class="font-bold text-slate-800 text-lg mb-1">{{ $profilSekolah->nama_sekolah }}</h5>
                <p class="text-xs font-semibold text-slate-400 mb-4">
                    <i class="fas fa-user-tie mr-1"></i> {{ $profilSekolah->kepala_sekolah }}
                </p>

                <div class="border-t border-gray-100 pt-3">
                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li class="relative flex justify-between px-0 py-2 bg-white border-0 text-xs border-b border-gray-100">
                            <span class="text-slate-500 font-semibold"><i class="fas fa-qrcode mr-1 text-purple-700"></i> NPSN:</span>
                            <span class="font-bold text-slate-700">{{ $profilSekolah->npsn }}</span>
                        </li>
                        <li class="relative flex justify-between px-0 py-2 bg-white border-0 text-xs border-b border-gray-100">
                            <span class="text-slate-500 font-semibold"><i class="fas fa-calendar-alt mr-1 text-purple-700"></i> Tahun Berdiri:</span>
                            <span class="font-bold text-slate-700">{{ $profilSekolah->tahun_berdiri }}</span>
                        </li>
                        <li class="relative flex justify-between px-0 py-2 bg-white border-0 text-xs">
                            <span class="text-slate-500 font-semibold"><i class="fas fa-phone mr-1 text-purple-700"></i> Kontak:</span>
                            <span class="font-bold text-slate-700">{{ $profilSekolah->kontak }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($profilSekolah->foto && file_exists(public_path('storage/' . $profilSekolah->foto)))
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <h6 class="font-bold text-slate-700 mb-0">
                        <i class="fas fa-image mr-1 text-purple-700"></i> Gedung Sekolah
                    </h6>
                </div>
                <div class="p-4">
                    <img src="{{ asset('storage/' . $profilSekolah->foto) }}" alt="Gedung Sekolah" class="w-full h-48 object-cover rounded-xl shadow-soft-sm" />
                </div>
            </div>
        @endif
    </div>

    <!-- Kolom Kanan: Form Edit Profile Sekolah -->
    <div class="w-full max-w-full px-3 lg:w-8/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="font-bold text-slate-700 mb-0">
                    <i class="fas fa-pen-square mr-1 text-purple-700"></i> Form Pengaturan Profile Sekolah
                </h6>
            </div>

            <!-- Action Form Menggunakan Route: admin.profil-sekolah.save -->
            <form action="{{ route('admin.profil-sekolah.save') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex-auto p-6">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mb-4 md:w-1/2">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Nama Sekolah <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_sekolah" maxlength="40" value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah) }}"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('nama_sekolah') border-red-500 @enderror" required>
                            @error('nama_sekolah')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 mb-4 md:w-1/2">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Nama Kepala Sekolah <span class="text-red-500">*</span></label>
                            <input type="text" name="kepala_sekolah" maxlength="40" value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah) }}"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('kepala_sekolah') border-red-500 @enderror" required>
                            @error('kepala_sekolah')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mb-4 md:w-1/3">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">NPSN <span class="text-red-500">*</span></label>
                            <input type="text" name="npsn" maxlength="10" value="{{ old('npsn', $profilSekolah->npsn) }}"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('npsn') border-red-500 @enderror" required>
                            @error('npsn')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 mb-4 md:w-1/3">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Tahun Berdiri <span class="text-red-500">*</span></label>
                            <input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri) }}"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('tahun_berdiri') border-red-500 @enderror" required>
                            @error('tahun_berdiri')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 mb-4 md:w-1/3">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">No. Kontak / Telepon <span class="text-red-500">*</span></label>
                            <input type="text" name="kontak" maxlength="15" value="{{ old('kontak', $profilSekolah->kontak) }}"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('kontak') border-red-500 @enderror" required>
                            @error('kontak')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="2"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('alamat') border-red-500 @enderror" required>{{ old('alamat', $profilSekolah->alamat) }}</textarea>
                        @error('alamat')
                            <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Visi & Misi Sekolah <span class="text-red-500">*</span></label>
                        <textarea name="visi_misi" rows="4"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('visi_misi') border-red-500 @enderror" required>{{ old('visi_misi', $profilSekolah->visi_misi) }}</textarea>
                        @error('visi_misi')
                            <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Deskripsi / Sambutan Sekolah</label>
                        <textarea name="deskripsi" rows="3"
                            class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $profilSekolah->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mb-4 md:w-1/2">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Ganti Logo Sekolah</label>
                            <input type="file" name="logo" accept="image/*"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all @error('logo') border-red-500 @enderror">
                            <span class="text-xxs font-normal text-slate-400">Biarkan kosong jika tidak diubah. Format JPG/PNG (Maks: 2MB).</span>
                            @error('logo')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 mb-4 md:w-1/2">
                            <label class="mb-2 ml-1 text-xs font-bold text-slate-700">Ganti Foto Gedung Sekolah</label>
                            <input type="file" name="foto" accept="image/*"
                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-slate-700 transition-all @error('foto') border-red-500 @enderror">
                            <span class="text-xxs font-normal text-slate-400">Biarkan kosong jika tidak diubah. Format JPG/PNG (Maks: 2MB).</span>
                            @error('foto')
                                <p class="text-xs text-red-500 mt-1 mb-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0 flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 text-xs font-bold text-white uppercase bg-gradient-to-tl from-purple-700 to-pink-500 rounded-lg shadow-soft-md hover:scale-102 transition-all cursor-pointer">
                        <i class="fas fa-save mr-1"></i> Simpan Profile Sekolah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection