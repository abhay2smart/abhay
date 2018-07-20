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
        <strong>{{ session('status') }}</strong>            
            <form action="{{url('admin/saveactivity')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" />
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>    

                <div class="row">
                    <div class="col-md-12">
                        <input type="file" name="select_file" > 
                        <input type="submit" value="Save" name="btn_upload">
                    </div>
                </div>          
            </form>          
        </div>
    </div>
</div>
@endsection

@section('footer')
	
    @endsection