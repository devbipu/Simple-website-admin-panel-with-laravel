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
});

Route::get('/adminarea/visitor', [AdminController::class,'visitorShow']);


Route::get('/adminarea/service',function(){
    return view('admin.admin_service');
});

/*========== Service routs start ==========*/
Route::get('/allservice', [ServiceController::class, 'serviceShow']);

//Delete service by id
Route::post('/deleteservice', [ServiceController::class, 'serviceDelete']);

// update
Route::post('/updateservice', [ServiceController::class, 'updateService']);

// Get data by id for edit
Route::post('/getservicedata', [ServiceController::class, 'getService']);

// Add new service
Route::post('/addnewservice', [ServiceController::class, 'addNewService']);
/*========== Service routs start ==========*/


/*========== Courses routs start ==========*/

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

/*========== Courses routs start ==========*/



/*========== Courses routs start ==========*/
//front page route
Route::post('/contact_message', [HomeController::class, 'sendContactMessage']);
//admin page route
Route::get('/adminarea/contacts', function(){
    return view('admin.admin_contacts');
});

// route for get data
Route::get('/getallcontacts', [ContactController::class, 'getAllcontact']);

// route for delete contacts
Route::post('/deletecontact', [ContactController::class, 'deleteContactById']);