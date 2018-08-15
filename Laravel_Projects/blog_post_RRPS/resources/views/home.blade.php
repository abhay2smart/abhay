@extends('layouts.app')
@push('css')
<style>
	.margin_top_ten {
		margin-top: 10px;
	}	
	.margin_bottom_ten {
		margin-top: 10px;
	}
	.img-responsive {
		width: 100%;
		height: auto;
	}
	
  
.carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  .carousel {
	  
  }
  .event_container{
	position: relative;
	 /*marquee width */
	height: 220px; /*marquee height */
	overflow: auto;
	background-color: white;
	/*border: 3px solid orange;*/
	padding: 2px;
	padding-left: 4px;
	}
	.div_title {
		height: 40px;
		background: #FFA500;
		text-align: center;
		line-height: 40px;
		font-weight: bold;
		font-size: 22px;
	}
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
    $('[data-toggle="tooltip"]').tooltip();
    // video gallery 
	$('body').on('hidden.bs.modal', '.modal', function () {
		var video = $(this).attr('data-vid');
		$('#' + video)[0].pause();

		$('#' + video)[0].currentTime = 0;
	});

	$('.modal').on('shown.bs.modal', function () {
	var video = $(this).attr('data-vid');
	$('#'+video)[0].play();
	console.log(video);      
	})

    $('.pause_carousel').click(function(){
    	$('.carousel').carousel('pause');
    });
    $('.close').click(function(){
    	$('.carousel').carousel('cycle');
    });
});

var zxcMarquee={

init:function(o){
 var mde=o.Mode,mde=typeof(mde)=='string'&&mde.charAt(0).toUpperCase()=='H'?['left','offsetWidth','top','width']:['top','offsetHeight','left','height'],id=o.ID,srt=o.StartDelay,ud=o.StartDirection,p=document.getElementById(id),obj=p.getElementsByTagName('DIV')[0],sz=obj[mde[1]],clone;
 p.style.overflow='hidden';
 obj.style.position='absolute';
 obj.style[mde[0]]='0px';
 obj.style[mde[3]]=sz+'px';
 clone=obj.cloneNode(true);
 clone.style[mde[0]]=sz+'px';
 clone.style[mde[2]]='0px';
 obj.appendChild(clone);
 o=this['zxc'+id]={
  obj:obj,
  mde:mde[0],
  sz:sz
 }
 if (typeof(srt)=='number'){
  o.dly=setTimeout(function(){ zxcMarquee.scroll(id,typeof(ud)=='number'?ud:-1); },srt);
 }
 else {
  this.scroll(id,0)
 }
},

scroll:function(id,ud){
 var oop=this,o=this['zxc'+id],p;
 if (o){
  ud=typeof(ud)=='number'?ud:0;
  clearTimeout(o.dly);
  p=parseInt(o.obj.style[o.mde])+ud;
  if ((ud>0&&p>0)||(ud<0&&p<-o.sz)){
   p+=o.sz*(ud>0?-1:1);
  }
  o.obj.style[o.mde]=p+'px';
  o.dly=setTimeout(function(){ oop.scroll(id,ud); },50);
 }
}
}

function init(){

zxcMarquee.init({
 ID:'marquee1',     // the unique ID name of the parent DIV.                        (string)
 Mode:'Vertical',   //(optional) the mode of execution, 'Vertical' or 'Horizontal'. (string, default = 'Vertical')
 StartDelay:2000,   //(optional) the auto start delay in milli seconds'.            (number, default = no auto start)
 StartDirection:-1  //(optional) the auto start scroll direction'.                  (number, default = -1)
});


}

//  To scroll event content
if (window.addEventListener)
window.addEventListener("load", init, false)
else if (window.attachEvent)
window.attachEvent("onload", init)
else if (document.getElementById)
window.onload=init

$(document).on('click', function(event){
      var $clickedOn = $(event.target),
          $collapsableItems = $('.collapse'),
          isToggleButton = ($clickedOn.closest('.navbar-toggle').length == 1),
          isLink = ($clickedOn.closest('a').length == 1),
          isOutsideNavbar = ($clickedOn.parents('.navbar').length == 0);

      if( (!isToggleButton && isLink) || isOutsideNavbar ) {
        $collapsableItems.each(function(){
          $(this).collapse('hide');
        });
      }
    });
</script>

