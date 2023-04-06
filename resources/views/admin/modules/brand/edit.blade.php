@extends('admin.master')

@section('module','Chi nhánh')
@section('action','Chỉnh sửa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.brand.update',['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên chi nhánh</label>
                        <input type="text" name="brandname" value="{{ old('brandname',$brand->brandname)}}" class="form-control" placeholder="Nhập tên chi nhánh">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" value="{{ old('address',$brand->address)}}" class="form-control"placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh cũ</label>
                        <img src="{{ asset('upload') }}/{{$brand->brandimage}} " width="100%" height="225">                       
                        <input type="file" name='brandimage' value="{{ old('brandimage',$brand->brandimage)}}" class="form-control">                
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