<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterCourseRequest;
use App\Models\CourseOffer;
use App\Models\Semester;
use App\Models\SemesterCourse;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SemesterCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['semester_course'] = SemesterCourse::select('semester_id','session_name','session_year')->groupBy('semester_id','session_name','session_year')->get();
        
        // $data['semester_course'] =SemesterCourse::get();
        return view("admin.universityinfo.semestercourses.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
           $data['fac_list'] = Teacher::get();
           $data['course_offer_list'] =CourseOffer::get();
           $data['semester_list'] =Semester::get();
        return view("admin.universityinfo.semestercourses.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterCourseRequest $request)
    {
        $subjectCount = count($request->course_id);
        if ($subjectCount !=NULL) {
            for ($i=0; $i <$subjectCount ; $i++) { 
                $semestercourse = new SemesterCourse();
                $semestercourse->session_name =$request->session_name;
                $semestercourse->session_year =$request->session_year;
                $semestercourse->semester_id = $request->semester_id;
                $semestercourse->course_id = $request->course_id[$i];
                $semestercourse->course_code = $request->course_code[$i];
                $semestercourse->course_credit= $request->course_credit[$i];
                $semestercourse->teacher_id =$request->teacher_id[$i];
                $semestercourse->save();
                   
            } 
        }
  
        $notification =array(
            'message' => "Semester's Course Information Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/semester_courses")->with($notification);
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
        $faculty = SemesterCourse::findorFail($id);
        if(!$faculty){
          return redirect('/admin/semester_courses');
        }
        $faculty->delete();
    $notification =array(
            'message' => " Semester Information Delete Successfully",
            'alert-type' => "error"
        );
        return redirect()->back()->with($notification);
    }
    

    public function SemesterCourseDetalis($semeser_id){
        $data['semester_course_list'] = 
        SemesterCourse::Where('semester_id',$semeser_id)->orderby('semester_id')->get();
        return view("admin.universityinfo.semestercourses.details",$data);
    }
}
