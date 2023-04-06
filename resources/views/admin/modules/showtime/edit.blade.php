@extends('admin.master')

@section('module','Suất chiếu')
@section('action','Chỉnh sửa')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.showtime.update',['id' => $showtime->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Chọn phim :</label>
                        <select class="custom-select heheboy" name="film_id">
                            <option>Chọn tên phim</option>
                            @foreach ($film as $filmitem)
                                <option {{$showtime->film_id == $filmitem->id ? ' selected' : '' }} value="{{ $filmitem -> id}}">{{ $filmitem -> filmname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn chi nhánh :</label>
                        <select id='chonchinhanh' class="custom-select" name="brand_id">
                            <option>Chọn chi nhánh</option> 
                            @foreach ($brand as $branditem)
                                <option {{$showtime->brand_id == $branditem->id ? ' selected' : '' }} value="{{ $branditem -> id}}">{{ $branditem -> brandname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn phòng chiếu :</label>
                        <select id='select_room' class="custom-select heheboy" name="room_id">                           
                            <option value='setroom'>Vui lòng chọn chi nhánh trước</option>
                            @foreach ($room as $roomitem)
                                <option {{$showtime->room_id == $roomitem->id ? ' selected' : '' }} value="{{ $roomitem -> id}}">{{ $roomitem -> roomname }}</option>
                            @endforeach                      
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày chiếu :</label>
                        <input id='chonngay' value='{{$showtime->date_time}}' type="date" class="form-control heheboy" name="date_time">
                    </div>
                    <div class="form-group">
                        <label>Giờ chiếu :</label>
                        <select id='select_time' class="custom-select" name="time_id">                           
                            @foreach ($time as $timeitem)
                                <option {{$showtime->time_id == $timeitem->id ? ' selected' : '' }} value="{{ $timeitem -> id}}">{{ $timeitem -> time_slot }}</option>
                            @endforeach                          
                        </select>
                    </div>                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@yield('action')</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
 

@push('js')
        
    <!-- jQuery -->
    <script src="{{ asset('adminNe/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminNe/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminNe/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('adminNe/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminNe/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('adminNe/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('adminNe/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminNe/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminNe/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('adminNe/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('adminNe/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminNe/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminNe/dist/js/demo.js')}}"></script>
@endpush
@push('jshand')
    {{-- CHọn ngày mặc định của adminlte --}}
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $('#chonchinhanh').change(function () {
        $id = $('#chonchinhanh').val(); // id của chi nhánh
        console.log($id);        
        $.ajax({
            type: "POST",
            url: "{{ route('admin.showtime.show') }}",
            data: {idbrand : $id},
            dataType: "html",
            success: function (xhtml) {                    
                $('#select_room').html(xhtml);                  
            }
        });
    })   
    
    $('.heheboy').change(function () {
        $date = $('#chonngay').val(); // lấy mm/dd/yyyy
        $text = $date.slice(5,10); // cắt chuỗi lấy mm/dd/yyyy
        $text = $text.replace("-","/");// sửa - thành /
        $con = new Date($date).getDay(); // lấy thứ trong tuần của $date
        $le = ['01/01','04/30','05/01','09/02','02/14','03/08','12/24']; // mảng ngày lễ.
        $cuoituan = [0,5,6]; // mảng ngày cuối tuần .
        $ngaythuong = [1,2,3,4]; // mảng ngày trong tuần.
        
        if($le.includes($text)){
            // nếu là ngày lễ thì
            console.log('lễ~');
            $time = 3;
            } else if ($cuoituan.includes($con)){
                // nếu là ngày cuối tuần
                console.log('cuối tuần');
                $time = 2;
            } else if ($ngaythuong.includes($con)){
                // nếu là ngày trong tuần
                console.log('trong tuần~');
                $time = 1;
            } else {
                //Nếu lỗi thì sao
                console.log('lỗi~');
                $time = 0;
        }
        
        // kiểm tra trung lập
        $checkroom = $("#select_room").val();
        $checkfilm = $('#select_film').val();
        if($checkroom !== 'setroom' && $checkfilm !== 'setphim'){
            $id = $('#select_room').val(); // lấy room id
            $.ajax({
            type: "POST",
            url: "{{ route('admin.showtime.show') }}",
            data: {daytest : $time,idroom: $id,date : $date},
            dataType: "html",
                success: function (xhtml) {                    
                    $('#select_time').html(xhtml);                
                }
        }   );
        }

        
    })

    // Áp điều kiện ngày
    $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        $('#chonngay').attr('min', maxDate);
    });
        
</script>
@endpush


@endsection