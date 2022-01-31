<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;



// Front end routs..
Route::get('/', [HomeController::class, 'siteVisitorTracking']);





//========= admin routs ==========//

Route::get('/adminarea', function(){
    return view('admin.dashboard');
})->middleware('adminLoginCheck');

Route::get('/adminarea/visitor', [AdminController::class,'visitorShow'])->middleware('adminLoginCheck');


Route::get('/adminarea/service',function(){
    return view('admin.admin_service');
})->middleware('adminLoginCheck');

/*========== Service routs start ==========*/
Route::get('/allservice', [ServiceController::class, 'serviceShow'])->middleware('adminLoginCheck');

//Delete service by id
Route::post('/deleteservice', [ServiceController::class, 'serviceDelete'])->middleware('adminLoginCheck');

// update
Route::post('/updateservice', [ServiceController::class, 'updateService'])->middleware('adminLoginCheck');

// Get data by id for edit
Route::post('/getservicedata', [ServiceController::class, 'getService'])->middleware('adminLoginCheck');

// Add new service
Route::post('/addnewservice', [ServiceController::class, 'addNewService'])->middleware('adminLoginCheck');
/*========== Service routs start ==========*/


/*========== Courses routs start ==========*/

Route::get('/adminarea/courses',function(){
    return view('admin.admin_courses');
})->middleware('adminLoginCheck');


Route::get('/getallcourses', [CoursesController::class, 'allCourse'])->middleware('adminLoginCheck');


// delete course
Route::post('/delete_course', [CoursesController::class, 'deleteCourse'])->middleware('adminLoginCheck');

// get course data by id
Route::post('/edit_course', [CoursesController::class, 'getCourseById'])->middleware('adminLoginCheck');

// Update Course 
Route::post('/update_course', [CoursesController::class, 'updateCourse'])->middleware('adminLoginCheck');

// Add new course
Route::post('/add_course', [CoursesController::class, 'addNewCourse'])->middleware('adminLoginCheck');

/*========== Courses routs start ==========*/



/*========== Courses routs start ==========*/
//front page route
Route::post('/contact_message', [HomeController::class, 'sendContactMessage'])->middleware('adminLoginCheck');
//admin page route
Route::get('/adminarea/contacts', function(){
    return view('admin.admin_contacts');
})->middleware('adminLoginCheck');

// route for get data
Route::get('/getallcontacts', [ContactController::class, 'getAllcontact'])->middleware('adminLoginCheck');

// route for delete contacts
Route::post('/deletecontact', [ContactController::class, 'deleteContactById'])->middleware('adminLoginCheck');



// Login route

Route::get('/login', function(){
    return view('login');
});

Route::post('/adminlogin', [AdminController::class, 'login']);

// log out route

Route::get('/adminarea/logout', [AdminController::class, 'logout']);