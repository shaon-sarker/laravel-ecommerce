<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel-Eshop') }}</title>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="{{ asset('fronted/front/font.css') }}" rel="stylesheet">
      <!-- Font Awsome -->
      <link href="{{ asset('assets/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
      <!-- Bootstrap CSS -->
      <link href="{{ asset('css/frontend.min.css') }}" rel="stylesheet">
   </head>
   <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
         <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}"><img src="{{ asset('fronted/image/logo.png') }}" alt="" class="w-75"></a>
            <div class="searchbar col-md-4 m-auto">
               <form action="{{ url('/searchproduct') }}" method="POST">
                  @csrf
                  <div class="input-group mb-3 mt-3">
                     <input type="search" class="form-control" name="product_name" required id="search_product" placeholder="Search Product" aria-label="Username" aria-describedby="basic-addon1">
                     <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                  </div>
               </form>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                     <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="{{ url('/wishlist') }}">Wishlist<span class="badge bg-primary wish-count">{{ App\Models\Wishlist::where('user_id', Auth::id())->count() }}</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-white" href="{{ url('/cart') }}">Cart<i class="fa fa-shopping-cart"></i><span class="badge bg-primary cart-count">{{ App\Models\Cart::where('user_id', Auth::id())->count() }}</span></a>
                  </li>
                  @guest
                  @if (Route::has('login'))
                  <li class="nav-item">
                     <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @endif
                  @if (Route::has('register'))
                  <li class="nav-item">
                     <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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
      <!-- Footer -->
      <footer class="bg-dark text-white">
         <!-- Grid container -->
         <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
               <!-- Facebook -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-facebook-f"></i
                  ></a>
               <!-- Twitter -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-twitter"></i
                  ></a>
               <!-- Google -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-google"></i
                  ></a>
               <!-- Instagram -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-instagram"></i
                  ></a>
               <!-- Linkedin -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-linkedin"></i
                  ></a>
               <!-- Github -->
               <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="fa fa-github"></i
                  ></a>
            </section>
            <!-- Section: Social media -->
            <!-- Section: Form -->
            <section class="">
               <form action="">
                  <!--Grid row-->
                  <div class="row d-flex justify-content-center">
                     <!--Grid column-->
                     <div class="col-auto">
                        <p class="pt-2">
                           <strong>Sign up for our newsletter</strong>
                        </p>
                     </div>
                     <!--Grid column-->
                     <!--Grid column-->
                     <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                           <input type="email" id="form5Example21" class="form-control" placeholder="Sign up for our newsletter"/>
                        </div>
                     </div>
                     <!--Grid column-->
                     <!--Grid column-->
                     <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-light mb-4">
                        Subscribe
                        </button>
                     </div>
                     <!--Grid column-->
                  </div>
                  <!--Grid row-->
               </form>
            </section>
            <!-- Section: Form -->
            <!-- Section: Links -->
            <section class="">
               <!--Grid row-->
               <div class="row">
                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 class="text-uppercase">Company Name</h5>
                     <ul class="list-unstyled mb-0">
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                     </ul>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 class="text-uppercase">Products</h5>
                     <ul class="list-unstyled mb-0">
                        <li>
                           Category
                        </li>
                        <li>
                           Subcategory
                        </li>
                        <li>
                           Variable Product
                        </li>
                        <li>
                           Download Product
                        </li>
                     </ul>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 class="text-uppercase">Menu</h5>
                     <ul class="list-unstyled mb-0">
                        <li>
                           <a href="#!" class="text-white">Home</a>
                        </li>
                        <li>
                           <a href="#!" class="text-white">Category</a>
                        </li>
                        <li>
                           <a href="#!" class="text-white">Product</a>
                        </li>
                        <li>
                           <a href="#!" class="text-white">Login</a>
                        </li>
                     </ul>
                  </div>
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                     <h5 class="text-uppercase">Contact</h5>
                     <ul class="list-unstyled mb-0">
                        <li>
                           <i class="fa fa-home"></i> New York, NY 10012, US
                        </li>
                        <li>
                           <i class="fa fa-envelope"></i> info@example.com
                        </li>
                        <li>
                           <i class="fa fa-phone"></i>+9012548962
                        </li>
                        <li>
                           <i class="fa fa-whatsapp"></i> info@example.com
                        </li>
                     </ul>
                  </div>
                  <!--Grid column-->
               </div>
               <!--Grid row-->
            </section>
            <!-- Section: Links -->
         </div>
         <!-- Grid container -->
         <!-- Copyright -->
         <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="{{ url('/') }}">Laravel-Eshop</a>
         </div>
         <!-- Copyright -->
      </footer>
      {{-- @include('cookie-consent::index') --}}
      <!-- Footer -->
      <!-- Optional JavaScript; choose one of the two! -->
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="{{ asset('assets/backend/lib/jquery/jquery.js') }}"></script>
      <script src="{{ asset('js/frontend.bundle.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <script src="{{ asset('js/validation.js') }}"></script>
      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
         var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
         (function(){
         var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
         s1.async=true;
         s1.src='https://embed.tawk.to/62657661b0d10b6f3e6f1de0/1g1e5crid';
         s1.charset='UTF-8';
         s1.setAttribute('crossorigin','*');
         s0.parentNode.insertBefore(s1,s0);
         })();
      </script>
      <!--End of Tawk.to Script-->
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <script>
         var availableTags = [];
         $.ajax({
           method: "GET",
           url: "/productlist",
           success: function(response){
               // console.log(response);
               startAutoComplete(response);
           }
         });
         function startAutoComplete(availableTags)
         {
               $( "#search_product" ).autocomplete({
               source: availableTags
               });
         }


      </script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      @if (session('status'))
      <script>
         swal("{{ session('status') }}");
      </script>
      @endif
      @yield('script')
   </body>
</html>

