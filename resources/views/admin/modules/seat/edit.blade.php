@extends('admin.master')

@section('module','Seat')
@section('action','Edit')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.seat.update',['id' => $seat->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Seat slot</label>
                        <input type="text" name="seatname" value="{{ $seat->seatname }}" class="form-control" placeholder="Enter seat name">
                    </div>
                    <div class="form-group">
                        <label>Category Seat</label>
                        <input type="text" name="cate_seat" value="{{ $seat->cate_seat }}" class="form-control" placeholder="Enter category seat">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="seatprice" value="{{ $seat->seatprice }}" class="form-control"placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label>Room id</label>
                        <input type="text" name="room_id" value="{{ $seat->room_id }}" class="form-control"placeholder="Enter room_id">
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