<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Đặt vé 1</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
        <!-- fix lỗi was loaded over HTTPS -->
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->
    <!-- jQuery UI --> 
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

        <!-- Mobile menu -->
        <link href="{{ asset('cinema/HTML/css/gozha-nav.css')}}" rel="stylesheet" />
        <!-- Select -->
        <link href="{{ asset('cinema/HTML/css/external/jquery.selectbox.css')}}" rel="stylesheet" />
        <!-- Swiper slider -->
        <link href="{{ asset('cinema/HTML/css/external/idangerous.swiper.css')}}" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="{{ asset('cinema/HTML/css/style.css?v=1')}}" rel="stylesheet"/>

        <!-- Modernizr --> 
        <script src="{{ asset('cinema/HTML/js/external/modernizr.custom.js')}}"></script>
    
    
</head>

<body>
    <div class="wrapper">
        

        <!-- Header section -->
        <header class="header-wrapper">
            <div class="container">
                <!-- Logo link-->
                <a href='{{route('index')}}' class="logo">
                    <img alt='logo' src="{{ asset('cinema/HTML/images/logo.png')}}">
                </a>
            </div>
        </header>
        
        
        
        <!-- Main content -->

        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ asset('cinema/HTML/images/tickets.png')}}">
                    <p class="order__title">Đặt vé <br><span class="order__descript">và có thời gian xem phim vui vẻ</span></p>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step">1. Phim gì &amp; Ở đâu &amp; Khi nào</div>
                </div>

            <h2 class="page-heading heading--outcontainer">Chọn phim</h2>
        </section>
        
        <div class="choose-film">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                  <!--First Slide-->
                  @foreach($film as $item)
                    <div class="swiper-slide" data-film='{{$item->filmname}}'> 
                        <div class="film-images">
                            <img alt='' src="{{asset('upload') }}/{{$item->image }}" width="151" height="239">
                        </div>
                        <p class="choose-film__title">{{$item->filmname}}</p>
                    </div>
                  @endforeach
              </div>
            </div>
        </div>

        <section class="container">
            <div class="col-sm-12">
                <div class="choose-indector choose-indector--film">
                    <strong>Lựa chọn: </strong><span class="choosen-area"></span>
                </div>

                <h2 class="page-heading">Ngày chiếu</h2>

                <div class="choose-container choose-container--short">
                    <select name="select_item" id="datepicker" class="datepicker__input" tabindex="0" style="width:25%;
                    padding: 0.375rem 0.75rem;                    
                    color: #212529;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid #ced4da;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                    border-radius: 0.375rem;
                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                    }">
                        <option value='setngaychieu'>Chọn ngày chiếu</option>
                    </select>      
                </div>

                <h2 class="page-heading">Chọn suất chiếu</h2>

                <div class="time-select time-select--wide">
                        
                </div>

                <div class="choose-indector choose-indector--time">
                    <strong>Lựa chọn: </strong><span class="choosen-area"></span>
                </div>
            </div>

        </section>

        <div class="clearfix"></div>

        <form id='film-and-time' class="booking-form" method='POST' action="{{ route('client.book2') }}">
            @csrf
            <input type='text' name='choosen_movie' required id='choosen-movie' class="choosen-movie">

            <input type='text' name='choosen_city' class="choosen-city">
            <input type='text' name='choosen_date' required class="choosen-date">
            
            <input type='text' name='choosen_cinema' required class="choosen-cinema">
            <input type='text' name='choosen_time' required class="choosen-time">
            <input type='text' name='choosen_showtime' required class="choosen-showtime">
        

            <div class="booking-pagination">
                <a href="#" class="booking-pagination__prev hide--arrow">
                    <span class="arrow__text arrow--prev"></span>
                    <span class="arrow__info"></span>
                </a>
                <button type="submit" class="booking-pagination__next">
                    <span class="arrow__text arrow--next">Bước tiếp theo</span>
                    <span class="arrow__info">Chọn ghế</span>
                </button>
            </div>

        </form>
        
        <div class="clearfix"></div>

        <footer class="footer-wrapper">
            <section class="container">
                <div class="col-xs-4 col-md-2 footer-nav">
                    <ul class="nav-link">
                        <li><a href="#" class="nav-link__item">Cities</a></li>
                        <li><a href="movie-list-left.html" class="nav-link__item">Movies</a></li>
                        <li><a href="trailer.html" class="nav-link__item">Trailers</a></li>
                        <li><a href="rates-left.html" class="nav-link__item">Rates</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-md-2 footer-nav">
                    <ul class="nav-link">
                        <li><a href="coming-soon.html" class="nav-link__item">Coming soon</a></li>
                        <li><a href="cinema-list.html" class="nav-link__item">Cinemas</a></li>
                        <li><a href="offers.html" class="nav-link__item">Best offers</a></li>
                        <li><a href="news-left.html" class="nav-link__item">News</a></li>
                    </ul>
                </div>
                <div class="col-xs-4 col-md-2 footer-nav">
                    <ul class="nav-link">
                        <li><a href="#" class="nav-link__item">Terms of use</a></li>
                        <li><a href="gallery-four.html" class="nav-link__item">Gallery</a></li>
                        <li><a href="contact.html" class="nav-link__item">Contacts</a></li>
                        <li><a href="page-elements.html" class="nav-link__item">Shortcodes</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="footer-info">
                        <p class="heading-special--small">A.Movie<br><span class="title-edition">in the social media</span></p>

                        <div class="social">
                            <a href='#' class="social__variant fa fa-facebook"></a>
                            <a href='#' class="social__variant fa fa-twitter"></a>
                            <a href='#' class="social__variant fa fa-vk"></a>
                            <a href='#' class="social__variant fa fa-instagram"></a>
                            <a href='#' class="social__variant fa fa-tumblr"></a>
                            <a href='#' class="social__variant fa fa-pinterest"></a>
                        </div>
                        
                        <div class="clearfix"></div>
                        <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
                    </div>
                </div>
            </section>
        </footer>
    </div>

   

	<!-- JavaScript-->
        <!-- jQuery 3.1.1--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/external/jquery-3.1.1.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="{{asset('cinema/HTML/js/external/jquery-migrate-1.2.1.min.js')}}"></script>
        <!-- jQuery UI -->
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <!-- Bootstrap 3--> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <!-- Mobile menu -->
        <script src="{{asset('cinema/HTML/js/jquery.mobile.menu.js')}}"></script>
         <!-- Select -->
        <script src="{{asset('cinema/HTML/js/external/jquery.selectbox-0.2.min.js')}}"></script>
        <!-- Swiper slider -->
        <script src="{{asset('cinema/HTML/js/external/idangerous.swiper.min.js')}}"></script>

        <!-- Form element -->
        <script src="{{asset('cinema/HTML/js/external/form-element.js')}}"></script>
        <!-- Form validation -->
        <script src="{{asset('cinema/HTML/js/form.js')}}"></script>

        <!-- Custom -->
        <script src="{{asset('cinema/HTML/js/custom.js')}}"></script>
	{{--end  --}}

		<script type="text/javascript">
            $(document).ready(function() {
                init_BookingOne();
            });
		</script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })
        </script>

        <script type="text/javascript">
            $('.swiper-slide').click(function(){
                $namefilm = $('#choosen-movie').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('client.show') }}",
                    data: {namefilm:$namefilm , num_check:0},
                    dataType: "html",
                    success: function (chau) {
                        $('#datepicker').html(chau);              
                    }
                });
            })

                

            $('.datepicker__input').change(function(){
                $namefilm = $('#choosen-movie').val();
                $datefilm = $('#datepicker').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('client.show') }}",
                    data: {namefilm:$namefilm,datefilm:$datefilm , num_check: 1},
                    dataType: "html",
                    success: function (chau) {
                        $('.time-select').html(chau);
                        $(document).ready(function() {
                            init_BookingOne();
                        });            
                    }
                });                
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                init_BookingOne();
            });
        </script>
</body>
</html>
