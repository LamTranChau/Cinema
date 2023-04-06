@extends('admin.master')
@section('module','Suất chiếu')
@section('action','Danh sách')
@section('content')
@push('css')
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ) }}">
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách các @yield('module')</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>STT</th>
            <th>Ngày chiếu</th>
            <th>Chi nhánh</th>
            <th>Phòng chiếu</th>
            <th>Phim</th>
            <th>Thời gian</th>
            <th>Giá tiền</th>
            {{-- <th>Ngày đăng ký</th> --}}
            <th>Sửa</th>
            <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
          @foreach($showtime as $item)
          <tr>
              <td>{{$loop-> iteration}}</td>
              <td>{{ date("d/m/y",strtotime($item -> date_time)) }}</td>
              <td>{{$item-> brandname}}</td>
              <td>{{$item-> roomname}}</td>
              <td>{{$item-> filmname}}</td>
              <td>{{$item-> time_slot}}</td>
              <td>{{$item-> timeprice}}</td>
              </td>
              {{-- <td>{{ date("d/m/y",strtotime($item -> created_at)) }}</td> --}}
              <td><a class="btn btn-sm btn-outline-secondary" href="{{route('admin.showtime.edit',['id' => $item->id])}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
              <td><a class="btn btn-sm btn-outline-secondary" href="{{route('admin.showtime.destroy',['id' => $item->id])}}"><i class="fa-solid fa-trash"></i></a></td>
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