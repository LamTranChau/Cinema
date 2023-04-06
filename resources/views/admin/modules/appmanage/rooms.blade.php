@extends('admin.master')
@section('module','Quản lý')
@section('action','Phòng chiếu')
@section('content')

 @push('css')

 @endpush

    <section>
        <div class="container">
          <div class='mb-5'>
            <div class='d-flex text-center'>
              <div class="p-2 flex-grow-0">
                <a type="button" class="btn btn-secondary" href="{{route('admin.appmanage.index')}}">Trở về</a>
              </div>
              <div class="p-2 flex-grow-1 ">
                  <h3 class='text-uppercase fw-bold'>Danh sách các phòng chiếu</h3>
              </div>
              <div class="p-2 flex-grow-2">
                <a type="button" class="btn btn-primary" href="{{route('admin.room.create')}}">Đăng ký</a>
              </div>
            </div>
            <div class='text-center'>
              <h5>{{$brand_name->brandname}} : {{$count}} phòng chiếu</h5>
            </div>
          </div>
            
            <div class="content">
                <div class="row">
                  @foreach ($rooms as $item)
                    <div class="col-4 text-center">
                        <div class="card shadow-sm">
                          <div>
                            <img src="{{asset('upload') }}/room-null.jpg" width="100%" height="225">               
                          </div>
                          <div class="card-body">
                            <h4>{{$item->roomname}}</h4>
                            <div class="">
                              <div class="btn-group">
                                <a href="{{route('admin.appmanage.seats',['id' => $item->id])}}" type="button" class="btn btn-md btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('admin.room.edit',['id' => $item->id])}}" type="button" class="btn btn-md btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('admin.room.destroy',['id' => $item->id])}}" type="button" class="btn btn-md btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </section>

  @push('js')
    <script>
        
    </script>
  @endpush

  @push('jshand')
    <script>
    
    </script>
  @endpush
@endsection