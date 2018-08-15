@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="{{ url('/public/css/style.css')}}" />
<link href="{{ url('/public/css/admin/admindashboard_style.css')}}" rel="stylesheet">
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
    /* iPhone eXpensive portrait · width: 374px */
    @media screen and (min-width: 375px) {
        body {
            
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
        body {
            
        }
    }
    /* iPhone 6-8 Plump landscape · width: 736px */
    @media screen and (min-width: 736px) {
        body {
            
        }
    }
    /* iPad portrait · width: 768px */
    @media screen and (min-width: 768px) {
        body {
            
        }
    }
    /* iPad landscape · width: 1024px */ 
    @media screen and (min-width: 1024px) {
        body {
            
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
</style>
@endpush

@push('js')
{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.js'></script> --}}

<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();           
            function fancyMessage(dataObj){

                $('#main_msg_wrapper').css({'background':dataObj.bgcolor});
                $('#msg_wrapper').html("<span class='"+dataObj.error_sign+"'></span> "+
                  "<span class='bold-font'>"+dataObj.msg+"</span>");        
                
                var a =  $(document).width() - $('#main_msg_wrapper').outerWidth();
                $('#main_msg_wrapper').css({'left':a+"px"})
                
            }
            fancyMessage({'msg': 'Please login first! Try again. gdfgdgd sdfsdf','error_sign':'glyphicon glyphicon-exclamation-sign','bgcolor': 'blue'});
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
                fancyMessage({'msg': 'Please login first!','error_sign':'glyphicon glyphicon-exclamation-sign','bgcolor': 'red'});  
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
                                         
                                        row = `<div class="row well margin_btm_ten">
                                            <div class="col-md-1">
                                                <div class="circle inline_block position_relative" style="top: -3px">
                                                    <i class="fas fa-user" style="color: lavender;line-height: 10px"></i>
                                                </div>
                                            </div> 
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div data-id=${row_id} class="cmnt_block word_wrap"><a href="#" class="user_profile_link"> {{$user->name or ''}}  </a> <span class="word_wrap">${comment}</span>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <i class="fal fa-clock"></i>
                                                        </div>    
                                                        <div class="dropdown">
                                                            <span data-toggle="tooltip" data-placement="bottom" title="${date_time}">
                                                                &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                                            </span>	
                                                            <span data-toggle="dropdown">&nbsp;&nbsp;<i class="far fa-edit"></i>
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <div class="arrow_wrapper">
                                                                    <div class="arrow"></div>		   
                                                                </div>
                                                                <div class="menu_item">
                                                                    <span class="dropdown-item edit_cmnt_event">Edit</span>
                                                                    <span class="dropdown-item del_cmnt_event">Delete</span>				
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>`;            
                                    
                                    $(row).insertBefore($(_this).closest('.row'));
                                    comment_box.text('');
                                    $('[data-toggle="tooltip"]').tooltip();
                                //console.log(respone)
                                }
                            }
                        );
                    } else {
                        alert('Please enter some text');
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
        <div class="col-md-3">
            @include('auth.sidebar')
        </div>
        <div class="col-md-6">
            <form method="post">
            {{ csrf_field() }}
            @foreach ($data as $key=>$item) 
                <div class="row">
                    <div class="col-md-12">                        
                        <h3>{{ $item->title }}</h3>                        
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">                    
                    <div class="col-md-5">
                        <strong>Posted at: {{ date("d-m-Y", strtotime($item->created_at)) }}</strong>
                    </div>
                    <div class="col-md-3">
                        <a href="{{url('admin/delact/'.$item->id)}}">
                            <button type="button" class="btn btn-lg btn-danger">Delete Post</button>
                        </a>
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
                <div class="row well margin_btm_ten">    
                    <div class="col-md-1">
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
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cmnt_block word_wrap" data-id = {{$cm->id}}>
                                    <a href="#" class="user_profile_link"> {{$users->name}} </a> <span class="word_wrap">{{ $cm->body }}</span> 
                                </div>
                            </div>
                        </div>
                        
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">                                  
                                    <div class="dropdown">                                           
                                        <span data-toggle="tooltip" data-placement="bottom" title="{{date('d-m-Y H:i', strtotime($cm->created_at))}}">
                                            &nbsp;&nbsp;<i class="far fa-clock-o" aria-hidden="true"></i>
                                        </span>
                                        <span data-toggle="dropdown">&nbsp;&nbsp;<i class="far fa-edit"></i>
                                        </span>
                                        <div class="dropdown-menu">
                                            <div class="arrow_wrapper">
                                                <div class="arrow"></div>		   
                                            </div>
                                            <div class="menu_item">                                                
                                                <span class="dropdown-item del_cmnt_event">Delete</span>				
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                                                                       
                    </div>
                    
                </div>                                          
                @endforeach
                </div>                
                
            @endforeach
            </form>            
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
    /*
    var all_comnts = document.querySelectorAll('.all_comnt_div');
    var all_cmnt_of_one = all_comnts[0].children;
    for(var i = 1;i < all_cmnt_of_one.length; i++) {
        //all_cmnt_of_one[i].style.display = 'none';
    }
    $('<div class="row"><div class="col-md-12"><p class="see_comments">See more comments</p></div></div>').insertAfter(all_comnts[0]);

    $("body").delegate('.see_comments', 'click', function(){
        var len = $(this).parent().parent().parent().find(".all_comnt_div").length;
        var first_all_cmnts = $(this).parent().parent().parent().find(".all_comnt_div");
        console.log(first_all_cmnts[0]);
    });
    */
    
    
    
</script>
@endpush