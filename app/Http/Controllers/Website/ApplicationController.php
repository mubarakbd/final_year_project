<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        return view("website.application.index");
    }

    public function Application(Request $request){
        $application = new Application();
        $application->name =$request->name;
        $application->email=$request->email;
    
        $application->subject =$request->subject;
        $application->message =$request->message;
        $application ->save();
        return redirect()->back()->with('success',' Application  Send Successfully');
    }


}
