@extends('client.master')

@section('content')
    @push('css')   
    @endpush

    <section class="container">
        <div class="col-sm-12">
            <div class="movie">
                <h2 class="page-heading">{{$film->filmname}}</h2>                
                <div class="movie__info">
                    <div class="col-sm-4 col-md-3 movie-mobile">
                        <div class="movie__images">
                            <span class="movie__rating">5.0</span>
                            <img style="height: 366px;width: 249px;" src="{{ asset('upload') }}/{{$film->image}}">
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-9">
                        <p class="movie__time">{{$film->time_film}} min</p>

                        <p class="movie__option"><strong>Quốc gia:</strong> {{$film->country}}</p>
                        <p class="movie__option"><strong>Year: </strong><a href="#">2012</a></p>
                        <p class="movie__option"><strong>Thể loại: </strong>
                        
                            <?php $chau = 0; ?>
                                @foreach($category_film as $itemcate)
                                    @if($itemcate->film_id == $film->id)
                                        @if($chau == 1)
                                            | {{$itemcate->categoryname}}
                                        @endif
                                        @if($chau == 0)
                                            {{$itemcate->categoryname}}
                                            <?php $chau = 1?>
                                        @endif                                    
                                    @endif
                                @endforeach
                        </p>
                        <p class="movie__option"><strong>Ngày khởi chiếu: </strong>{{$film->start_day}}</p>
                        <p class="movie__option"><strong>Đạo diễn: </strong>{{$film->director}}</p>
                        <p class="movie__option"><strong>Diễn viên: </strong>{{$film->castes}},...</p>
                        <p class="movie__option"><strong>Độ tuổi: </strong>13</p>

                        <div class="movie__btns movie__btns--full" style='display: none;'>
                            <a href="#" class="btn btn-md btn--warning">Đặt vé cho bộ phim này</a>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <h2 class="page-heading">Cốt truyện phim</h2>

                <p class="movie__describe">{{$film->description}} </p>

            </div>

            <h2 class="page-heading">Suất chiếu &amp; vé</h2>
            <div class="choose-container">
                

                <div style="margin-left:50px">
                    <span class="datepicker__marker" style="margin-right:10px"><i class="fa fa-calendar" style="margin-right:10px"></i>Date</span>
                    <select id='datepicker' style="width:10%;
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
                        @foreach($ngaychieu as $item)
                            <option value='{{$item ->date_time}}'>{{date("d/m/y",strtotime($item ->date_time))}}</option>
                        @endforeach
                    </select>
                   
                </div>

                <div class="clearfix"></div>

                <div class="time-select">
                    @foreach($brand as $branditem)
                    <div class="time-select__group group--first">
                        <div class="col-sm-4">
                            <p class="time-select__place">{{$branditem -> brandname}}</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <?php
                            $co = 0;
                                foreach($showtime as $showtimeItem){
                                    if($showtimeItem->brand_id == $branditem->id && $film->id == $showtimeItem->film_id){
                                       echo '<li class="time-select__item">' . $showtimeItem->time_slot . '</li>';
                                       $co++;
                                    }                                    
                                    if($co == 5 ){
                                        break;
                                    }
                                }                                
                            ?>                            
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>            
   
    @push('js')
   
    @endpush

    @push('jshand')
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })
            
        </script>
    @endpush

@endsection
