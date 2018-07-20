<?php

namespace App\Http\Controllers;
use Auth;
use App\UserProfile;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {        
        $user = Auth::user(); 
                
        $up = UserProfile::where('user_id', $user->id)->first();        
        return view('user.profile', ['user' => $user, 'user_profile' => $up]);
    }
}
