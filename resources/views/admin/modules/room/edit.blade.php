@extends('admin.master')

@section('module','Phòng chiếu')
@section('action','Chỉnh sửa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.room.update',['id' => $room->id])  }}" method="post">
                @csrf
                <div class="card-body">                    
                    <div class="form-group">
                        <label>Tên chi nhánh</label>
                        <select class="custom-select" name="brand_id">
                            @foreach ($brand as $branditem)
                                <option {{$branditem -> id == $room->brand_id ? 'selected' : ''}} value="{{ $branditem -> id }}">{{ $branditem->brandname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên phòng chiếu</label>
                        <input type="text" name="roomname" value="{{ old('roomname',$room ->roomname)}}" class="form-control" placeholder="Nhập tên phòng">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@yield('action')</button>
                    </div>
                </div>                
            </form>
        </div>
    </div>
</div>
 
@endsection