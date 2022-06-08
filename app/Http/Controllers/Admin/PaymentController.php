<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $data['semester_list'] =Semester::get();
      return view("website.payment.paytment_process",$data);
    }

    public function Addpayment(Request $request){
            
        if($request->hasFile('image')){  	
            $path = $request->file('image')->store('payments', 'public');
        }else{
            $path =null;
        }
       $payment = new Payments();
       $payment->name =$request->name;
       $payment->reg_number =$request->reg_number;
       $payment->semester_id =$request->semester_id;
       $payment->trans_id =$request->trans_id;
       $payment->semester_id =$request->semester_id;
       $payment->image =$path;
       $payment->save();
      return redirect()->back()->with('success','Payement Detalis Update Successfully');
    }
}


