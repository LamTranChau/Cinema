@extends('admin.master')
@section('module','Category_film')
@section('action','index')
@section('content')

@push('css')
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset('adminNe/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ) }}">
@endpush

<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with @yield('module')</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>Category_id</th>
            <th>Film_id</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
          @foreach($categoryfilm as $item)
          <tr>
              <td>{{$loop-> iteration}}</td>
              <td>
                @foreach($category as $categoryitem)
                  {{$item -> category_id == $categoryitem-> id ? $categoryitem-> name : "" }}
                @endforeach
              </td>
              <td>
                @foreach($film as $filmitem)
                  {{$item -> film_id == $filmitem-> id ? $filmitem-> id : "" }}
                @endforeach
              </td>             
              <td><a href="{{route('admin.categoryfilm.edit',['id' => $item->id])}}">Edit</a></td>
              <td><a href="{{route('admin.categoryfilm.destroy',['id' => $item->id])}}">Delete</a></td>
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