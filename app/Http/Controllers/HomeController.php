<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){
            
        $token=session()->get('user_token');
        $journals=[];
        $response=HTTP::withToken($token)->get('http://188.166.183.115:8080/api/v1/journalEntry/');
        if($response->successful()){
            $data=$response->json()['data'];
            $journals=Collection::make($data);
            
        }else{
            dd($response->json());
        }
        return view('frontend.index')->with(['journals'=>$journals]);
    }
}
