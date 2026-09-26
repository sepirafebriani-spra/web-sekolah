<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon"
          sizes="76x76"
          href="{{ asset('img/apple-icon.png') }}">

    <link rel="icon"
          type="image/png"
          href="{{ asset('img/favicon.png') }}">

    <title>Dashboard - SMK YPC TASIKMALAYA</title>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
        rel="stylesheet">

    <!-- Font Awesome -->
    <script
        src="https://kit.fontawesome.com/42d5adcbca.js"
        crossorigin="anonymous">
    </script>

    <!-- Nucleo Icons -->
    <link
        href="{{ asset('css/nucleo-icons.css') }}"
        rel="stylesheet">

    <link
        href="{{ asset('css/nucleo-svg.css') }}"
        rel="stylesheet">

    <!-- Main CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/main.css') }}">

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Soft UI -->
    <link
        href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}"
        rel="stylesheet">
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    <!-- SIDEBAR -->
    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full
        -translate-x-full flex-wrap items-center justify-between overflow-y-auto
        rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform
        duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">

        <!-- LOGO -->
        <div class="h-19.5">

            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
                href="{{ route('admin.dashboard') }}">

                <img
                    src="{{ !empty($profile->logo) && file_exists(storage_path('app/public/' . $profile->logo))
                        ? asset('storage/' . $profile->logo)
                        : asset('img/logo-ct.png') }}"
                    alt="Logo Sekolah"
                    style="
                        width: 55px;
                        height: 55px;
                        object-fit: contain;
                        display: inline-block;
                        vertical-align: middle;
                    ">

                <span class="ml-1 font-semibold">
                    SMK YPC TASIKMALAYA
                </span>

            </a>

        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r
        from-transparent via-black/40 to-transparent">

        <!-- MENU -->
        <div
            class="items-center block w-auto max-h-screen overflow-auto
            h-sidenav grow basis-full">

            <ul class="flex flex-col pl-0 mb-0">

                <!-- DASHBOARD -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0
                        mx-4 flex items-center whitespace-nowrap rounded-lg
                        bg-white px-4 font-semibold text-slate-700
                        transition-colors">

                        <div
                            class="bg-gradient-to-tl from-purple-700 to-pink-500
                            shadow-soft-2xl mr-2 flex h-8 w-8 items-center
                            justify-center rounded-lg">

                            <i class="fa fa-home text-white text-xs"></i>

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
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-school text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Profile Sekolah
                        </span>

                    </a>

                </li>


                <!-- KELOLA GURU -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.guru') }}"
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-credit-card text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Guru
                        </span>

                    </a>

                </li>


                <!-- KELOLA SISWA -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.siswa.index') }}"
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-cube text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Siswa
                        </span>

                    </a>

                </li>


                <!-- KELOLA BERITA -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.berita') }}"
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-cog text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Berita
                        </span>

                    </a>

                </li>


                <!-- EKSTRAKULIKULER -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.ekstrakulikuler') }}"
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-user text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Ekstrakulikuler
                        </span>

                    </a>

                </li>


                <!-- GALERI -->
                <li class="mt-0.5 w-full">

                    <a
                        href="{{ route('admin.galeri') }}"
                        class="py-2.7 text-sm ease-nav-brand my-0 mx-4
                        flex items-center whitespace-nowrap px-4
                        transition-colors">

                        <div
                            class="shadow-soft-2xl mr-2 flex h-8 w-8
                            items-center justify-center rounded-lg bg-white">

                            <i class="fa fa-file text-slate-800 text-xs"></i>

                        </div>

                        <span class="ml-1">
                            Kelola Galeri
                        </span>

                    </a>

                </li>

            </ul>

        </div>

    </aside>
    <!-- END SIDEBAR -->


    <!-- MAIN CONTENT -->
    <main
        class="ease-soft-in-out xl:ml-68.5 relative min-h-screen
        rounded-xl transition-all duration-200">

        <!-- NAVBAR -->
        <nav
            class="relative flex flex-wrap items-center justify-between
            px-0 py-2 mx-6 transition-all shadow-none duration-250
            ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start">

            <div
                class="flex items-center justify-between w-full px-4 py-1
                mx-auto flex-wrap-inherit">

                <!-- BREADCRUMB -->
                <div>

                    <ol
                        class="flex flex-wrap pt-1 mr-12 bg-transparent
                        rounded-lg sm:mr-16">

                        <li class="text-sm leading-normal">

                            <a
                                class="opacity-50 text-slate-700"
                                href="javascript:;">
                                Pages
                            </a>

                        </li>

                        <li
                            class="text-sm pl-2 capitalize leading-normal
                            text-slate-700
                            before:float-left before:pr-2
                            before:text-gray-600
                            before:content-['/']">

                            Dashboard

                        </li>

                    </ol>

                    <h6 class="mb-0 font-bold capitalize">
                        Dashboard
                    </h6>

                </div>


                <!-- NAVBAR RIGHT -->
                <div
                    class="flex items-center mt-2 grow sm:mt-0 sm:mr-6
                    md:mr-0 lg:flex lg:basis-auto">

                    <!-- SEARCH -->
                    <div class="flex items-center md:ml-auto md:pr-4">

                        <div
                            class="relative flex flex-wrap items-stretch
                            w-full transition-all rounded-lg ease-soft">

                            <span
                                class="text-sm absolute z-50 -ml-px flex h-full
                                items-center rounded-lg bg-transparent
                                py-2 px-2.5 text-slate-500">

                                <i class="fas fa-search"></i>

                            </span>

                            <input
                                type="text"
                                class="pl-8.75 text-sm w-full rounded-lg
                                border border-solid border-gray-300
                                bg-white py-2 pr-3 text-gray-700"
                                placeholder="Type here...">

                        </div>

                    </div>


                    <!-- USER -->
                    <ul
                        class="flex flex-row justify-end pl-0 mb-0 list-none">

                        <li class="flex items-center">

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="block px-0 py-2 text-sm font-semibold
                                transition-all text-slate-500">

                                <i class="fa fa-user mr-1"></i>

                                <span>
                                    Admin
                                </span>

                            </a>

                        </li>


                        <!-- SETTINGS -->
                        <li class="flex items-center px-4">

                            <a
                                href="javascript:;"
                                class="p-0 text-sm text-slate-500">

                                <i
                                    fixed-plugin-button-nav
                                    class="cursor-pointer fa fa-cog">
                                </i>

                            </a>

                        </li>


                        <!-- NOTIFICATION -->
                        <li class="relative flex items-center pr-2">

                            <a
                                href="javascript:;"
                                class="block p-0 text-sm text-slate-500">

                                <i class="cursor-pointer fa fa-bell"></i>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </nav>
        <!-- END NAVBAR -->


        <!-- CONTENT -->
        <div class="w-full px-6 py-6 mx-auto">

            <div class="flex flex-wrap -mx-3">

                <!-- CARD -->
                <div class="w-full max-w-full px-3 mb-6">

                    <div
                        class="relative flex flex-col min-w-0 break-words
                        bg-white shadow-soft-xl rounded-2xl">

                        <div class="p-6">

                            <h5 class="mb-2 font-bold text-slate-700">
                                Selamat Datang di Dashboard
                            </h5>

                            <p class="mb-0 text-sm">
                                Sistem SMK YPC TASIKMALAYA
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!-- END CONTENT -->


        <!-- FOOTER -->
        <footer class="pt-4">

            <div class="w-full px-6 mx-auto">

                <div
                    class="flex flex-wrap items-center -mx-3
                    lg:justify-between">

                    <div
                        class="w-full max-w-full px-3 mt-0 mb-6
                        lg:mb-0 lg:w-1/2">

                        <div
                            class="text-sm leading-normal text-center
                            text-slate-500 lg:text-left">

                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>

                            MTs YAPPENA

                        </div>

                    </div>


                    <div
                        class="w-full max-w-full px-3 mt-0
                        lg:w-1/2">

                        <ul
                            class="flex flex-wrap justify-center pl-0
                            mb-0 list-none lg:justify-end">

                            <li>
                                <a
                                    href="#"
                                    class="block px-4 text-sm
                                    text-slate-500">

                                    About Us

                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="block px-4 text-sm
                                    text-slate-500">

                                    Blog

                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="block px-4 text-sm
                                    text-slate-500">

                                    License

                                </a>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </footer>
        <!-- END FOOTER -->

    </main>
    <!-- END MAIN -->


    <!-- SCRIPTS -->

    <script
        src="./assets/js/plugins/chartjs.min.js"
        async>
    </script>

    <script
        src="./assets/js/plugins/perfect-scrollbar.min.js"
        async>
    </script>

    <script
        async
        defer
        src="https://buttons.github.io/buttons.js">
    </script>

    <script
        src="./assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"
        async>
    </script>

</body>

</html>
