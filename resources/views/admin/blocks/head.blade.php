        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- // ajax --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('module' , 'Dashboard') @yield('action')</title>
        {{-- <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('adminNe/plugins/fontawesome-free/css/all.min.css' ) }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminNe/dist/css/adminlte.min.css' ) }}">
        
        <script src="{{ asset('adminNe/ckeditor/ckeditor.js' ) }}"></script>
        <script type="text/javascript" src="{{ asset('adminNe/ckeditor/adapters/jquery.js' ) }}"></script>
        <style> @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap'); </style>