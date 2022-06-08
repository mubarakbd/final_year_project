<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CourseType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\StudentCourseRequest;
use App\Models\CourseOffer;
use App\Models\CourseRegistration;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentRegController extends Controller
{
    public function index(){
        $data['dep_list'] =Department::get();
        $data['semester_list'] =Semester::get();
        $data['student_list'] = Student::where('id', Auth::guard('student')->user()->id, )->get();
         $data['course_offer'] =CourseOffer::get();
         
        $data['course_status'] = CourseType::asSelectArray();
        return view("website.student.reg",$data);

    }
    public function CourseRegistration(StudentCourseRequest $request){
        // dd($request->all());
        $subjectCount = count($request->course_id);
        if ($subjectCount !=NULL) {
            for ($i=0; $i <$subjectCount ; $i++) { 
                $coursereg = new CourseRegistration();
                $coursereg->dep_name =$request->dep_name;
                $coursereg->program_name =$request->program_name;
                $coursereg->reg_number = $request->reg_number;
                $coursereg->name =$request->name;
                $coursereg->semester_id = $request->semester_id;
                $coursereg->course_id = $request->course_id[$i];
                $coursereg->course_code= $request->course_code[$i];
                $coursereg->course_credit =$request->course_credit[$i];
                $coursereg->status =$request->status;
                $coursereg->confirmed =0;
                $coursereg->student_id = Auth::guard('student') ? Auth::guard('student')->user()->id : 0;
                $coursereg->save();

              
            } 


    }
    $notification =array(
        'message' => "Course Registration Successfully. Once Admin is approved your Cousres will apear in Your Profile",
        'alert-type' => "success"
    );
    return redirect()->back()->with($notification);
       
}

  public function CourseReglist(){
    $data['course_reg_list'] = CourseRegistration::select('reg_number')->groupBy('reg_number','confirmed')->get();
    return view("website.student.reg_list",$data);
  }
    
  public function CourseRegDetalis($reg_number){
    $data['course_reg_list'] = 
    CourseRegistration::Where('reg_number',$reg_number)->orderby('reg_number')->get();
    return view("website.student.reg_detalis",$data);
  }

  public function ApprovedCourse($id)
  {
      $course = CourseRegistration::findorFail($id);
      $course->confirmed = 1;
      $course->update();
      $notification =array(
          'message' => "Course Approved",
          'alert-type' => "success"
      );
     return redirect()->back()->with($notification);
  }

  public function UnApprovedCourse($id)
  {
      $course = CourseRegistration::findorFail($id);
      $course->confirmed = 0;
      $course->update();
      $notification =array(
          'message' => "Course UnApproved",
          'alert-type' => "success"
      );
     return redirect()->back()->with($notification);
  }
  
  public function EnrollmentCourse(){
     
    $data['student_courses'] = CourseRegistration::where('student_id', Auth::guard('student')->user()->id, '1')
    ->where('confirmed', '=', 1)
    ->get();
    return view("website.student.course_en",$data);
}
}
