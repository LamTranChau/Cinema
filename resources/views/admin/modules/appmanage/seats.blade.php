@extends('admin.master')
@section('module','Quản lý')
@section('action','Chi nhánh')
@section('content')

 @push('css')
  <link href="{{ asset('HTML/css/restyle.css?v=1' ) }}" rel="stylesheet" />
 @endpush

    <section>
        <div class="container">
          <div class='mb-5'>
            <div class='d-flex text-center'>
              <div class="p-2 flex-grow-0">
                <a type="button" class="btn btn-secondary" href="{{ route('admin.appmanage.rooms',['id' => $room_data->brandid   ])}}">Trở về</a>
              </div>
              <div class="p-2 flex-grow-1 ">
                  <h3 class='text-uppercase fw-bold'>Danh sách các ghế</h3>
              </div>
              <div class="p-2 flex-grow-2">
                <a class="btn-primary btn Create_seat" data-toggle="modal" data-target="#Create__Seat_Modal">Đăng ký</a>
              </div>
            </div>
            <div class='text-center'>
              <h5>{{$room_data -> brandname}} - {{$room_data -> roomname}}</h5>
              <h6>{{$count}} ghế</h6>
            </div>
          </div>            
        </div>
        <div>
          <!-- Modal cho thông tin ghế -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Thông tin Ghế</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id='mycontent'  style="font-size: 20px;"> 
                </div>
                <div class="modal-footer" id="modal_info">                  
                </div>
              </div>
            </div>
          </div>
          <!-- Modal create seat -->
          <div class="modal fade" id="Create__Seat_Modal" tabindex="-1" role="dialog" aria-labelledby="Create__Seat_ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Create__Seat_ModalLabel">Thông tin khởi tại ghế</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id='mycontent_creatseat'>
                  <div class="container-fluid">
                      <form  action="{{ route('admin.seat.store') }}" method="post">
                          @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Hàng ghế</label>
                                  <select class="custom-select" name="cate_seat">
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                      <option value="E">E</option>
                                      <option value="F">F</option>
                                      <option value="G">G</option>
                                      <option value="I">I</option>
                                      <option value="J">J</option>
                                      <option value="K">K</option>
                                      <option value="L">L</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Tên ghế</label>
                                  <input type="text" name="seatname" class="form-control" placeholder="Nhập Tên Ghế Bắt đầu bằng hàng ghế">
                              </div>
                              
                              <div class="form-group">
                                  <label>Giá tiền</label>
                                  <input type="number" name="seatprice" min='50000' class="form-control"placeholder="Nhập giá tiền">
                              </div>
                              <div class="form-group" style='visibility: hidden'>
                                  <label>Phòng</label>
                                  <input type="text" name='room_id' class="form-control" value='{{$room_data->id}}'>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Đăng ký</button>
                              </div>
                          </div>
                      </form>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
          </div>
          {{-- Giao diện của các ghế --}}
          <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-four-tabContent">         
                    <div class="wrapper place-wrapper">
                      <!-- Main content -->
                      <div class="place-form-area">
                          <section class="container">
                              <div class="choose-sits">
                                  <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                                      <div class="sits-area hidden-xs">
                                          <div class="sits-anchor">Màn hình</div>
                                          <div class="sits">
                                              <aside class="sits__line">
                                                  <span class="sits__indecator">A</span>
                                                  <span class="sits__indecator">B</span>
                                                  <span class="sits__indecator">C</span>
                                                  <span class="sits__indecator">D</span>
                                                  <span class="sits__indecator">E</span>
                                                  <span class="sits__indecator">F</span>
                                                  <span class="sits__indecator">G</span>
                                                  <span class="sits__indecator">I</span>
                                                  <span class="sits__indecator additional-margin">J</span>
                                                  <span class="sits__indecator">K</span>
                                                  <span class="sits__indecator">L</span>
                                              </aside>                                            
                                              <div class="sits__row" id='A'>
                                                @foreach($A as $item)
                                                  <span class="sits__place sits-price--cheap" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='B'>
                                                @foreach($B as $item)
                                                  <span class="sits__place sits-price--cheap" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='C'>
                                                @foreach($C as $item)
                                                  <span class="sits__place sits-price--cheap" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='D'>
                                                @foreach($D as $item)
                                                  <span class="sits__place sits-price--cheap" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='E'>
                                                @foreach($E as $item)
                                                  <span class="sits__place sits-price--middle" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='F'>
                                                @foreach($F as $item)
                                                  <span class="sits__place sits-price--middle" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='G'>
                                                @foreach($G as $item)
                                                  <span class="sits__place sits-price--middle" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='I'>
                                                @foreach($I as $item)
                                                  <span class="sits__place sits-price--middle" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row additional-margin" id='J'>
                                                @foreach($J as $item)
                                                  <span class="sits__place sits-price--expensive" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='K'>
                                                @foreach($K as $item)
                                                  <span class="sits__place sits-price--expensive" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <div class="sits__row" id='L'>
                                                @foreach($L as $item)
                                                  <span class="sits__place sits-price--expensive" name='{{$item->room_id}}' data-toggle="modal" data-target="#exampleModal">{{$item->seatname}}</span>
                                                @endforeach
                                              </div>
                                              <footer class="sits__number">
                                                  <span class="sits__indecator">1</span>
                                                  <span class="sits__indecator">2</span>
                                                  <span class="sits__indecator">3</span>
                                                  <span class="sits__indecator">4</span>
                                                  <span class="sits__indecator">5</span>
                                                  <span class="sits__indecator">6</span>
                                                  <span class="sits__indecator">7</span>
                                                  <span class="sits__indecator">8</span>
                                                  <span class="sits__indecator">9</span>
                                                  <span class="sits__indecator">10</span>
                                                  <span class="sits__indecator">11</span>
                                                  <span class="sits__indecator">12</span>
                                                  <span class="sits__indecator">13</span>
                                                  <span class="sits__indecator">14</span>
                                                  <span class="sits__indecator">15</span>
                                                  <span class="sits__indecator">16</span>
                                                  <span class="sits__indecator">17</span>
                                                  <span class="sits__indecator">18</span>
                                              </footer>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                      </div> 
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>          
                <!-- /.card -->
              </div>
            </div>
          </div>
         
        </div>
    </section>

  @push('js')
    <script>
        
    </script>
  @endpush

  @push('jshand')<script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    })

    // start show info seat
    $('.sits__place').click(function(e){
      // e.preventDefault();
      var id_room = $(this).attr('name'); // id room
      var name_seat = $(this).html();     // seatname
      console.log(id_room,name_seat);
      $.ajax({
          type: "POST",
          data: {idroom : id_room,nameseat: name_seat},
          url: "{{ route('admin.room.showseat') }}",
          dataType: "html",
          success: function (responsive) {                      
            $('#mycontent').html(responsive);     
          }
      });
      // Edit seat
      $.ajax({
        type: "POST",
        data: {idroom : id_room,nameseat: name_seat},
        url: "{{ route('admin.seat.show') }}",
        dataType: "json",
        success: function (item) {
          $strr = String(item[0]['id']);
          const num = Number($strr);
          var chau = ``;

          var url_xoa = '{{ route("admin.seat.destroy", ":num") }}';
          url_xoa = url_xoa.replace(':num', num);

          var url_edit = '{{ route("admin.seat.edit", ":num") }}';
          url_edit = url_edit.replace(':num', num);

          chau += "<a class='btn btn-outline-info' href="+url_edit+">Sửa</a>";
          chau += "<a class='btn btn-outline-danger' href="+url_xoa+">Xóa</a>";
          chau += `<a class='btn btn-outline-secondary' data-dismiss="modal">Đóng</a>`;
          $('#modal_info').html(chau);

        }
      });
    })
    //end
  </script>
  @endpush
@endsection