<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFilm\StoreRequest;
use App\Http\Requests\Admin\CategoryFilm\UpdateRequest;
use Illuminate\Support\Facades\DB;

class CategoryFilmController extends Controller
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
        $data['categoryfilm'] = DB::table('category_film')->get();
        return view('admin.modules.categoryfilm.index',$data);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        $data['film'] = DB::table('film')->get();
        $data['category'] = DB::table('category')->get();
        return view('admin.modules.categoryfilm.create',$data);
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
        DB::table('category_film')->insert($data);
        return redirect()->route('admin.categoryfilm.index')->with('success', 'category_film insert successfully');
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
         $data['categoryfilm'] = DB::table('category_film')->where('id', $id)->first();
         return view('admin.modules.categoryfilm.edit',$data);
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
        DB::table('category_film')->where('id',$id)->update($data);        
        return redirect()->route('admin.categoryfilm.index')->with('success', 'categoryfilm updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('category_film')->where('id', $id)->delete();
        return redirect()->route('admin.categoryfilm.index')->with('success', 'Delete categoryfilm successfully');
    }
}
