@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ url('/public/css/style.css')}}" />

<style> 
    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 25px;
        color: #fff;
        line-height: 40px;
        text-align: center;
        border: 1px solid gray;        
        top: 16px;
    }
    .word_wrap {
        word-wrap: break-word;
    }
    .edit_box {
        outline: none;
    }
    .position_relative {
        position: relative;
    }
    .margin_btm_ten{
        margin-bottom: 10px;
    }
    .inline_block {
        display: inline-block;
    }
    .cmnt_box {
        display: inline-block;
        border: solid 1px #000;
        min-height: 20px;
        width: 60%;
        border-radius: 30px;
        padding: 5px 10px 5px 10px;
        outline: none;
        word-wrap: break-word;
    }
    [contentEditable=true]:empty:not(:focus):before{
        content:attr(data-text)
    }
    .flex_wrapper {
        display: flex;
        flex-direction: row;
    }
    /* for custome messgae*/
      flex-container {
        display: flex;
      }
      .msg-container {      
        padding: 20px;
        background: #F43547;
        float: right;
        position: fixed;
        margin: auto;
        z-index: 100;
        color: #FFF;
        font-size: 14px;
        display: inline-block;
      }
      .dsp-table {
        display: tale;
      }
      .dsp-table-cell {
        display: table-cell;
      }
      .vertical-align-mdl {
        vertical-align: middle;
      }
      .bold-font {
        font-weight: bold;
      }
      .cmnt_block {
          display: inline-block;
          max-width: 100%;
          padding: 5px 5px 5px 5px;
          border: 1px solid gray;
          border-radius: 15px;
      }

      .left_adblock {
        display: block;
        margin-top: 15px;
    }
    .right_adblock {
        display: block;
        margin-top: 15px;
    }      
    /* iPhone eXpensive portrait · width: 374px */
    @media screen and (min-width: 300px) {
        .left_adblock {
            display: none;
        }

        .right_adblock {
            display: none;
        }   
        .cmnt_box {
            width: 60%;
        }
    }
    @media screen and (min-width: 375px) {
        .left_adblock {
            display: none;
        }

        .right_adblock {
            display: none;
        }   
    }
    /* iPhone eXpensive landscape · width: 734px */
    @media screen and (min-width: 734px) {
        body {
            
        }
    }
    /* Android (Pixel 2) portrait · width: 411px */
    @media screen and (max-width: 412px) {
        .margin_left_ten {
            margin-left: 15px;
        }
    }
    /* Android (Pixel 2) landscape · width: 684px */
    @media screen and (min-width: 684px) {
        body {
            
        }
    }
    /* iPhone 6-8 portrait · width: 375px */

     @media screen and (min-width: 375px) {
        body {
            
        }
    }
    /* iPhone 6-8 landscape · width: 667px */
    @media screen and (min-width: 667px) {
        body {
            
        }
    }
    /* iPhone 6-8 Plump portrait · width: 414px */
    @media screen and (min-width: 414px) {
        .cmnt_box {
            width: 70%;
            position: relative;
            left: 12px;
            margin-right: 10px;
        }
    }
    /* iPhone 6-8 Plump landscape · width: 736px */
    @media screen and (min-width: 736px) {
        body {
            
        }
    }
    /* iPad portrait · width: 768px */
    @media screen and (min-width: 768px) {
        .right_adblock {
            display: block;
        }
    }
    /* iPad landscape · width: 1024px */ 
    @media screen and (min-width: 1024px) {
        .right_adblock {
            display: block;
        }

        .left_adblock {
            display: block;
        }
        .cmnt_box {
            left: 0;
        }
    }
      
    .edit_box {
        min-height: 20px;
        min-width: 100px;        
    }
    /* Fancy message*/
    .flex-container {
        display: flex;
      }
      .msg-container {      
        padding: 20px;
        background: #F43547;
        float: right;
        position: fixed;
        margin: auto;
        z-index: 100;
        color: #FFF;
        font-size: 14px;
        display: inline-block;
      }
      .dsp-table {
        display: tale;
      }
      .dsp-table-cell {
        display: table-cell;
      }
      .vertical-align-mdl {
        vertical-align: middle;
      }
      .bold-font {
        font-weight: bold;
      }
      .show_more_cmnts {
        color: blue;
        cursor: pointer;
      }
</style>
@endpush

@push('js')

