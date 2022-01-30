<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorIpModel;
use App\Models\ServiceTable;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    function visitorShow(){
        $dbRes = VisitorIpModel::orderBy('id','desc')->take(8)->get();
        $res = json_decode($dbRes);

        return view('admin.visitor', ['visitors' => $res]);
    }
   
}
