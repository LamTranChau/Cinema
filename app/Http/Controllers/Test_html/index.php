<?php

namespace App\Http\Controllers\Test_html;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use Illuminate\Support\Facades\DB;

class index extends Controller
{
    public function index()
    {
        return view('admin.test00.book2');
    }

}
