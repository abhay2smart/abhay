<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{photo_gallery, VideoGallery, Activity, User, event};
use File, Auth, FFMpeg;

use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\Storage; // to delete image file

class AdminController extends Controller
{
    
    public function index() {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                return redirect('dashboard');
            }
        }
        
        return view('Auth\adminlogin');
    }

    public function login(Request $request) {
        ///dd($request->all());

        if(Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ])) {
            $user = User::where('email', $request->email)->first();            
            if($user->admin) {
                return redirect('dashboard');
            }
            return redirect('/');
        }
        return redirect()->back();
    }    
    
    // Gallery part
    public function saveGalleryImage(Request $request) {
        if(Auth::check()) {            
            if(Auth::User()->admin) {       
            // Title is not saved, however it can be done easily by uncommenting some code
            //dd($request->get('txtbox_title'));
                $this->validate($request, [
                    'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
                    // ,'txtbox_title' => 'required'
                ]);
                $imageName = rand() . '.' . $request->file('select_file')->getClientOriginalExtension();
                $small_imageName = "small_" . $imageName;
                //dd($small_imageName);
                //dd($request->file('select_file'));
                if(!file_exists('public/img/gallery')) {
                    mkdir('public/img/gallery', 0777, true);
                }
                request()->select_file->move('public/img/gallery', $imageName);
                $thumb = Image::make('public/img/gallery/'.$imageName)->resize(75, 70)->save('public/img/gallery/'.$small_imageName, 100);
                Image::make('public/img/gallery/'.$imageName)->resize(754, 460)->save('public/img/gallery/'.$imageName, 100);
                // saving url into database
                $gal = New photo_gallery(); 
                $gal->image = $imageName; 
                $gal->save();  
                
                return redirect('admin/savegallery')->with('status', 'Uploaded successfully');
            }
        }
                
        
    }

    public function view_gallery() {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                return view('auth.viewgallery', ['data' => photo_gallery::get(), 'checked_view_gal' => 1]);
            }
        }        
    }

    public function delpic( $id ) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
       
                $gal = New photo_gallery();
                $filename = $gal::where('id',$id)->first()->image;        
                $gal->destroy($id);

                $filpath = public_path().'/img/gallery/'.$filename;
                $filpath_small = public_path().'/img/gallery/small_'.$filename;
                \File::delete([$filpath, $filpath_small]);
                return redirect('admin/viewgallery');
            }
        }        
    }

    public function save_activity(Request $request) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                $this->validate($request, [
                    'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'title' => 'required',
                    'content' => 'required'
                ]);
                if(!file_exists('public/img/activities')) {
                    mkdir('public/img/activities', 0777, true);
                }

                $imageName = rand() . '.' . $request->file('select_file')->getClientOriginalExtension();
                $small_imageName = "small_" . $imageName;

                request()->select_file->move('public/img/activities', $imageName);
                Image::make('public/img/activities/'.$imageName)->resize(75, 70)->save('public/img/activities/'.$small_imageName, 60);
                $act = new Activity();
                $act->title = $request->get('title');
                $act->body = $request->get('content');
                $act->image = $imageName;
                $act->save();

                return redirect('admin/postactivity')->with('status','Record saved');
            }
        }
    }

    public function view_activity() {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                $act = new Activity();
                $data = $act->get();
                return view('auth.viewactivity', ['data' => $data, 'act_checked' => 1]);
            }
        }
    }

    public function delete_activity( $id ) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                $act = new Activity();
                $filename = $act->where('id', $id)->first()->image; 
                //dd($filename);
                $filpath = public_path().'/img/activities/'.$filename;
                $filpath_small = public_path().'/img/activities/small_'.$filename;
                \File::delete([$filpath, $filpath_small]);
                
                $act->destroy($id);
                return redirect('admin/viewactivity');
            }    
        }        
    }

    public function saveEvent(Request $request) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                $event = new event();
                $event::create(['title' => $request->get('title'), 'body' => $request->get('content')]);
                return back()->with('status', 'Record saved');  
            }
        }              
    }

    public function viewEvent() {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                $event_data = event::orderBy('created_at', 'desc')->get();
                return view('auth.viewevent',['event_data' => $event_data, 'event_view_checked' => 1]);
            }
        }
    }

    public function delEvent( $id ) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                event::destroy($id);
                return back();
            }
        }        
    }

    public function show_video_form( ) {
        if(Auth::check()) {
            if(Auth::User()->admin) {
                return view('auth.savevideo', ['videos_checked'=>1]);
            }
        }        
    }
    public function save_video(Request $request) {
        if((Auth::check()) && (Auth::User()->admin) ) { 
                              
            if($request->hasFile('file_')) {
                $this->validate($request, [                    
                    'title' => 'required', 
                    'file_' => 'required|mimes:mp4,flv,mov,avi,wmv'                   
                ]);
                
                $video_name = rand() . '.' . $request->file('file_')->getClientOriginalExtension();

                request()->file_->move('public/video_gallery/videos/', $video_name);

                if($request->hasFile('video_thumnail')) {
                    $this->validate($request, [
                        'video_thumnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
                    ]);
                
                    $img_name = rand() . '.' . $request->file('video_thumnail')->getClientOriginalExtension();

                    request()->video_thumnail->move('public/video_gallery/thumbnails/', $img_name);
                    Image::make('public/video_gallery/thumbnails/'.$img_name)->resize(500, 333)->save('public/video_gallery/thumbnails/'.$img_name, 60);
                    $vid_gal = new VideoGallery();
                    $vid_gal->title = $request->get('title');
                    $vid_gal->thumbnail = $img_name;
                    $vid_gal->video_url = $video_name;
                    $vid_gal->save();
                } else {
                    $ffmpeg = FFMpeg\FFMpeg::create([
                       'ffmpeg.binaries'  => 'public/FFmpeg/bin/ffmpeg.exe', // the path to the FFMpeg binary
                       'ffprobe.binaries' => 'public/FFmpeg/bin/ffprobe.exe', // the path to the FFProbe binary
                       'timeout'          => 3600, // the timeout for the underlying process
                       'ffmpeg.threads'   => 12,   // the number of threads that FFMpeg should use
                    ]);
                    $img_name = rand().".jpg";
                    $snapshot ="public/video_gallery/thumbnails/". $img_name;
                    if(file_exists('public/video_gallery/videos/'.$video_name)) {
                       $video = $ffmpeg->open('public/video_gallery/videos/'.$video_name);
                       $video
                        ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(2))
                        ->save($snapshot);
                        $img = Image::make($snapshot);

                        // resize image instance
                        $img->resize(500, 333);
                        $img->save($snapshot);

                        // saving dat into database
                        $vid_gal = new VideoGallery();
                        $vid_gal->title = $request->get('title');
                        $vid_gal->thumbnail = $img_name;
                        $vid_gal->video_url = $video_name;
                        $vid_gal->save();

                    }
                }               
                
                return back()->with('status', 'Record saved');              

            }
            
        }        
    }
    // video operation
    public function list_video() {

        if(Auth::User()->admin) {            
            return view('auth.listvideo', ['videos' => VideoGallery::get(), 'videos_checked'=>1]);           
        }
    }
    public function del_video( $id ) {
        if(Auth::check()) {
            if(Auth::User()->admin) {                
       
                $vid = New VideoGallery();
                $thumbnail = $vid::where('id',$id)->first()->thumbnail;        
                $vid_name = $vid::where('id',$id)->first()->video_url;
                $vid->destroy($id);

                $filpath_thumb = public_path().'/video_gallery/thumbnails/'.$thumbnail;
                $filpath_vid = public_path().'/video_gallery/videos/'.$vid_name;                
                \File::delete([$filpath_thumb, $filpath_vid]);
                return redirect('admin/delvideo');
            }
        }        
    }

}
