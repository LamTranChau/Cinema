<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Usersbuy\StoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['film'] = DB::table('film')->get();        
        $data['category_film'] = DB::table('category_film')->join('category', 'category_film.category_id', '=', 'category.id')->select('category_film.*', 'category.categoryname')->get();
        return view('client.modules.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moviepage($id){

        $data['category_film'] = DB::table('category_film')
                                    ->join('category', 'category_id', '=', 'category.id')
                                    ->where('film_id',$id)->get();

        $data['showtime'] = DB::table('showtime')->join('time', 'showtime.time_id', '=', 'time.id')
                                                ->select('showtime.*','time.time_slot')->get();
        $data['ngaychieu'] = DB::table('showtime')->where('film_id',$id)->select('date_time')->distinct('date_time')->get();
        $data['brand'] = DB::table('brand')->get();
        
        $data['film'] = DB::table('film')->where('id',$id)->first();
        return view('client.modules.moviepage',$data);
    }

    public function book1(Request $request)
    {
        $data['film'] = DB::table('film')->get();
        $data['brand'] = DB::table('brand')->get();
        $data['seat'] = DB::table('seat')->get();
        $data['showtime'] = DB::table('showtime')->get();
        return view('client.modules.book1',$data);
    }



    public function book2(Request $request)
    {   
        $data['showid'] = intval($request->choosen_showtime);
        return view('client.modules.book2',$data);
    }
    public function getmoney(Request $request)
    {
        $idshowtime = $request->idtime;
        $idtime = DB::table('showtime')->where('id',$idshowtime)->select('time_id')->first();
        $a = DB::table('time')->where('id',$idtime->time_id)->select('timeprice')->get();
        return $a;
    }
    public function showseat(Request $request)
    {   
        
        // lấy danh sách các ghế đã đăng ký
        $arr_id_seats = DB::table('ticket_store')->where('showtime_id',$request->idShow)->select('seat_id')->get();
        $brand['arr'] = [];
        // tạo thành 1 mảng mới chứa id ghế để so sánh
        foreach($arr_id_seats as $item){
            array_push($brand['arr'],$item->seat_id);
        }
        // lấy id room của suất chiếu
        $idroom = DB::table('showtime')->where('id',$request->idShow)->select('room_id')->get();
        $idroom = $idroom[0]->room_id;

        // lấy các danh sách các hàng ghế
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


    public function book3(Request $request)
    {   
        // cắt chuỗi ghế để input vào data table đúng
        $num = strlen($request->seats);        
        $num = $num/2;
        $check = substr($request->seats,0,$num-1);
        $txt = ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,';
        $count = similar_text($check,$txt);
        $count++;
        $data = $request->except('_token');
        $data["seats"] = $check;
        $data["count"] = $count;
        return view('client.modules.book3',$data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function pay(Request $request)
    {   
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        DB::table('users_buy')->insert($data);
        return view('client.vnpay_php.vnpay_create_payment',$data);
    }

    public function returnurlpay(Request $request)
    {
        $data = $request;        
        return view('client.vnpay_php.vnpay_return',$data);
    }

    public function check(Request $request)
    {        
        $data = $request->except('_token');
        $int_value = intval($request->tien)/100;        
        $data['tien'] = $int_value;
        if($data['trangthai'] == '00'){
            // Nếu check thanh toán thành công
            // thêm các ghế đã mua vào bảng.
            // Tạo bảng lưu trữ thanh toán (1 lần duy nhất)
            // thêm thông tin thanh toán vào bảng thanh toán luôn. phải  có id của user_buy vào. lưu trư so sánh
            // gọi về book4 thông báo thành công. xuất thông tin và vé cho người dùng.
            $userbuy = DB::table('users_buy')->orderByDesc('id')->first();
            $yolo['total_price'] = $userbuy-> total_price ;
            $yolo['total_id_seat'] = $userbuy-> total_seat ;
            $yolo['total_name_seat'] = $userbuy-> seats ;
            $yolo['showtime_id'] = $userbuy-> showtime_id ;
            $yolo['created_at'] = new \DateTime;
            DB::table('ticket')->insert($yolo);
            $data['userbuy_id'] = $userbuy->id;
            $data['created_at'] = new \DateTime;
            // láya ghế của room cần add
            $id_rom = DB::table('showtime')->where('id',$userbuy->showtime_id)->select('showtime.room_id')->first();
            $seats = DB::table('seat')->where('room_id',$id_rom->room_id)->get();
            // lấy các id thể loại mà user chọn trong form
            $arrSeats = explode(",",$userbuy->total_seat);
            // bắt đầu khỏi tạo thông tin bảng film-cate
            $data_ticket = [];
            foreach ($arrSeats as $item) {
                foreach ($seats as $itemv2 ){
                    if($itemv2 -> id == $item ){
                        $data_ticket[] = [
                            'showtime_id' => $userbuy-> showtime_id,
                            'seat_id' =>  $itemv2 -> id,
                            'created_at' => new \DateTime
                        ];
                        break;
                    }                
                };
            }
            DB::table('ticket_store')->insert($data_ticket);
            $idpayment = DB::table('payment')->insertGetId($data);
            $dataforuesr['info'] = DB::table('payment')->join('users_buy', 'payment.userbuy_id', '=', 'users_buy.id')
                                                ->where('payment.id',$idpayment)
                                                ->select('payment.*', 'users_buy.*')->first();
            $dataforuesr['showtime'] = DB::table('showtime')
                                        ->join('brand', 'showtime.brand_id', '=', 'brand.id')
                                        ->join('room', 'showtime.room_id', '=', 'room.id')
                                        ->join('time', 'showtime.time_id', '=', 'time.id')
                                        ->join('film', 'showtime.film_id', '=', 'film.id')
                                        ->where('showtime.id',$dataforuesr['info']->showtime_id)
                                        ->select('showtime.date_time', 'brand.brandname', 'room.roomname', 'time.time_slot', 'film.filmname')->first();
            return view('client.modules.book4',$dataforuesr);
        } else {
            // Nếu như check thanh toán thất bại 
            $userbuy = DB::table('users_buy')->orderByDesc('id')->first();
            DB::table('users_buy')->where('id', $userbuy->id)->delete();
            return redirect()->route('index')->with('err', 'Thanh toán thất bại, vui lòng thử lại sau vài phút.');
        }
        
    }

    public function payment(Request $request)
    {   
        $data['payment'] = DB::table('payment')
        ->join('users_buy', 'payment.userbuy_id', '=', 'users_buy.id')
        ->select('payment.*', 'users_buy.useremail', 'users_buy.userphone')->get();
        return view('admin.modules.payment.index',$data);
    }

    public function book4(Request $request)
    {   
        return view('client.modules.book4');
    }


    // public function vnpay_pay(Request $request)
    // {   
    //     return view('client.vnpay_php.vnpay_pay');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $num_check = $request->num_check;
        if($num_check == 0){
            // lấy id film
            $namefilm = $request->namefilm;
            $idfilm = DB::table('film')->where('filmname',$namefilm)->select('id')->first();
            
            $showtime = DB::table('showtime')->where('film_id',$idfilm->id)->select('date_time')->distinct('date_time')->get();
            $chau = '<option value="setngaychieu">Chọn ngày chiếu</option>';
            foreach($showtime as $item){
                $txt =  date("d/m/y",strtotime($item -> date_time));
                $chau .= '<option value="' . $item -> date_time . '">' .$txt.'</option>';
            }
            return $chau;
        }

        if($num_check == 1){
            // lấy id phim
            $namefilm = $request->namefilm;
            $idfilm = DB::table('film')->where('filmname',$namefilm)->select('id')->first();
            // lấy ngày chiếu
            $datefilm = $request->datefilm;
            
            // lấy danh sách suất chiếu
            $showtime = DB::table('showtime')->join('brand', 'showtime.brand_id', '=', 'brand.id')->join('time', 'showtime.time_id', '=', 'time.id')->where('film_id',$idfilm->id)->where('date_time',$datefilm)->select('showtime.id','brand.brandname','time.time_slot')->get();
            // lấy danh sách các chi nhánh
            $brand = DB::table('brand')->get();
            $txt = '';
            foreach($brand as $brandItem){
                $txt .= '<div class="time-select__group">';
                    $txt .= '<div class="col-sm-3">';
                        $txt .= '<p class="time-select__place">'.$brandItem->brandname.'</p>';
                    $txt .= '</div>';
                    $txt .= '<ul class="col-sm-6 items-wrap">';
                        foreach($showtime as $showtimeItem){
                            if($showtimeItem->brandname == $brandItem->brandname){
                                $txt .= '<li class="time-select__item" data-showid="'.$showtimeItem->id.'" data-time="'.$showtimeItem->time_slot.'">'.$showtimeItem->time_slot.'</li>';
                            }
                        }
                    $txt .= '</ul>';
                $txt .= '</div>';
            }
            return $txt;        
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
