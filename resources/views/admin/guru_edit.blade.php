<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Guru</title>

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/42d5adcbca.js"
        crossorigin="anonymous"></script>
</head>

<body class="m-0 font-sans antialiased bg-gray-50 text-slate-500">

    <!-- SIDEBAR -->
    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full
        -translate-x-full flex-wrap items-center justify-between overflow-y-auto
        rounded-2xl bg-white p-0 shadow-none
        transition-transform duration-200 xl:left-0 xl:translate-x-0
        xl:bg-transparent">

        <div class="h-19.5">

            <a href="{{ route('admin.dashboard') }}"
                class="block px-8 py-6 text-sm whitespace-nowrap text-slate-700">

                <img src="{{ asset('img/logo-ct.png') }}"
                    class="inline h-full max-w-full max-h-8"
                    alt="logo">

                <span class="ml-1 font-semibold">
                    SMK YPC TASIKMALAYA
                </span>

            </a>

        </div>

        <hr>

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav">

            <ul class="flex flex-col pl-0 mb-0">

                <!-- DASHBOARD -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.dashboard') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-home text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Dashboard
                        </span>

                    </a>
                </li>

                <!-- PROFILE -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.profile') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-school text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Profile Sekolah
                        </span>

                    </a>
                </li>

                <!-- GURU AKTIF -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.guru') }}"
                        class="py-2.7 shadow-soft-xl text-sm my-0 mx-4
                        flex items-center whitespace-nowrap rounded-lg
                        bg-white px-4 font-semibold text-slate-700">

                        <div class="bg-gradient-to-tl from-purple-700 to-pink-500
                            shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg">

                            <i class="fas fa-chalkboard-teacher text-white text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Guru
                        </span>

                    </a>
                </li>

                <!-- SISWA -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.siswa') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-user-graduate text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Siswa
                        </span>

                    </a>
                </li>

                <!-- BERITA -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.berita') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-newspaper text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Berita
                        </span>

                    </a>
                </li>

                <!-- EKSTRAKURIKULER -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.ekstrakulikuler') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-users text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Ekstrakurikuler
                        </span>

                    </a>
                </li>

                <!-- GALERI -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.galeri') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-images text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Galeri
                        </span>

                    </a>
                </li>

            </ul>

        </div>

    </aside>


    <!-- KONTEN -->
    <main class="ease-soft-in-out xl:ml-68.5 relative min-h-screen
        bg-gray-50 transition-all duration-200">

        <!-- HEADER -->
        <div class="w-full px-6 mx-auto pt-10">

            <div class="flex items-center justify-between mb-6">

                <div>
                    <p class="text-sm text-slate-400">
                        Pages / Kelola Guru / Edit
                    </p>

                    <h4 class="font-bold text-slate-700">
                        Edit Data Guru
                    </h4>
                </div>

            </div>


            <!-- FORM -->
            <div class="relative flex flex-col min-w-0
                break-words bg-white border-0 shadow-soft-xl
                rounded-2xl p-6">

                <form action="{{ route('admin.guru.update', $guru->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <!-- NAMA -->
                    <div class="mb-5">

                        <label class="text-sm font-bold text-slate-700">
                            Nama Guru
                        </label>

                        <input type="text"
                            name="nama_guru"
                            value="{{ old('nama_guru', $guru->nama_guru) }}"
                            required
                            class="w-full px-4 py-3 mt-2 text-sm
                            border border-gray-300 rounded-lg"
                            placeholder="Masukkan nama guru">

                    </div>


                    <!-- NIP -->
                    <div class="mb-5">

                        <label class="text-sm font-bold text-slate-700">
                            NIP
                        </label>

                        <input type="text"
                            name="nip"
                            value="{{ old('nip', $guru->nip) }}"
                            required
                            class="w-full px-4 py-3 mt-2 text-sm
                            border border-gray-300 rounded-lg"
                            placeholder="Masukkan NIP">

                    </div>


                    <!-- MAPEL -->
                    <div class="mb-5">

                        <label class="text-sm font-bold text-slate-700">
                            Mata Pelajaran
                        </label>

                        <input type="text"
                            name="mapel"
                            value="{{ old('mapel', $guru->mapel) }}"
                            required
                            class="w-full px-4 py-3 mt-2 text-sm
                            border border-gray-300 rounded-lg"
                            placeholder="Masukkan mata pelajaran">

                    </div>


                    <!-- FOTO LAMA -->
                    <div class="mb-5">

                        <label class="text-sm font-bold text-slate-700">
                            Foto Guru Saat Ini
                        </label>

                        <div class="mt-2">

                            @if ($guru->foto)

                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                    style="width:100px;height:100px;object-fit:cover;border-radius:10px;">

                            @else

                                <p class="text-sm text-slate-400">
                                    Belum ada foto
                                </p>

                            @endif

                        </div>

                    </div>


                    <!-- FOTO BARU -->
                    <div class="mb-6">

                        <label class="text-sm font-bold text-slate-700">
                            Ganti Foto Guru
                        </label>

                        <input type="file"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full px-4 py-3 mt-2 text-sm
                            border border-gray-300 rounded-lg">

                    </div>


                    <!-- BUTTON -->
                    <div class="flex gap-3">

                        <a href="{{ route('admin.guru') }}"
                            class="px-5 py-3 text-xs font-bold text-white
                            uppercase rounded-lg
                            bg-gradient-to-tl from-gray-600 to-gray-400">

                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali

                        </a>

                        <button type="submit"
                            class="px-5 py-3 text-xs font-bold text-white
                            uppercase rounded-lg
                            bg-gradient-to-tl from-purple-700 to-pink-500">

                            <i class="fas fa-save mr-1"></i>
                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</body>

</html>
