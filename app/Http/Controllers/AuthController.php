<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function login(){
       
        return view('Auth.login');
    }
    public function loginstore(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required']
        ]);
      
        $response = Http::asForm()->post('http://188.166.183.115:8080/api/v1/user/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        if ($response->successful()) {
            $data = $response->json();
            $token=$data['token'];
            session(['user_token' => $token]);
            session(['auth'=>$data]);
            return redirect()->route('homepage');
         } else {
                return redirect()->route('login')->with('status', 'Invalid Credential');
         }

        return redirect()->route('homepage');
    }
    public function signup(){
        return view('Auth.signup');
    }
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required'],
        ]);
        $response = Http::asForm()->post('http://188.166.183.115:8080/api/v1/user/signup', [
            'Username' => $request->fullname,
            'Email' => $request->email,
            'Password' => $request->password,
        ]);
        // Check if the registration was successful
        if ($response->successful()) {
            return redirect()->route('login');
        } else {
            $errorData = $response->json(); // Retrieve error data
            return redirect()->route('signup')->with('status', 'Error');
        }

        return redirect()->route('homepage');

    }
    public function logout(){
          // Clear user token from the session
          Session::forget('user_token');
          // Redirect or perform any other actions
          return redirect()->route('login');
    }

}
