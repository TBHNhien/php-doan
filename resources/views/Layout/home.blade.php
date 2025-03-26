<!DOCTYPE html>
<html lang="en">
<head>
	<title>App Laravel</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('css/shop.css') }}" type="text/css" media="screen" property="" />
	<link href="{{ asset('css/style7.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
	<link href="{{ asset('css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
	<!-- Owl-carousel-CSS -->
	<!-- detail.cshtml -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui1.css') }}">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- checkout.cshtml -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/checkout.css') }}">

	

	<!-- font-awesome-icons -->
	<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
		  rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">


	

</head>
<body>
	@include('Layout.header')
    @yield('content')
	@include('Layout.footer')
</body>
</html>
