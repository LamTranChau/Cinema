@extends('admin.master')

@section('module','Thể loại')
@section('action','Chỉnh sửa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.category.update',['id' => $category->id]) }}" method="post" enctype="multipart/form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" name="categoryname" value='{{ old('categoryname',$category->categoryname)}}' class="form-control" placeholder="Nhập tên loại loại phim">
                    </div>
                    <div class="form-group">
                        <label>Parent id</label>
                        <input type="number" name="parent_id" value='{{ old('parent_id',$category->parent_id)}}' class="form-control" placeholder="Enter parent_id">
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