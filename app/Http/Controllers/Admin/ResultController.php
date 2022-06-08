<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Models\CourseResult;
use App\Models\Result as ModelsResult;
use Illuminate\Http\Request;


class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data['result_point_list'] =CourseResult::get();
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
         $point = new CourseResult();
         $point->marks= $request->marks;
         $point->letter_grad =$request->letter_grad;
         $point->grad_point =$request->grad_point;
         $point->save();
         $notification =array(
            'message' => " Grad Point Marks Insert Sucessfully",
            'alert-type' => "success"
        );
        return redirect("/admin/mark_grad_point")->with($notification);
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
         $result = CourseResult::findorFail($id);
         if(!$result){
            return redirect("/admin/mark_grad_point");
         }  
         
         $data['result'] =$result;
         return view("admin.result.edit",$data);

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
        $result = CourseResult::findorFail($id);
        if(!$result){
           return redirect("/admin/mark_grad_point");
        }  
        $result->marks =$request->marks;
        $result->letter_grad =$request->letter_grad;
        $result->grad_point =$request->grad_point;
    
          $result->save();
        $notification =array(
            'message' => "Gard Point Marks Updated Successfully",
            'alert-type' => "success"
        );
        return redirect("/admin/mark_grad_point")->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = ModelsResult::findorFail($id);
        if(!$result){
            return redirect("/admin/mark_grad_point");
        }
        $result->delete();
      $notification =array(
            'message' => " Gard Point Marks Delete Successfully",
            'alert-type' => "error"
        );
        return redirect("/admin/mark_grad_point")->with($notification);
    }
}
