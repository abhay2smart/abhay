<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use Auth,DB;
use App\UserProfile;
use File,Image;
use App\User;

class CommonController extends Controller
{
    public function go_act($id = null) {
        
        $logged_user = 0;
        $logged_user_profile = 0;
        $user = 0;
        if(Auth::check()) {
            $logged_user = true;
            $user = Auth::user();
            $logged_user_profile = UserProfile::where('user_id', $user->id)->get()->toArray();                        
        } else {
            $logged_user = 0;
        }
            
        if($id) {        
            //$activities = Activity::get();
            $activities = new Activity;
            //$activities = $activities->where('id',$id)->take(4)->orderBy('post_date', 'DESC')->get();
            if($activities->find($id)) {
                // $activities = DB::select("select * from activities order by id = '$id' desc, created_at asc limit 4");   

                $activities = DB::table('activities')
                ->orderByRaw("(id = '$id') DESC")
                ->orderByRaw("(created_at) DESC")                
                ->paginate(5);
                //dd($activities);
                return view('activity', ['clicked_data'=>$activities,'logged_user'=>$logged_user,'user'=>$user,'logged_user_pfofile'=>$logged_user_profile]);
                
            }
        } else {
            $activities = DB::table('activities')->orderByRaw("(created_at) DESC")                
                ->paginate(5);

                return view('activity', ['clicked_data'=>$activities,'logged_user'=>$logged_user,'user'=>$user,'logged_user_pfofile'=>$logged_user_profile]);
        }       
    }

    public function saveProfile(Request $request) {

        $this->validate($request, [
            'name' => 'required|alpha|min:3',
            'email' => 'required|email',
            'file_control' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            // ,'txtbox_title' => 'required'
        ]);        
        $user = Auth::user();
        $up = UserProfile::where('user_id', $user->id)->first();
        if($request->file('file_control')) {
        
            $imageName = rand() . '.' . $request->file('file_control')->getClientOriginalExtension();
            $small_imageName = "small_" . $imageName;

            if(!file_exists('public/img/users')) {
                mkdir('public/img/users', 0777, true);
            }
            request()->file_control->move('public/img/users/', $imageName);
            Image::make('public/img/users/'.$imageName)->resize(75, 70)->save('public/img/users/'.$small_imageName, 60);
        }
        $record = UserProfile::where('user_id', $user->id)->first();

        if($record) {
           $record->user_id = $user->id;
           if($request->file('file_control')) {
                $filename = $record->image;
                $filpath = public_path().'/img/users/'.$filename;
                $filpath_small = public_path().'/img/users/small_'.$filename;
                \File::delete([$filpath, $filpath_small]);
                $record->image = $imageName;
           }
           $record->hobbies = $request->get('hobbies');
           $record->city = $request->get('city');
           $record->country = $request->get('country');
           $record->dob = $request->get('dob');
           $record->save();
        } else {
            $up_instance = new UserProfile();
            $up_instance->user_id = $user->id;
            if($request->file('file_control')) {
                $up_instance->image = $imageName;
            }
            $up_instance->dob = $request->get('dob');
            $up_instance->city = $request->get('city');
            $up_instance->country = $request->get('country');
            $up_instance->hobbies = $request->get('hobbies');
            $up_instance->save();
        }
        if($request->get('name')) {
            $name = $request->get('name');            
            $user = User::find($user->id);            
            $user->name = $name;            
            $user->save();            
        }
        if($request->get('email')) {
            $email = $request->get('email');            
            $user1 = User::find($user->id);            
            $user1->email = $email;            
            $user1->save();            
        }        
        return redirect('/profile');
    }

    public function viewProfile($id) {
        $user = User::find($id);
        if($user) {
            $up = UserProfile::where('user_id', $user->id)->first();
            if($up) {
                if( $up->public ) {
                    return view('user.viewprofile',['user' => $user, 'user_profile' => $up]);
                } else {
                    return back();
                }
            }
            return back();
        }
        return back();      
    }
}
