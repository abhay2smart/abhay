@extends('layouts.admin')
@push('css')
<link rel="stylesheet" href="{{ url('/public/css/style.css')}}" />
<link href="{{ url('/public/css/admin/admindashboard_style.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-4">
            @include('auth.sidebar')
        </div>
        <div class="col-md-8">
        <strong>{{ session('status') }}</strong>            
            <form method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                @foreach($videos as $video)
                <div class="col-lg-3 col-md-4 col-sm-6 item">
                    <div>
                        <h4 style="position: relative; top: 10px;padding-left: 10px">{{ $video->title}}</h4>
                    </div>
                    <div>
                        <img  src="{{ url('/public/video_gallery/thumbnails/'.$video->thumbnail) }}" style="margin: 10px" height="140px" width="160px">
                   </div>
                    <div>
                        <a href="{{ url('/admin/delvideo/'.$video->id) }}" style="color: red;text-decoration: none;">&nbsp;&nbsp;Delete</a>
                    </div>
                </div>
                @endforeach
                <div>
            </form>          
        </div>
    </div>
</div>
@endsection

@section('footer')
	
    @endsection