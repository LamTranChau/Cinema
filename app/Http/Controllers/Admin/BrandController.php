<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brand'] = DB::table('brand')->get();
        return view('admin.modules.brand.index',$data);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        return view('admin.modules.brand.create');
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
        $item = $request -> brandimage;

        if(isset($item)){
            $image = time().'-'.$item->getClientOriginalName();
            $path = public_path() . "/upload";
            $item-> move($path,$image);
            $data['brandimage'] = $image;
        } else {
            $data['brandimage'] = 'brand-null.png';
        }

        DB::table('brand')->insert($data);
        return redirect()->route('admin.appmanage.index')->with('success', 'Đã đăng ký thành công chi nhánh.');
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
         $data['brand'] = DB::table('brand')->where('id', $id)->first();
         return view('admin.modules.brand.edit',$data);
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
        if(empty($data['brandimage'])){
            $chau['image_name'] = DB::table('brand')->where('id', $id)->first();
            $data['brandimage'] = $chau['image_name']->brandimage;
        } else {
            $item = $request -> brandimage;
            $image = time().'-'.$item->getClientOriginalName();
            $path = public_path() . "/upload";
            $item-> move($path,$image);
            $data['brandimage'] = $image;
        }
        DB::table('brand')->where('id',$id)->update($data);        
        return redirect()->route('admin.appmanage.index')->with('success', 'Đã chỉnh sửa thành công chi nhánh.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $check = DB::table('room')->where('brand_id',$id)->get();
        $count = 0;
        foreach ($check as $item){
            $count++;
        }
        if($count == 0){
            DB::table('brand')->where('id', $id)->delete();
            return redirect()->route('admin.appmanage.index')->with('success', 'Đã xóa thành công chi nhánh.');
        } else {
            return redirect()->route('admin.appmanage.index')->with('err', 'Xóa thất bại vì chi nhánh vẫn còn tồn tại phòng chiếu.');
        }
        
    }
}
