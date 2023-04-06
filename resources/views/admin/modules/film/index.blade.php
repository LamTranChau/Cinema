@extends('admin.master')
@section('module','Phim')
@section('action','Danh sách')
@section('content')
@push('css')
  {{-- <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ) }}"> --}}
  <style>
    .movie__images img {
      width:100%;
      border:5px solid #fff;
      border-radius: 5px;
    }
  </style>
 
@endpush
<div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($film as $item)
          <div class="col">
            <div class="card shadow-sm">
              <div>
                <img src="{{asset('upload') }}/{{$item->image }}" width="100%" height="225">               
              </div>
              <div class="card-body">
                <h3><b>{{$item->filmname}}</b></h3>
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
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{route('admin.film.show',['id' => $item->id])}}" type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.film.edit',['id' => $item->id])}}" type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{route('admin.film.destroy',['id' => $item->id])}}" type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-trash"></i></a>
                  </div>
                  <small class="text-muted">{{$item->time_film}} mins</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@push('js')
  {{-- <script src="{{ asset('adminNe/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}
  

@endpush  

@push('jshand')
<script>
// {{asset('upload') }}/{{$item->image}}
</script>
@endpush
@endsection