@endpush
@section('content')
	<div class="row">
		<div class="col md-12">
			<div class="container">
			<br>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>					
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">

					<div class="item active">
						<img src="{{ url('/public/img/banner/1.jpg') }}" alt="Chania" width="460" height="345">
						<!-- <div class="carousel-caption">
							<h3>Chania</h3>
							<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
						</div> -->
					</div>

					<div class="item">
						<img src="{{ url('/public/img/banner/2.jpg') }}" alt="Chania" width="460" height="345">
						<!-- <div class="carousel-caption">
							<h3>Chania</h3>
							<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
						</div> -->
					</div>

					<div class="item">
						<img src="{{ url('/public/img/banner/3.jpg') }}" alt="Chania" width="460" height="345">
						<!-- <div class="carousel-caption">
							<h3>Mendis</h3>
							<p>Florence and Venice.</p>
						</div> -->
					</div>		
					
				
					</div>

					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left fas fa-angle-left" aria-hidden="true">
					
					</span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					
					<span class="glyphicon glyphicon-chevron-right fas fa-angle-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 10px;">
		<div class="col-md-4 col-xs-12">
			<div class="div_title">
				<span> PROFILE PHOTO</span>
			</div>
			<div style="height: 220px;background: url({{ url('/public/img/admin/admin_home.jpg') }});background-size: 100% 100%; background-repeat: no-repeat">
				
			</div>			
			
		</div>
		
		<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12" style="margin-bottom: 6px;">
			<div class="div_title">
				<span> NEWS UPDATES</span>
			</div>
			@foreach($data_activity as $item)
				<a href="{{ url('/activities/'.$item['id']) }}">
					<div class="row margin_bottom_ten">
						<div class="col-md-3 col-xs-3">
							<img src="{{url('/public/img/activities/small_'.$item->image)}}" alt="" height="60px" width="65px">
						</div>
						<div class="col-md-9 col-xs-9">
							<div>
								<span style="font-size: 16px">{{str_limit($item->title, 32)}}</span>
							
							</div>
							<div>
								 {{str_limit($item->body, 32)}}
							</div>
							<div>
								{{  date("d-m-Y", strtotime($item->created_at)) }}
							</div>
						</div>				
					</div>	
				</a>
			@endforeach						
		</div>
		
		<div class="col-md-4 col-xs-12">
			<div class="div_title">
				<span>EVENTS</span>
			</div>
			<div id="marquee1" class="event_container" onmouseover="zxcMarquee.scroll('marquee1',0);" onmouseout="zxcMarquee.scroll('marquee1',-1);">
				<div style="position: absolute; width: 98%;">
					@if(isset($events))
						@foreach($events as $event)
						<p style="margin-top: 0;padding: 10px;text-align: justify">
							<b>
								<a href="#" style="font-size: 16px;">
									{{ $event->title }}
								</a>
							</b><br>
							{{$event->body}}
						</p>
						@endforeach
					@endif
					
				</div>
			</div>
		</div>
	</div>	
	<div class="row" style="margin-top: 10px">
<div class="col-md-8">
  @foreach($videos as $key=>$video)
  <div class="modal fade" id="myModal{{ $key + 1}}" role="dialog" data-vid="video{{ $key + 1 }}">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">{{ $video->title }}</h5>
        </div>
        <div class="modal-body" style="width: 80%">
          <video src="public/video_gallery/videos/{{$video->video_url}}" controls id="video{{ $key + 1 }}" class="video" width="100px"></video>
        </div>        
      </div>
      
    </div>
  </div>
  @endforeach
  

 <div id="imageCarousel" class="carousel slide" data-ride="carousel" style="height: auto;margin-bottom: 10px">  
 <div class="carousel-inner">
 <?php $counter = 0; 
 $f = false;
 $tot_videos = count($videos);
 ?> 
   @for($i=1;$i<=$tot_videos;$i++)
	@if($i == 1)
      <div class="item active">
    @else
      <div class="item">
    @endif
        <div class="row">
		   @for($j=1;$j<=2;$j++)
			    <div class="col-md-6 col-xs-6">
                   <img src="public/video_gallery/thumbnails/{{ $videos[$counter]->thumbnail }}" class="img-responsive pause_carousel" data-toggle="modal" data-target="#myModal{{$counter + 1}}" class="img-responsive" aria-hidden="true" data-backdrop="static" data-keyboard="false" />         
                </div>
				<?php $counter++; ?>
				@if($counter >= $tot_videos)
				@if(($tot_videos % 2) != 0)	
				   <div class="col-md-6 col-xs-6">
                     <img src="public/video_gallery/thumbnails/{{ $videos[0]->thumbnail }}" class="img-responsive pause_carousel" data-toggle="modal" data-target="#myModal1" class="img-responsive" aria-hidden="true" data-backdrop="static" data-keyboard="false" />         
                   </div>
				@endif   
				<?php $f = true; ?>	
			    @break
                @endif			
		   @endfor
           @if($f)
           @break
           @endif
		   
        </div> {{-- row ends--}}
      </div> {{-- item ends--}}		
   @endfor  
  </div>
  
 </div>
 <a class="left carousel-control" href="#imageCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#imageCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
 </div>
 </div>
 </div>
   <div class="col-md-4" style="margin-bottom: 8px;">
   	<img src="public/add.png" class="img-responsive">
   </div>
 </div>
  

	<div class="row" >
		<div class="col-md-12">
			<div class="div_title">
				KNOW OUR LEADER
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-6">
			<img src="{{ url('/public/img/admin/know_about_leader.jpg')}}" alt="" class="img-responsive">
		</div>
		<div class="col-md-6" style="font-size: 16px; padding-top: 10px;text-align: justify">
			<p>
				Raghuraj, a Rajput, was born to Raja Uday Pratap Singh in 1968. His grandfather Raja Bajrang Bahadur Singh was the founder vice-chancellor of Pant Nagar Agriculture University and later the second governor of Himachal Pradesh state.</p>
			<p> Raghuraj was the first in his family to enter politics; his father is largely a recluse. 
			
				Raghuraj's grand father had adopted his nephew Raja Uday Pratap Singh as his son.
			</p>	

				Raghuraj completed his primary education from Mahaprabhu Bal Vidayalaya Narayni Asram Shivkuti, Allahabad, high school from Bharat Scout H.S. School in the year 1985, intermediate from Colonel Ganj Inter College Allahabad in the year 1987, and law graduation at Lucknow University.
			</p>	
		</div>
	</div>
</div>		
			
@endsection

@section('footer')
	@parent
@endsection