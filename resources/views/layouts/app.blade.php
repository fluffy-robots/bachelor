<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- API Token -->
    <meta name="api-token" content="{{ Auth::user()->api_token }}">

    <title>{{ config('app.name', 'Shop-Import') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'apiToken' => Auth::user()->api_token,
            'User' => Auth::user(),
            'route' => Route::getCurrentRoute()->getPath()
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
    	<div class="container is-fluid">
	        <div class="columns is-gapless">
	        	<div class="column is-2">
	        		<div class="logo"><strong>SHOP</strong>IMPORT</div>
	        		<nav-left></nav-left>
	        	</div>
	        	<div class="column">
		        	<nav-top></nav-top>
<<<<<<< HEAD
		        	<!-- <page-control state="{{ Route::getCurrentRoute()->getPath() }}"></page-control> -->
		        	<div class="main-content">
=======
		        	<page-control state="{{ Route::getCurrentRoute()->getPath() }}"></page-control>
		        	<div class="main-content animated fadeIn">
>>>>>>> 17a2d5c344317f157421831a06963b94fb31e5af
		        		@yield('content')
		        	</div>
	        	</div>
	        </div>	
    	</div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</body>
</html>
