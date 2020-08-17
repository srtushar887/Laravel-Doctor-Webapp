<?php

namespace App\Http\Controllers\Auth;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DcotorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor',['except'=>['logout']]);
    }


    public function showRegisterform()
    {
        return view('auth.doctor.doctorRegister');
    }


    public function doctor_register_save(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone_number = $request->phone_number;
        $doctor->account_status = 1;
        $doctor->password = Hash::make($request->password);
        $doctor->save();

        return redirect(route('doctor.login'))->with('success_email','Please Check Your Mail ');


    }




    public function showLoginform()
    {
        return view('auth.doctor.doctorLogin');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('doctor')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('doctor.dashboard'));
        }

        return redirect()->back();

    }



    //this funsion for admin logout which i customized to cpy form loginController
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect(route('doctor.login'));
    }
}
