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
            <table class="table table-bordered"> 
            <tr>
                <th>Sr</th>
                <th>Title</th>
                <th>Delete</th>
            </tr>                     
           @foreach($event_data as $key=>$item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{url('/admin/viewevent/'.$item->id) }}">
                            <button class="btn btn-danger" type="button">Delete</button>
                        </a>
                    </td>
                </tr>                
           @endforeach
           </table>  
        </div>
    </div>
</div>
@endsection

@section('footer')
	
@endsection