<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Ticket\StoreRequest;
use App\Http\Requests\Admin\Ticket\UpdateRequest;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ticket'] = DB::table('ticket')->get();
        return view('admin.modules.ticket.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        $data['film'] = DB::table('film')->get();
        $data['brand'] = DB::table('brand')->get();
        $data['seat'] = DB::table('seat')->get();
        $data['showtime'] = DB::table('showtime')->get();
        return view('admin.modules.ticket.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {          
        $yolo['total_price'] = $request-> total_price ;
        $yolo['total_id_seat'] = $request-> total_seat ;
        $yolo['total_name_seat'] = $request-> seats ;
        $yolo['showtime_id'] = $request-> time_id ;
        $yolo['created_at'] = new \DateTime;
        DB::table('ticket')->insert($yolo);

        
        // láya ghế của room cần add
        $id_rom = DB::table('showtime')->where('id',$request->time_id)->select('showtime.room_id')->first();
        $seats = DB::table('seat')->where('room_id',$id_rom->room_id)->get();

        // lấy các id thể loại mà user chọn trong form

        $arrSeats = explode(",",$request->total_seat);
        

        // $data['category_id'] = implode(",",$request->category_id); // mang sang chuoi
        // $data['film'] = explode(",",$data['category_id']); // chuoi sang mang

        // bắt đầu khỏi tạo thông tin bảng film-cate
        $data_ticket = [];
        foreach ($arrSeats as $item) {
            foreach ($seats as $itemv2 ){
                if($itemv2 -> id == $item ){
                    $data_ticket[] = [
                        'showtime_id' => $request-> time_id,
                        'seat_id' =>  $itemv2 -> id,
                        'created_at' => new \DateTime
                    ];
                    break;
                }                
            };
        }
        DB::table('ticket_store')->insert($data_ticket);



        return redirect()->route('admin.ticket.index')->with('success', 'Đã đăng ký thành công vé phim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $idBrand = $request->idBrand;
        $idFilm = $request->idFilm;
        $dayShow =  $request->dayShow;
        $num_check = $request->num_check;

        if( $num_check == 0 && $request->num_check_1 !== 1 ){
            $showtime = DB::table('showtime')->join('time', 'showtime.time_id', '=', 'time.id')->where('film_id',$idFilm)->where('brand_id',$idBrand)->select('date_time','time.timeprice')->distinct('date_time')->get();
            $chau = '<option value="setngaychieu">Chọn ngày chiếu</option>';
            foreach($showtime as $item){
                $txt =  date("d/m/y",strtotime($item -> date_time));
                $chau .= '<option data-price="'. $item -> timeprice.'" value="' . $item -> date_time . '">' .$txt.'</option>';
            }
            return $chau;
        }
        
        if($dayShow !== 'setngaychieu' && $request->num_check_1 == 1 && $request->num_check == 1 ){
            $idBrand = $request->idBrand;
            $idFilm = $request->idFilm;
            $time = DB::table('showtime')->join('time', 'time_id', '=', 'time.id')
            ->where('film_id',$idFilm)->where('brand_id',$idBrand)->where('date_time',$request->dayShow)
            ->select('showtime.*','time.time_slot')->get();
            $chau = '<option value="setthoigian">Chọn suất chiếu</option>';
            foreach($time as $item){
                $chau .= '<option value="' . $item -> id . '">' .$item->time_slot.'</option>';
            }
            return $chau;
        }

        if($request->num_check_1 == 2){
            $idroom = DB::table('showtime')->where('id',$request->idShow)->select('room_id')->get();
           
            return $idroom;
        }

        
    }
    public function getmoney(Request $request)
    {
        $idshowtime = $request->idtime;
        $idtime = DB::table('showtime')->where('id',$idshowtime)->select('time_id')->first();
        $a = DB::table('time')->where('id',$idtime->time_id)->select('timeprice')->get();
        return $a ;
        
 
    }
    public function showseat(Request $request)
    {
        if($request->num_check_1 == 2){

            $arr_id_seats = DB::table('ticket_store')->where('showtime_id',$request->idShow)->select('seat_id')->get();

            $brand['arr'] = [];

            foreach($arr_id_seats as $item){
                array_push($brand['arr'],$item->seat_id);
            }
            
            $idroom = DB::table('showtime')->where('id',$request->idShow)->select('room_id')->get();
            $idroom = $idroom[0]->room_id;
            $brand['A'] = DB::table('seat')->join('room', 'room.id', '=', 'seat.room_id')
            ->where('room_id',$idroom)->where('cate_seat','A')
            ->select('seat.*', 'room.roomname','room.brand_id')->get();
            $brand['B'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','B')->get();
            $brand['C'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','C')->get();
            $brand['D'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','D')->get();
            $brand['E'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','E')->get();
            $brand['F'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','F')->get();
            $brand['G'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','G')->get();
            $brand['I'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','I')->get();
            $brand['J'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','J')->get();
            $brand['K'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','K')->get();
            $brand['L'] = DB::table('seat')->where('room_id',$idroom)->where('cate_seat','L')->get();
            return $brand;
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['ticket'] = DB::table('ticket')->where('id', $id)->first();
         return view('admin.modules.ticket.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime;
        DB::table('ticket')->where('id',$id)->update($data);        
        return redirect()->route('admin.ticket.index')->with('success', 'Đã chỉnh sửa thành công vé phim.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ticket')->where('id', $id)->delete();
        return redirect()->route('admin.ticket.index')->with('success', 'Đã xóa thành công vé phim.');
    }
}
