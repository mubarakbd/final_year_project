<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Student;
use App\Http\Requests\CourseRequest;
use App\Imports\CourseImport;
use App\Models\CourseOffer;
use App\Models\Student as ModelsStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class CourseOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['course_list'] = CourseOffer::paginate(15);
        return view("admin.universityinfo.courseoffer.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("admin.universityinfo.courseoffer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
                $course = new CourseOffer();
                $course->course_name = $request->course_name;
                $course->course_code = $request->course_code;
                $course->course_credit= $request->course_credit;
             
                 $course->save();
        $notification =array(
            'message' => "Courses Information Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/course_offer")->with($notification);
       
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

    // Import Course 

    public function CourseImport (){
        return view("admin.universityinfo.courseoffer.course_import");
    }
    public function CourseImportUpload(Request $request){
        Excel::import(new CourseImport,$request->file);
        $notification =array(
            'message' => "Courses Information Upload Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/course_offer")->with($notification);
        }


    //  public function CourseRegStudentInfo(){
    //     $data['student_reg'] = ModelsStudent::select('reg_number')->groupBy('reg_number')->get();
    //     return view("admin.universityinfo.courseoffer.course_reg_store",$data);
    //  }   

    //  public function CourseRegStudentDetalis($reg_number){
    //     $data['course_reg_list'] = 
    //     ModelsStudent::Where('reg_number',$reg_number)->orderby('reg_number')->get();
    //     return view();
    //  }
    
}
