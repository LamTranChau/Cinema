@extends('admin.master')

@section('module','Seat_Ticket')
@section('action','Create')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.seatticket.update' ,['id' => $seatticket->id]) }}" method="post" enctype="multipart/form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Time_id</label>
                        <input type="text" name="time_id" value="{{ $seatticket->time_id }}" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Film_id</label>
                        <input type="text" name="film_id" value="{{ $seatticket->film_id }}" class="form-control"
                        placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Total_price</label>
                        <input type="number" name="total_price" value="{{ $seatticket->total_price }}" class="form-control"placeholder="Enter total_price">
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