@extends('admin.master')
@section('module','Thời gian')
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
        <?php
                    function currency_format($number, $suffix = ' VND') {
                        if (!empty($number)) {
                            return number_format($number, 0, ',', '.') . "{$suffix}";
                        }
                    }
                    ?>
        <thead>
            <tr>
            <th>STT</th>
            <th>Tên thời gian</th>
            <th>Giá tiền</th>
            <th>Ngày đặt biệt</th>
            {{-- <th>Created at</th> --}}
            <th>Sửa</th>
            <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
          @foreach($time as $item)
          <tr>
              <td>{{$loop-> iteration}}</td>
              <td>{{$item -> time_slot}}</td>
              <td>{{currency_format($item -> timeprice)}}</td>
              <td>
                {{-- {{ $item-> special_day}} --}}
                {{ $item-> special_day == '1' ? 'Ngày thường' : ''}}
                {{ $item-> special_day == '2' ? 'Cuối tuần' : ''}}
                {{ $item-> special_day == '3' ? 'Ngày lễ' : ''}}              
              </td>
              {{-- <td>{{ date("d/m/y",strtotime($item -> created_at)) }}</td> --}}
              <td><a class="btn btn-sm btn-outline-secondary" href="{{route('admin.time.edit',['id' => $item->id])}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
              <td><a class="btn btn-sm btn-outline-secondary" href="{{route('admin.time.destroy',['id' => $item->id])}}"><i class="fa-solid fa-trash"></i></a></td>
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