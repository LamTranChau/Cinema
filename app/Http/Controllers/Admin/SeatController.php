<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Seat\StoreRequest;
use App\Http\Requests\Admin\Seat\UpdateRequest;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['seat'] = DB::table('seat')->get();
        // $data['room'] = DB::table('room')->get();
        // return view('admin.modules.seat.index',$data);
        $data['brands'] = DB::table('brand')->get();
        $data['rooms'] = DB::table('room')->get();
        // $data['seats'] = DB::table('seat')->get();
        $data['seats'] = DB::table('seat')
            ->join('room', 'room.id', '=', 'seat.room_id')
            ->join('brand', 'brand.id', '=', 'room.brand_id')
            ->select('seat.*','room.*','brand.*')
            ->get();
            return view('admin.modules.room.roomtest',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        $data['room'] = DB::table('room')->get();
        return view('admin.modules.seat.create',$data);
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
        $count = 0;
        $ghe = DB::table('seat')->where('room_id',$data['room_id'])->where('cate_seat',$data['cate_seat'])->get();
        foreach($ghe as $item){
            if(substr($data['seatname'], 0, 1) !== $item->cate_seat){
                return redirect()->route('admin.seat.index')->with('err', 'Đăng ký thất bại, tên ghế không đúng định dạng');
            }
            $count++;
        }
        // dd($count);     
        if($count >= 18 ){
            return redirect()->route('admin.appmanage.seats',['id'=>$data['room_id']])->with('err', 'Đăng ký thất bại, số ghế ngồi vượt quá giới hạn.');
        } else {
            DB::table('seat')->insert($data);
            return redirect()->route('admin.appmanage.seats',['id'=>$data['room_id']])->with('success', 'Đã đăng ký thành công ghế ngồi.');
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $idroom = $request->idroom;   
        $nameseat = $request->nameseat;
       
        $txt = DB::table('seat')
        ->where('room_id','=',$idroom)
        ->where('seatname','=',$nameseat)
        ->get();
        return $txt;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['seat'] = DB::table('seat')->where('id', $id)->first();
        return view('admin.modules.seat.edit',$data);
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
        DB::table('seat')->where('id',$id)->update($data);        
        return redirect()->route('admin.seat.index')->with('success', 'Đã chỉnh sửa thành công ghế ngồi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $roomid = DB::table('seat')->where('id',$id)->first();
        DB::table('seat')->where('id', $id)->delete();
        return redirect()->route('admin.appmanage.seats',['id'=> $roomid->room_id])->with('success', 'Đã xóa thành công ghế ngồi.');
    }
}
