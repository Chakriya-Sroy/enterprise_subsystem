<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JournalController extends Controller
{
  public function index(){
    return view('frontend.journal.create');
  }
  public function profile(){
    $user=session()->get('auth')['user_name'];
    $id=session()->get('auth')['user_id'];
    $token=session()->get('user_token');
    $moods=['','Rad','Good','Meh','Bad','Awful'];
    $profile=[];
    $response=Http::withToken($token)->get('http://188.166.183.115:8080/api/v1/profile/'.''.$id);
    if($response->successful()){
      $profile=$response->json();
    }else{
      dd('error');
    }
    return view('frontend.profile')->with(
      [
        'username'=>$user,
        'total_word_count'=>$profile['TotalWordCount'],
        'total_entrries_montyly'=>$profile['TotalEntriesMonthly'],
        'total_goal_completed'=>$profile['TotalGoalsCompleted'],
        'total_goal_not_completed'=>$profile['TotalGoalsNotCompleted'],
        'emotional_report'=>$moods[$profile['MostUsedMood']]
      ]
    );
  }

}