<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

          function placeCaretAtEnd(el) {
            el.focus();
            if (typeof window.getSelection != "undefined"
                    && typeof document.createRange != "undefined") {
                var range = document.createRange();
                range.selectNodeContents(el);
                range.collapse(false);
                var sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (typeof document.body.createTextRange != "undefined") {
                var textRange = document.body.createTextRange();
                textRange.moveToElementText(el);
                textRange.collapse(false);
                textRange.select();
            }
        }
        
          function ajaxRequest(request_url, data_obj,callback) {
            $.ajax({
                url: request_url,
                method: 'post',
                data: data_obj,
                success: callback,
                error: function(jqXHR, textStatus, errorThrown) {
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
                }
            
            });
          }
          // saving comment
          $('body').delegate('.btn_comment', 'click', function(){        
                //fancyMessage({msg,error_sign,bgcolor});

                  
                var comment_box = $(this).parent().parent().find('.cmnt_box');
                var comment = comment_box.text();                
                var user_id = $(this).parent().parent().find('input[name="user_id"]').val();
                var activity_id = $(this).parent().parent().find('input[name="activity_id"]').val();
                //console.log(user_id);
                var _this = this;                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });                
                var row;     
                
                if({{ $logged_user }} != false) {
                    if(comment.length !=0) {                        
                        ajaxRequest("{{ url('/save-comment') }}", {
                            user_id: user_id,                  
                            activity_id: activity_id,
                            body: comment            
                            }, function(respone){
                                    var row_id = respone.id;
                                    var date_time;
                                    if(respone.success) {                            
                                        date_time = respone.date_time;
                                        @if($logged_user_pfofile)                              
                                        row = `<div class="row margin_btm_ten">
                                                        <div class="col-md-1 col-xs-2">
                                                            <div class="circle inline_block" style="background: url({{url('/public/img/users/small_'.$logged_user_pfofile[0]['image'])}}) 0% 0% / 100% 100% no-repeat;"></div>
                                                        </div> 
                                                        <div class="col-md-10 col-xs-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div data-id=${row_id} class="cmnt_block word_wrap">
                                                                        <a href="{{url('/viewprofile/'.$user->id)}}" class="user_profile_link"> {{$user->name or ''}}  </a> <span class="word_wrap">${comment}</span>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">                                                                  
                                                                    <div class="dropdown">
                                                                        <span data-toggle="tooltip" data-placement="bottom" title="${date_time}">
                                                                            &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                                                        </span>	
                                                                        <span data-toggle="dropdown">&nbsp;&nbsp;<i class="far fa-edit"></i>
                                                                        </span>
                                                                        <div class="dropdown-menu" style="min-width: 80px !important">
                                                                            <div class="arrow_wrapper">
                                                                                <div class="arrow"></div>		   
                                                                            </div>
                                                                            <div class="menu_item" style="padding: 5px; max-width: 40px !important">
                                                                                <span class="dropdown-item edit_cmnt_event cursor_pointer">Edit</span>
                                                                                <span class="dropdown-item del_cmnt_event cursor_pointer red_color">Delete</span>				
                                                                            </div>
                                                                        </div>    
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>`;
                                    @else 
                                        row = `<div class="row margin_btm_ten">
                                            <div class="col-md-1 col-xs-2">
                                                <div class="circle inline_block position_relative" style="top: -3px">
                                                    <i class="fas fa-user" style="color: lavender;line-height: 10px"></i>
                                                </div>
                                            </div> 
                                            <div class="col-md-10 col-xs-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div data-id=${row_id} class="cmnt_block word_wrap"><a href="#" class="user_profile_link"> {{$user->name or ''}}  </a> <span class="word_wrap">${comment}</span>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">                                                           
                                                        <div class="dropdown">
                                                            <span data-toggle="tooltip" data-placement="bottom" title="${date_time}">
                                                                &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                                            </span>	
                                                            <span data-toggle="dropdown">&nbsp;&nbsp;<i class="far fa-edit"></i>
                                                            </span>
                                                            <div class="dropdown-menu" style="min-width: 80px !important">
                                                                <div class="arrow_wrapper">
                                                                    <div class="arrow"></div>		   
                                                                </div>
                                                                <div class="menu_item" style="padding: 5px; max-width: 40px !important">
                                                                    <span class="dropdown-item edit_cmnt_event cursor_pointer">Edit</span>
                                                                    <span class="dropdown-item del_cmnt_event red_color cursor_pointer">Delete</span>				
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>`;            
                                    @endif                 
                                    $(row).insertBefore($(_this).closest('.row'));
                                    comment_box.text('');
                                    $('[data-toggle="tooltip"]').tooltip();
                                //console.log(respone)
                                }
                            }
                        );
                    } else {
                        $("#success-alert").addClass('alert-warning').text('Please enter some text');
                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert").slideUp(500);
                        });
                    }
                } else {
                    $("#success-alert").addClass('alert-warning').text('Please login first');
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
                }                                  
           });
           var cmnt_div, cmnt_div_editbox, user_name; 
           $('body').delegate('.edit_cmnt_event', 'click', function(){
                user_name = $(this).parent().parent().parent().parent().parent().parent().find('.user_profile_link').text();
                cmnt_div = $(this).parent().parent().parent().parent().parent().parent().find('span.word_wrap').prop('contenteditable',true);
                
                cmnt_div_editbox = $(this).parent().parent().parent().parent().parent().parent().find('.word_wrap').html(cmnt_div.html()).addClass('edit_box').prop('contenteditable',true);                                 
                comment_id = $(this).parent().parent().parent().parent().parent().parent().find('.word_wrap').attr('data-id');
                
                
                //console.log(act_id);
                placeCaretAtEnd(cmnt_div_editbox[0]);              
           }) ;

           $('body').delegate('.edit_box','keydown', function(e){
            //placeCaretAtEnd(a)
            var edited_cmnt = e.target.innerText;            
                if(e.keyCode == 13) {
                    cmnt_div_editbox.html('');
                    cmnt_div_editbox.html('<a href="#" class="user_profile_link">'+ user_name +'</a>' + '<span class="word_wrap">' + edited_cmnt + '</span>');
                    cmnt_div_editbox.removeClass('edit_box').attr('contenteditable', 'false');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    ajaxRequest("{{ url('/update-comment') }}", {                                          
                        id: comment_id,
                        edited_comment: edited_cmnt            
                        }, function(respone){                       
                            console.log(respone)
                        }
                    );
                    return false;
                }
           });

           $('body').delegate('.edit_box','blur', function(e){
                //placeCaretAtEnd(a)
                var edited_cmnt = e.target.innerText;            
                
                cmnt_div_editbox.html('');
                cmnt_div_editbox.html('<a href="#" class="user_profile_link">'+ user_name +'</a>' + '<span class="word_wrap">' + edited_cmnt + '</span>');
                cmnt_div_editbox.removeClass('edit_box').attr('contenteditable', 'false');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                ajaxRequest("{{ url('/update-comment') }}", {                                          
                    id: comment_id,
                    edited_comment: edited_cmnt            
                    }, function(respone){                       
                        console.log(respone)
                    }
                );                   
                
           });



           $('body').delegate('.del_cmnt_event', 'click', function(){
                var comment_id = $(this).parent().parent().parent().parent().parent().parent().find('.word_wrap').attr('data-id');
                var user_cmnt_row = $(this).parent().parent().parent().parent().parent().parent().parent().closest('.row');
                //console.log(user_cmnt_row.html());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                ajaxRequest("{{ url('/del-comment') }}", {                                          
                    cmnt_row_id: comment_id,                    
                    }, function(respone){                       
                        if(respone.success) {
                            user_cmnt_row.remove(); 
                        }
                    }
                );                
           });            
        });   
        // show/hide comments
        $('.all_comnt_div').find('.margin_btm_ten:gt(0)').hide();    
        $('.show_more_cmnts').click(function(){
            $(this).parent().parent().find('.margin_btm_ten').show();
            $(this).hide();
        });
      </script>
