<?php

namespace App\Http\Controllers\Website;

use App\Enums\CourseType;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Http\Requests\StudentCourseRequest;
use App\Models\CourseOffer;
use App\Models\CourseRegistration;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Student as ModelsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CouresRegistarionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['dep_list'] =Department::get();
        $data['semester_list'] =Semester::get();
        $data['course_offer'] =CourseOffer::get();
        // $data['student_list'] =ModelsStudent::get();
        $data['student_list'] = ModelsStudent::where('id', Auth::guard('student')->user()->id, )->get();

        $data['course_status'] = CourseType::asSelectArray();
      return view("website.studentreg.index",$data);
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
    public function store(StudentCourseRequest $request)
    {
       

        $subjectCount = count($request->course_id);
        if ($subjectCount !=NULL) {
            for ($i=0; $i <$subjectCount ; $i++) { 
                $coursereg = new CourseRegistration();
                $coursereg->dep_name =$request->dep_name;
                $coursereg->program_name =$request->program_name;
                $coursereg->reg_number =$request->reg_number;
                $coursereg->name =$request->name;
                $coursereg->semester_id = $request->semester_id;
                $coursereg->course_id = $request->course_id[$i];
                $coursereg->course_code = $request->course_code[$i];
                $coursereg->course_credit= $request->course_credit[$i];
                $coursereg->status =$request->status;
                $coursereg->confirmed =0;
                $coursereg->student_id = Auth::guard('student') ? Auth::guard('student')->user()->id : 0;
               
                $coursereg->save();
                $notification =array(
                    'message' => "Course Registration Successfully Please Wait for final Aprrovel by Admin",
                    'alert-type' => "success"
                );
               return redirect()->back()->with($notification);
 
            } 
        }
  
      
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

    public function CourseRregNumberList(){
        $data['course_reg_list'] = CourseRegistration::select('reg_number')->groupBy('reg_number','confirmed')->get();
        return view("website.studentreg.course_reg_list",$data);
    }
   
    public function CourseRregDetalis($reg_number){
        $data['course_reg_list'] = 
        CourseRegistration::Where('reg_number',$reg_number)->orderby('reg_number')->get();
        // $data['course_reg_list']=CourseRegistration::get();
        return view("website.studentreg.course_reg_detalis",$data);
    
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
    
    public  function CourseRregDelate($reg_number)
    {
        $course = CourseRegistration::findorFail($reg_number);
        $course->delete();
        $notification =array(
            'message' => "Course Delated Sucessfully ",
            'alert-type' => "error"
        );
       return redirect()->back()->with($notification);
    }
  
}
