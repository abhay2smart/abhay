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
                @foreach($data as $pic)
                <div class="col-lg-3 col-md-4 col-sm-6 item">
                    <img  src="http://localhost/lar/public/img/gallery/small_{{$pic->image}}" style="margin: 10px" height="100px" width="120px">
                    <div>
                        <a href="{{url('admin/deletepic/'.$pic->id)}}" style="color: white;text-decoration: none;">&nbsp;&nbsp;Delete</a>
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