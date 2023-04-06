@extends('admin.master')

@section('module','Người dùng')
@section('action','Đăng ký')

@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('adminNe/plugins/daterangepicker/daterangepicker.css' ) }}">
@endpush

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 offset-4">
            <form  action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="card-body">                    
                    <div class="form-group">
                        <label>Địa chỉ Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control"placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control"placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="full_name" value="{{old('full_name')}}" class="form-control"placeholder="Nhập họ và tên">
                    </div>                    
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input id='phone' type="text" class="form-control" value="{{old('phone')}}" placeholder="Nhập STĐ theo mẫu: 0xx-xxxx-xxxx" name="phone">
                        </div>
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
    <!-- Select2 -->
    <script src="{{ asset('adminNe/plugins/select2/js/select2.full.min.js' ) }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminNe/plugins/moment/moment.min.js' ) }}"></script>
    <script src="{{ asset('adminNe/plugins/inputmask/jquery.inputmask.min.js' ) }}"></script>
@endpush

@push('jshand')

    <script>
        let name = document.getElementById("phone");
        name.addEventListener("input", function(e){
        name.setCustomValidity('');//remove message when new text is input
        });
        name.addEventListener("invalid", function(e){
        name.setCustomValidity('Vui lòng nhập đúng định dạng: 0xx-xxxx-xxxx');//custom validation message for invalid text
        });


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

{{-- <input id='phone' type="text" class="form-control" value="{{old('phone')}}" placeholder="Nhập STĐ theo mẫu: 0xx-xxxx-xxxx" name="phone" data-inputmask="'mask': ['999-999-9999']" autocomplete="off" data-mask="" inputmode="text"> --}}

