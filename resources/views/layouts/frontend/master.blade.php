<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
       <link rel="dns-prefetch" href="//fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   <!-- Font Awsome -->
    <link href="{{ asset('assets/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/frontend.min.css') }}" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/wishlist') }}">Wishlist</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/cart') }}">Cart<i class="fa fa-shopping-cart"></i></a>
                  </li>

                  @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.dash') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            </div>
                        </li>
                  @endguest
                </ul>
              </div>
        </div>
    </nav>

    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('assets/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/frontend.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- @yield('script') --}}
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
  </body>
</html>
