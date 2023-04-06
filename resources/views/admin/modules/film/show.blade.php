@extends('admin.master')
@section('module','Phim')
@section('action','Thông tin')
@section('content')
@push('css')
  
@endpush
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="{{ asset('upload') }}/{{$film->image}}" class="img-fluid" alt="">         
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3><b>{{$film->filmname}}</b></h3>
          <div class="row" style="font-size: 18px;">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Đạo diễn: </strong> <span>{{$film->director}}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Nhà sản xuất: </strong> <span>{{$film->NSX}}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Ngày phát hành: </strong> <span>{{$film->start_day}}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Quốc gia: </strong> <span>{{$film->country}}</span></li>
                
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Diễn viên: </strong> <span>{{$film->castes}}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Thời lượng: </strong> <span>{{$film->time_film}} phút</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Thể loại: </strong>
                  @foreach ($cate as $item)
                    <span>{{$item->categoryname}},</span>
                  @endforeach
                </li>              
              </ul>
            </div>
            <a class="btn btn-block btn-outline-secondary" href="{{ route('admin.film.index')}}">back</a>
          </div>                  
        </div>
      </div>
      <div class='mt-5'>
        <div class="h3 pb-2 mb-4 border-bottom border-success">
          Nội dung phim
        </div>
        <p style="font-size: 18px;">
          {{$film->description}}
        </p> 
      </div>
      <div class='mt-5'>
        <div class="h3 pb-2 mb-4 border-bottom border-success">
         Trailer
        </div>
        <div style='text-align:center;'>
          {{-- @php 
          //  $url = $film->trailer;
           $url = $film->trailer.replace('/watch', '/embed');
           $film->trailer = $url;
          @endphp --}} 
          <iframe height='500' width='80%' frameborder="0" src="{{$film->trailer}}" allowfullscreen=""></iframe>          
        </div>
      </div>
    </div>
  </section>

@push('js')
@endpush  

@push('jshand')
<script>

</script>
@endpush
@endsection