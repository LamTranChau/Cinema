@extends('admin.master')

@section('module','Suất chiếu')
@section('action','Đăng ký')

@section('content')
@push('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/fontawesome-free/css/all.min.css ')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/daterangepicker/daterangepicker.css ')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/icheck-bootstrap/icheck-bootstrap.min.css ')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css ')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css ')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/select2/css/select2.min.css ')}}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css ')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/bs-stepper/css/bs-stepper.min.css ')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/dropzone/min/dropzone.min.css ')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminNe/dist/css/adminlte.min.css ')}}">

@endpush

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.showtime.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Chọn phim :</label>
                        <select id='select_film' class="custom-select check_room check_time" name="film_id">
                            <option value='setphim'>Chọn tên phim</option>
                            @foreach ($film as $filmitem)
                                <option value="{{ $filmitem -> id}}">{{ $filmitem -> filmname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn chi nhánh :</label>
                        <select id='select_brand' class="custom-select check_room check_time" name="brand_id">
                            <option value='setchinhanh'>Chọn chi nhánh</option> 
                            @foreach ($brand as $branditem)
                                <option value="{{ $branditem -> id}}">{{ $branditem -> brandname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn phòng chiếu :</label>
                        <select id='select_room' class="custom-select check_time" name="room_id">                           
                            <option value='setroom'>Vui lòng chọn chi nhánh trước</option>                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày chiếu :</label>
                        <input id='select_date'  type="date" class="form-control check_time" name="date_time">
                    </div>
                    <div class="form-group">
                        <label>Giờ chiếu :</label>
                        <select id='select_time' class="custom-select" name="time_id">                           
                            <option>Vui lòng chọn đủ thông tin phía trên</option>                           
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
        // setup ajax
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        // render phòng chiếu mỗi khi chi nhánh thay đổi
        $('.check_room').change(function () {
            $id = $('#select_brand').val(); // id của chi nhánh
            $checkfilm = $('#select_film').val(); // lấy dữ liêụ phim
            if($checkfilm !== 'setphim' && $id !== 'setchinhanh'){
                $.ajax({
                type: "POST",
                url: "{{ route('admin.showtime.show') }}",
                data: {idbrand : $id,check: 0},
                dataType: "html",
                success: function (xhtml) {                    
                    $('#select_room').html(xhtml);                  
                }
            });
            }
            
        })
        
        $('.check_time').change(function () {
            // bước 1: Lấy date từ ô input để kiểm tra            
            $check_date = $('#select_date').val(); // lấy mm/dd/yyyy
            $text = $check_date.slice(5,10); // cắt chuỗi lấy mm/dd/yyyy
            $text = $text.replace("-","/");// sửa - thành /
            $con = new Date($check_date).getDay(); // lấy thứ trong tuần của $date
            $le = ['01/01','04/30','05/01','09/02','02/14','03/08','10/20','12/24']; // mảng ngày lễ.
            $cuoituan = [0,5,6]; // mảng ngày cuối tuần .
            $ngaythuong = [1,2,3,4]; // mảng ngày trong tuần.

            // Tạo $time: chứa special day
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

            $check_film = $('#select_film').val();
            $check_brand = $('#select_brand').val();
            $check_room = $("#select_room").val();

            if($check_room !== 'setroom' && $check_film !== 'setphim' && $check_brand !== 'setchinhanh' && $time !== 0){
                console.log($check_room,$check_film,$check_brand,$time );
                $.ajax({
                type: "POST",
                url: "{{ route('admin.showtime.show') }}",
                data: {num_day : $time,idroom: $check_room,idfilm: $check_film,idbrand: $check_brand,date : $check_date,check:1},
                dataType: "html",
                    success: function (xhtml) {   
                        // console.log(xhtml);              
                        $('#select_time').html(xhtml);          
                    }
            }   );
            }

            
        })


        // Áp điều kiện, không cho chọn ngày trong quá khứ để book lịch
        $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();            
            if(month < 10){
                month = '0' + month.toString();
            }
            if(day < 10){
                day = '0' + day.toString();
            }
            
            var maxDate = year + '-' + month + '-' + day;           

            $('#select_date').attr('min', maxDate);
        });
            
    </script>
@endpush
@endsection