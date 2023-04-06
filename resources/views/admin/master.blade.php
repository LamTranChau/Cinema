<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.blocks.head')
        @stack('css')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            @include('admin.blocks.nav')          
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            @include('admin.blocks.aside')
           
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @include('admin.blocks.sidebar')
                <!-- Main content -->
                <section class="content">
                    {{-- Báo lỗi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Báo thành công --}}
                    @if(Session::has('success'))
                      <p class="alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('err'))
                    <p class="alert alert-danger">{{ Session::get('err') }}</p>
                    @endif
 
                    <!-- Default box -->
                    @yield('content')
                    <!-- /.card -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
            @include('admin.blocks.footer')
        </div>
        
        @include('admin.blocks.foot')
        @stack('js')
        @stack('jshand')

    </body>
</html>