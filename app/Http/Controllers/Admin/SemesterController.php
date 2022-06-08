<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $data['semester_list'] = Semester::paginate(4);
        return view("admin.universityinfo.semester.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.universityinfo.semester.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SemesterRequest $request)
    {
        $semester = new Semester();
        $semester->semester_name =$request->semester_name;
        $semester->save();
        $notification =array(
            'message' => "Semester Successfully Insert",
            'alert-type' => "success"
        );
        return redirect("/admin/semester")->with($notification);
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
        $semester = Semester::findorFail($id);
        if(!$semester){
        return redirect('/admin/semester');
        }
         $data['semester'] =$semester;
         return  view("admin.universityinfo.semester.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SemesterRequest $request, $id)
    {
        $semester = Semester::findorFail($id);
        if(!$semester){
          return redirect('/admin/semester');
        }
        $semester->semester_name =$request->semester_name;
     
          $semester->save();
        $notification =array(
            'message' => "Semester Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/semester')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::find($id);
        if(!$semester){
          return redirect('/admin/department');
        }
        $semester->delete();
    $notification =array(
            'message' => " Semester Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/semester')->with($notification);
    }
}
