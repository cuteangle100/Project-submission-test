<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{

    //Trait
    use AuthenticatesUsers;
    
    //Custom guard for user
    protected function guard()
    {
      return Auth::guard('web');
    }
    
    //show registration form
    public function show_register_form() {
        return view('register');      
    }
    
    // submit user data to database 
    public function register(Request $request) {
        
        
        // validations rules
        $validations = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255|',
            'password' => 'required|confirmed|max:255',
        ];

        $this->validate($request, $validations);  // validate request data
      
        $request['password'] = bcrypt($request->password);  // encription of password 
        
        User::create($request->all());  // user creation 
        
        return redirect('/')->with('status' , 'successfully registred');  // 
        
    }
    
    //show login form
    public function show_login_form() {
        return view('login');      
    }
    
    // get login 
    public function login(Request $request) {
        
        // validations rules
        $validations = [
            'email' => 'required|email|max:255|',
            'password' => 'required|max:255',
        ];

        $this->validate($request, $validations); 
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            return redirect('projects');
        }else{
            return redirect('login');
        }
    
    }
    
}
