<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseOfferController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ResultListController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SemesterCourseController;
use App\Http\Controllers\Admin\StudentRegController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\GradPointController;
use App\Http\Controllers\SemesterResultController;
use App\Http\Controllers\Website\ApplicationController;
use App\Http\Controllers\Website\StudentController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Student as MiddlewareStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login Processing System

Route::get("/login", [AdminController::class, 'index'])->name('login_form');
Route::post("/login", [AdminController::class, 'Login'])->name('login_submit');
Route::get("/logout", [AdminController::class, 'Logout'])->name('logout');


// Admin Route
Route::group(['middleware' => 'prevent-back-history'], function () {
  Route::prefix("admin")->middleware(Admin
    ::class)->group(function () {
    Route::get("/profile", [AdminController::class, 'Profile'])->name('profile');
    Route::get("/message", [AdminController::class, 'StudentMessage'])->name('message');
    Route::post('/profile/edit', [AdminController::class, 'ProfileUpdate'])->name("admin_profile_edit");
    
    Route::get("/dashboard", [AdminController::class, 'Dashboard'])->name('admin_dashboard');
    Route::resource("/department", DepartmentController::class);
    Route::resource("/semester", SemesterController::class);
    Route::resource("/course_offer", CourseOfferController::class);
    Route::get("/import_course", [CourseOfferController::class, 'CourseImport'])->name('import_course');
    Route::get("/course_reg_list", [StudentRegController::class, 'CourseReglist']);
    Route::get("/course_reg_list/delatlis/{reg_number}", [StudentRegController::class, 'CourseRegDetalis'])->name('course_reg_detalis');

    Route::get('/courses/publish/{id}', [StudentRegController::class, 'ApprovedCourse'])->name('course.approved');
    Route::get('/courses/unpublish/{id}', [StudentRegController::class, 'UnApprovedCourse'])->name('course.Unapproved');
    Route::post("/import_course/upload", [CourseOfferController::class, 'CourseImportUpload'])->name('import_course.store');
    Route::resource("/semester_courses", SemesterCourseController::class);
    Route::get("/semester_courses/detalis/{semester_id}", [SemesterCourseController::class, 'SemesterCourseDetalis'])->name('course_offer.detalis');
    Route::resource('/faculty', TeacherController::class);
    Route::resource("/grad_point", GradPointController::class);
    //  Route::resource("/result_list",ResultListController::class);
  });
});





// Website Controller Route
Route::get("/", [StudentController::class, 'index'])->name('home');
  Route::group(['middleware' => 'prevent-back-history'], function () {
   Route::prefix("student")->middleware("student")->group(function () {
    Route::resource("/student_reg", StudentController::class);
    Route::get("/student_dashboard", [StudentController::class, 'StudentDsahboard'])->name('student.dashboard');
    Route::get("/st_profile", [StudentController::class, 'StudentProfile'])->name('st_profile');
   

    Route::get("/enrollment_course", [StudentRegController::class, 'EnrollmentCourse'])->name('course_enrollment');
    Route::get("/couese_registration", [StudentRegController::class, 'index']);

    Route::post("/couese_registration/submit", [StudentRegController::class, 'CourseRegistration'])->name('student_course_reg.store');
    Route::get("/payment_process",[PaymentController::class,'index'])->name('payment_process');
    Route::post("/payment_process/submit",[PaymentController::class,'Addpayment'])->name('payment_process.store');
    Route::get("/application",[ApplicationController::class,'index'])->name('Application');
    Route::post("/application_form",[ApplicationController::class,'Application'])->name('application.form.store');
  });
});
