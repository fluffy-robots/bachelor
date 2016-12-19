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
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav-top></nav-top>
        <nav class="nav">
          <div class="nav-left">
            <a class="nav-item is-brand" href="#">
              Shop-Import
            </a>
          </div>
            <search-bar></search-bar>   

          <span class="nav-toggle is-active">
            <span></span>
            <span></span>
            <span></span>
          </span>

          <div class="nav-right nav-menu">
            <a class="nav-item" href="#">
              Notifications
            </a>
            <a class="nav-item" href="#">
              Settings
            </a>
            
            @if (Auth::guest())
            <a class="nav-item" href="{{ url('/login') }}">Login</a>
            <a class="nav-item" href="{{ url('/register') }}">Register</a>
            @else
            <a class="nav-item logout-button" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
          </div>
        </nav>
        <div class="container is-fluid">
        @if (!Auth::guest())
            <div class="columns is-gapless">
                <div class="column is-3">
                    <aside class="menu sidebar">
                        <p class="menu-label">
                            General
                        </p>
                        <ul class="menu-list">
                            <li><a class="is-active" href="#">Dashboard</a></li>
                            <li><a href="#">Customers</a></li>
                        </ul>
                        <p class="menu-label">
                            Administration
                        </p>
                        <ul class="menu-list">
                            <li><a href="#">Team Settings</a></li>
                            <li>
                                <a href="#">Manage Your Team</a>
                                <ul>
                                    <li><a href="#">Members</a></li>
                                    <li><a href="#">Plugins</a></li>
                                    <li><a href="#">Add a member</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Invitations</a></li>
                            <li><a href="#">Authentication</a></li>
                        </ul>
                        <p class="menu-label">
                            Transactions
                        </p>
                        <ul class="menu-list">
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Transfers</a></li>
                            <li><a href="#">Balance</a></li>
                        </ul>
                    </aside>
                </div>
            @endif
                <div class="column">
                    <nav class="nav has-shadow page-control">
                        <a class="button is-medium is-primary">Ny</a>

                        <span class="nav-item">test > mere > test</span>
                    </nav>
                    <div class="section main-content">
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
