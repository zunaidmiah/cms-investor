<!doctype html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body class="body_bg">
<div class="container">

	@include('includes.header')
	

	
	@yield('content')

	
	
	@include('includes.footer')
	

</div>
</body>
</html>