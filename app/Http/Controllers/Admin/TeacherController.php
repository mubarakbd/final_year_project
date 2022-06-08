<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['fac_list'] = Teacher::get();
        return view("admin.universityinfo.teacher.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.universityinfo.teacher.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        if($request->hasFile('f_image')){  	
            $path = $request->file('f_image')->store('teacher_images', 'public');
        }else{
            $path =null;
        }

        $fac = new Teacher();
        $fac->f_name =$request->f_name;
        $fac->f_desgination =$request->f_desgination;
        $fac->f_email =$request->f_email;
        $fac->f_phone =$request->f_phone;
        $fac->f_image =$request->f_image;
        $fac->f_image =$path;
        $fac->save();
        $notification =array(
            'message' => "Faculty's Information Insert Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/faculty")->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faculty = Teacher::findorFail($id);
        if(!$faculty){
        return redirect('/admin/faculty');
        }
         $data['faculty'] =$faculty;
         return  view("admin.universityinfo.teacher.edit",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fac = Teacher::findorFail($id);
        if(!$fac){
        return redirect('/admin/faculty');
        }
         $data['fac'] =$fac;
         return  view("admin.universityinfo.teacher.edit",$data);
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
        $fac = Teacher::findorFail($id);
        if(!$fac){
            return redirect('/admin/faculty');
        }
        $fac->f_name =$request->f_name;
        $fac->f_desgination =$request->f_desgination;
        $fac->f_email =$request->f_email;
        $fac ->f_phone =$request->f_phone;
          $fac->save();
        $notification =array(
            'message' => "Faculty Information Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/faculty')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Teacher::findorFail($id);
        if(!$faculty){
          return redirect('/admin/faculty');
        }
        $faculty->delete();
    $notification =array(
            'message' => " faculty Information Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/faculty')->with($notification);
    }
}