@endpush

@section('msg')
    <div class="msg-container" id="main_msg_wrapper" style="display: none">
        <div class="dsp-table">
            <div class="dsp-table-cell vertical-align-mdl" id="msg_wrapper"></div>
        </div>
    </div>  
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-2 left_adblock" style="position: fixed; left: 10%">
            
                <img src="{{url('/public/img/ads/left.jpg')}}" alt="" class="img-responsive">               
        </div>
        <div class="col-md-offset-3 col-md-6 col-sm-8">
            <form >
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            @foreach ($clicked_data as $key=>$item) 
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ $item->title }}</h3>
                        <strong>Posted at: {{ date("d-m-Y", strtotime($item->created_at)) }}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 margin_btm_ten">
                        <img src="{{ url('/public/img/activities/'.$item->image)}}" alt="" class="img-responsive">               
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_container margin_btm_ten" id="box{{$key}}">
                            {{ $item->body }}
                        </div>
                    </div>
                </div>
                
                @php
                    $cmnts = App\ActivityComment::where('activity_id', $item->id)->get();
                @endphp
                <div class="all_comnt_div">    
                @foreach($cmnts as $cm)
                    @php 
                        $users = App\User::find($cm->user_id);
                    @endphp
                <div class="row margin_btm_ten">    
                    <div class="col-md-1 col-xs-2">
                        @php
                            $user_pic = App\UserProfile::where('user_id', $users->id)->get()->toArray();                            
                        @endphp   
                        @if(isset($user_pic[0]['image']))                     
                            <div class="circle inline_block" style="background: url({{ url('/public/img/users/small_'.$user_pic[0]['image'])}});background-size: 100% 100%;background-repeat: no-repeat;">
                            </div>
                        @else
                            <div class="circle inline_block position_relative" style="top: -3px">
                                <i class="fas fa-user" style="color: lavender;line-height: 10px"></i>
                            </div>
                        @endif         
                    </div>
                    <div class="col-md-10 col-xs-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cmnt_block word_wrap" data-id = {{$cm->id}}>
                                    <a href="{{url('/viewprofile/'.$users->id)}}" class="user_profile_link"> {{$users->name}} </a> <span class="word_wrap">{{ $cm->body }}</span> 
                                </div>
                            </div>
                        </div>
                        @if($logged_user && ($users->id == $user->id))
                            <div class="row">
                                <div class="col-md-11">                                  
                                    <div class="dropdown">                                           
                                        <span data-toggle="tooltip" data-placement="bottom" title="{{date('d-m-Y H:i', strtotime($cm->created_at))}}">
                                            &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                        <span data-toggle="dropdown">&nbsp;&nbsp;<i class="far fa-edit"></i>
                                        </span>
                                        <div class="dropdown-menu" style="min-width: 80px !important">
                                            <div class="arrow_wrapper">
                                                <div class="arrow"></div>		   
                                            </div>
                                            <div class="menu_item" style="padding: 5px; max-width: 40px !important">
                                                <span class="dropdown-item edit_cmnt_event cursor_pointer">Edit</span>
                                                <span class="dropdown-item del_cmnt_event cursor_pointer red_color">Delete</span>				
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        @else 
                        <div class="row">
                            <div class="col-md-11">                                  
                                <div class="dropdown">                                           
                                    <span data-toggle="tooltip" data-placement="bottom" title="{{date('d-m-Y H:i', strtotime($cm->created_at))}}">
                                        &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>            
                        
                        @endif                                               
                    </div>
                </div>                                          
                @endforeach
                @if( count($cmnts) > 1)
                    <div style="position: relative;top: -8px; left: 60px">
                        <p class="show_more_cmnts">Show more comments</p>
                    </div>
                @endif
                </div>                
                <div class="row"> 
                    <div class="col-md-1 col-xs-1 col-sm-2 col-lg-1">
                        @if($logged_user && $logged_user_pfofile) 
                            <div class="circle" style="background: url({{ url('/public/img/users/small_'.$logged_user_pfofile[0]['image'])}});background-size: 100% 100%;background-repeat: no-repeat;">
                            </div>
                        @else    
                            <div class="circle inline_block position_relative" style="top: -3px">
                                <i class="fas fa-user" style="color: lavender;line-height: 10px"></i>
                            </div>
                        @endif
                    </div>                  
                    <div class="col-md-11 col-xs-10 col-sm-10 col-lg-10">
                        <input type="hidden" name="user_id" value="{{$user->id or ''}}">
                        <input type="hidden" name="activity_id" value={{$clicked_data[$key]->id}}>
                        <div contentEditable="true" data-text="Comment" class="cmnt_box margin_left_ten"></div>
                        <div class="inline_block">
                            <button type="button" class="btn btn-primary btn_comment">Post</button>
                        </div>                      
                    </div>
                </div>
            @endforeach
            </form>
            <div>
                {{ $clicked_data->render() }}
            </div>            
        </div>
        <div class="col-md-2 col-sm-2 right_adblock" style="position: fixed;right: 8%">               
            <img src="{{ url('/public/img/ads/right.jpg')}}" alt="">                
        </div>
    </div>
