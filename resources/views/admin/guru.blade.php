<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <title>Kelola Guru</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet">

    <style>
        .foto-guru {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
        }

        .foto-default {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
        }
    </style>
</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">

    <!-- ================= SIDEBAR ================= -->

    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full
        -translate-x-full flex-wrap items-center justify-between overflow-y-auto
        rounded-2xl border-0 bg-white p-0 antialiased shadow-none
        transition-transform duration-200 xl:left-0 xl:translate-x-0
        xl:bg-transparent">

        <!-- LOGO -->
        <div class="h-19.5">

            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
                href="{{ route('admin.dashboard') }}">

                <img src="{{ asset('img/logo-ct.png') }}"
                    class="inline h-full max-w-full max-h-8"
                    alt="logo">

                <span class="ml-1 font-semibold">
                    SMK YPC TASIKMALAYA
                </span>

            </a>

        </div>

        <hr class="h-px mt-0 bg-transparent
            bg-gradient-to-r from-transparent via-black/40 to-transparent">

        <!-- MENU -->
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav">

            <ul class="flex flex-col pl-0 mb-0">

                <!-- DASHBOARD -->
                <li class="mt-0.5 w-full">

                    <a href="{{ route('admin.dashboard') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
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
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

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

                        <div
                            class="bg-gradient-to-tl from-purple-700 to-pink-500
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

                    <a href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-user-graduate text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Siswa
                        </span>

                    </a>

                </li>

                <!-- BERITA -->
                <li class="mt-0.5 w-full">

                    <a href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-newspaper text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Berita
                        </span>

                    </a>

                </li>

                <!-- EKSTRAKURIKULER -->
                <li class="mt-0.5 w-full">

                    <a href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

                            <i class="fas fa-users text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Ekstrakurikuler
                        </span>

                    </a>

                </li>

                <!-- GALERI -->
                <li class="mt-0.5 w-full">

                    <a href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center
                            rounded-lg bg-white shadow-soft-2xl">

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


    <!-- ================= KONTEN ================= -->

    <main
        class="ease-soft-in-out xl:ml-68.5 relative h-full
        max-h-screen bg-gray-50 transition-all duration-200">

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

                        <li
                            class="text-sm pl-2 capitalize leading-normal
                            before:float-left before:pr-2
                            before:content-['/']">

                            Kelola Guru

                        </li>

                    </ol>

                    <h6 class="mb-2 ml-2 font-bold text-white capitalize">
                        Kelola Guru
                    </h6>

                </div>

            </div>

        </nav>


        <!-- ================= BANNER ================= -->

        <div class="w-full px-6 mx-auto pt-20">

            <div
                class="relative flex items-center p-0 mt-6 overflow-hidden
                bg-center bg-cover min-h-75 rounded-2xl">

                <img src="{{ asset('img/curved-images/curved0.jpg') }}"
                    class="absolute inset-0 w-full h-full object-cover"
                    alt="Banner">

                <span
                    class="absolute inset-0 z-10
                    bg-gradient-to-tl from-purple-700 to-pink-500
                    opacity-60">
                </span>

                <div class="relative z-20 px-8">

                    <h4 class="text-white font-bold text-2xl">
                        Kelola Guru
                    </h4>

                    <p class="text-white">
                        Data guru dan tenaga pendidik SMK YPC TASIKMALAYA
                    </p>

                </div>

            </div>

        </div>


        <!-- ================= DATA GURU ================= -->

        <div class="w-full px-6 mx-auto mt-6">

            <div
                class="relative flex flex-col min-w-0
                break-words bg-white border-0 shadow-soft-xl
                rounded-2xl">

                <!-- HEADER -->

                <div class="flex items-center justify-between
                    p-6 pb-4 border-b border-gray-200">

                    <div>

                        <h6 class="font-bold text-slate-700 mb-1">
                            Data Guru
                        </h6>

                        <p class="text-sm text-slate-400 mb-0">
                            Daftar guru yang terdaftar
                        </p>

                    </div>


                    <!-- TOMBOL TAMBAH GURU -->

                    <a href="{{ route('admin.guru.create') }}"
                        class="px-5 py-3 text-xs font-bold
                        text-white uppercase rounded-lg
                        bg-gradient-to-tl from-purple-700 to-pink-500">

                        <i class="fas fa-plus mr-1"></i>
                        Tambah Guru

                    </a>

                </div>


                <!-- SUCCESS -->

                @if (session('success'))

                    <div
                        class="mx-6 mt-4 px-4 py-3
                        text-sm text-green-700
                        bg-green-100 rounded-lg">

                        <i class="fas fa-check-circle mr-2"></i>

                        {{ session('success') }}

                    </div>

                @endif


                <!-- ERROR -->

                @if ($errors->any())

                    <div
                        class="mx-6 mt-4 px-4 py-3
                        text-sm text-red-700
                        bg-red-100 rounded-lg">

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif


                <!-- ================= TABLE ================= -->

                <div class="flex-auto p-6">

                    <div class="overflow-x-auto">

                        <table class="items-center w-full mb-0 align-top border-collapse">

                            <thead>

                                <tr>

                                    <th
                                        class="px-6 py-3 text-left
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        No
                                    </th>

                                    <th
                                        class="px-6 py-3 text-left
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        Foto
                                    </th>

                                    <th
                                        class="px-6 py-3 text-left
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        Nama Guru
                                    </th>

                                    <th
                                        class="px-6 py-3 text-left
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        NIP
                                    </th>

                                    <th
                                        class="px-6 py-3 text-left
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        Mata Pelajaran
                                    </th>

                                    <th
                                        class="px-6 py-3 text-center
                                        text-xxs font-bold uppercase
                                        text-slate-400">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($guru as $item)

                                    <tr>

                                        <!-- NO -->

                                        <td class="px-6 py-4">

                                            <p
                                                class="mb-0 text-sm
                                                font-semibold text-slate-700">

                                                {{ $loop->iteration }}

                                            </p>

                                        </td>


                                        <!-- FOTO -->

                                        <td class="px-6 py-4">

                                            @if ($item->foto)

                                                <img
                                                    src="{{ asset('storage/' . $item->foto) }}"
                                                    alt="Foto Guru"
                                                    class="foto-guru">

                                            @else

                                                <div class="foto-default">

                                                    <i class="fas fa-user"></i>

                                                </div>

                                            @endif

                                        </td>


                                        <!-- NAMA -->

                                        <td class="px-6 py-4">

                                            <p
                                                class="mb-0 text-sm
                                                font-semibold text-slate-700">

                                                {{ $item->nama_guru }}

                                            </p>

                                        </td>


                                        <!-- NIP -->

                                        <td class="px-6 py-4">

                                            <p class="mb-0 text-sm text-slate-500">

                                                {{ $item->nip }}

                                            </p>

                                        </td>


                                        <!-- MAPEL -->

                                        <td class="px-6 py-4">

                                            <p class="mb-0 text-sm text-slate-500">

                                                {{ $item->mapel }}

                                            </p>

                                        </td>


                                        <!-- AKSI -->

                                        <td class="px-6 py-4 text-center">

                                            <div
                                                class="flex items-center
                                                justify-center gap-2">

                                                <!-- EDIT -->

                                                <a
                                                    href="{{ route('admin.guru.edit', $item->id) }}"
                                                    class="px-3 py-2 text-xs
                                                    font-bold text-white
                                                    rounded-lg bg-blue-500">

                                                    <i class="fas fa-edit"></i>

                                                </a>


                                                <!-- HAPUS -->

                                                <form
                                                    action="{{ route('admin.guru.destroy', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data guru ini?');">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="px-3 py-2 text-xs
                                                        font-bold text-white
                                                        rounded-lg bg-red-500">

                                                        <i class="fas fa-trash"></i>

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="6"
                                            class="px-6 py-10 text-center">

                                            <i
                                                class="fas fa-user-slash
                                                text-4xl text-slate-300">
                                            </i>

                                            <p
                                                class="mt-3 mb-0
                                                text-sm text-slate-400">

                                                Belum ada data guru.

                                            </p>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </main>


    <!-- JAVASCRIPT -->

    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('js/soft-ui-dashboard-tailwind.js') }}"></script>

</body>

</html>
