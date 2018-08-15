<!-- <div class="row">
    <div class="col-md-12">
        <a href="{{ url('admin/activity') }}">Activity</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ url('admin/gallery') }}">Gallery</a>
    </div>
</div> -->
<ul class="cd-accordion-menu animated">
		<li class="has-children">
			@if(isset($checked) || isset($checked_view_gal))
			<input type="checkbox" name ="group-1" id="group-1" checked>
			@else
			<input type="checkbox" name ="group-1" id="group-1">
			@endif
			
			<label for="group-1">Gallery</label>

      		<ul>
      			<li class="has-children">
      				<input type="checkbox" name ="sub-group-1" id="sub-group-1">
					<a href="{{ url('/admin/savegallery')}}">Upload Image</a>
                    <a href="{{ url('admin/viewgallery')}}">View gallery</a>			
      			</li>   			
      		</ul>
		</li>

		<li class="has-children">
			@if(isset($act_checked))
			<input type="checkbox" name ="group-2" id="group-2" checked>
			@else
			<input type="checkbox" name ="group-2" id="group-2">
			@endif	
			<label for="group-2">NEWS UPDATES</label>

			<ul>
				<li><a href="{{ url('/admin/postactivity')}}">Post</a></li>
				<li><a href="{{ url('/admin/viewactivity')}}">View</a></li>
			</ul>
		</li>

		<li class="has-children">
			@if(isset($event_checked) || isset($event_view_checked)) 
			<input type="checkbox" name ="group-3" id="group-3" checked>
			@else
			<input type="checkbox" name ="group-3" id="group-3">
			@endif

			
			<label for="group-3">Events</label>

			<ul>
				<li><a href="{{url('/admin/saveevent')}}">Create</a></li>
				<li><a href="{{url('/admin/viewevent')}}">View</a></li>
			</ul>
		</li>

		<li class="has-children">
			@if(isset($videos_checked))
			<input type="checkbox" name ="group-4" id="group-4" checked>
			@else
			<input type="checkbox" name ="group-4" id="group-4">
			@endif
			<label for="group-4">Videos</label>
			    <ul>				    
					<li><a href="{{url('/admin/savevideo')}}">Upload</a></li>
					<li><a href="{{ url('/admin/delvideo') }}">View</a></li>
				</ul>		
		</li>
	</ul> 