@extends('admin.master')
@section('module','Quản lý')
@section('action','Chi nhánh')
@section('content')

 @push('css')

 @endpush

    <section>
        <div class="container">
            <div class='d-flex mb-3'>
                <div class="p-2 flex-grow-1 text-center">
                    <h3 class='text-uppercase fw-bold mb-5'>Danh sách các chi nhánh</h3>
                </div>
            </div>
            <div class="content">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                 
                    <div class="col text-center">
                        <div class="card shadow-sm">
                          <div>
                            <img src="#" width="100%" height="225">               
                          </div>
                          <div class="card-body">
                            <h4>$item->brandname</h4>
                            <p class="card-text">
                              $item->address
                            </p>
                            <div class="">
                              <div class="btn-group">
                                <a href="#" type="button" class="btn btn-md btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                <a href="#" type="button" class="btn btn-md btn-outline-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" type="button" class="btn btn-md btn-outline-danger"><i class="fa-solid fa-trash"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>

  @push('js')
    <script>
        
    </script>
  @endpush

  @push('jshand')
    <script>
    
    </script>
  @endpush
@endsection