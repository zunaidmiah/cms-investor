@extends('layouts.admin')
@section('content')
<h1 class="margin-bottom">Members</h1>
<ol class="breadcrumb 2">
	<li>
		<a href="/dashboard"><i class="entypo-home"></i>Home</a>
	</li>
	
	<li class="active">			
		<strong>View Member</strong>
	</li>
</ol>			
<br />	
<div class="profile-env">		
		{{$html}}
</div>

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize()
{
	var $ = jQuery,
		map_canvas = $("#sample-checkin");
	
	var location = new google.maps.LatLng(36.738888, -119.783013),
		map = new google.maps.Map(map_canvas[0], {
		center: location,
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	});
	
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});
}

google.maps.event.addDomListener(window, 'load', initialize);
</script><!-- Footer -->
@stop