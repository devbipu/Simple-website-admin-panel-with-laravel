<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactTable;

class ContactController extends Controller
{
    function getAllcontact(){
        $dbRes = ContactTable::get();
        if($dbRes){
            return $dbRes;
        }else{
            return 0;
        }
    }

    function deleteContactById(Request $req){
        
        $id = $req->input('id');
        $dbRes = ContactTable::where('id', '=', $id)->delete();

        if($dbRes){
            return 1;
        }else{
            return 0;
        }
    }
}
