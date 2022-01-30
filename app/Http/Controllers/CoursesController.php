<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursesTable;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    function allCourse(){
        $dbRes = CoursesTable::orderBy('id', 'desc')->get();
        $data = json_encode($dbRes);
        return $data;
    }

    // delete query
    function deleteCourse(Request $req){
        $courseId = $req->input('id');
        $dbRes = CoursesTable::where('id', '=', $courseId)->delete();

        if($dbRes){
            return 1;
        }else{
            return 0;
        }
    }

    //get course by id
    function getCourseById(Request $req){
        $courseId = $req->input('id');
        $dbRes = CoursesTable::where('id', $courseId)->get();
        $dataToSend = json_encode($dbRes);
        return $dataToSend;
    }

    //Update couse by id
    function updateCourse(Request $req){
        $courseId = $req->input('id');
        $courseTitle = $req->input('title');
        $courseDesc = $req->input('desc');
        $courseImg = $req->input('image');

        $dbRes = DB::table('courses')->where('id', '=', $courseId)->update([
            'title'         => $courseTitle,
            'description'          => $courseDesc,
            'image'         => $courseImg,
        ]);
        return $dbRes;
        // if($dbRes == true){
        //     return 1;
        // }else{
        //     return 0;
        // }
    }


    // add new couse

    function addNewCourse(Request $req){
        $courseTitle = $req->input('title');
        $courseDesc = $req->input('desc');
        $courseImg = $req->input('image');

        $dbRes = CoursesTable::insert([
            'title'         => $courseTitle,
            'description'   => $courseDesc,
            'image'         => $courseImg,
        ]);
        // if($dbRes == true){
        //     return $dbRes;
        // }else{
        //     return 0;
        // }
        return $dbRes;
    }
}
