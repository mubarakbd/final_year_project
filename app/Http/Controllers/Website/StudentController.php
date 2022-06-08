<?php

namespace App\Http\Controllers\Website;

use App\Enums\CourseType;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Http\Requests\Registration;
use App\Models\CourseOffer;
use App\Models\CourseRegistration;
use App\Models\SemesterCourse;
use App\Models\Student as ModelsStudent;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Registration $request)
    {
        // dd($request->all());
        $student = new ModelsStudent();
        $student->name =$request->name;
        $student->email =$request->email;
        $student->reg_number =$request->reg_number;
        $student->password = Hash::make($request->password);
        $student->save();
        $notification =array(
            'message' => "Registration Successfully Done",
            'alert-type' => "success"
        );
        return redirect()->route('login_form')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function StudentDsahboard(){
        // $data['semester_course'] = CourseOffer::get();
         $c = DB::table('semester_courses')->first();
         $data['semester_course_list'] =SemesterCourse::paginate(6);
         $data['teacher_list'] =Teacher::get();
      
        return view("website.student.student_dashboard", $data,compact('c'));
    }
      
    public function EnrollmentCourse(){
     
        $data['student_course'] = CourseRegistration::where('student_id', Auth::guard('student')->user()->id, '1')
        ->where('confirmed', '=', 1)
        ->get();
        return view("website.studentreg.course_enrollment",$data);
    }

    public function StudentProfile (){
        return view("website.student.profile");
    }

    
}
