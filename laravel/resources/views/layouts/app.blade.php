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
        <link rel="stylesheet" href="{{ asset('assests/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assests/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assests/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('assests/vendors/font-awesome/css/font-awesome.min.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assests/vendors/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assests/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

        <!-- Scripts -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/css/style.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.header')
           @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
            <!-- plugins:js -->
    <script src="{{ asset('assests/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    {{-- <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assests/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assests/js/misc.js') }}"></script>
    <script src="{{ asset('assests/js/settings.js') }}"></script>
    <script src="{{ asset('assests/js/todolist.js') }}"></script>
    <script src="{{ asset('assests/js/jquery.cookie.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assests/js/dashboard.js') }}"></script>
    </body>
</html>
