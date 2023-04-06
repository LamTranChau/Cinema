@extends('admin.master')

@section('module','Seat')
@section('action','Create')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.seat.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Seat slot</label>
                        <input type="text" name="seatname" class="form-control" placeholder="Enter seat name">
                    </div>
                    <div class="form-group">
                        <label>Category Seat</label>
                        <input type="text" name="cate_seat" class="form-control" placeholder="Enter category seat">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="seatprice" class="form-control"placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label>Room</label>
                        <select class="custom-select" name="room_id">
                            @foreach ($room as $room1)
                                <option value="{{ $room1 -> id}}">{{ $room1->roomname }}</option>
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