@extends('layouts.admin')
@push('css')
<link href="{{ url('/public/css/admin/admindashboard_style.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-4">
            @include('auth.sidebar')
        </div>
        <div class="col-md-5">
            @if(count($errors->all()) > 0)
           <div class="alert alert-danger" style="position: relative;top: 10px">
               <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size: 18px">&times;</a>
               <ul>
                @foreach ($errors->all() as $error)
                   <li> {{ $error }}<li/>
                @endforeach
               </ul>

            </div>
            @endif   
        <strong style="color: green">{{ session('status') }}</strong>            
            <form action="{{url('admin/savevideo')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}                

                <div class="form-group" style="margin-bottom: 20px">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required />
                </div>

                <div class="form-group" style="margin-bottom: 20px">
                    <label for="video_thumnail">Video thumnail (optional)</label>
                    <input type="file" class="form-control" id="video_thumnail" name="video_thumnail" style="font-size: 14px" />
                </div>


                <div class="form-group" style="margin-bottom: 20px"> 
                    <label for="file_">Video file</label>                   
                    <input type="file" class="form-control" id="file_" name="file_" required style="font-size: 14px">
                </div>    

                <div class="row">
                    <div class="col-md-12">                         
                        <input type="submit" value="Upload" name="btn_upload" class="btn btn-success btn-lg">
                    </div>
                </div>          
            </form>          
        </div>
    </div>
</div>
@endsection

@section('footer')
    
    @endsection