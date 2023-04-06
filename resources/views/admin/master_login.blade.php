<!DOCTYPE html>
<html lang="en">
    <head>

        @include('admin.blocks.head')
        @stack('css')
    </head>
    <body class="hold-transition sidebar-mini" style='background: #dfe6e9'>
        
        <!-- Site wrapper -->
        @yield('content')
        @include('admin.blocks.foot')

        @stack('js')
        @stack('jshand')

    </body>
</html>