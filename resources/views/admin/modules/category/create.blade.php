@extends('admin.master')

@section('module','Thể loại')
@section('action','Đăng ký')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" name="categoryname" class="form-control" placeholder="Nhập tên loại loại phim">
                    </div>
                    <div class="form-group">
                        <label>Parent id</label>
                        <input type="number" name="parent_id" class="form-control"placeholder="Enter parent_id">
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