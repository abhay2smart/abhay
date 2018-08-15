@push('css')
<link href="{{url('/public/css/gallery.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
@endpush
@push('js')
<script src="{{url('/public/js/')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endpush
@extends('layouts.app')
@section('content')
<div class="team-boxed"></div>
    <div class="photo-gallery" style="position: relative;top: 15px">
        <div class="container">
            
            <div class="row photos">
                @foreach ($data as $pic)
                    <div class="col-lg-3 col-md-4 col-sm-6 item"><a href="{{ url('/public/img/gallery/'.$pic->image)}}" data-lightbox="photos"><img class="img-responsive" src="{{ url('/public/img/gallery/'.$pic->image)}}"></a></div>
                @endforeach             
            </div>
        </div>
    </div>
	<div class="team-grid"></div>
@endsection	

