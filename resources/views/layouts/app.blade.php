<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shop-Import') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
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
		        	<page-control state="{{ Route::getCurrentRoute()->getPath() }}"></page-control>
		        	<div class="main-content">
		        		@yield('content')
		        	</div>
	        	</div>
	        </div>	
    	</div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>