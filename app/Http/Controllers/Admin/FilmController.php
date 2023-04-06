<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Film\StoreRequest;
use App\Http\Requests\Admin\Film\UpdateRequest;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['film'] = DB::table('film')->get();
        $data['category'] = DB::table('category')->get();
        // $data['film'] = explode(",",$data['category_id']);
        return view('admin.modules.film.index',$data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data['category'] = DB::table('category')->get();
        return view('admin.modules.film.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {   
        // Bỏ token và category_id sau đó add vào bảng phim
        $data = $request->except('_token','category_id');        
        $data['created_at'] = new \DateTime;        
        $item = $request -> image;

        if(isset($item)){
            $image = time().'-'.$item->getClientOriginalName();
            $path = public_path() . "/upload";
            $item-> move($path,$image);
            $data['image'] = $image;
        } else {
            $data['image'] = 'null-logo.png';
        }
        
        DB::table('film')->insert($data);

        // lấy id của film mới add
        $id_film = DB::table('film')->where('filmname',$request->filmname)->orderByDesc('id')->first();

        // lấy bảng category để thêm vào bảng film-cate
        
        $categorys = DB::table('category')->get();

        // lấy các id thể loại mà user chọn trong form
        $arrCate = $request->category_id;

        $data_film_cate = [];
        foreach ($arrCate as $item) {
            foreach ($categorys as $category ){
                if($category -> id == $item ){
                    $data_film_cate[] = [
                        'film_id' => $id_film->id,
                        'category_id' =>  $category->id,
                        'created_at' => new \DateTime
                    ];
                }                
            };
        }
        DB::table('category_film')->insert($data_film_cate);

        return redirect()->route('admin.film.index')->with('success', 'Đã đăng ký thành công phim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['film'] = DB::table('film')->where('id', $id)->first();
        $data['cate'] = DB::table('category_film')
        ->join('category', 'category_film.category_id', '=', 'category.id')
        ->select('category_film.*', 'category.categoryname')
        ->where('film_id', $id)
        ->get();
        return view('admin.modules.film.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   // lấy thông tin phim cần edit
        $data['film'] = DB::table('film')->where('id', $id)->first();
        // lấy thông tin các thể loại của phim
        $data['category'] = DB::table('category')->get();
        // lấy thông tin các thể loại của phim cần edit
        $data['category_film'] = DB::table('category_film')
        ->select('category_film.category_id','category_film.film_id')
        ->where('film_id',$id)
        ->get();
        // xác định id của phim
        $data['id_film_edit'] = $data['category_film'][0]->film_id;
        // xác dịnh các thể loại của phim
        $data['arr_cate_film_edit'] = []; 
        foreach ($data['category_film'] as $key => $value) {
            $data['arr_cate_film_edit'][$key] = $value->category_id;
        }
        return view('admin.modules.film.edit',$data);         
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
        $data = $request->except('_token','category_id');
        $data['updated_at'] = new \DateTime;
        
        if(empty($data['image'])){
            $chau['image_name'] = DB::table('film')->where('id', $id)->first();
            $data['image'] = $chau['image_name']->image;
        } else {
            $item = $request -> image;
            $image = time().'-'.$item->getClientOriginalName();
            $path = public_path() . "/upload";
            $item-> move($path,$image);
            $data['image'] = $image;
        }        
        DB::table('film')->where('id',$id)->update($data);         
        

        // lấy bảng category để thêm vào bảng film-cate
        $categorys = DB::table('category')->get();

        // lấy các id thể loại mà user chọn trong form
        $arrCate = $request->category_id;

        // $data['category_id'] = implode(",",$request->category_id);
        // $idsd = $request->category_id;
        // $data['film'] = explode(",",$data['category_id']);

        // bắt đầu tạo thông tin mới bảng film-cate
        $data_film_cate = [];
        foreach ($arrCate as $item) {
            foreach ($categorys as $category ){
                if($category -> id == $item ){
                    $data_film_cate[] = [
                        'film_id' => $id,
                        'category_id' =>  $category->id,
                        'updated_at' => new \DateTime
                    ];
                }                
            };
        }
        // dd($data_film_cate);
        // bắt đầu Xóa thông tin Cũ bảng film-cate
        foreach ($arrCate as $item) {
            foreach ($categorys as $category ){
                if($category -> id == $item ){
                    DB::table('category_film')->where('film_id',$id)->where('category_id',$category->id)->delete();
                }                
            };
        }
        DB::table('category_film')->insert($data_film_cate);
        return redirect()->route('admin.film.index')->with('success', 'Đã chỉnh sửa thành công phim');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = DB::table('showtime')->where('film_id',$id)->get();
        $count = 0;
        foreach ($check as $item){
            $count++;
        }
        if($count == 0){
            DB::table('film')->where('id', $id)->delete();
        return redirect()->route('admin.film.index')->with('success', 'Đã xóa thành công phim');
        } else {
            return redirect()->route('admin.film.index')->with('err', 'Xóa thất bại vì phim vẫn còn tồn tại suất chiếu.');
        }
    }
}
