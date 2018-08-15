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
        <div class="col-md-8">        
            <!-- <img src="{{url('/public/img/admin/admin.jpg')}}" alt="">           -->
            <h1>Welcome Admin</h1>
        </div>
    </div>
</div>
@endsection
@section('footer')
	
@endsection

