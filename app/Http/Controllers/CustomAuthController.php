<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; 
use Hash;
use Session;
class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }
    public function registerStudent(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:students',
                'password'=>'required'
            ]
        );
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $res = $student->save();
        if($res)
        {
            return back()->with('success', 'You have registered');
        }
        else
        {
            return back()->with('error', 'Invalid');
        }
    }

    public function loginStudent(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
            
        );
        $student = Student::where('email','=', $request->email)->first();
            if($student)
            {
                if(Hash::check($request->password, $student->password))
                {
                    $request->session()->put('loginId', $student->id);
                    return redirect('dashboard');
                }else{
                    return back()->with('fail', 'password is incorrect');
                }
            }else{
                return back()->with('fail', 'Not Found');
            }
    }

    public function dashboard(){
        
        $data = array();
        if(Session::has('loginId')){
            $data = Student::where('id','=', Session::get('loginId'))->first();
        }

        return view('dashboard',compact('data'));
    }

    public function logoutStudent(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
