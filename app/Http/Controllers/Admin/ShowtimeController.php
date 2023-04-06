<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Showtime\StoreRequest;
use App\Http\Requests\Admin\Showtime\UpdateRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['showtime'] = DB::table('showtime')        
                                ->join('film', 'film_id', '=', 'film.id')
                                ->join('time', 'time_id', '=', 'time.id')
                                ->join('room', 'room_id', '=', 'room.id')
                                ->join('brand', 'room.brand_id', '=', 'brand.id')
                                ->select('showtime.id','showtime.date_time', 'film.filmname', 'brand.brandname','room.roomname','time.time_slot','time.timeprice')
                                ->get();
        // $arr = DB::table('time')->where('special_day','1')->where()->get();
        // dd($arr); >where('time_slot', '<>',Carbon::now()->subHours(3)->toDateTimeString())
        // $check = Carbon::create('15:30')->subHours(-3)->toTimeString();
        // dd($check);

        // $chau = ['8:00','18:00'];
        // $taest = [];
        // foreach ($chau as $item){
        //     for ($i=15,$count=1; $count < 151; $i+=15,$count++) { 
        //         $time=  Carbon::create($item)->subMinutes(-$i)->toTimeString();
        //         $time = mb_substr($time,0,5);
        //         array_push($taest,$time);
        //     }
        //     array_push($taest,$item);
        // }
        // dd($taest);
        // $check = DB::table('time')->where('special_day',1)
        // ->whereNotIn('time_slot',$taest)
        // // ->where('time_slot', '<>', $chau)
        // ->get();
        // dd($check);
        return view('admin.modules.showtime.index',$data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        $data['brand'] = DB::table('brand')->get();
        $data['time'] = DB::table('time')->get();
        $data['film'] = DB::table('film')->get();
        return view('admin.modules.showtime.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        DB::table('showtime')->insert($data);
        return redirect()->route('admin.showtime.index')->with('success', 'Đã đăng ký thành công suất chiếu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {  
        if(isset($request->idbrand) && $request->check == 0){
            $data = DB::table('room')->where('brand_id',$request->idbrand)->get();
            $chau = '<option>Chọn phòng chiếu</option>';
            foreach($data as $item){
                $chau .= '<option value="' . $item -> id . '">' . $item -> roomname .'</option>';
            }
            return $chau;
        }
        
        if(isset($request->num_day)){        

            /**
             * Cần xuất cột time_slot từ bảng time ra giao diện đăng ký
             * 
             *  lấy Danh sách time_slot trùng với ngày đặc biệt.
             *  kiểm tra
             *  Lấy danh sách Showtime - có chứa ngày trùng,phòng chiếu, giờ chiếu để kiểm tra.
             *  lấy mảng giờ trùng của danh sách Showtime,
             * 
             * 
             */

            // kiểm tra xem có trùng xuất chiếu hay không
            $ngaythang = $request-> date; // lấy ngày chiếu
            $time_check = $request->num_day; // lấy thời gian đặc biệt
            $idroom = $request->idroom; // lấy id phòng chiếu
            $idbrand = $request->idbrand; // lấy id chi nhánh
            $idfilm = $request-> idfilm; // lấy ngày chiếu


            // lấy mảng, thông tin của bảng suất chiếu trùng với id phòng chiếu và ngày chiếu.
            $getdatacheck = DB::table('showtime')->join('time', 'showtime.time_id', '=', 'time.id')
            ->where('date_time',$ngaythang)->where('room_id',$idroom)->get();
            // Số vòng lặp để loại bỏ các thời gian trùng giờ chiếu
            $getTimefilm = DB::table('film')->where('id',$idfilm)->first();            
            $getTimefilm = ceil($getTimefilm->time_film/1);
            $getTimefilm = (int)$getTimefilm; 
            
            // Tạo mảng chiếu các thời gian cần được so sánh : time_slot của bảng time
            $chau = [];
            foreach($getdatacheck as $item){
                array_push($chau,$item->time_slot); // tạo mảng các thời chiếu đã có.
            };

            $arr_time_trung = [];
            foreach ($chau as $item){
                for ($i=1,$count=1; $count < $getTimefilm + 10 ; $i+=1,$count++) { 
                    $time=  Carbon::create($item)->subMinutes(-$i)->toTimeString();
                    $time = mb_substr($time,0,5);
                    array_push($arr_time_trung,$time);
                }
                for ($i=1,$count=1; $count < $getTimefilm + 10 ; $i+=1,$count++) { 
                    $time=  Carbon::create($item)->subMinutes($i)->toTimeString();
                    $time = mb_substr($time,0,5);
                    array_push($arr_time_trung,$time);
                }
                array_push($arr_time_trung,$item);
            }

           
            if($time_check !== 0){               
                // lấy dư liệu giờ chiếu so sánh với mảng giờ chiếu đã có, nếu trùng thì bỏ ra
               
                $data = DB::table('time')->where('special_day',$time_check)->whereNotIn('time_slot',$arr_time_trung)->get();        

                $txt = '';
                foreach($data as $item){
                    $txt .= '<option value="' . $item -> id . '">' . $item -> time_slot .'</option>';
                }
                return $txt;
            }  else {
                return 'Lỗi rồi ông ơi';
            }
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
        // lấy thông tin của suất chiếu cần được chỉnh sửa
        $data['showtime'] = DB::table('showtime')->where('id', $id)->first();
        // lấy danh sách phim
        $data['film'] = DB::table('film')->get();
        // lấy danh sách chi nhánh
        $data['brand'] = DB::table('brand')->get();
        // lấy danh sách phòng chiếu của chi nhánh cần được chỉnh sửa
        $data['room'] = DB::table('room')->where('brand_id',$data['showtime']->brand_id)->get();
        // ==== Lấy danh sách thời gian có thể chỉnh sửa mà không bị trùng lập ====
        // lấy thông tin giờ chiếu để so sánh
        $getTimeEdit = $data['time'] = DB::table('time')->where('id',$data['showtime']->time_id)->get();
        // lấy danh sách thời gian: bỏ trùng đã đăng ký và phải giữ lại cho nó

        $getdatacheck = DB::table('showtime')->where('date_time',$data['showtime']->date_time)->where('room_id',$data['showtime']->room_id)->select('time_id')->get();
        $chau = [];
        foreach($getdatacheck as $item){
            if($getTimeEdit[0]->id !== $item->time_id ){
                array_push($chau,$item->time_id); // tạo mảng các thời chiếu đã có.
            }
        }

        $data['time'] = DB::table('time')->where('special_day',$getTimeEdit[0]->special_day)->whereNotIn('id',$chau)->get();
        return view('admin.modules.showtime.edit',$data);
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
        DB::table('showtime')->where('id',$id)->update($data);        
        return redirect()->route('admin.showtime.index')->with('success', 'Đã chỉnh sửa thành công suất chiếu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('showtime')->where('id', $id)->delete();
        return redirect()->route('admin.showtime.index')->with('success', 'Đã xóa thành công suất chiếu.');
    }
}
