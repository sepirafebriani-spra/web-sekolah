<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <title>@yield('title', 'Dashboard') - SMK YPC TASIKMALAYA</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('data_table/css/dataTables.bootstrap5.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('data_table/css/dataTables.bootstrap5.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('data_table/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Soft UI -->
    <link href="{{ asset('css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">

        <!-- LOGO -->
        <div class="h-19.5">
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{ route('admin.dashboard') }}">
                @if(isset($profile) && !empty($profile->logo))
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Sekolah" style="width:55px; height:55px; object-fit:contain; display:inline-block; vertical-align:middle;">
                @else
                    <img src="{{ asset('img/logo-ct.png') }}" alt="Logo Sekolah" style="width:55px; height:55px; object-fit:contain; display:inline-block; vertical-align:middle;">
                @endif
                <span class="ml-1 font-semibold">
                    SMK YPC TASIKMALAYA
                </span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">

        <!-- MENU SIDEBAR -->
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">

                <!-- DASHBOARD -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.dashboard') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-home text-xs"></i>
                        </div>
                        <span class="ml-1">Dashboard</span>
                    </a>
                </li>

                <!-- PROFILE SEKOLAH -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.profile') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.profile*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.profile*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-school text-xs"></i>
                        </div>
                        <span class="ml-1">Profile Sekolah</span>
                    </a>
                </li>

                <!-- KELOLA GURU -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.guru.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.guru*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.guru*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-credit-card text-xs"></i>
                        </div>
                        <span class="ml-1">Kelola Guru</span>
                    </a>
                </li>

                <!-- KELOLA SISWA -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.siswa.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.siswa*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.siswa*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-cube text-xs"></i>
                        </div>
                        <span class="ml-1">Kelola Siswa</span>
                    </a>
                </li>

                <!-- KELOLA BERITA -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.berita.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.berita*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.berita*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-cog text-xs"></i>
                        </div>
                        <span class="ml-1">Kelola Berita</span>
                    </a>
                </li>

                <!-- KELOLA EKSTRAKULIKULER -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.ekstrakulikuler*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.ekstrakulikuler*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-user text-xs"></i>
                        </div>
                        <span class="ml-1">Kelola Ekstrakulikuler</span>
                    </a>
                </li>

                <!-- KELOLA GALERI -->
                <li class="mt-0.5 w-full">
                    <a href="{{ route('admin.galeri.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ request()->routeIs('admin.galeri*') ? 'bg-white font-semibold text-slate-700 shadow-soft-xl' : '' }}">
                        <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg {{ request()->routeIs('admin.galeri*') ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'bg-white text-slate-800' }}">
                            <i class="fa fa-file text-xs"></i>
                        </div>
                        <span class="ml-1">Kelola Galeri</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>

    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <main class="ease-soft-in-out xl:ml-68.5 relative min-h-screen rounded-xl transition-all duration-200">

        <!-- NAVBAR -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

                <!-- BREADCRUMB -->
                <div>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']">
                            @yield('title', 'Dashboard')
                        </li>
                    </ol>
                    <h6 class="mb-0 font-bold capitalize">
                        @yield('title', 'Dashboard')
                    </h6>
                </div>

                <!-- NAVBAR RIGHT -->
                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                            <span class="text-sm absolute z-50 -ml-px flex h-full items-center rounded-lg bg-transparent py-2 px-2.5 text-slate-500">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="pl-8.75 text-sm w-full rounded-lg border border-solid border-gray-300 bg-white py-2 pr-3 text-gray-700" placeholder="Type here...">
                        </div>
                    </div>

                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none">
                        <li class="flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="block px-0 py-2 text-sm font-semibold transition-all text-slate-500">
                                <i class="fa fa-user mr-1"></i>
                                <span>Admin</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- CONTENT DINAMIS -->
        <div class="w-full px-6 py-6 mx-auto">
            @yield('content')
        </div>

        <!-- FOOTER -->
        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-1/2">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            © <script>document.write(new Date().getFullYear());</script> SMK YPC TASIKMALAYA
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <!-- SCRIPTS -->
    <script src="{{ asset('js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>
    <script src="{{ asset('data_table/js/dataTables.bootstrap5.js') }}" async></script>
    <script src="{{ asset('data_table/js/dataTables.bootstrap5.min.js') }}" async></script>
    <script src="{{ asset('data_table/js/dataTables.bootstrap5.min.mjs') }}" async></script>
    <script src="{{ asset('data_table/js/dataTables.bootstrap5.mjs') }}" async></script>


    @stack('scripts')
</body>

</html>
