@extends('layouts.app')
@push('css')
<style>
.profile_container {
    border: 1px solid gray;
    min-height: 300px;
    font-size: 16px;
    border-radius: 20px;
    margin-top: 20px;
    padding-bottom: 20px;
}
.img-profile {
    border-radius: 50%;
    height: 140px;
    width: 140px;
    margin-left: 20px;
}
.float_left {
    float: left;
}
.float_right {
    float: right;
}
.pad_left_ten {
    padding-left: 10px;
}
.prof_text_wrapper {
    text-align: left;
    min-width: 200px;
}
.hidden {
    display: none;
}
</style>
@endpush
@push('js')
<script>
    function loadEditPage() {
        document.getElementById('profile_section').classList.add('hidden');
        document.getElementById('edit_profile').classList.remove('hidden');
        
    } 
    $('#file_control').change(function(){
        $("#success-alert").addClass('alert-success').text('file has been selected');
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
    });
    function clickFile() {
        document.getElementById('file_control').click();        
    }
</script>
@endpush
@section('content')
<div class="container" id="profile_section">
    <div class="row" style="position: relative; top: 15px">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>    
                <strong>Whoops!</strong> There were some problems with your input.<br><br> 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="profile_container">
                <div class="row" style="padding-top: 10px;">
                <div class="col-md-3">
                    @if(isset($user_profile->image))
                        <img src="{{url('/public/img/users/'.$user_profile->image)}}" alt="" class="img-profile">
                    @else
                        <div style="padding: 40px 0 0 30px">
                            <b>Imgae not found</b>
                        </div>
                    @endif
                        
                    </div>
                    <div class="col-md-8">                        
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">Name:</div> 
                                <div class="float_right prof_text_wrapper"> {{ $user->name  or 'default'}} </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">Email:</div> 
                                <div class="float_right prof_text_wrapper">{{ $user->email or '' }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">Hobbies:</div> 
                                <div class="float_right prof_text_wrapper"> {{ $user_profile->hobbies or '' }}</div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">DOB:</div> 
                                <div class="float_right prof_text_wrapper"> {{ $user_profile->dob or '' }}</div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">City:</div> 
                                <div class="float_right prof_text_wrapper"> {{ $user_profile->city or '' }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="float_left pad_left_ten">Country:</div> 
                                <div class="float_right prof_text_wrapper"> {{ $user_profile->country or '' }} </div>
                            </div>
                        </div>                          
                    </div>                                        
                </div>                

            </div>
            <div class="row">
                    <div class="col-md-12">
                        <a href="#" style="padding: 40px 0 20px 0;" onclick="loadEditPage()" class="cursor_pointer">Edit profile</a>
                    </div>
                </div>
        </div>
        
    </div>    
</div>

<div class="container hidden" id="edit_profile">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('/saveprofile')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="profile_container">
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-md-3">
                            @if(isset($user_profile->image))
                            <img src="{{url('/public/img/users/'.$user_profile->image)}}" alt="" class="img-profile">
                            @else
                                <div style="padding: 40px 0 0 30px">
                                    <b>Imgae not found</b>
                                </div>
                                
                            @endif
                            <input type="file" class="hidden" name="file_control" id="file_control">
                                <div class="cursor_pointer" onclick="clickFile()" style="color: blue; padding: 0 0 0 40px;">Upload photo</div>
                                
                            </div>
                            <div class="col-md-8">                        
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">Name:</div> 
                                        <div class="float_right prof_text_wrapper"> 
                                            <input type="text" pattern="[A-Za-z]{3,50}" title="Use at least three letters, only" value="{{ $user->name  or 'default'}}" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">Email:</div> 
                                        <div class="float_right prof_text_wrapper">
                                            <input type="email" value="{{ $user->email or '' }}" name="email" required>                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">Hobbies:</div> 
                                        <div class="float_right prof_text_wrapper">
                                            <input type="text" value="{{ $user_profile->hobbies or ''}}" name="hobbies">                                        
                                         </div>
                                    </div>
                                </div> 
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">DOB:</div>                                                                                 
                                        <div class="float_right prof_text_wrapper"> 
                                            <input type="date" value="{{ $user_profile->dob or '' }}" name="dob" required>
                                        </div>
                                    </div>
                                </div>  
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">City:</div> 
                                        <div class="float_right prof_text_wrapper"> 
                                            <input type="text" value="{{ $user_profile->city or '' }}" name="city">                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-7">
                                        <div class="float_left pad_left_ten">Country:</div> 
                                        <div class="float_right prof_text_wrapper"> 
                                            <input type="text" value="{{ $user_profile->country or '' }}" name="country">
                                        </div>
                                    </div>
                                </div>                          
                            </div>                                        
                        </div>
                        <button class="btn btn-success">Save changes</button>
                    
                    </form>
                </div>
                    
            <!-- <div class="row">
                    <div class="col-md-12">
                        <button></button><a href="" style="padding: 40px 0 20px 0;">Save</a>
                    </div>
                </div> -->
        </div>
        
    </div>    
</div>
@endsection

@section('footer')

@endsection