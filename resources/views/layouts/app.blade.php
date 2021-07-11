<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href = "https://file.myfontastic.com/5grboJ9gPV6GUsWtd956fg/icons.css" rel = "stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">

        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>

        <!--Datatables -->
        <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTables.responsive.min.js')}}"></script>
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>

        <script type="text/javascript" src="{{ asset('js/sweetalert2.js') }}"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    </body>
</html>
