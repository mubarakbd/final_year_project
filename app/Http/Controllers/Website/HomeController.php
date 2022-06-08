<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }

    public function StudentRegisrtion(Registration $request){
        dd($request->all());
    }


}
