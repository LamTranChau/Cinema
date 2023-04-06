@extends('admin.master')
@section('module','Thanh toán')
@section('action','Danh sách')
@section('content')
@push('css')
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ) }}">
@endpush
<?php
function currency_format($number, $suffix = ' VND') {
    if (!empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}
?>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bảng danh sách @yield('module')</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>STT</th>            
            <th>Mã đơn</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Ngày đăng ký</th>
            <th>Email người mua</th>
            <th>Sđt người mua</th>
            </tr>
        </thead>
        <tbody>
          @foreach($payment as $item)
          <tr>
              <td>{{$loop-> iteration}}</td>             
              <td>{{$item -> madon}}</td>
              <td>{{$item -> trangthai == '00' ? 'Đã thanh toán' : 'Thất bại'}}</td>
              <td>{{currency_format($item -> tien)}}</td>
              <td>{{ date("d/m/y",strtotime($item -> created_at)) }}</td>
              <td>{{$item -> useremail}}</td>
              <td>{{$item -> userphone}}</td>        
          </tr>
          @endforeach  
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->

</div>
@push('js')
    <script src="{{ asset('adminNe/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('adminNe/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endpush

@push('jshand')
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
@endsection