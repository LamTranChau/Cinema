<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\Admin\CategoryFilm\StoreRequest;
// use App\Http\Requests\Admin\CategoryFilm\UpdateRequest;
use Illuminate\Support\Facades\DB;

class AppmanageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['brands'] = DB::table('brand')->get();
        return view('admin.modules.appmanage.index',$data);
    }

    public function rooms($id)
    {   // lấy danh sách các phòng trong chi nhánh
        $data['rooms'] = DB::table('room')->where('brand_id',$id)->get();
        // lấy số lượng phòng chiếu.
        $count = 0;
        foreach($data['rooms'] as $item){
            $count++;
        }
        $data['count'] = $count;
        // lấy tên phòng chiếu
        $data['brand_name'] = DB::table('brand')->where('id',$id)->select('brandname')->first();
        return view('admin.modules.appmanage.rooms',$data);
    }

    public function seats($id)
    {  
        // lấy danh sách các ghế trong phòng chiếu
        $data['seats'] = DB::table('seat')->where('room_id',$id)->get();
        // lấy số lượng phòng chiếu.
        $count = 0;
        foreach($data['seats'] as $item){
            $count++;
        }
        $data['count'] = $count;
        // lấy tên chi nhánh và phòng chiếu
        $data['room_data'] = DB::table('room')
                                ->join('brand', 'room.brand_id', '=', 'brand.id')
                                ->where('room.id',$id)->select('room.*','brand.brandname','brand.id as brandid')->first();
                                
        // ===== lấy thông tin của từng hàng ghế
        $data['A'] = DB::table('seat')->join('room', 'room.id', '=', 'seat.room_id')
        ->where('room_id',$id)->where('cate_seat','A')
        ->select('seat.*', 'room.roomname','room.brand_id')->get();
        $data['B'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','B')->get();
        $data['C'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','C')->get();
        $data['D'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','D')->get();
        $data['E'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','E')->get();
        $data['F'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','F')->get();
        $data['G'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','G')->get();
        $data['I'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','I')->get();
        $data['J'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','J')->get();
        $data['K'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','K')->get();
        $data['L'] = DB::table('seat')->where('room_id',$id)->where('cate_seat','L')->get();
        

        return view('admin.modules.appmanage.seats',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showtime($id){
        
        return view('admin.modules.appmanage.showtime');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
