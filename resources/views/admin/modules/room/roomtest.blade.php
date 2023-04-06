@extends('admin.master')
@section('module','Ghế')
@section('action','Danh sách')
@section('content')
@push('css')  
   <!-- Font awesome - icon font -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <!-- Roboto -->
   {{-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> --}}
   <!-- Custom -->
   <link href="{{ asset('HTML/css/restyle.css?v=1' ) }}" rel="stylesheet" />
@endpush  

  <!-- Modal For info Seat -->
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
          {{-- chau += `<a class='btn btn-primary' href="{{route('admin.room.destroy',['id' =>` + num +`])}}">Edit</a>`; --}}
        </div>
        <div class="modal-footer" id="modal_info">
          {{-- <button id='Editseat' class="btn btn-secondary" data-toggle="modal" data-target="#Edit__seat" >Edit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        </div>
      </div>
    </div>
  </div>

  @foreach ($brands as $branditem)
    <div style="display: flex;width: 100%;justify-content: space-between;">
      <h3>{{$branditem->brandname}}</h3>      
      <button class="btn-primary btn Create_seat" data-toggle="modal" data-target="#Create__Seat_Modal">Đăng ký Ghế</button>
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
                          <div class="form-group">
                              <label>Phòng</label>
                              <select class="custom-select" name="room_id">
                                  @foreach ($rooms as $room1)
                                    @if($room1->brand_id == $branditem->id)
                                      <option value="{{ $room1 -> id}}">{{ $room1->roomname }}</option>
                                    @endif
                                  @endforeach
                              </select>
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
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              @foreach ($rooms as $roomitem)
                <?php if($roomitem->brand_id == $branditem->id){?>
                  <li class="nav-item">
                    <a class="nav-link Room_link" id="custom-tabs-four-{{$roomitem->roomname}}{{$branditem->id}}-tab" data-toggle="pill" href="#custom-tabs-four-{{$roomitem->roomname}}{{$branditem->id}}" role="tab" aria-controls="custom-tabs-four-{{$roomitem->roomname}}{{$branditem->id}}" aria-selected="true" value='{{$roomitem->id}}'>{{$roomitem->roomname}}</a>
                  </li>
                <?php }?>
              @endforeach
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              @foreach ($rooms as $roomitem)                
                  <?php if($roomitem->brand_id == $branditem->id){?>
                    <div class="tab-pane fade show" id="custom-tabs-four-{{$roomitem->roomname}}{{$branditem->id}}" role="tabpanel" aria-labelledby="custom-tabs-four-{{$roomitem->roomname}}{{$branditem->id}}-tab">
                      {{$roomitem->roomname}}
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
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}A'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}B'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}C'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}D'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}E'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}F'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}G'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}I'>
                                                </div>
                                                <div class="sits__row additional-margin" id='{{$branditem->id}}{{$roomitem->roomname}}J'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}K'>
                                                </div>
                                                <div class="sits__row" id='{{$branditem->id}}{{$roomitem->roomname}}L'>
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
                  <?php } ?>                
              @endforeach
            </div>
          </div>          
          <!-- /.card -->
        </div>
      </div>
    </div>
  @endforeach
  

  @push('js')
    
  @endpush

  @push('jshand')  
    <script>
      $(document).ready(function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      })

      $('.Room_link').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        var roomName = $(this).html();       
        $.ajax({
            type: "POST",
            data: {idroom : id},
            url: "{{ route('admin.room.testshow') }}",
            dataType: "json",
            success: function (arr) {               
              $a = arr["A"];
              $b = arr["B"];
              $c = arr["C"];
              $d = arr["D"];
              $e = arr["E"];
              $f = arr["F"];
              $g = arr["G"];
              $i = arr["I"];
              $j = arr["J"];
              $k = arr["K"];
              $l = arr["L"];
              
              // creat html for seat to html
              var  seats_A ='',seats_B ='',seats_C ='',seats_D ='',seats_E ='',seats_F ='',seats_G ='',seats_I ='',seats_J ='',seats_K ='',seats_L ='';
              for (let x in $a) {
                seats_A += '<span class="sits__place sits-price--cheap" name="'+ $a[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $a[x]['seatname'] + '</span>';    
              }
              for (let x in $b) {
                seats_B += '<span class="sits__place sits-price--cheap" name="'+ $b[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $b[x]['seatname'] + '</span>';       
              }
              for (let x in $c) {
                seats_C += '<span class="sits__place sits-price--cheap" name="'+ $c[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $c[x]['seatname'] + '</span>';       
              }
              for (let x in $d) {
                seats_D += '<span class="sits__place sits-price--cheap" name="'+ $d[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $d[x]['seatname'] + '</span>';       
              }
              for (let x in $e) {
                seats_E += '<span class="sits__place sits-price--middle" name="'+ $e[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $e[x]['seatname'] + '</span>';       
              }
              for (let x in $f) {
                seats_F += '<span class="sits__place sits-price--middle" name="'+ $f[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $f[x]['seatname'] + '</span>';       
              }
              for (let x in $g) {
                seats_G += '<span class="sits__place sits-price--middle" name="'+ $g[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $g[x]['seatname'] + '</span>';       
              }
              for (let x in $i) {
                seats_I += '<span class="sits__place sits-price--middle" name="'+ $i[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $i[x]['seatname'] + '</span>';       
              }
              for (let x in $j) {
                seats_J += '<span class="sits__place sits-price--expensive" name="'+ $j[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $j[x]['seatname'] + '</span>';       
              }
              for (let x in $k) {
                seats_K += '<span class="sits__place sits-price--expensive" name="'+ $k[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $k[x]['seatname'] + '</span>';       
              }
              for (let x in $l) {
                seats_L += '<span class="sits__place sits-price--expensive" name="'+ $l[x]['room_id'] +'" data-toggle="modal" data-target="#exampleModal">' + $l[x]['seatname'] + '</span>';       
              }
              
              if(roomName == $a[0]['roomname'] && id == $a[0]['room_id'] ){
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'A').html(seats_A);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'B').html(seats_B);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'C').html(seats_C);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'D').html(seats_D);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'E').html(seats_E);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'F').html(seats_F);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'G').html(seats_G);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'I').html(seats_I);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'J').html(seats_J);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'K').html(seats_K);
                $('#' + $a[0]['brand_id'] + $a[0]['roomname'] + 'L').html(seats_L);                    
              }

              
              
              // start show info seat
              $('.sits__place').click(function(e){
                  // e.preventDefault();
                  var id_room = $(this).attr('name'); // id room 
                  var name_seat = $(this).html();     // seatname
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
            }
        });
      })
    </script>
  @endpush
@endsection