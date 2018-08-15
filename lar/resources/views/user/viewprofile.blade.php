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

@section('content')
<div class="container" id="profile_section">
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
        </div>
        
    </div>    
</div>

@endsection

@section('footer')

@endsection