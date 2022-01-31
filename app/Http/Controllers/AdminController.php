<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorIpModel;
use App\Models\ServiceTable;
use App\Models\AdminInfoTable;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    function visitorShow(){
        $dbRes = VisitorIpModel::orderBy('id','desc')->take(8)->get();
        $res = json_decode($dbRes);

        return view('admin.visitor', ['visitors' => $res]);
    }

    // login 
    function login(Request $req){
        $userName = $req->input('user');
        $password = $req->input('pass');
        
        $dbRes = AdminInfoTable::where('username', '=', $userName)->where('password', '=', $password)->count();

        if($dbRes == 1){
            $req->session()->put('loggedinUserName', $userName);
            return 1;
        }else{
            return 0;
        }
    }
    
    // logout function

    function logout(Request $req){
        $req->session()->flush();
        return redirect('/login');
    }
}
