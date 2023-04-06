<!doctype html>
<html>

<head>
	@include('client.blocks.head')
    @stack('css')    
</head>

<body>
    <div class="wrapper">
       

        <!-- Header section   header-wrapper--home -->
        <header class="header-wrapper">
            <div class="container">
                <!-- Logo link-->
                <a href='{{route('index')}}' class="logo">
                    <img alt='logo' src="{{ asset('cinema/HTML/images/logo.png')}}">
                </a>                
                <!-- Main website navigation-->
                <!-- Additional header buttons / Auth and direct link to booking--> 
                <div class="control-panel">
                    <a href="{{ route('login') }}" class="btn btn-md btn--warning btn--book btn-control--home" style='margin-right: 10px;'>Đăng nhập</a>
                    <a href="{{ route('client.book1') }}" class="btn btn-md btn--warning btn--book btn-control--home">Đặt vé xem phim</a>
                </div>
            </div>
        </header>
        @if(Session::has('err'))
            <p class="alert alert-danger">{{ Session::get('err') }}</p>
        @endif
        <!-- Main content -->
        
        @yield('content')
        
        
        <div class="clearfix"></div>       
        
        @include('client.blocks.footer')
    </div>

   
    <!-- JavaScript-->
    @include('client.blocks.foot')
    @stack('js')
    @stack('jshand')       
</body>

</html>
