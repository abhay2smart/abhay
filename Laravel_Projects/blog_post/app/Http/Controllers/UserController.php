<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\event;
use App\VideoGallery;
class UserController extends Controller
{
    public function index() {
    	$act = new Activity;
		$result = $act->orderBy('created_at','desc')->take(3)->get();

		$events = new event();
		$event_result = $events->orderBy('created_at','desc')->take(5)->get();		

		//fething video data
		$videos = new VideoGallery();
		$videos_result = $videos->orderBy('created_at','desc')->take(8)->get();				
    	return view('home',['data_activity'=>$result, 'events' => $event_result, 'videos' => $videos_result]);
    }

    public function video_gallery() {
    	$videos = new VideoGallery();
		$videos_result = $videos->orderBy('created_at','desc')->take(8)->get();	
		return view('VideoGallery',['videos' => $videos_result]);
    }
}
