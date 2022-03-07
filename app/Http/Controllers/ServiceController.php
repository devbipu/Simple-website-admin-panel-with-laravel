<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceTable;
use Illuminate\Support\Facades\DB;

use App\Models\CoursesTable;

class ServiceController extends Controller
{
     //all service show
     function serviceShow(){
        $dbRes = ServiceTable::get();
        $data = json_encode($dbRes);
        return $data;
    }

    //Delete service by id
    function serviceDelete(Request $req){
        $deletId = $req->input('id');

        $dbRes = ServiceTable::where('id', '=', $deletId)->delete();

        if($dbRes == true){
            return 1;
        }else{
            return 0;
        }
    }

    // update
    function updateService(Request $req){
        $id = $req->input('id');
        $title = $req->input('title');
        $desc = $req->input('desc');
        $img = $req->input('imgLink');

        $dbupRes = DB::table('services')->where('id', $id)->update(['title' => $title,'description'=> $desc,'image' => $img,'link' => null,]);

        if($dbupRes == true){
            return 1;
        }else{
            return 0;
        }
    }

    // Get service data
    function getService(Request $req){
        $id = $req->input('id');
        $dbRes = ServiceTable::where('id', $id)->get();
        $dbData = json_encode($dbRes);
        return $dbData;
    }

    // add new service

    function addNewService(Request $req){
        $title = $req->input('title');
        $desc = $req->input('desc');
        $img = $req->input('img');
        
        $dbRes = ServiceTable::insert([
            'title'         => $title,
            'description'   => $desc,
            'image'        => $img
        ]);

        if($dbRes== true){
            return 'Add service Success';
        }else{
            return 'Add service faild';
        }
    }



    // on search

    function onSearch(Request $req){
        $searchTxt = $req->input('data');

        if(!empty($searchTxt)){
            $getTheData = ServiceTable::where('title', 'LIKE', "%$searchTxt%" )->get();
            $data = json_encode($getTheData);
            return $data;
        }else{
            return redirect("/");
        }

    }



    // service signle page
    function serviceSingle($id){
        $getTheData = ServiceTable::where('id', "$id")->first();
        // $data = json_encode($getTheData);
       if(!empty($getTheData)){
            return view("service_single", [
                "data" => $getTheData ?? "No data found",
            ]);
       }
       else{
           return redirect("/");
       }
    }
}
