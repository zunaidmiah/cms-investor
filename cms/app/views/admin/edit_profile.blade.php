@extends('layouts.admin')
@section('content')
<h1 class="margin-bottom">Members</h1>
<ol class="breadcrumb 2">
	<li>
		<a href="dashboard"><i class="entypo-home"></i>Home</a>
	</li>
	
	<li class="active">			
		<strong>Edit Members</strong>
	</li>
</ol>			
<br />			
{{$html}}			

<script type="text/javascript">
	$( document ).ready(function() {
		console.log( "ready!" );
	});
</script>
@stop