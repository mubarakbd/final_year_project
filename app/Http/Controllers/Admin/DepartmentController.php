<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['dep_list'] = Department::get();
        return view("admin.universityinfo.dep.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.universityinfo.dep.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepRequest $request)
    {
         $dep = new Department();
         $dep->dep_name =$request->dep_name;
         $dep->program_name =$request->program_name;
        $dep->save();
         $notification =array(
            'message' => "Department Successfully Insert",
            'alert-type' => "success"
        );
        return redirect("/admin/department")->with($notification);
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
        $dep = Department::findorFail($id);
        if(!$dep){
        return redirect('/admin/department');
        }
         $data['dep'] =$dep;
         return  view("admin.universityinfo.dep.edit",$data);
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
        $dep = Department::find($id);
        if(!$dep){
          return redirect('/admin/department');
        }
        $dep->dep_name =$request->dep_name;
        $dep->program_name =$request->program_name;
        $dep->save();
        $notification =array(
            'message' => "Department Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/department')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep = Department::find($id);
        if(!$dep){
          return redirect('/admin/department');
        }
        $dep->delete();
    $notification =array(
            'message' => " Department Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/department')->with($notification);
    }
}
