<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Application;
use App\Models\Payments;
use App\Models\Student;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Element;

class AdminController extends Controller
{
    public function index(){
        return view("admin.dashboard.login");
    }

    public function Login(Request $request){
        
        // dd($request->all());
        $check = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($check)){
            $notification =array(
                'message' => "Successfully Login",
                'alert-type' => "success"
            );
            return redirect()->route('admin_dashboard')->with($notification);
        }elseif(Auth::guard('student')->attempt($check)){
            $notification =array(
                'message' => "Student Successfully Login",
                'alert-type' => "success"
            );
            return redirect()->route('student.dashboard')->with($notification);
        }   
        else{
            $notification =array(
                'message' => "Email or Password Does Not Match",
                'alert-type' => "error"
            );
            return redirect()->route('login_form')->with($notification);
        }
      

    }
      
   public function Profile(){
       return view("admin.profiel.profile");
   }

  public function ProfileUpdate(Request $request){
    $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email'
    ]);

    // if($request->password!='') {
    //     $request->validate([
    //         'password' => 'required',
    //         'retype_password' => 'required|same:password'
    //     ]);
    //     $admin_data->password = Hash::make($request->password);
    // }

    if ($request->hasFile('image')) {
        
        $request->validate([
            'image' => 'image|mimes:jpg,jpeg,png,gif'
        ]);
        //unlink(public_path('admin/uploads/'.$admin_data->photo));
        $ext = $request->file('image')->extension();
        $final_name = 'image'.'.'.$ext;
        $request->file('image')->move(public_path('admin/uploads/'),$final_name);
        $admin_data->image = $final_name;
    }
    $admin_data->name = $request->name;
    $admin_data->email = $request->email;
    $admin_data->update();
    return redirect()->back()->with('success', 'Profile information is saved successfully.');
  }


    public function Dashboard(){
        $data['student_list'] =Student::get();
        // $data['payment_list'] =Payments::get();
        return view("admin.dashboard.dashboard",$data);
    }
    
    public function Logout(){   
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
             $notification =array(
                'message' => "Logout Successfully",
                'alert-type' => "success"
            );
            return redirect()->route('login_form')->with($notification);
        }elseif(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
            $notification =array(
                'message' => "Logout Successfully",
                'alert-type' => "success"
            );
            return redirect()->route('login_form')->with($notification);
        }
        
    }
      
    public function StudentMessage(){
        $data['st_message'] = Application::get();
        return view("admin.profiel.message",$data);
    }
}