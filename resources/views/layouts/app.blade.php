<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="nav has-shadow" >
      <div class="container">
        <div class="nav-left">
          <a class="nav-item" href="{{route('home')}}">
            <img src="{{asset('images/phucnt-logo.png')}}" alt="Phucnt logo">
          </a>
          <a class="nav-item is-tab is-hidden-mobile m-l-10">Learn</a>
          <a class="nav-item is-tab is-hidden-mobile">Discuss</a>
          <a class="nav-item is-tab is-hidden-mobile">Share</a>
        </div>

        <div class="nav-right" style="overflow: visible;">
          @if (Auth::guest())
            <a class="nav-item is-tab" href="{{route('login')}}">Login</a>
            <a class="nav-item is-tab" href="{{route('register')}}">Join the Community</a>
          @else
            <button class="dropdown nav-item is-tab is-aligned-right">
              Hey {{ Auth::user()->name }}
              <span class="icon">
                <i class="fa fa-caret-down"></i>
              </span>

              <ul class="dropdown-menu">
                <li><a href="#">
                  <span class="icon"><i class="fa fa-fw fa-user-circle-o m-r-10"></i></span>
                  Profile
                </a></li>
                <li><a href="#">
                  <span class="icon"><i class="fa fa-fw fa-bell m-r-10"></i></span>
                  Notifications
                </a></li>
                <li><a href="#">
                  <span class="icon"><i class="fa fa-fw fa-cog m-r-10"></i></span>
                  Setting
                </a></li>
                <li class="seperator"></li>
                <li><a href="{{route('logout')}}">
                  <span class="icon"><i class="fa fa-fw fa-sign-out m-r-10"></i></span>
                  Logout
                </a></li>
              </ul>
            </button>
          @endif
        </div>
      </div>
    </nav>

    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
