<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ServiceController;



// Front end routs..
Route::get('/', [HomeController::class, 'siteVisitorTracking']);





//========= admin routs ==========//

Route::get('/adminarea', function(){
    return view('admin.dashboard');
});

Route::get('/adminarea/visitor', [AdminController::class,'visitorShow']);


Route::get('/adminarea/service',function(){
    return view('admin.admin_service');
});

// Show all Service
Route::get('/allservice', [ServiceController::class, 'serviceShow']);

//Delete service by id
Route::post('/deleteservice', [ServiceController::class, 'serviceDelete']);

// update
Route::post('/updateservice', [ServiceController::class, 'updateService']);

// Get data by id for edit
Route::post('/getservicedata', [ServiceController::class, 'getService']);

// Add new service
Route::post('/addnewservice', [ServiceController::class, 'addNewService']);



/*=========================================
-------------- Courses routs --------------
=========================================*/

Route::get('/adminarea/courses',function(){
    return view('admin.admin_courses');
});


Route::get('/getallcourses', [CoursesController::class, 'allCourse']);


// delete course
Route::post('/delete_course', [CoursesController::class, 'deleteCourse']);

// get course data by id
Route::post('/edit_course', [CoursesController::class, 'getCourseById']);

// Update Course 
Route::post('/update_course', [CoursesController::class, 'updateCourse']);

// Add new course
Route::post('/add_course', [CoursesController::class, 'addNewCourse']);