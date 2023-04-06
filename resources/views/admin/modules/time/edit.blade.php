@extends('admin.master')

@section('module','Thời gian')
@section('action','Chỉnh sửa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.time.update',['id' => $time->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Thời gian</label>
                        <input type="text" name="time_slot" value="{{old('time_slot',$time->time_slot)}}" class="form-control" placeholder="Nhập thời gian : xx:xx">
                    </div>
                    <div class="form-group">
                        <label>Ngày đặc biệt</label>
                        <select class="custom-select" name="special_day">
                            <option {{$time->special_day == '1' ? 'selected' : ''}} value="1">Ngày thường</option>
                            <option {{$time->special_day == '2' ? 'selected' : ''}} value="2">Cuối tuần</option>
                            <option {{$time->special_day == '3' ? 'selected' : ''}} value="3">Ngày lễ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá tiền</label>
                        <input type="number" value="{{old('timeprice',$time->timeprice)}}" name="timeprice" class="form-control"placeholder="Nhập giá tiền theo ngày">
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