<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Room\StoreRequest;
use App\Http\Requests\Admin\Room\UpdateRequest;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {   
 
        // $users = DB::table('seat')
        // ->join('room', 'room.id', '=', 'seat.room_id')
        // ->join('brand', 'brand.id', '=', 'room.brand_id')
        // ->select('seat.*','room.*','brand.*')
        // ->get();
            // dd($users);

        $data['room'] = DB::table('room')->get();
        $data['brand'] = DB::table('brand')->get();
        return view('admin.modules.room.index',$data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brand'] = DB::table('brand')->get();
        return view('admin.modules.room.create',$data);
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
        $err = false;
        $dataroom = DB::table('room')->where('brand_id',$data['brand_id'])->get();
        foreach ($dataroom as $item){
            if($item->roomname == $data['roomname']){
                $err = true;
            }
        }
        if($err){
            return redirect()->route('admin.room.create')->with('err', 'Đăng ký thất bại. Tên phòng đã tồn tại');
        } else {
            DB::table('room')->insert($data);
            return redirect()->route('admin.appmanage.index')->with('success', 'Đã đăng ký thành công phòng chiếu.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testshow(Request $request)
    {
        $idroom = $request->idroom;
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


    public function show(Request $request)
    {   
        $data['brands'] = DB::table('brand')->get();
        $data['rooms'] = DB::table('room')->get();
        // $data['seats'] = DB::table('seat')->get();
        $data['seats'] = DB::table('seat')
            ->join('room', 'room.id', '=', 'seat.room_id')
            ->join('brand', 'brand.id', '=', 'room.brand_id')
            ->select('seat.*','room.*','brand.*')
            ->get();
            return view('admin.modules.room.roomtest',$data);
            // return $data;
            // $idroom = $request->idroom;
            
    }
    
    public function showseat(Request $request)
    {   
        
        $idroom = $request->idroom;   
        $nameseat = $request->nameseat;
       
        $txt = DB::table('seat')
        // ->join('brand', 'brand.id', '=', 'room.brand_id')
        // ->join('seat', 'seat.id', '=', 'room._id')
        ->where('room_id','=',$idroom)
        ->where('seatname','=',$nameseat)
        // ->select('room.*', 'brand.brandname')
        ->get();      
        
        $cateseat = $txt[0]->cate_seat;
        if($cateseat == 'A' || $cateseat == 'B' || $cateseat == 'C' || $cateseat == 'D'){
            echo '<b>Loại ghế: </b>' . 'Thường' . '<br>';
            echo '<b> Tên ghế: </b>' .$txt[0]->seatname. '<br>';
            echo '<b> Giá ghế: </b>' .$txt[0]->seatprice. ' VND' . '<br>';
            echo '<b> Hàng ghế: </b>' . $txt[0]->cate_seat . '<br>';
        } else if ($cateseat == 'E' || $cateseat == 'F' || $cateseat == 'G' || $cateseat == 'I'){
            echo '<b> Loại ghế: </b>' . 'Thoảng mái' . '<br>';
            echo '<b> Tên ghế: </b>' . $txt[0]->seatname . '<br>';
            echo '<b> Giá ghế: </b>' . $txt[0]->seatprice . ' VND' . '<br>';
            echo '<b> Hàng ghế: </b>' . $txt[0]->cate_seat . '<br>';
        } else {
            echo '<b> Loại ghế: </b>' . 'Siêu êm ái' . '<br>';
            echo '<b> Tên ghế: </b>' . $txt[0]->seatname . '<br>';
            echo '<b> Giá ghế: </b>' . $txt[0]->seatprice . ' VND' . '<br>';
            echo '<b> Hàng ghế: </b>' . $txt[0]->cate_seat . '<br>';
        };
    
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['room'] = DB::table('room')->where('id', $id)->first();
         $data['brand'] = DB::table('brand')->get();
         return view('admin.modules.room.edit',$data);
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
        $err = false;
        $dataroom = DB::table('room')->where('brand_id',$data['brand_id'])->get();
        foreach ($dataroom as $item){
            if($item->roomname == $data['roomname']){
                $err = true;
            }
        }
        if($err){
            return redirect()->route('admin.room.index')->with('err', 'Chỉnh sửa thất bại. Tên phòng đã tồn tại');
        } else {
            DB::table('room')->where('id',$id)->update($data);        
            return redirect()->route('admin.room.index')->with('success', 'Đã chỉnh sửa thành công phòng chiếu');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::table('seat')->where('room_id',$id)->get();
        $id_brand = DB::table('room')->where('id',$id)->select('brand_id')->first();
        $count = 0;
        foreach ($check as $item){
            $count++;
        }
        if($count == 0){
            DB::table('room')->where('id', $id)->delete();
            return redirect()->route('admin.appmanage.rooms',['id'=>$id_brand->brand_id])->with('success', 'Đã xóa thành công phòng chiếu');
        } else {
            return redirect()->route('admin.appmanage.rooms',['id'=>$id_brand->brand_id])->with('err', 'Xóa thất bại vì phòng chiếu vẫn còn tồn tại ghế.');
        }
        
    }
}
