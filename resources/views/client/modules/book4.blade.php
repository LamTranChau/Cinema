<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Đặt vé 4</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
    
    <!-- Mobile Specific Metas-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="telephone=no" name="format-detection">
    
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="{{ asset('cinema/HTML/css/gozha-nav.css')}}" rel="stylesheet" />
        <!-- Select -->
        <link href="{{ asset('cinema/HTML/css/external/jquery.selectbox.css')}}" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="{{ asset('cinema/HTML/css/style.css?v=1')}}" rel="stylesheet" />

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
        
        
        
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ asset('cinema/HTML/images/tickets.png')}}">
                    <p class="order__title">Đặt vé <br><span class="order__descript">và có thời gian xem phim vui vẻ</span></p> 
                </div>
                <?php
                function currency_format($number, $suffix = ' VND') {
                    if (!empty($number)) {
                        return number_format($number, 0, ',', '.') . "{$suffix}";
                    }
                }
                ?>
                <div class="ticket">
                    <div class="ticket-position">
                        <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">online ticket</div> </div>
                        <div class="ticket__inner">

                            <div class="ticket-secondary">
                                <span class="ticket__item">Mã vé:  <strong class="ticket__number">{{$info->madon}}</strong></span>
                                <span class="ticket__item ticket__date"><b>{{$showtime->date_time}}</b></span>
                                <span class="ticket__item ticket__time"><b>{{$showtime->time_slot}}</b></span>
                                <span class="ticket__item">Rạp: <span class="ticket__cinema"><b>{{$showtime->brandname}}</b></span></span>
                                <span class="ticket__item">Phòng: <span class="ticket__hall"><b>{{$showtime->roomname}}</b></span></span>
                                <span class="ticket__item ticket__price">Giá: <strong class="ticket__cost">{{currency_format($info->tien)}}</strong></span>
                            </div>

                            <div class="ticket-primery">
                                <span class="ticket__item ticket__item--primery ticket__film">Phim <br><strong class="ticket__movie">{{$showtime->filmname}}</strong></span>
                                <span class="ticket__item ticket__item--primery">Số ghế: <span class="ticket__place">{{$info->seats}}</span></span>
                            </div>


                        </div>
                        <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">online ticket</div></div>
                    </div>
                </div>

                <div class="ticket-control">
                    <a href="{{route('index')}}" class="watchlist list--download">Trang chủ</a>
                    <a href="#" class="watchlist list--download">Download</a>
                    <a href="#" class="watchlist list--print">Print</a>
                </div>

            </div>
        </section>
        
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

    <!-- open/close -->
        <div class="overlay overlay-hugeinc">
            
            <section class="container">

                <div class="col-sm-4 col-sm-offset-4">
                    <button type="button" class="overlay-close">Close</button>
                    <form id="login-form" class="login" method='get' novalidate=''>
                        <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

                        <div class="social social--colored">
                                <a href='#' class="social__variant fa fa-facebook"></a>
                                <a href='#' class="social__variant fa fa-twitter"></a>
                                <a href='#' class="social__variant fa fa-tumblr"></a>
                        </div>

                        <p class="login__tracker">or</p>
                        
                        <div class="field-wrap">
                        <input type='email' placeholder='Email' name='user-email' class="login__input">
                        <input type='password' placeholder='Password' name='user-password' class="login__input">

                        <input type='checkbox' id='#informed' class='login__check styled'>
                        <label for='#informed' class='login__check-info'>remember me</label>
                         </div>
                        
                        <div class="login__control">
                            <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
                            <a href="#" class="login__tracker form__tracker">Forgot password?</a>
                        </div>
                    </form>
                </div>

            </section>
        </div>
   


	<!-- JavaScript-->
        <!-- jQuery 3.1.1--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/external/jquery-3.1.1.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="{{asset('cinema/HTML/js/external/jquery-migrate-1.2.1.min.js')}}"></script>
        <!-- Bootstrap 3--> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <!-- Mobile menu -->
        <script src="{{asset('cinema/HTML/js/jquery.mobile.menu.js')}}"></script>
         <!-- Select -->
        <script src="{{asset('cinema/HTML/js/external/jquery.selectbox-0.2.min.js')}}"></script>
		
		<!-- Form element -->
        <script src="{{asset('cinema/HTML/js/external/form-element.js')}}"></script>
        <!-- Form validation -->
        <script src="{{asset('cinema/HTML/js/form.js')}}"></script>

        <!-- Custom -->
        <script src="{{asset('cinema/HTML/js/custom.js')}}"></script>

</body>
</html>
