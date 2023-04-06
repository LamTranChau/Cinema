@extends('admin.master')

@section('module','Đặt vé')
@section('action','Đăng ký')

@section('content')
@push('css')
     <!-- Font awesome - icon font -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- Roboto -->
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
   <link href="{{ asset('HTML/css/restyle.css?v=1' ) }}" rel="stylesheet" />
   <style>
    .show_off {
        display: none;
    }
    .show_display {
        display: none;
    }
   </style>
@endpush  
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4">
                <form  action="{{ route('admin.ticket.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Chọn phim :</label>
                            <select id='select_film' class="custom-select Set_day_time check_time" name="film_id">
                                <option value='setphim'>Chọn tên phim</option>
                                @foreach ($film as $filmitem)
                                    <option value="{{ $filmitem -> id}}">{{ $filmitem -> filmname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn chi nhánh :</label>
                            <select id='select_brand' class="custom-select Set_day_time check_time" name="brand_id">
                                <option value='setchinhanh'>Chọn chi nhánh</option> 
                                @foreach ($brand as $branditem)
                                    <option value="{{ $branditem -> id}}">{{ $branditem -> brandname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ngày chiếu :</label>
                            <select id='select_DayShow' class="custom-select check_time" name="date_time">
                                <option value='setngaychieu'>Chọn ngày chiếu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Suất chiếu :</label>
                            <select id='select_time' class="custom-select check_time" name="time_id">                           
                                <option value='setthoigian'>Vui lòng chọn đủ thông tin phía trên</option>                      
                            </select>
                        </div>
                        <div class='booking-form'>
                            {{-- booking-form --}}
                            <input type='text' name='total_price' class="choosen-cost">
                            <input type='text' name='seats' class="choosen-sits">
                            <input type='text' name='total_seat' class="choosen-sits_ghe">
                            <input id='settien'>                       
                        </div>     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@yield('action')</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    
   
    <div id='chonghe' class="wrapper place-wrapper show_off">
        <!-- Main content -->
        <div class="place-form-area">
            <section class="container"> 
                <div class="choose-sits">               
                    <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                        <div class="sits-area hidden-xs">
                            <div class="sits-anchor">screen</div>

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
                                <div class="show_display">                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="clearfix"></div>
    </div>
@push('js')

   
@endpush
@push('jshand')
    {{-- CHọn ngày mặc định của adminlte --}}
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>
    {{--  js cua chon ghe --}}
        
   
    <script>window.jQuery || document.write('<script src="{{ asset('HTML/js/external/jquery-3.1.1.min.js')}}"><\/script>')</script>
    {{-- <script src="{{ asset('HTML/js/custom.js')}}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingTwo();
        });
    </script> --}}
     {{-- end js cua chon ghe --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
        
        $('.Set_day_time').change(function () {
            // lấy id_film và id_brand.
           $checkFilm = $('#select_film').val();
           $checkBrand = $('#select_brand').val();
           // kiểm tra id_film và id_brand nếu đúng thì gọi ajax xuất ngày chiếu
           if($checkFilm !== 'setphim' && $checkBrand !== 'setchinhanh'){                
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.ticket.show') }}",
                    data: {idFilm : $checkFilm ,idBrand : $checkBrand,num_check: 0},
                    dataType: "html",
                    success: function (response) {
                        $('#select_DayShow').html(response);                 
                    }
                });                
           } 
        })

        $('#select_DayShow').change(function(){
            // lấy giá trị của dayshow
            $checkDayShow = $('#select_DayShow').val();
            $checkFilm = $('#select_film').val();
            $checkBrand = $('#select_brand').val();
            // kiểm tra dayshow nếu đúng thì gọi ajax xuất suất chiếu
            if($checkDayShow !== 'setngaychieu'){
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.ticket.show') }}",
                    data: {dayShow : $checkDayShow,num_check_1: 1,num_check: 1,idFilm : $checkFilm ,idBrand : $checkBrand},
                    dataType: "html",
                    success: function (chau) {
                        $('#select_time').html(chau);                   
                    }
                });
            }
        })

        $('.check_time').change(function(){
            // lấy giá trị của suat chieu
            $time_slot = $('#select_time').val();
            $checkDayShow = $('#select_DayShow').val();
            $checkFilm = $('#select_film').val();
            $checkBrand = $('#select_brand').val();
            // kiểm tra time_slot nếu đúng thì gọi ajax xuất suất chiếu
            var element = document.getElementById("chonghe");
                        element.classList.add("show_off");
            if($time_slot !== 'setthoigian' && $checkDayShow !== 'setngaychieu'  && $checkFilm !== 'setphim' && $checkBrand !== 'setchinhanh'){
                $.ajax({                    
                    type: "POST",
                    url: "{{ route('admin.ticket.showseat') }}",
                    data: {num_check_1: 2,idShow : $time_slot},
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
                        
                        var element = document.getElementById("chonghe");
                        element.classList.remove("show_off");

                        $(document).ready(function() {
                            init_BookingTwo();
                        });
                        
                    }
                })

                $time__id = $('#select_time').val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.ticket.getmoney')}}",
                    data:  {idtime: $time__id},
                    dataType: "json",
                    success: function (tien) {
                        $a = tien[0];
                        $('#settien').val($a['timeprice']);
                    }
                });
            }
        })

    </script>
    <script src="{{ asset('HTML/js/custom.js')}}"></script>
    
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            init_BookingTwo();
        });
    </script> --}}
@endpush
@endsection