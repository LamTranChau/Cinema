<!doctype html>
<html>
<head>
	<!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>AMovie - Đặt vé 2</title>
        <meta name="description" content="A Template by Gozha.net">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="Gozha.net">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        <link href="{{asset('cinema/HTML/css/gozha-nav.css')}}" rel="stylesheet" />
        <!-- Select -->
        <link href="{{asset('cinema/HTML/css/external/jquery.selectbox.css')}}" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="{{asset('cinema/HTML/css/style.css?v=1')}}" rel="stylesheet" />
        <link href="{{ asset('HTML/css/restyle.css?v=1' ) }}" rel="stylesheet" />

        <!-- Modernizr --> 
        <script src="{{asset('cinema/HTML/js/external/modernizr.custom.js')}}"></script>
    
        <style>
            /* .show_off {
                display: none;
            } */
            .show_display {
                display: none;
            }
           </style>
</head>
 
<body>
    <div class="wrapper place-wrapper">
       

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
        <div class="place-form-area">
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ asset('cinema/HTML/images/tickets.png')}}">
                    <p class="order__title">Đặt vé <br><span class="order__descript">và có thời gian xem phim vui vẻ</span></p>
                </div>
            </div>
            <div class="order-step-area">
                <div class="order-step first--step order-step--disable ">1. Phim gì &amp; Ở đâu &amp; Khi nào</div>
                <div class="order-step second--step">2. Chọn ghế</div>
            </div>
            
            <div class="choose-sits">
                <div class="choose-sits__info choose-sits__info--first">
                    <ul>
                        <li class="sits-price marker--none"><strong>Giá tiền</strong></li>
                        <li class="sits-price sits-price--cheap">50.000 VND</li>
                        <li class="sits-price sits-price--middle">58.000 VND</li>
                        <li class="sits-price sits-price--expensive">65.000 VND</li>                                                  
                        <input id='settien' style='border: none; width: 40px;'> VND (phụ phí)
                    </ul>
                </div>

                <div class="choose-sits__info">
                    <ul>
                        <li class="sits-state sits-state--not">Đã đặt</li>
                        <li class="sits-state sits-state--your">Ghế bạn chọn</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                <div class="sits-area hidden-xs">
                    <div class="sits-anchor">Màn hình</div>
                    <div class="sits">
                        <aside class="sits__line">
                            <span class="sits__indecator">A</span>
                            <span class="sits__indecator">B</span>
                            <span class="sits__indecator">C</span>
                            <span class="sits__indecator">D</span>
                            <span class="sits__indecator">E</span>
                            <span class="sits__indecator">F</span>
                            <span class="sits__indecator">G</span>
                            <span class="sits__indecator">I</span>
                            <span class="sits__indecator additional-margin">J</span>
                            <span class="sits__indecator">K</span>
                            <span class="sits__indecator">L</span>
                        </aside>
                        <div class="sits__row" id='hangA'>                                   
                        </div>
                        <div class="sits__row" id='hangB'>                                   
                        </div>                      
                        <div class="sits__row" id='hangC'>                                   
                        </div>
                        <div class="sits__row" id='hangD'>                                   
                        </div>
                        <div class="sits__row" id='hangE'>                                   
                        </div>
                        <div class="sits__row" id='hangF'>                                   
                        </div>
                        <div class="sits__row" id='hangG'>                                   
                        </div>
                        <div class="sits__row" id='hangI'>                                   
                        </div>
                        <div class="sits__row additional-margin" id='hangJ'>                                   
                        </div>
                        <div class="sits__row" id='hangK'>                                   
                        </div>
                        <div class="sits__row" id='hangL'>                                   
                        </div>

                        <aside class="sits__checked">
                            <div class="checked-place">                                        
                            </div>
                            <div class="checked-result">
                                0 VND
                            </div>
                        </aside>
                        <footer class="sits__number">
                            <span class="sits__indecator">1</span>
                            <span class="sits__indecator">2</span>
                            <span class="sits__indecator">3</span>
                            <span class="sits__indecator">4</span>
                            <span class="sits__indecator">5</span>
                            <span class="sits__indecator">6</span>
                            <span class="sits__indecator">7</span>
                            <span class="sits__indecator">8</span>
                            <span class="sits__indecator">9</span>
                            <span class="sits__indecator">10</span>
                            <span class="sits__indecator">11</span>
                            <span class="sits__indecator">12</span>
                            <span class="sits__indecator">13</span>
                            <span class="sits__indecator">14</span>
                            <span class="sits__indecator">15</span>
                            <span class="sits__indecator">16</span>
                            <span class="sits__indecator">17</span>
                            <span class="sits__indecator">18</span>
                        </footer>
                    </div>
                </div>
            </div>
                
            <div class="col-sm-12 visible-xs"> 
                <div class="sits-area--mobile">
                    <div class="sits-area--mobile-wrap">
                        <div class="sits-select">
                            <select name="sorting_item" class="sits__sort sit-row" tabindex="0">
                                    <option value="1" selected='selected'>A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                    <option value="5">E</option>
                                    <option value="6">F</option>
                                    <option value="7">G</option>
                                    <option value="8">I</option>
                                    <option value="9">J</option>
                                    <option value="10">K</option>
                                    <option value="11">L</option>
                            </select>
 
                            <select name="sorting_item" class="sits__sort sit-number" tabindex="1">
                                    <option value="1" selected='selected'>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                            </select>

                            <a href="#" class="btn btn-md btn--warning toogle-sits">Choose sit</a>
                        </div>
                    </div>

                    <a href="#" class="watchlist add-sits-line">Add new sit</a>

                    <aside class="sits__checked">
                            <div class="checked-place">
                                <span class="choosen-place"></span>
                            </div>
                            <div class="checked-result">
                                $0
                            </div>
                    </aside>

                    <img alt="" src="images/components/sits_mobile.png">
                </div>
            </div>   
        </section>
        </div>
        
        <div class="show_display">                                     
        </div>

        <div class="clearfix"></div>
        <form id='film-and-time' class="" method='post' action='{{route('client.book3')}}'>
            @csrf
            <input style='display: none; ' required type='text' name='total_price' class="choosen-cost">
            <input style='display: none; ' required type='text' name='seats' class="choosen-sits">
            <input style='display: none; ' required type='text' name='total_seat' class="choosen-sits_ghe">
            <input style='display: none; ' required type='text' name='timeshow_id' class="timeshow_id" value='{{$showid}}'>
            {{-- <input id='settien'> --}}

            <div class="booking-pagination booking-pagination--margin">
                <button onclick="history.back()" class="booking-pagination__prev">
                    <span class="arrow__text arrow--prev">Trở lại</span>
                    <span class="arrow__info">Đặt vé phim</span>
                </button>
                <button type="submit" class="booking-pagination__next">
                    <span class="arrow__text arrow--next">Bước tiếp theo</span>
                    <span class="arrow__info">Kiểm tra</span>
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
        
        <script src="{{ asset('HTML/js/custom-user.js')}}"></script>
	{{-- end  --}}


		
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({                    
                    type: "POST",
                    url: "{{ route('client.showseat') }}",
                    data: {idShow : {{$showid}} },
                    dataType: "json",
                    success: function (arr) {
                        $arrry = arr["arr"];
                        $a = arr["A"];
                        $b = arr["B"];
                        $c = arr["C"];
                        $d = arr["D"];
                        $e = arr["E"];
                        $f = arr["F"];
                        $g = arr["G"];
                        $i = arr["I"];
                        $j = arr["J"];
                        $k = arr["K"];
                        $l = arr["L"];
                    
                            // creat html for seat to html
                        var  seats_A ='',seats_B ='',seats_C ='',seats_D ='',seats_E ='',seats_F ='',seats_G ='',seats_I ='',seats_J ='',seats_K ='',seats_L ='';
                        for (let x in $a) {    
                            if ($arrry.includes($a[x]['id'])) {
                                seats_A += '<span class="sits__place sits-price--cheap sits-state--not" data-price="'+$a[x]['seatprice']+'" data-place='+$a[x]['seatname']+' name="'+ $a[x]['id'] +'">' + $a[x]['seatname'] + '</span>';
                            } else {
                                seats_A += '<span class="sits__place sits-price--cheap" data-price="'+$a[x]['seatprice']+'" data-place='+$a[x]['seatname']+' name="'+ $a[x]['id'] +'">' + $a[x]['seatname'] + '</span>';  
                            }                                                         
                        }
                        for (let x in $b) {
                            if ($arrry.includes($b[x]['id'])) {
                                seats_B += '<span class="sits__place sits-price--cheap sits-state--not" data-price="'+$b[x]['seatprice']+'" data-place='+$b[x]['seatname']+' name="'+ $b[x]['id'] +'">' + $b[x]['seatname'] + '</span>';
                            } else {
                                seats_B += '<span class="sits__place sits-price--cheap" data-price="'+$b[x]['seatprice']+'" data-place='+$b[x]['seatname']+' name="'+ $b[x]['id'] +'">' + $b[x]['seatname'] + '</span>';  
                            }                                   
                        }
                        for (let x in $c) {
                            if ($arrry.includes($c[x]['id'])) {
                                seats_C += '<span class="sits__place sits-price--cheap sits-state--not" data-price="'+$c[x]['seatprice']+'" data-place='+$c[x]['seatname']+' name="'+ $c[x]['id'] +'">' + $c[x]['seatname'] + '</span>';
                            } else {
                                seats_C += '<span class="sits__place sits-price--cheap" data-price="'+$c[x]['seatprice']+'" data-place='+$c[x]['seatname']+' name="'+ $c[x]['id'] +'">' + $c[x]['seatname'] + '</span>';         
                            }                            
                        }
                        for (let x in $d) {
                            if ($arrry.includes($d[x]['id'])) {
                                seats_D += '<span class="sits__place sits-price--cheap sits-state--not" data-price="'+$d[x]['seatprice']+'" data-place='+$d[x]['seatname']+' name="'+ $d[x]['id'] +'">' + $d[x]['seatname'] + '</span>';
                            } else {
                                seats_D += '<span class="sits__place sits-price--cheap" data-price="'+$d[x]['seatprice']+'" data-place='+$d[x]['seatname']+' name="'+ $d[x]['id'] +'">' + $d[x]['seatname'] + '</span>';         
                            }

                            
                        }
                        for (let x in $e) {
                            if ($arrry.includes($e[x]['id'])) {
                                seats_E += '<span class="sits__place sits-price--middle sits-state--not" data-price="'+$e[x]['seatprice']+'" data-place='+$e[x]['seatname']+' name="'+ $e[x]['id'] +'"">' + $e[x]['seatname'] + '</span>';
                            } else {
                                seats_E += '<span class="sits__place sits-price--middle" data-price="'+$e[x]['seatprice']+'" data-place='+$e[x]['seatname']+' name="'+ $e[x]['id'] +'"">' + $e[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $f) {
                            if ($arrry.includes($f[x]['id'])) {
                                seats_F += '<span class="sits__place sits-price--middle sits-state--not" data-price="'+$f[x]['seatprice']+'" data-place='+$f[x]['seatname']+' name="'+ $f[x]['id'] +'"">' + $f[x]['seatname'] + '</span>';
                            } else {
                                seats_F += '<span class="sits__place sits-price--middle" data-price="'+$f[x]['seatprice']+'" data-place='+$f[x]['seatname']+' name="'+ $f[x]['id'] +'"">' + $f[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $g) {
                            if ($arrry.includes($g[x]['id'])) {
                                seats_G += '<span class="sits__place sits-price--middle sits-state--not" data-price="'+$g[x]['seatprice']+'" data-place='+$g[x]['seatname']+' name="'+ $g[x]['id'] +'"">' + $g[x]['seatname'] + '</span>'; 
                            } else {
                                seats_G += '<span class="sits__place sits-price--middle" data-price="'+$g[x]['seatprice']+'" data-place='+$g[x]['seatname']+' name="'+ $g[x]['id'] +'"">' + $g[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $i) {
                            if ($arrry.includes($i[x]['id'])) {
                                seats_I += '<span class="sits__place sits-price--middle sits-state--not" data-price="'+$i[x]['seatprice']+'" data-place='+$i[x]['seatname']+' name="'+ $i[x]['id'] +'"">' + $i[x]['seatname'] + '</span>'; 
                            } else {
                                seats_I += '<span class="sits__place sits-price--middle" data-price="'+$i[x]['seatprice']+'" data-place='+$i[x]['seatname']+' name="'+ $i[x]['id'] +'"">' + $i[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $j) {
                            if ($arrry.includes($j[x]['id'])) {
                                seats_J += '<span class="sits__place sits-price--expensive sits-state--not" data-price="'+$j[x]['seatprice']+'" data-place='+$j[x]['seatname']+' name="'+ $j[x]['id'] +'"">' + $j[x]['seatname'] + '</span>';
                            } else {
                                seats_J += '<span class="sits__place sits-price--expensive" data-price="'+$j[x]['seatprice']+'" data-place='+$j[x]['seatname']+' name="'+ $j[x]['id'] +'"">' + $j[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $k) {
                            if ($arrry.includes($k[x]['id'])) {
                                seats_K += '<span class="sits__place sits-price--expensive sits-state--not" data-price="'+$k[x]['seatprice']+'" data-place='+$k[x]['seatname']+' name="'+ $k[x]['id'] +'"">' + $k[x]['seatname'] + '</span>';
                            } else {
                                seats_K += '<span class="sits__place sits-price--expensive" data-price="'+$k[x]['seatprice']+'" data-place='+$k[x]['seatname']+' name="'+ $k[x]['id'] +'"">' + $k[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        for (let x in $l) {
                            if ($arrry.includes($l[x]['id'])) {
                                seats_L += '<span class="sits__place sits-price--expensive sits-state--not" data-price="'+$l[x]['seatprice']+'" data-place='+$l[x]['seatname']+' name="'+ $l[x]['id'] +'"">' + $l[x]['seatname'] + '</span>';  
                            } else {
                                seats_L += '<span class="sits__place sits-price--expensive" data-price="'+$l[x]['seatprice']+'" data-place='+$l[x]['seatname']+' name="'+ $l[x]['id'] +'"">' + $l[x]['seatname'] + '</span>';  
                            }

                                    
                        }
                        
                        $('#hangA').html(seats_A);
                        $('#hangB').html(seats_B);
                        $('#hangC').html(seats_C);
                        $('#hangD').html(seats_D);
                        $('#hangE').html(seats_E);
                        $('#hangF').html(seats_F);
                        $('#hangG').html(seats_G);
                        $('#hangI').html(seats_I);
                        $('#hangJ').html(seats_J);
                        $('#hangK').html(seats_K);
                        $('#hangL').html(seats_L);

                        $(document).ready(function() {
                            init_BookingTwo();
                        });
                        
                    }             
                })
                $.ajax({
                type: "POST",
                url: "{{route('client.getmoney')}}",
                data:  {idtime: {{$showid}} },
                dataType: "json",
                success: function (tien) {
                    $a = tien[0];
                    $('#settien').val($a['timeprice']);
                }
            });
            })

            
            
           
        
        </script>
        

</body>
</html>
