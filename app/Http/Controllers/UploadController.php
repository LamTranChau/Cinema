<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\Demomail;
use Mail;

class UploadController extends Controller
{
    public function upload_theme()
    {
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)    {

        $files = $request -> avata;

			foreach($files as $item)
			{
                $image = time () . '-' . $item -> getClientOriginalName ();

                $path = public_path() . "/upload";

                $item-> move($path,$image);
                
			};		

    }

    public function sendMail() {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('billtran111@gmail.com')->send(new Demomail());
    }
}
