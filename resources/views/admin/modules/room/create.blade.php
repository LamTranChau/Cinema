@extends('admin.master')

@section('module','Phòng chiếu')
@section('action','Khởi tạo')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.room.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên chi nhánh</label>
                        <select class="custom-select" name="brand_id">
                            @foreach ($brand as $branditem)
                                <option value="{{ $branditem -> id}}">{{ $branditem->brandname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên phòng chiếu</label>
                        <input type="text" name="roomname" value="{{old('roomname')}}" class="form-control" placeholder="Nhập tên phòng: Rxx">
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