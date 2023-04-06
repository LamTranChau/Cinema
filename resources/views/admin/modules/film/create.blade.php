@extends('admin.master')

@section('module','Phim')
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
            <form  action="{{ route('admin.film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên phim</label>
                        <input type="text" name="filmname" value="{{ old('filmname')}}" class="form-control" placeholder="Nhập tên phim">
                    </div>
                    <div class="form-group">
                      <label>Hình ảnh</label>                        
                      <input type="file" name='image' value="{{ old('image')}}" class="form-control">                
                    </div>                    
                    <div class="form-group">
                        <label>Video giới thiệu</label>
                        <input type="text" name="trailer" value="{{ old('trailer')}}" class="form-control" placeholder="Nhập đường dẫn">
                    </div>                    
                    <label>Thể loại</label>
                    @foreach ($category as $item)
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" value="{{ $item ->id }}" name="category_id[]">
                        </div>
                      </div>
                      <input type="text" value='{{ $item->categoryname }}' disabled class="form-control">
                    </div>
                    @endforeach
                    
                    <div class="form-group">
                        <label>Ngày khởi chiếu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" value="{{ old('start_day')}}" class="form-control" data-inputmask-alias="datetime" name='start_day' data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                        </div>
                        <!-- /.input group -->
                    </div>
                    {{-- <div class="form-group">
                        <label>End day</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask-alias="datetime" 
                                name='end_day'
                                data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Showing</label>
                        <div>
                            <input type="checkbox" name="showing" value="1" data-bootstrap-switch>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hot</label>
                        <div>
                            <input type="checkbox" value="1" name="hot" data-bootstrap-switch>
                        </div>
                    </div> --}}
                    <div class="form-group">
                      <label>Đạo diễn</label>
                      <input type="text" value="{{ old('director')}}" name="director" class="form-control" placeholder="Nhập tên đạo diễn">
                    </div>
                    <div class="form-group">
                      <label>Quốc gia</label>
                      <input type="text" name="country" value="{{ old('country')}}" class="form-control" placeholder="Nhập tên quốc gia">
                    </div>
                    <div class="form-group">
                      <label>Nhà sản xuất</label>
                      <input type="text" name="NSX" value="{{ old('NSX')}}" class="form-control" placeholder="Nhập tên nhà sản xuất">
                    </div>
                    <div class="form-group">
                        <label>Dàn diễn viên</label>
                        <input type="text" name="castes" value="{{ old('castes')}}" class="form-control" placeholder="Nhập tên dàn diễn viên">
                    </div>

                    <div class="form-group">
                        <label>Thời lượng</label>
                        <input type="number" value="{{ old('time_film')}}" name="time_film" class="form-control" placeholder="Nhập thời lượng (phút)">
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea type="text" id="ten" name="description" class="form-control" rows="3" placeholder="Nhập mô tả của phim">{{ old('description')}}
                      </textarea>
                      <script>CKEDITOR.replace('ten')</script>
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

<script type="text/javascript">
  $(function() {
      $('#ten').ckeditor({
          toolbar: 'Full',
          enterMode : CKEDITOR.ENTER_BR,
          shiftEnterMode: CKEDITOR.ENTER_P
      });
  });
  CKEDITOR.config.autoParagraph = false;
</script>
  
<script>
  
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
  
      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })
  
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
  
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
  
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false
  
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)
  
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })
  
    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })
  
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })
  
    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })
  
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })
  
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
@endpush
@endsection