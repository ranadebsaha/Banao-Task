<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;
class mainController extends Controller
{
    public function view_form(){
        return view('index');
       }
       public function save_form(Request $request){
        $request->validate([
            "name" => 'required|regex:/^[\pL\s]+$/u',
            "email" => "required|email|unique:users",
            "password"=> "required|min:8"
        ],
    [
        "name.regex"=> "Only Letters are Allowed"
    ]
    );
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $res = $user->save();
        if ($res) {
            return redirect('/')->with('success', 'Registered Successfully Completed');
        } else {
            return redirect('/')->with('error', "Something Wrong");
        }
       }
       public function view_login(){
        return view('login');
       }
       public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('email', $user->email);
                $request->session()->put('name', $user->name);
                return redirect('dashboard')->with('success', "Welcome User");
            } else {
                return redirect('login')->with('error', "Enter Valid Password");
            }
        } else {
            return redirect('login')->with('error', "Enter a Valid or Registered Email Id");
        }
    }

    public function view_dashboard(){
        return view('dashboard');
       }

       public function logout(){
        if (Session::has('email')) {
            Session::pull('email');
            Session::pull('name');
            return redirect('login');
        }
        else{
            return redirect()->back();
        }
    }
}
