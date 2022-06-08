<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResultRequest;
use App\Models\CourseReg;
use Illuminate\Http\Request;

class GradPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['grad_point_list'] =CourseReg::get();
        return view("admin.result.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.result.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
        $grad_point =  new CourseReg();

        $grad_point->marks =$request->marks;
        $grad_point->letter_grad =$request->letter_grad;
        $grad_point->grad_point =$request->grad_point;

        $grad_point->save();

        $notification =array(
            'message' => "Gard point Successfull insert",
            'alert-type' => "success"
        );
        return redirect("/admin/grad_point")->with($notification);
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
        $result = CourseReg::findorFail($id);
        if(!$result){
        return redirect('/admin/gard_point');
        }
         $data['result'] =$result;
         return  view("admin.result.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResultRequest $request, $id)
    {
        $result = CourseReg::findorFail($id);
        if(!$result){
          return redirect('/admin/grad_point');
        }
        $result->marks =$request->marks;
        $result->letter_grad =$request->letter_grad;
        $result->grad_point =$request->grad_point;
     
         $result->save();
        $notification =array(
            'message' => "Grad Point Updated Successfully",
            'alert-type' => "success"
        );
        return redirect('/admin/grad_point')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = CourseReg::find($id);
        if(!$result){
          return redirect('/admin/department');
        }
        $result->delete();
    $notification =array(
            'message' => "  Delete Successfully",
            'alert-type' => "error"
        );
        return redirect('/admin/grad_point')->with($notification);
    }
}
