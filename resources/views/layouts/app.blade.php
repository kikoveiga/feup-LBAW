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
    <link href="{{ asset('css/milligram.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript">
        // Fix for Firefox autofocus CSS bug
        // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
    </script>
    <script src={{ asset('js/app.js') }} defer>
</script>
  </head>
  <body>
    <main>
      <header>
        <h1><a href="{{ url('/') }}">LeiloArte</a></h1>
        <nav class="navigation">
          <form method="GET" action="{{ url('/') }}">
            {{ csrf_field() }}
            <input id="searchBar" type="text" name="search" placeholder="Search..">
            <button class= "button" id="searchButton"> Search </button>
          </form>
          <a class = "button" href="{{ route('home') }}"> Home </a>
          <a class = "button" href="{{ route('home')}}"> About us </a>
          
          @if (Auth::check())
          <div class="user-controls">
              <form method="POST" action="{{ route('logout') }}">
                  {{ csrf_field() }}
                  <button class="button"> Logout </button>
              </form>
              <span class="transparent-box"><a href="{{ route('user', ['id'=>Auth::user()->id]) }}" class="user-link">{{ Auth::user()->name }}</a></span>
          </div>
      @endif

      @if (!Auth::check())

            <a class="button" href="{{ url('/login') }}"> Login </a>
            <a class="button" href="{{ url('/register') }}"> Register </a>
        @endif
        </nav>
      </header>
      <section id="content">
        @yield('content')
      </section>
      <footer>
        <p>&copy; 2023-{{ date('Y') }} LeiloArte. All Rights Reserved.</p>
      </footer>
    </main>
  </body>
</html>
