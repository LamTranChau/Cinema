<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\Demomail;
use Mail;

class AjaxController extends Controller
{
    public function ajax()
    {
        return view('ajax');
    }

    public function getdata()
    {
        $room = DB::table('room')->get();

        foreach ($room as $item){
            echo '<option value="'.$item-> brand_id.'">' . $item->roomname . '</option>';
        }

    }

    public function getdata1(Request $request)
    {   
        $idR = $request->idroom;
        
        $brand = DB::table('brand')->where('id',$idR)->get();
        // dd($brand);

        foreach ($brand as $item){
            echo '<li>' . $item->brandname . '</li>';
        }
        
    }

    public function batdong()
    {   
        $data['category'] = DB::table('category')->get();
        return view('hello',$data);    
    }
   
}
