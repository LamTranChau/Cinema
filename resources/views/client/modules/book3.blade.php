<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Đặt vé 3</title>
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
        
        
        
        <!-- Main content -->
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ asset('cinema/HTML/images/tickets.png')}}">
                    <p class="order__title">Đặt vé <br><span class="order__descript">và có thời gian xem phim vui vẻ</span></p>                    
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step order-step--disable ">1. Phim gì &amp; Ở đâu &amp; Khi nào</div>
                    <div class="order-step second--step order-step--disable">2. Chọn ghế</div>
                    <div class="order-step third--step">3. Thủ tục thanh toán</div>
                </div>

            <div class="col-sm-12">
                <div class="checkout-wrapper">
                    <?php
                    function currency_format($number, $suffix = ' VND') {
                        if (!empty($number)) {
                            return number_format($number, 0, ',', '.') . "{$suffix}";
                        }
                    }
                    ?>
                    <h2 class="page-heading">Giá tiền</h2>
                    <ul class="book-result">
                        <li class="book-result__item">Số vé: <span class="book-result__count booking-ticket">{{$count}}</span></li>
                        <li class="book-result__item">Ghế: <span class="book-result__count booking-ticket">{{$seats}}</span></li>
                        <li class="book-result__item">Thuế: <span class="book-result__count booking-price">
                            {{currency_format(intval($total_price)*0.1)}}
                        </span></li>
                        <li class="book-result__item">Tổng cộng: <span class="book-result__count booking-cost">{{currency_format(intval($total_price)*1.1)}}</span></li>
                    </ul>

                    <h2 class="page-heading">Chọn phương thức thanh toán</h2>
                    <div class="payment">
                        <a href="#" class="payment__item">
                            <img alt='' style='width:120px;height: 40px;' src="{{asset('cinema/HTML/images/payment/vnpay.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay1.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay2.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay3.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay4.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay5.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay6.png')}}">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="{{asset('cinema/HTML/images/payment/pay7.png')}}">
                        </a>
                    </div>

                    <h2 class="page-heading">THÔNG TIN LIÊN LẠC</h2>
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
                    <form id='contact-info' method='POST' action="{{ route('client.pay') }}" class="form contact-info">
                        @csrf
                        <div class="contact-info__field contact-info__field-mail">
                            <input id='useremail' type='email' name='useremail' placeholder='Địa chỉ Email' class="form__mail">
                        </div>
                        <div class="contact-info__field contact-info__field-tel">
                            <input id='userphone' type='text' minlength="10" maxlength="10" name='userphone' placeholder='Số điện thoại' class="form__mail">
                        </div>
                        <button type="button" class="btn btn--warning" onclick="kiemtra()">Kiểm tra</button>

                        <div class="contact-info__field contact-info__field-tel" style='display: none;'>
                            <input type='text' required name='total_price' value="{{intval($total_price)*1.1}}" class="form__mail">
                        </div>
                        <div class="contact-info__field contact-info__field-tel" style='display: none;'>
                            <input type='text' required name='seats' value="{{$seats}}" class="form__mail">
                        </div>
                        <div class="contact-info__field contact-info__field-tel" style='display: none;'>
                            <input type='text' required name='total_seat' value="{{$total_seat}}" class="form__mail">
                        </div>
                        <div class="contact-info__field contact-info__field-tel" style='display: none;'>
                            <input type='text' required name='showtime_id' value="{{$timeshow_id}}" class="form__mail">
                        </div>

                        <div class="order" style="margin-top:50px">
                            <button id='thanhtoan' type="submit" disabled class="btn btn-md btn--warning btn--wide">Tiến hành thanh toán</button>
                        </div>
                    </form>   
                </div>
                
            </div>

        </section>
        

        <div class="clearfix"></div>

        <div class="booking-pagination">
                <a href="book2.html" class="booking-pagination__prev">
                    <p class="arrow__text arrow--prev">Trở lại</p>
                    <span class="arrow__info">Chọn ghế</span>
                </a>
                <a href="#" class="booking-pagination__next hide--arrow">
                    <p class="arrow__text arrow--next">next step</p>
                    <span class="arrow__info"></span>
                </a>
        </div>
        
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
        <script>
           function kiemtra() {                
                let email = document.getElementById("useremail").value;
                let phone = document.getElementById("userphone").value;
                // Test nhập rỗng
                if (email == "") {
                    alert("Email chưa nhập thông tin");                    
                    return;
                } else if (phone == "") {
                    alert("Phone chưa nhập thông tin");                    
                    return;
                }
                // test mail
                let check_email =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]).)+([a-zA-Z0-9]{2,4})+$/;
                if (!check_email.test(email)) {
                    alert("Hay nhap dia chi email hop le.\nExample@gmail.com");
                    email.focus;
                    return;
                } else {
                    phone.focus;
                    document.getElementById("thanhtoan").removeAttribute("disabled");
                    return;
                }
            }
        </script>

   

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
