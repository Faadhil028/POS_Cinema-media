<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <!-- navbar atas -->
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif


    <!-- sidebar admin -->
    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        <div @click.away="open = false"
            class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-white md:w-64 dark:text-gray-200 dark:bg-gray-800"
            x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                {{-- <a href="#"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">Cinema
                    Media</a> --}}
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'block': open, 'hidden': !open }"
                class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                <div>
                    @if (auth()->user()->can('read.film') ||
                            auth()->user()->can('read.timetable') ||
                            auth()->user()->can('read.transaksi'))
                        <h4
                            class="px-4 py-1 mt-2 text-md font-semibold text-sky-500 focus:outline-none focus:shadow-outline">
                            Dashboard</h4>
                    @endif
                    @if (auth()->user()->can('read.genre'))
                        <a class="block {{ request()->routeIs('admin.genres.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.genres.index') }}">Genre</a>
                    @endif
                    @if (auth()->user()->can('read.film'))
                        <a class="block {{ request()->routeIs('admin.films.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.films.index') }}">Film</a>
                    @endif
                    @if (auth()->user()->can('read.seat'))
                        <a class="block {{ request()->routeIs('admin.seats.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.seats.index') }}">Seat</a>
                    @endif
                    @if (auth()->user()->can('read.studio'))
                        <a class="block {{ request()->routeIs('admin.studios.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.studios.index') }}">Studio</a>
                    @endif
                    @if (auth()->user()->can('read.timetable'))
                        <a class="block {{ request()->routeIs('admin.timetables.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.timetables.index') }}">Schedule</a>
                    @endif
                    @if (auth()->user()->can('read.transaction'))
                        <a class="block {{ request()->routeIs('admin.transaction.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.transaction.index') }}">Transaction</a>
                    @endif
                </div>
                @role('admin')
                    <div class="mt-4">
                        <h4
                            class="px-4 py-1 mt-2 text-md font-semibold text-sky-500 focus:outline-none focus:shadow-outline">
                            Admin</h4>
                        <a class="block {{ request()->routeIs('admin.users.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.users.index') }}">User</a>
                        <a class="block {{ request()->routeIs('admin.roles.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.roles.index') }}">Roles</a>
                        <a class="block {{ request()->routeIs('admin.permissions.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="{{ route('admin.permissions.index') }}">Permission</a>
                        <!-- <a class="block {{ request()->routeIs('admin.films.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                                                                                                                                                                                                                                                                            href="{{ route('admin.films.index') }}">Film</a>
                                                                                                                                                                                                                                                                                        <a class="block {{ request()->routeIs('admin.genres.*') ? 'bg-gray-600' : '' }} px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                                                                                                                                                                                                                                                                            href="{{ route('admin.genres.index') }}">Genre</a> -->
                    </div>
                @endrole
                <div class="mt-10">
                    <form method="POST" action="{{ route('logout') }}"
                        class="block px-4 py-2 mt-2 rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        @csrf
                        <button type="submit" class="font-semibold text-sm">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </nav>
        </div>
        <div class="flex w-full bg-gray-700">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>


    <script>
        function previewImage() {
            const img = document.querySelector('#tumbnail')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block'

            const oFReader = new FileReader()
            oFReader.readAsDataURL(tumbnail.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result
            }
        }
    </script>

    <script>
        $('.delete-btn').click(function(e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak akan dapat mengembalikan tindakan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>

    @livewireScripts
</body>

</html>
