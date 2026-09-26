<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('img/apple-icon.png') }}">

    <link rel="icon" type="image/png"
        href="{{ asset('img/favicon.png') }}">

    <title>Tambah Guru</title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
        rel="stylesheet">

    <script
        src="https://kit.fontawesome.com/42d5adcbca.js"
        crossorigin="anonymous">
    </script>

    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css') }}" rel="stylesheet">

    <style>
        .preview-foto {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>


<body class="m-0 font-sans antialiased font-normal text-base
leading-default bg-gray-50 text-slate-500">


    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4
        block w-full -translate-x-full flex-wrap items-center
        justify-between overflow-y-auto rounded-2xl border-0
        bg-white p-0 antialiased shadow-none transition-transform
        duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">


        <!-- LOGO -->

        <div class="h-19.5">

            <a
                class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
                href="{{ route('admin.dashboard') }}">

                <img
                    src="{{ asset('img/logo-ct.png') }}"
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

        <div class="items-center block w-auto max-h-screen
            overflow-auto h-sidenav">

            <ul class="flex flex-col pl-0 mb-0">


                <!-- DASHBOARD -->

                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-home
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Dashboard
                        </span>

                    </a>

                </li>


                <!-- PROFILE SEKOLAH -->

                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.profile') }}"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-school
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Profile Sekolah
                        </span>

                    </a>

                </li>


                <!-- KELOLA GURU AKTIF -->

                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.guru') }}"
                        class="py-2.7 shadow-soft-xl text-sm my-0 mx-4
                        flex items-center whitespace-nowrap rounded-lg
                        bg-white px-4 font-semibold text-slate-700">

                        <div class="bg-gradient-to-tl
                            from-purple-700 to-pink-500
                            shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg">

                            <i class="fas fa-chalkboard-teacher
                                text-white text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Guru
                        </span>

                    </a>

                </li>


                <!-- KELOLA SISWA -->

                <li class="mt-0.5 w-full">

                    <a
                        href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-user-graduate
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Siswa
                        </span>

                    </a>

                </li>


                <!-- KELOLA BERITA -->

                <li class="mt-0.5 w-full">

                    <a
                        href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-newspaper
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Berita
                        </span>

                    </a>

                </li>


                <!-- EKSTRAKURIKULER -->

                <li class="mt-0.5 w-full">

                    <a
                        href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-users
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Ekstrakurikuler
                        </span>

                    </a>

                </li>


                <!-- GALERI -->

                <li class="mt-0.5 w-full">

                    <a
                        href="#"
                        class="py-2.7 text-sm my-0 mx-4 flex items-center
                        whitespace-nowrap px-4">

                        <div class="mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg
                            bg-white shadow-soft-2xl">

                            <i class="fas fa-images
                                text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Galeri
                        </span>

                    </a>

                </li>

            </ul>

        </div>

    </aside>



    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full
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

                            <a
                                class="opacity-50"
                                href="{{ route('admin.dashboard') }}">

                                Pages

                            </a>

                        </li>

                        <li class="text-sm pl-2 capitalize
                            leading-normal
                            before:float-left
                            before:pr-2
                            before:content-['/']">

                            <a href="{{ route('admin.guru') }}">
                                Kelola Guru
                            </a>

                        </li>

                        <li class="text-sm pl-2 capitalize
                            leading-normal
                            before:float-left
                            before:pr-2
                            before:content-['/']">

                            Tambah Guru

                        </li>

                    </ol>


                    <h6 class="mb-2 ml-2 font-bold text-white capitalize">

                        Tambah Guru

                    </h6>

                </div>

            </div>

        </nav>



        <!-- ================================================= -->
        <!-- FORM TAMBAH GURU -->
        <!-- ================================================= -->

        <div class="w-full px-6 mx-auto pt-20">


            <div class="relative flex flex-col min-w-0
                break-words bg-white border-0 shadow-soft-xl
                rounded-2xl">


                <!-- HEADER -->

                <div class="p-6 border-b border-gray-200">

                    <h5 class="font-bold text-slate-700 mb-1">

                        Tambah Data Guru

                    </h5>

                    <p class="text-sm text-slate-400 mb-0">

                        Isi data guru di bawah ini

                    </p>

                </div>



                <!-- PESAN ERROR -->

                @if($errors->any())

                    <div class="mx-6 mt-5 px-4 py-3
                        text-sm text-red-700 bg-red-100 rounded-lg">

                        @foreach($errors->all() as $error)

                            <div>
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif



                <!-- FORM -->

                <div class="p-6">

                    <form
                        action="{{ route('admin.guru.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        <!-- NAMA GURU -->

                        <div class="mb-5">

                            <label class="text-sm font-bold
                                text-slate-700">

                                Nama Guru

                            </label>

                            <input
                                type="text"
                                name="nama_guru"
                                value="{{ old('nama_guru') }}"
                                required
                                class="w-full px-4 py-3 mt-2
                                text-sm border border-gray-300
                                rounded-lg focus:outline-none"
                                placeholder="Masukkan nama guru">

                        </div>



                        <!-- NIP -->

                        <div class="mb-5">

                            <label class="text-sm font-bold
                                text-slate-700">

                                NIP

                            </label>

                            <input
                                type="text"
                                name="nip"
                                value="{{ old('nip') }}"
                                required
                                class="w-full px-4 py-3 mt-2
                                text-sm border border-gray-300
                                rounded-lg focus:outline-none"
                                placeholder="Masukkan NIP">

                        </div>



                        <!-- MATA PELAJARAN -->

                        <div class="mb-5">

                            <label class="text-sm font-bold
                                text-slate-700">

                                Mata Pelajaran

                            </label>

                            <input
                                type="text"
                                name="mapel"
                                value="{{ old('mapel') }}"
                                required
                                class="w-full px-4 py-3 mt-2
                                text-sm border border-gray-300
                                rounded-lg focus:outline-none"
                                placeholder="Masukkan mata pelajaran">

                        </div>



                        <!-- FOTO -->

                        <div class="mb-5">

                            <label class="text-sm font-bold
                                text-slate-700">

                                Foto Guru

                            </label>

                            <input
                                type="file"
                                name="foto"
                                id="foto"
                                accept=".jpg,.jpeg,.png,.webp"
                                required
                                class="w-full px-4 py-3 mt-2
                                text-sm border border-gray-300
                                rounded-lg">

                            <img
                                id="preview"
                                class="preview-foto"
                                alt="Preview Foto">

                        </div>



                        <!-- BUTTON -->

                        <div class="flex gap-3 mt-6">


                            <!-- SIMPAN -->

                            <button
                                type="submit"
                                class="px-5 py-3 text-xs font-bold
                                text-white uppercase rounded-lg
                                bg-gradient-to-tl
                                from-green-600 to-green-400">

                                <i class="fas fa-save mr-1"></i>

                                Simpan

                            </button>



                            <!-- KEMBALI -->

                            <a
                                href="{{ route('admin.guru') }}"
                                class="px-5 py-3 text-xs font-bold
                                text-white uppercase rounded-lg
                                bg-gradient-to-tl
                                from-gray-600 to-gray-400">

                                <i class="fas fa-arrow-left mr-1"></i>

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </main>



    <!-- JAVASCRIPT -->

    <script
        src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}">
    </script>

    <script
        src="{{ asset('js/soft-ui-dashboard-tailwind.js') }}">
    </script>


    <!-- PREVIEW FOTO -->

    <script>

        document.getElementById('foto').addEventListener('change', function(event) {

            const file = event.target.files[0];

            const preview = document.getElementById('preview');

            if (file) {

                preview.src = URL.createObjectURL(file);

                preview.style.display = 'block';

            } else {

                preview.style.display = 'none';

            }

        });

    </script>

</body>

</html>