</div>
@endsection

@section('footer')
	@parent
@endsection
@push('css')
<style>
    .body_container {
        height: auto;        
    }
    .shrink {
        height: 65px;
        overflow: hidden;
    }
    .hand {
        cursor: pointer;
    }
    .read_more {
        color: blue;
        display: inline-block;
        margin-bottom: 10px;
    }
</style>
@endpush
@push('js')
<script>
	function countWords(sent) {
		return sent.split(' ').length;		
	}		
	var all = document.querySelectorAll('.body_container');
	for(var i=0; i<(all.length); i++) {
		if((countWords(all[i].innerText)) > 19) {
		    $(all[i]).addClass('shrink');
		    $(all[i]).after(`<span data-id ='box${i}' class='read_more hand'>Read more...</span>`);
	    }	
    }
    $('body').delegate('.read_more','click', function(){
        if($(this).text() == 'Read more...') {
			$(this).text("Read less");
			//$(this).$(data('id')).removeClass('shrink');
			var box_id = $(this).attr('data-id');
			//console.log(box_id)
			$('#'+box_id).removeClass('shrink');
		} else {
			$(this).text("Read more...");
			var box_id = $(this).attr('data-id');
            $('#'+box_id).addClass('shrink');
            //console.log(box_id)
		}
    });    
    
</script>
@endpush