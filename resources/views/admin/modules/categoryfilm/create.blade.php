@extends('admin.master')

@section('module','Category_film')
@section('action','Create')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.categoryfilm.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Category_id</label>
                        <select class="custom-select" name="category_id">
                            @foreach ($category as $categoryitem)
                                <option value="{{ $categoryitem -> id}}">{{ $categoryitem -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Film_id</label>
                        <select class="custom-select" name="film_id">
                            @foreach ($film as $filmitem)
                                <option value="{{ $filmitem -> id}}">{{ $filmitem -> id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
 
@endsection