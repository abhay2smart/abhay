@push('css')
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css' />
  <style>      
      .modal-body {
        padding: 0 !important;
      }
      .video{
        object-fit: initial;
        width: 125%;
        height: auto;
      }   
  </style>
@endpush
@push('js')


<script>
    $(document).ready(function(){
        $('body').on('hidden.bs.modal', '.modal', function () {
            var video = $(this).attr('data-vid');
            $('#' + video)[0].pause();


            $('#' + video)[0].currentTime = 0;
        });

        $('.modal').on('shown.bs.modal', function () {
            var video = $(this).attr('data-vid');
            $('#'+video)[0].play();
            console.log(video);      
        });
        
    });
</script>

@endpush
@extends('layouts.app')
@section('content')
    <?php 
        $count = count($videos);
        $counter = 0;
         
    ?>    
    @for($i = 1; $i <= 1; $i++)
    <div class="row" style="position: relative;top: 15px">
        @for($j = 1; $j <= $count; $j++)
        <div class="col-lg-3 col-md-3 col-sm-3" style="margin-bottom: 5px">         
            <div class="modal fade" id="myModal{{ $j }}" role="dialog" data-vid="video{{ $j }}">
                <div class="modal-dialog">        
                   <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h5 class="modal-title">{{ $videos[$j-1]->title}}</h5>
                        </div>
                        <div class="modal-body" style="width: 80%">
                          <video src="{{ url('/public/video_gallery/videos/'.$videos[$j-1]->video_url) }}" controls id="video{{$j}}" class="video" width="100px"></video>
                        </div>        
                      </div>      
                </div>
            </div>
            <img src="{{ url('/public/video_gallery/thumbnails/'.$videos[$j-1]->thumbnail)}}" class="img-responsive pause_carousel" data-toggle="modal" data-target="#myModal{{ $j }}">
        </div>        
        @endfor             
    </div>
    @endfor
    <div style="height: 12px"></div>
  
@endsection	

