@extends('client.master')

@section('content')
    @push('css')
    
    @endpush

    {{-- Carousel --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $count1 = 0 ?>
            @foreach($film as $item)
                @if($count1 == 1)
                <div class="carousel-item">
                    <img src="{{ asset('upload') }}/{{$item->image}}" style="height: 616px;width: 1920px;" class="d-block w-100" alt="...">
                    </div>
                @endif
                @if($count1 == 0)
                    <div class="carousel-item active">
                        <img src="{{ asset('upload') }}/{{$item->image}}" style="height: 616px;width: 1920px;" class="d-block w-100" alt="...">
                    </div>
                    <?php $count1 = 1?>
                @endif 
                
            @endforeach          
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
        
    <section class="container">    
        <h2 id='target' class="page-heading heading--outcontainer">Phim đang chiếu</h2>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($film as $item)
                    <!-- Movie variant with time -->
                    <div class="movie movie--test movie--test--dark movie--test--left">
                        <div  class="movie__images">
                            <a href="{{route('client.moviepage',['id' => $item->id])}}"  class="movie-beta__link">
                                <img  style="height: 277.5px;width: 277.5px;" src="{{ asset('upload') }}/{{$item->image}}">
                            </a>
                        </div>

                        <div class="movie__info">
                            <a href='{{route('client.moviepage',['id' => $item->id])}}' class="movie__title">{{$item->filmname}}</a>

                            <p class="movie__time">{{$item->time_film}}</p>

                            <p class="movie__option">
                                <?php $count = 0; ?>
                                @foreach($category_film as $itemcate)
                                    @if($itemcate->film_id == $item->id)
                                        @if($count == 1)
                                            | <a href="{{route('client.moviepage',['id' => $item->id])}}">{{$itemcate->categoryname}}</a>
                                        @endif
                                        @if($count == 0)
                                            <a href="{{route('client.moviepage',['id' => $item->id])}}">{{$itemcate->categoryname}}</a>
                                            <?php $count = 1?>
                                        @endif                                    
                                    @endif
                                @endforeach
                                <?php $count = 0; ?>
                            </p>
                            <p class="card-text">
                                @php
                                $text = $item->description;
                                if(mb_strlen($text) > 100){    
                                    $text = mb_substr($text,0,100); // lấy đoạn chuỗi có 100 ký tự.                      
                                    $pos = mb_strrpos($text,' '); // lấy đoạn chuỗi có 100 ký tự bỏ bớt chữ bị cắt mất nghĩa.
                                    $text = mb_substr($text,0,$pos);                      
                                    echo "$text ...";
                                } else {
                                    echo $text;
                                }
                                @endphp
                            </p>       
                        </div>
                    </div>
                    <!-- Movie variant with time -->
                    @endforeach
                
                </div>                    
            </div>
        </div>
        {{-- Giới thiệu rạp --}}
        <div class="col-sm-12">                                              
            <h2 class="page-heading">Giới thiệu A.Move</h2>
            <p style="font-size: 16px;">
                <b>A.Move</b> là một trong những công ty tư nhân đầu tiên về điện ảnh được thành lập từ năm 2003, đã khẳng định thương hiệu là 1 trong 10 địa điểm vui chơi giải trí được yêu thích nhất. Ngoài hệ thống rạp chiếu phim hiện đại, thu hút hàng triệu lượt người đến xem, <b>A.Move</b> còn hấp dẫn khán giả bởi không khí thân thiện cũng như chất lượng dịch vụ hàng đầu.<br><br> Đến website galaxycine.vn, khách hàng sẽ dễ dàng tham khảo các phim hay nhất, phim mới nhất đang chiếu hoặc sắp chiếu luôn được cập nhật thường xuyên. Lịch chiếu tại tất cả hệ thống rạp chiếu phim của <b>A.Move</b> cũng được cập nhật đầy đủ hàng ngày hàng giờ trên trang chủ.<br><br> Từ vũ trụ điện ảnh Marvel, người hâm mộ sẽ có cuộc tái ngộ với Người Nhện qua Spider-Man: No Way Home hoặc Doctor Strange 2. Ngoài ra 007: No Time To Die, Turning Red, Minions: The Rise Of Gru..., là những tác phẩm hứa hẹn sẽ gây bùng nổ phòng vé trong thời gian tới.<br><br> Giờ đây đặt vé tại <b>A.Move</b> càng thêm dễ dàng chỉ với vài thao tác vô cùng đơn giản. Để mua vé, hãy vào tab Mua vé. Quý khách có thể chọn Mua vé theo phim, theo rạp, hoặc theo ngày. Sau đó, tiến hành mua vé theo các bước hướng dẫn. Chỉ trong vài phút, quý khách sẽ nhận được tin nhắn và email phản hồi Đặt vé thành công của <b>A.Move</b>. Quý khách có thể dùng tin nhắn lấy vé tại quầy vé của <b>A.Move</b> hoặc quét mã QR để một bước vào rạp mà không cần tốn thêm bất kỳ công đoạn nào nữa.<br><br> Nếu bạn đã chọn được phim hay để xem, hãy đặt vé cực nhanh bằng box Mua Vé Nhanh ngay từ Trang Chủ. Chỉ cần một phút, tin nhắn và email phản hồi của <b>A.Move</b> sẽ gửi ngay vào điện thoại và hộp mail của bạn.<br><br> Nếu chưa quyết định sẽ xem phim mới nào, hãy tham khảo các bộ phim hay trong mục Phim Đang Chiếu cũng như Phim Sắp Chiếu tại rạp chiếu phim bằng cách vào mục Bình Luận Phim ở Góc Điện Ảnh để đọc những bài bình luận chân thật nhất, tham khảo và cân nhắc. Sau đó, chỉ việc đặt vé bằng box Mua Vé Nhanh ngay ở đầu trang để chọn được suất chiếu và chỗ ngồi vừa ý nhất.<br><br>   <b>A.Move</b> luôn có những chương trình khuyến mãi, ưu đãi, quà tặng vô cùng hấp dẫn như giảm giá vé, tặng vé xem phim miễn phí, tặng Combo, tặng quà phim…  dành cho các khách hàng.<br><br> Trang web galaxycine.vn còn có mục Góc Điện Ảnh - nơi lưu trữ dữ liệu về phim, diễn viên và đạo diễn, những bài viết chuyên sâu về điện ảnh, hỗ trợ người yêu phim dễ dàng hơn trong việc lựa chọn phim và bổ sung thêm kiến thức về điện ảnh cho bản thân. Ngoài ra, vào mỗi tháng, <b>A.Move</b> cũng giới thiệu các phim sắp chiếu hot nhất trong mục Phim Hay Tháng .<br><br> Hiện nay, <b>A.Move</b> đang ngày càng phát triển hơn nữa với các chương trình đặc sắc, các khuyến mãi hấp dẫn, đem đến cho khán giả những bộ phim bom tấn của thế giới và Việt Nam nhanh chóng và sớm nhất.<br>
            </p>                    
        </div>  
    </section>

    @push('js')        
    @endpush

    @push('jshand')    
    @endpush

@endsection
