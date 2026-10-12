<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

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
                <nav class="hidden md:flex items-center space-x-6 text-xs font-semibold">
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Beranda</a>
                    <a href="{{ url('/profil') }}" class="{{ request()->is('profil') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Profil</a>
                    <a href="{{ route('public.guru') }}" class="{{ request()->routeIs('public.guru') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Guru</a>
                    <a href="{{ route('public.siswa') }}" class="{{ request()->routeIs('public.siswa') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Siswa</a>
                    <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Berita</a>
                    <a href="{{ route('ekstrakurikuler') }}" class="{{ request()->routeIs('ekstrakurikuler') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Ekstrakurikuler</a>
                    <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Galeri</a>
                    <a href="{{ route('public.data-profile') }}" class="{{ request()->routeIs('public.data-profile') ? 'text-sky-600 font-bold' : 'text-gray-700 hover:text-sky-600' }} transition">Data Profile</a>
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
            <a href="{{ url('/') }}" @click="open = false"
                class="block py-1 {{ request()->is('/') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Beranda</a>
            <a href="{{ url('/#sambutan') }}" @click="open = false"
                class="block py-1 text-gray-700 hover:text-sky-600">Sambutan</a>
            <a href="{{ url('/profil') }}" @click="open = false"
                class="block py-1 {{ request()->is('profil') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Profil</a>
            <a href="{{ route('public.guru') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('public.guru') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Guru</a>
            <a href="{{ route('public.siswa') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('public.siswa') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Siswa</a>
            <a href="{{ route('berita') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('berita') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Berita</a>
            <a href="{{ route('ekstrakurikuler') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('ekstrakurikuler') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Ekstrakurikuler</a>
            <a href="{{ route('galeri') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('galeri') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Galeri</a>
            <a href="{{ route('public.data-profile') }}" @click="open = false"
                class="block py-1 {{ request()->routeIs('public.data-profile') ? 'text-sky-600 font-bold' : 'text-gray-700' }} hover:text-sky-600">Data Profile</a>
            <div class="pt-2 border-t">
                @auth
                    <a href="{{ route('admin.dashboard') }}"
                        class="block text-center bg-sky-600 text-white text-xs py-2 rounded font-semibold">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}"
                        class="block text-center bg-sky-600 text-white text-xs py-2 rounded font-semibold">Masuk Admin</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    @php
        $fotoDb = data_get($profil, 'foto_gedung') ?? (data_get($profil, 'foto') ?? data_get($profil, 'gambar'));
        if ($fotoDb && file_exists(public_path('storage/' . $fotoDb))) {
            $bgUrl = asset('storage/' . $fotoDb);
        } else {
            $bgUrl = asset('storage/sd.jpg');
        }
    @endphp

    <section id="beranda" class="relative bg-cover bg-center text-white py-20 md:py-28"
        style="background-image: url('{{ $bgUrl }}');">
        <div class="absolute inset-0 bg-sky-900/80"></div>
        <div class="relative max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="md:col-span-8 space-y-4">
                <span class="inline-block bg-amber-400 text-sky-950 text-xs font-bold px-3 py-1 rounded shadow-sm">
                    Selamat Datang di Website Resmi
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white leading-tight drop-shadow-sm">
                    {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}
                </h1>
                <p class="text-sky-100 text-sm md:text-base leading-relaxed max-w-2xl">
                    Mewujudkan generasi penerus bangsa yang berakhlak mulia, cerdas, kreatif, berprestasi, dan
                    berwawasan lingkungan.
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <a href="#sambutan"
                        class="bg-amber-400 hover:bg-amber-500 text-sky-950 text-xs font-bold px-5 py-2.5 rounded shadow transition">
                        Lihat Sambutan
                    </a>
                    <a href="{{ route('berita') }}"
                        class="bg-sky-700 hover:bg-sky-800 text-white text-xs font-semibold px-5 py-2.5 rounded border border-sky-500/50 transition">
                        Berita Terbaru
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIK -->
    <section class="max-w-7xl mx-auto px-4 -mt-8 relative z-10">
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- KOTAK 1: SISWA / SISWI -->
                <div class="flex items-center p-4 bg-sky-50 rounded-lg border border-sky-100">
                    <div class="p-3 rounded-lg bg-sky-600 text-white mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalSiswa ?? 0 }}</h3>
                        <p class="text-xs font-bold tracking-wider text-sky-700 uppercase mt-0.5">SISWA / SISWI</p>
                    </div>
                </div>

                <!-- KOTAK 2: TENAGA PENDIDIK -->
                <div class="flex items-center p-4 bg-sky-50 rounded-lg border border-sky-100">
                    <div class="p-3 rounded-lg bg-sky-600 text-white mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V11m0 0h4m-4 0H9">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalGuru ?? 0 }}</h3>
                        <p class="text-xs font-bold tracking-wider text-sky-700 uppercase mt-0.5">TENAGA PENDIDIK</p>
                    </div>
                </div>

                <!-- KOTAK 3: EKSTRAKURIKULER -->
                <div class="flex items-center p-4 bg-sky-50 rounded-lg border border-sky-100">
                    <div class="p-3 rounded-lg bg-sky-600 text-white mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalEsktrakurikuler ?? 0 }}</h3>
                        <p class="text-xs font-bold tracking-wider text-sky-700 uppercase mt-0.5">EKSTRAKURIKULER</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION SAMBUTAN KEPALA SEKOLAH -->
    <section id="sambutan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- FOTO KEPALA SEKOLAH -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md overflow-hidden rounded-2xl shadow-xl bg-slate-100 border border-slate-200">
                        @if (!empty($profil->foto_kepala_sekolah) && file_exists(public_path('storage/' . $profil->foto_kepala_sekolah)))
                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah"
                                class="w-full h-[450px] object-cover object-top">
                        @else
                            <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=600&auto=format&fit=crop"
                                alt="Kepala Sekolah" class="w-full h-[450px] object-cover object-top">
                        @endif
                    </div>
                </div>

                <!-- ISI SAMBUTAN -->
                <div class="lg:col-span-7 space-y-4 text-slate-700">
                    <h3 class="text-2xl sm:text-3xl font-bold text-sky-900 tracking-tight">
                        Assalamu'alaikum Warahmatullahi Wabarakatuh
                    </h3>

                    <div class="space-y-3 leading-relaxed text-slate-600 text-justify">
                        @if (!empty($profil->sambutan_kepala_sekolah))
                            {!! nl2br(e($profil->sambutan_kepala_sekolah)) !!}
                        @else
                            <p>Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya sehingga website resmi sekolah kami dapat menjadi sarana informasi dan komunikasi bagi seluruh warga sekolah serta masyarakat.</p>
                            <p>Selamat datang di website resmi kami. Website ini diharapkan dapat memberikan informasi mengenai profil sekolah, kegiatan peserta didik, prestasi, tenaga pendidik, serta berbagai program sekolah kepada masyarakat secara mudah dan transparan.</p>
                        @endif
                    </div>

                    <div class="pt-4 border-t border-slate-100 mt-6">
                        <p class="font-bold text-sky-900 text-lg">
                            {{ $profil->nama_kepala_sekolah ?? 'H. Nama Kepala Sekolah, M.Pd.' }}
                        </p>
                        <p class="text-sm text-slate-500 font-medium">Kepala Sekolah</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION TENAGA PENDIDIK -->
    <section id="guru" class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Tenaga Pendidik</h2>
                <div class="w-12 h-1 bg-sky-600 mx-auto mt-2 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 justify-center">
                @foreach ($guru->take(4) as $item)
                    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl text-center p-5 flex flex-col items-center">
                        @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
                            <img src="{{ asset('storage/' . $item->foto) }}" class="rounded-full mb-3 w-24 h-24 object-cover" alt="{{ $item->nama_guru }}">
                        @else
                            <div class="rounded-full mb-3 w-24 h-24 bg-sky-600 text-white flex items-center justify-center">
                                <i class="fa-solid fa-user text-3xl"></i>
                            </div>
                        @endif
                        <h3 class="font-bold text-gray-900 text-base mb-1">{{ $item->nama_guru }}</h3>
                        <span class="text-xs font-semibold text-sky-600 uppercase tracking-wider">{{ $item->mapel ?? 'Pengajar' }}</span>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('public.guru') }}"
                    class="inline-flex items-center bg-sky-600 hover:bg-sky-700 text-white text-xs font-semibold px-5 py-2.5 rounded-full shadow-sm transition">
                    Lihat Semua Guru <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION BERITA -->
    <section id="berita" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Berita & Informasi</h2>
                <div class="w-12 h-1 bg-sky-600 mx-auto mt-2 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($berita->take(3) as $item)
                    <div class="border rounded-xl overflow-hidden shadow-sm hover:shadow-md transition flex flex-col justify-between">
                        <div>
                            @if ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-newspaper text-4xl"></i>
                                </div>
                            @endif
                            <div class="p-4">
                                <span class="text-[10px] font-semibold text-sky-600 bg-sky-50 px-2 py-0.5 rounded mb-2 inline-block">
                                    {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d M Y') }}
                                </span>
                                <h3 class="font-bold text-base text-gray-800 my-1 line-clamp-2">
                                    {{ $item->judul ?? 'Tanpa Judul' }}</h3>
                                <p class="text-xs text-gray-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($item->isi ?? ''), 100) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-400 text-sm">Belum ada berita dipublikasikan.</p>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('berita') }}"
                    class="inline-flex items-center bg-sky-600 hover:bg-sky-700 text-white text-xs font-semibold px-5 py-2.5 rounded-full shadow-sm transition">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION EKSTRAKURIKULER -->
    <section id="ekskul" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Ekstrakurikuler</h2>
                <div class="w-12 h-1 bg-sky-600 mx-auto mt-2 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($ekstrakurikuler as $item)
                    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm flex items-center gap-4 hover:shadow-md transition">
                        <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 bg-sky-50 border border-sky-100 flex items-center justify-center">
                            @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_ekskul }}" class="w-full h-full object-cover">
                            @elseif ($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_ekskul }}" class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-users text-sky-600 text-2xl"></i>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base leading-snug">
                                {{ $item->nama_ekskul ?? $item->nama }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Pembina: {{ $item->pembina ?? ($item->nama_pembina ?? '-') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('ekstrakurikuler') }}"
                    class="inline-flex items-center bg-sky-600 hover:bg-sky-700 text-white text-xs font-semibold px-5 py-2.5 rounded-full shadow-sm transition">
                    Lihat Semua Ekstrakurikuler <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION GALERI KEGIATAN DI BERANDA -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Galeri Kegiatan</h2>
                <div class="w-12 h-1 bg-sky-600 mx-auto mt-2 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($galeri as $item)
                    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all">

                        <!-- MEDIA AREA LANDSCAPE (ASPECT 16:9) -->
                        <div class="relative w-full aspect-video bg-slate-900 flex items-center justify-center overflow-hidden">
                            @if (($item->kategori ?? '') == 'Video')
                                @if (\Illuminate\Support\Str::contains($item->file, ['youtube.com', 'youtu.be']))
                                    @php
                                        $youtubeId = '';
                                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $item->file, $match)) {
                                            $youtubeId = $match[1];
                                        }
                                    @endphp

                                    @if ($youtubeId)
                                        <iframe class="w-full h-full object-cover" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
                                    @else
                                        <a href="{{ $item->file }}" target="_blank" class="text-white flex flex-col items-center gap-2 hover:text-sky-400 transition">
                                            <i class="fab fa-youtube text-4xl text-red-600"></i>
                                            <span class="text-xs font-semibold">Tonton di YouTube</span>
                                        </a>
                                    @endif
                                @else
                                    <video controls class="w-full h-full object-cover">
                                        <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                @endif
                            @else
                                @if ($item->file && file_exists(public_path('storage/' . $item->file)))
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                                @else
                                    <div class="text-gray-400 text-xs flex flex-col items-center gap-1">
                                        <i class="fas fa-image text-3xl"></i>
                                        <span>Foto tidak ditemukan</span>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <!-- JUDUL GALERI -->
                        <div class="p-4 bg-white">
                            <h3 class="font-bold text-gray-900 text-sm line-clamp-1">
                                {{ $item->judul }}
                            </h3>
                            @if ($item->keterangan)
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">
                                    {{ $item->keterangan }}
                                </p>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- TOMBOL LIHAT SEMUA GALERI -->
            <div class="text-center mt-10">
                <a href="{{ route('galeri') }}"
                    class="inline-flex items-center bg-sky-600 hover:bg-sky-700 text-white text-xs font-semibold px-5 py-2.5 rounded-full shadow-sm transition">
                    Lihat Semua Galeri <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER UTAMA -->
    <footer class="bg-sky-600 text-white text-xs py-12 border-t border-sky-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8 pb-8 border-b border-sky-500/50">

                <div class="md:col-span-6 space-y-3">
                    <h3 class="font-bold text-sm tracking-wider uppercase">
                        {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}
                    </h3>
                    <p class="text-sky-100 text-[11px] leading-relaxed max-w-lg">
                        {{ data_get($profil, 'deskripsi') ?? 'Website resmi sekolah yang mengunggulkan pendidikan terpadu, berakhlak mulia, cerdas, kreatif, berprestasi, dan berwawasan lingkungan.' }}
                    </p>
                </div>

                <div class="md:col-span-3 space-y-3">
                    <h3 class="font-bold text-sm tracking-wider uppercase">Menu</h3>
                    <ul class="space-y-2 text-sky-100 text-[11px]">
                        <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ url('/profil') }}" class="hover:text-white transition">Profile Sekolah</a></li>
                        <li><a href="{{ route('public.guru') }}" class="hover:text-white transition">Staf & Guru</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-white transition">Berita</a></li>
                        <li><a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a></li>
                        <li><a href="{{ route('ekstrakurikuler') }}" class="hover:text-white transition">Ekstrakurikuler</a></li>
                    </ul>
                </div>

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

            <div class="text-center text-sky-100 text-[11px]">
                <p>&copy; {{ date('Y') }} {{ data_get($profil, 'nama_sekolah', 'SDN PASIRSALAM') }}. Seluruh Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

</body>

</html>