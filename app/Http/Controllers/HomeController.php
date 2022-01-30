<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorIpModel;
use App\Models\ServiceTable;
use App\Models\CoursesTable;

class HomeController extends Controller
{
    function siteVisitorTracking(){

        $vIP = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $visitTime =  date('Y-m-d h:i:sa');

        VisitorIpModel::insert(['ip' => $vIP, 'visitTime' => $visitTime]);


        // service data
        $serviceData = ServiceTable::get();
        $servdata = json_decode($serviceData);


        // Courses data

        $allCourses = CoursesTable::get();
        $courses = json_decode($allCourses);


        return view('home', [
            'serviceData'   => $servdata,
            'coursesData'   => $courses,
        ]);
    }
}
