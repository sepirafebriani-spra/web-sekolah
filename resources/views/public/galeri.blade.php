<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col justify-between">

    <!-- TOPBAR BIRU PENDIDIKAN -->
    <div class="bg-sky-700 text-white text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <span><i class="fas fa-school mr-1.5"></i> Website Resmi
                {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}</span>
            <span>NPSN: {{ data_get($profil, 'npsn', '-') }}</span>
        </div>
    </div>

    <!-- NAVBAR UTAMA -->
    <header x-data="{ open: false }" class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    @php
                        $logoPath = data_get($profil, 'logo');
                    @endphp
                    @if ($logoPath && file_exists(public_path('storage/' . $logoPath)))
                        <img src="{{ asset('storage/' . $logoPath) }}" alt="Logo" class="w-10 h-10 object-contain">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_Tut_Wuri_Handayani.png/240px-Logo_Tut_Wuri_Handayani.png"
                            alt="Logo" class="w-10 h-10 object-contain">
                    @endif
                    <div>
                        <span class="font-bold text-base md:text-lg text-gray-900 tracking-tight block leading-tight">
                            {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}
                        </span>
                        <span class="text-[10px] text-sky-700 font-semibold tracking-wider uppercase">Dinas
                            Pendidikan</span>
                    </div>
                </div>

                <!-- Navigation Menu (Desktop) -->
                <nav class="hidden md:flex items-center space-x-6 text-xs font-semibold text-gray-700">
                    <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Beranda</a>
                    <a href="{{ url('/profil') }}" class="{{ request()->is('profil*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Profil</a>
                    <a href="{{ route('public.guru') }}" class="{{ request()->routeIs('public.guru*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Guru</a>
                    <a href="{{ route('public.siswa') }}" class="{{ request()->routeIs('public.siswa*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Siswa</a>
                    <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Berita</a>
                    <a href="{{ route('ekstrakurikuler') }}" class="{{ request()->routeIs('ekstrakurikuler*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Ekstrakurikuler</a>
                    <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Galeri</a>
                    <a href="{{ route('public.data-profile') }}" class="{{ request()->routeIs('public.data-profile*') ? 'text-sky-600 font-bold' : 'hover:text-sky-600' }} transition">Data Profile</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="open = !open" class="text-gray-700 p-2">
                        <i class="fas" :class="open ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak class="md:hidden bg-white border-t px-4 py-3 space-y-2 text-sm font-medium">
            <a href="{{ route('beranda') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('beranda') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Beranda</a>
            <a href="{{ url('/profil') }}" @click="open = false"
                class="block py-1 {{ request()->is('profil*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Profil</a>
            <a href="{{ route('public.guru') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('public.guru*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Guru</a>
            <a href="{{ route('public.siswa') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('public.siswa*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Siswa</a>
            <a href="{{ route('berita') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('berita*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Berita</a>
            <a href="{{ route('ekstrakurikuler') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('ekstrakurikuler*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Ekstrakurikuler</a>
            <a href="{{ route('galeri') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('galeri*') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Galeri</a>
        </div>
    </header>

    <!-- CONTENT DAFTAR GALERI -->
    <main class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full flex-1">

        <!-- JUDUL HALAMAN -->
        <div class="mb-10 text-center md:text-left border-b border-gray-200 pb-5">
            <h1 class="text-2xl md:text-3xl font-extrabold text-sky-950 mb-2">Galeri Kegiatan Sekolah</h1>
            <p class="text-xs text-gray-500">Dokumentasi foto dan video kegiatan di
                {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}</p>
        </div>

        <!-- GRID CARD GALERI (LANDSCAPE 16:9) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($galeri as $item)
                @php
                    $rawId = $item->id_galeri ?? ($item->id ?? null);
                    $encryptedId = $rawId ? Crypt::encrypt($rawId) : '';
                @endphp
                <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all">

                    <!-- MEDIA AREA LANDSCAPE (ASPECT-VIDEO 16:9) -->
                    <div class="relative w-full aspect-video bg-slate-900 flex items-center justify-center overflow-hidden">

                        {{-- CEK JIKA KATEGORI VIDEO --}}
                        @if (($item->kategori ?? '') == 'Video')
                            @if (\Illuminate\Support\Str::contains($item->file, ['youtube.com', 'youtu.be']))
                                {{-- Jika input video berupa Link YouTube --}}
                                @php
                                    $youtubeId = '';
                                    if (
                                        preg_match(
                                            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                            $item->file,
                                            $match,
                                        )
                                    ) {
                                        $youtubeId = $match[1];
                                    }
                                @endphp

                                @if ($youtubeId)
                                    <iframe class="w-full h-full object-cover"
                                        src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @else
                                    <a href="{{ $item->file }}" target="_blank"
                                        class="text-white flex flex-col items-center gap-2 hover:text-sky-400 transition">
                                        <i class="fab fa-youtube text-4xl text-red-600"></i>
                                        <span class="text-xs font-semibold">Tonton di YouTube</span>
                                    </a>
                                @endif
                            @else
                                {{-- Jika input video berupa File MP4/Video Upload Local --}}
                                <video controls class="w-full h-full object-cover">
                                    <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutaran video.
                                </video>
                            @endif

                        {{-- JIKA KATEGORI FOTO --}}
                        @else
                            @if ($item->file && file_exists(public_path('storage/' . $item->file)))
                                <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="text-gray-400 text-xs flex flex-col items-center gap-1">
                                    <i class="fas fa-image text-3xl"></i>
                                    <span>Foto tidak ditemukan</span>
                                </div>
                            @endif
                        @endif

                    </div>

                    <!-- JUDUL, KETERANGAN & TOMBOL DETAIL -->
                    <div class="p-4 bg-white flex flex-col justify-between flex-1 space-y-3">
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm line-clamp-1">
                                {{ $item->judul }}
                            </h3>
                            @if ($item->keterangan)
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                    {{ $item->keterangan }}
                                </p>
                            @endif
                        </div>

                        <!-- TOMBOL LIHAT DETAIL DENGAN ENKRIPSI ID -->
                        <a href="{{ route('galeri.show', $encryptedId) }}"
                            class="inline-flex items-center gap-1.5 text-xs font-semibold text-sky-600 hover:text-white bg-sky-50 hover:bg-sky-600 px-4 py-2.5 rounded-xl transition-all w-full justify-center text-center shadow-sm">
                            Lihat Detail <i class="fas fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                </div>
            @empty
                <p class="col-span-full text-center text-gray-400 text-sm py-12">Belum ada dokumentasi galeri.</p>
            @endforelse
        </div>

    </main>

    <!-- FOOTER UTAMA -->
    <footer class="bg-sky-600 text-white text-xs py-12 border-t border-sky-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Grid 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8 pb-8 border-b border-sky-500/50">

                <!-- Kolom 1: Profil / Deskripsi Sekolah -->
                <div class="md:col-span-6 space-y-3">
                    <h3 class="font-bold text-sm tracking-wider uppercase">
                        {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}
                    </h3>
                    <p class="text-sky-100 text-[11px] leading-relaxed max-w-lg">
                        {{ data_get($profil, 'deskripsi') ?? 'Website resmi sekolah yang mengunggulkan pendidikan terpadu, berakhlak mulia, cerdas, kreatif, berprestasi, dan berwawasan lingkungan untuk membentuk generasi masa depan yang unggul.' }}
                    </p>
                </div>

                <!-- Kolom 2: Menu Navigasi -->
                <div class="md:col-span-3 space-y-3">
                    <h3 class="font-bold text-sm tracking-wider uppercase">Menu</h3>
                    <ul class="space-y-2 text-sky-100 text-[11px]">
                        <li><a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ url('/profil') }}" class="hover:text-white transition">Profile Sekolah</a></li>
                        <li><a href="{{ route('public.guru') }}" class="hover:text-white transition">Staf & Guru</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-white transition">Berita</a></li>
                        <li><a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a></li>
                        <li><a href="{{ route('ekstrakurikuler') }}" class="hover:text-white transition">Ekstrakurikuler</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="md:col-span-3 space-y-3">
                    <h3 class="font-bold text-sm tracking-wider uppercase">Kontak</h3>
                    <div class="space-y-2 text-sky-100 text-[11px] leading-relaxed">
                        <p class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mt-0.5 flex-shrink-0"></i>
                            <span>{{ data_get($profil, 'alamat', 'Alamat sekolah belum diatur.') }}</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <i class="fas fa-phone-alt flex-shrink-0"></i>
                            <span>{{ data_get($profil, 'no_telepon') ?? (data_get($profil, 'telepon') ?? '-') }}</span>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Copyright Bawah -->
            <div class="text-center text-sky-100 text-[11px]">
                <p>&copy; {{ date('Y') }} {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}. Seluruh Hak Cipta Dilindungi.</p>
            </div>

        </div>
    </footer>

</body>

</html>