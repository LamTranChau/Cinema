@extends('admin.master')

@section('module','Thời gian')
@section('action','Đăng ký')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.time.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Thời gian</label>
                        <input type="text" name="time_slot" value='{{old('time_slot')}}' class="form-control" placeholder="Nhập thời gian hh:mm">
                    </div>
                    <div class="form-group">
                        <label>Ngày đặc biệt</label>
                        <select class="custom-select" name="special_day">
                            <option value="1">Ngày thường</option>
                            <option value="2">Cuối tuần</option>
                            <option value="3">Ngày lễ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá tiền</label>
                        <input type="number" name="timeprice" value='{{old('timeprice')}}' class="form-control"placeholder="Nhập giá tiền theo ngày">
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