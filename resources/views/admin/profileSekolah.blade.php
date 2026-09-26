<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <title>
        Profile Sekolah - {{ $profile->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet">

    <style>
        .modal-bg {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-bg.show {
            display: flex;
        }

        .modal-box {
            width: 100%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
        }
    </style>
</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

    <!-- SIDEBAR -->
    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full
        -translate-x-full flex-wrap items-center justify-between overflow-y-auto
        rounded-2xl border-0 bg-white p-0 antialiased shadow-none
        transition-transform duration-200 xl:left-0 xl:translate-x-0
        xl:bg-transparent">

        <div class="h-19.5">

            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
                href="{{ route('admin.dashboard') }}">

               <img
                    src="{{ !empty($profile->logo) && file_exists(storage_path('app/public/' . $profile->logo))
                        ? asset('storage/' . $profile->logo)
                        : asset('img/logo-ct.png') }}"
                    alt="Logo Sekolah"
                    style="
                        width:100%;
                        height:100%;
                        object-fit:contain;
                        padding:10px;
                    ">

            </a>

        </div>

        <hr class="h-px mt-0 bg-transparent
            bg-gradient-to-r from-transparent via-black/40 to-transparent">

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav">

            <ul class="flex flex-col pl-0 mb-0">

                <!-- DASHBOARD -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.dashboard') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4 transition-colors">

                        <div class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

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
                        class="py-2.7 shadow-soft-xl text-sm my-0 mx-4
                        flex items-center whitespace-nowrap rounded-lg
                        bg-white px-4 font-semibold text-slate-700">

                        <div class="bg-gradient-to-tl from-purple-700 to-pink-500
                            shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg">

                            <i class="fas fa-school text-white text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Profile Sekolah
                        </span>

                    </a>

                </li>

                <!-- GURU -->
                <li class="mt-0.5 w-full">

                    <a href="{{ route('admin.guru') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-chalkboard-teacher text-slate-800 text-xs"></i>

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


    <!-- KONTEN UTAMA -->
    <div class="ease-soft-in-out xl:ml-68.5 relative h-full
        bg-gray-50 transition-all duration-200">

        <!-- NAVBAR -->
        <nav class="absolute z-20 flex flex-wrap items-center
            justify-between w-full px-6 py-2 text-white">

            <div class="flex items-center justify-between
                w-full px-6 py-1 mx-auto">

                <div>

                    <ol class="flex flex-wrap pt-1 pl-2 pr-4
                        mr-12 bg-transparent rounded-lg">

                        <li class="leading-normal text-sm">

                            <a class="opacity-50"
                                href="{{ route('admin.dashboard') }}">

                                Pages

                            </a>

                        </li>

                        <li class="text-sm pl-2 capitalize leading-normal
                            before:float-left before:pr-2
                            before:content-['/']">

                            Profile Sekolah

                        </li>

                    </ol>

                    <h6 class="mb-2 ml-2 font-bold text-white capitalize">

                        Profile Sekolah

                    </h6>

                </div>

                <div class="flex items-center mt-2">

                    <input type="text"
                        class="pl-4 text-sm rounded-lg border
                        border-gray-300 bg-white py-2 pr-3 text-gray-700"
                        placeholder="Cari...">

                    <a href="#"
                        class="ml-5 font-semibold text-white text-sm">

                        <i class="fa fa-user mr-1"></i>
                        Masuk

                    </a>

                </div>

            </div>

        </nav>


        <!-- BANNER -->
        <div class="w-full px-6 mx-auto pt-20">

            <div class="relative flex items-center p-0 mt-6 overflow-hidden
                bg-center bg-cover min-h-75 rounded-2xl"
                style="
                    background-image:
                    url('{{ !empty($profile->foto)
                        ? asset('storage/' . $profile->foto)
                        : asset('img/curved-images/curved0.jpg') }}');
                ">

                <span class="absolute inset-0 z-10
                    bg-gradient-to-tl from-purple-700 to-pink-500
                    opacity-60">
                </span>

            </div>


            <!-- FOTO + NAMA -->
            <div class="relative flex flex-col min-w-0 p-4 mx-6 -mt-16
                overflow-hidden bg-white border-0 shadow-blur rounded-2xl z-20">

                <div class="flex items-center">

                    <!-- LOGO SEKOLAH -->
                    <div style="
                        position:relative;
                        width:120px;
                        height:120px;
                        min-width:120px;
                        border-radius:16px;
                        overflow:hidden;
                        box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);
                        border:3px solid #ffffff;
                        background:#f8fafc;
                    ">

                        <!-- FOTO -->
                        <img
                            src="{{ !empty($profile->logo) && file_exists(storage_path('app/public/' . $profile->logo))
                                ? asset('storage/' . $profile->logo)
                                : asset('img/logo-ct.png') }}"
                            alt="Logo Sekolah"
                            style="
                                width:100%;
                                height:100%;
                                object-fit:contain;
                                padding:10px;
                            ">

                        <!-- FORM UPLOAD SATU-SATUNYA -->
                        <form id="form-upload-foto"
                            action="{{ route('admin.profile.photo') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <input
                                type="file"
                                name="logo"
                                id="upload-logo-input"
                                accept="image/*"
                                style="display:none;"
                                onchange="document.getElementById('form-upload-foto').submit();">


                            <!-- TOMBOL GANTI FOTO -->
                            <label for="upload-logo-input"
                                style="
                                    position:absolute;
                                    inset:0;
                                    background:rgba(0,0,0,.6);
                                    color:white;
                                    display:flex;
                                    flex-direction:column;
                                    align-items:center;
                                    justify-content:center;
                                    opacity:0;
                                    cursor:pointer;
                                    transition:.2s;
                                "
                                onmouseover="this.style.opacity='1'"
                                onmouseout="this.style.opacity='0'">

                                <i class="fas fa-camera"
                                    style="font-size:20px;">
                                </i>

                                <span style="font-size:11px;">
                                    Ganti Foto
                                </span>

                            </label>

                        </form>

                    </div>


                    <!-- NAMA SEKOLAH -->
                    <div class="ml-5">

                        <h5 class="mb-1 font-bold text-slate-700 text-xl">

                            {{ $profile->nama_sekolah ?? 'Nama Sekolah Belum Diisi' }}

                        </h5>

                        <p class="mb-0 font-semibold leading-normal
                            text-sm text-slate-400">

                            NPSN:
                            {{ $profile->npsn ?? '-' }}

                            |

                            Kepala Sekolah:
                            {{ $profile->kepala_sekolah ?? '-' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- INFORMASI SEKOLAH -->
        <div class="w-full px-6 mx-auto mt-6">

            <div class="flex flex-wrap -mx-3">

                <div class="w-full px-3 lg:w-8/12">

                    <div class="relative flex flex-col h-full min-w-0
                        break-words bg-white border-0
                        shadow-soft-xl rounded-2xl p-6">

                        <!-- HEADER -->
                        <div class="flex items-center justify-between
                            pb-4 border-b border-gray-200">

                            <h6 class="font-bold text-slate-700 mb-0">
                                Informasi Sekolah
                            </h6>

                            <button type="button"
                                onclick="bukaModal()"
                                class="px-4 py-2 text-xs font-bold
                                text-white uppercase
                                bg-gradient-to-tl from-purple-700
                                to-pink-500 rounded-lg">

                                <i class="fas fa-edit mr-1"></i>
                                Edit Profile

                            </button>

                        </div>


                        <!-- DESKRIPSI -->
                        <div class="pt-4">

                            <p class="text-sm leading-normal
                                text-slate-500 mb-6">

                                {{ $profile->deskripsi ?? 'Deskripsi sekolah belum diisi.' }}

                            </p>


                            <div class="grid grid-cols-1 md:grid-cols-2
                                gap-x-8 gap-y-5">

                                <div>

                                    <span class="text-xs font-bold
                                        text-slate-400 uppercase">

                                        Kepala Sekolah

                                    </span>

                                    <p class="text-sm font-semibold
                                        text-slate-700 mt-1">

                                        {{ $profile->kepala_sekolah ?? '-' }}

                                    </p>

                                </div>


                                <div>

                                    <span class="text-xs font-bold
                                        text-slate-400 uppercase">

                                        NPSN

                                    </span>

                                    <p class="text-sm font-semibold
                                        text-slate-700 mt-1">

                                        {{ $profile->npsn ?? '-' }}

                                    </p>

                                </div>


                                <div>

                                    <span class="text-xs font-bold
                                        text-slate-400 uppercase">

                                        Tahun Berdiri

                                    </span>

                                    <p class="text-sm font-semibold
                                        text-slate-700 mt-1">

                                        {{ $profile->tahun_berdiri ?? '-' }}

                                    </p>

                                </div>


                                <div>

                                    <span class="text-xs font-bold
                                        text-slate-400 uppercase">

                                        Kontak / Telepon

                                    </span>

                                    <p class="text-sm font-semibold
                                        text-slate-700 mt-1">

                                        {{ $profile->kontak ?? '-' }}

                                    </p>

                                </div>

                            </div>


                            <!-- ALAMAT -->
                            <div class="mt-6">

                                <span class="text-xs font-bold
                                    text-slate-400 uppercase">

                                    Alamat

                                </span>

                                <p class="text-sm font-semibold
                                    text-slate-700 mt-1">

                                    {{ $profile->alamat ?? '-' }}

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- VISI MISI -->
                <div class="w-full px-3 mt-6 lg:w-4/12 lg:mt-0">

                    <div class="relative flex flex-col h-full min-w-0
                        break-words bg-white border-0
                        shadow-soft-xl rounded-2xl p-6">

                        <h6 class="font-bold text-slate-700 pb-4
                            border-b border-gray-200 mb-4">

                            Visi & Misi

                        </h6>

                        <div class="text-sm text-slate-600
                            whitespace-pre-line leading-relaxed">

                            {{ $profile->visi_misi ?? 'Visi & Misi belum diisi.' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- FOOTER -->
        <footer class="mt-8 px-6 pb-6">

            <div class="flex flex-wrap items-center
                justify-between px-6 py-5
                bg-white rounded-2xl shadow-soft-xl">

                <div class="text-sm text-slate-500">

                    © {{ date('Y') }}

                    <span class="font-semibold text-slate-700">

                        {{ $profile->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}

                    </span>

                    . Semua Hak Dilindungi.

                </div>

                <div class="text-sm text-slate-400">

                    Sistem Informasi Sekolah

                </div>

            </div>

        </footer>

    </div>


    <!-- MODAL EDIT PROFILE -->
    <div id="modalEdit" class="modal-bg">

        <div class="modal-box">

            <div class="flex items-center justify-between mb-6">

                <h5 class="font-bold text-lg text-slate-700">

                    Edit Profile Sekolah

                </h5>

                <button type="button"
                    onclick="tutupModal()"
                    class="text-xl text-slate-400">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- FORM EDIT -->
            <form action="{{ route('admin.profile') }}" method="POST">

                @csrf
                @method('PUT')


                <!-- NAMA -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Nama Sekolah
                    </label>

                    <input type="text"
                        name="nama_sekolah"
                        value="{{ old('nama_sekolah', $profile->nama_sekolah ?? '') }}"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300"
                        required>

                </div>


                <!-- NPSN -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        NPSN
                    </label>

                    <input type="text"
                        name="npsn"
                        value="{{ old('npsn', $profile->npsn ?? '') }}"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300">

                </div>


                <!-- KEPALA -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Kepala Sekolah
                    </label>

                    <input type="text"
                        name="kepala_sekolah"
                        value="{{ old('kepala_sekolah', $profile->kepala_sekolah ?? '') }}"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300">

                </div>


                <!-- TAHUN -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Tahun Berdiri
                    </label>

                    <input type="number"
                        name="tahun_berdiri"
                        value="{{ old('tahun_berdiri', $profile->tahun_berdiri ?? '') }}"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300">

                </div>


                <!-- KONTAK -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Kontak / Telepon
                    </label>

                    <input type="text"
                        name="kontak"
                        value="{{ old('kontak', $profile->kontak ?? '') }}"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300">

                </div>


                <!-- ALAMAT -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Alamat
                    </label>

                    <textarea name="alamat"
                        rows="3"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300">{{ old('alamat', $profile->alamat ?? '') }}</textarea>

                </div>


                <!-- DESKRIPSI -->
                <div class="mb-4">

                    <label class="text-sm font-bold text-slate-600">
                        Deskripsi Sekolah
                    </label>

                    <textarea name="deskripsi"
                        rows="5"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300"
                        placeholder="Masukkan deskripsi sekolah...">{{ old('deskripsi', $profile->deskripsi ?? '') }}</textarea>

                </div>


                <!-- VISI MISI -->
                <div class="mb-6">

                    <label class="text-sm font-bold text-slate-600">
                        Visi & Misi
                    </label>

                    <textarea name="visi_misi"
                        rows="6"
                        class="w-full mt-2 px-4 py-3 rounded-lg
                        border border-gray-300"
                        placeholder="Masukkan visi dan misi sekolah...">{{ old('visi_misi', $profile->visi_misi ?? '') }}</textarea>

                </div>


                <!-- BUTTON -->
                <div class="flex justify-end gap-3">

                    <button type="button"
                        onclick="tutupModal()"
                        class="px-5 py-3 rounded-lg
                        bg-gray-200 text-slate-700 font-bold">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-lg
                        bg-gradient-to-tl from-purple-700
                        to-pink-500 text-white font-bold">

                        <i class="fas fa-save mr-1"></i>

                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- JAVASCRIPT -->
    <script>

        function bukaModal() {
            document.getElementById('modalEdit').classList.add('show');
        }

        function tutupModal() {
            document.getElementById('modalEdit').classList.remove('show');
        }

        document.getElementById('modalEdit').addEventListener(
            'click',
            function(event) {

                if (event.target === this) {
                    tutupModal();
                }

            }
        );

    </script>

</body>

</html>
