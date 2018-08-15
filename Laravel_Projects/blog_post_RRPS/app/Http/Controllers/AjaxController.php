<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ActivityComment;
use Auth;
class AjaxController extends Controller
{
    public function saveComment(Request $request) {
        if(request()->ajax()){               		
                
           $validator = Validator::make($request->all(), [
                        'user_id'=>'required',
                        'activity_id'=>'required',
                        'body'=>'required',
	   		      ]);	   		
	   		if($validator->passes()) {
                $ac = ActivityComment::create(request(['user_id','activity_id','body']));
                $date_time = date('d-m-Y H:i', time());
	   			return response()->json(['id'=>$ac->id, 'success'=>true,'date_time'=>$date_time]);
	   		} else {
	   			return response()->json(['msg'=>$validator->errors()->all()]);
	   		}              
        }          
    }

    public function updateComment(Request $request) {
        if(request()->ajax()){               		
            $logged_user = Auth::user(); 
            $user_id =  $logged_user->id;  
            $validator = Validator::make($request->all(), [
                         'id'=>'required',
                         'edited_comment'=>'required',                         
                      ]);	   		
                if($validator->passes()) {
                 $comment_row = ActivityComment::find($request->id);
                 $comment_row->body = $request->edited_comment;
                 $comment_row->save();
                 //dd('Hell');
                    return response()->json(['msg'=>'Updated', 'success'=>true]);
                } else {
                    return response()->json(['msg'=>$validator->errors()->all()]);
                }                   
                
        }
            
    }

    public function delComment(Request $request) {
        if(request()->ajax()){               		
            $logged_user = Auth::user(); 
            $user_id =  $logged_user->id;  
            $validator = Validator::make($request->all(), [
                         'cmnt_row_id'=>'required',                         
                      ]);	   		
            if($validator->passes()) {
                $comment_row = ActivityComment::find($request->cmnt_row_id);                 
                $comment_row->delete();                
                return response()->json(['msg'=>'Updated', 'success'=>true]);
            } else {
                return response()->json(['msg'=>$validator->errors()->all()]);
            }              
        }
    }
}
