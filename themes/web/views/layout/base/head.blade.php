<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(app()->getLocale()=='ar')

    		<!-- Bootstrap Min CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/bootstrap.rtl.min.css')}}">
		<!-- Owl Theme Default Min CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/owl.theme.default.min.css')}}">
		<!-- Owl Carousel Min CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/owl.carousel.min.css')}}">
		<!-- Remixicon CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/remixicon.css')}}">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/meanmenu.min.css')}}">
		<!-- Animate Min CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/animate.min.css')}}">
		<!-- Magnific Popup Min CSS --> 
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/magnific-popup.min.css')}}">
		<!-- Odometer Min CSS-->
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/odometer.min.css')}}">
		<!-- Navbar CSS-->
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/navbar.css')}}">
		<!-- Style CSS -->
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/style.css')}}">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('themes/web/ar/assets/css/responsive.css')}}">

    @else
    <!-- Bootstrap Min CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/bootstrap.min.css')}}">
    <!-- Owl Theme Default Min CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/owl.theme.default.min.css')}}">
    <!-- Owl Carousel Min CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/owl.carousel.min.css')}}">
    <!-- Remixicon CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/remixicon.css')}}">
    <!-- Meanmenu Min CSS -->
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/meanmenu.min.css')}}">
    <!-- Animate Min CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/animate.min.css')}}">
    <!-- Magnific Popup Min CSS --> 
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/magnific-popup.min.css')}}">
    <!-- Odometer Min CSS-->
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/odometer.min.css')}}">
    <!-- Navbar CSS-->
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/navbar.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('themes/web/assets/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('themes/web/assets/images/favicon.png')}}">
    <!-- Title -->
    <title>ACTRA For Chemical Industries</title>

    @endif
    @toastr_css

</head>

