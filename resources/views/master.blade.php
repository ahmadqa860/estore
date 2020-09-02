<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
      .dot {
        height: 25px;
        width: 25px;
        background-color: #FF003C;
        border-radius: 50%;
        display: inline-block;
      }
    </style>

   
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- CSS here -->
    {{--  <link rel="stylesheet" href="css/bootstrap.min.css" />  --}}
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" /> 

    <script>var BASE_URL = "{{ url('') }}/";</script>
    <title>{{ $page_title ?? '' }}</title>
  </head>
  <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="preloader-circle"></div>
          <div class="preloader-img pere-text">
            <img src="{{ asset('img/logo/logo.png') }}" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <div class="header-area">
            <div class="main-header">
              <div class="header-top top-bg d-none d-lg-block">
                <div class="container-fluid">
                  <div class="col-xl-12">
                    <div
                      class="row d-flex justify-content-between align-items-center"
                    >
                      <div class="header-info-right">
                        <ul>
                          @if(! Session::has('user_id'))
                          <li><a href="{{ url('user/signin') }}">My Account </a></li>
                          @else
                          <li><a href="{{ url('user/profile') }}">My Account </a></li>
                          @endif
                          <li><a href="{{ url('shop') }}">Shopping</a></li>
                          <li><a href="{{ url('shop/cart') }}">Cart</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="header-bottom header-sticky">
                <div class="container-fluid">
                  <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                      <div class="logo">
                        <a href="{{ url('') }}"
                          ><img src="{{ asset('img/logo/logo.png') }}" alt=""
                        /></a>
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                      <!-- Main-menu -->
                      <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                          <ul id="navigation">
                            <li><a href="{{ url('') }}">Home</a></li>
                            <li><a href="{{ url('/shop') }}">Catagories</a></li>
                            <li>
                              <a href="#">Pages</a>
                              <ul class="submenu">
                                @if(!empty($menu))
                                  @foreach($menu as $menu_item)
                                  <li><a href="{{ url($menu_item['url']) }}">{{ $menu_item['title'] }}</a></li>
                                  @endforeach
                                @endif
                              </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                      <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                        <li class="mt-3">
                            <div>
                                <a href="{{ url('shop/cart') }}" style="color: #FF003C"><i class="fas fa-shopping-cart fa-lg"></i><span class="dot ml-1">
                                  <span class="text-white ml-2">{{  Cart::getTotalQuantity() }}</span>
                                </span></a>
                            </div>
                        </li>
                        @if(! Session::has('user_id'))
                        <li class="d-none d-lg-block">
                          <a href="{{ url('user/signin') }}" class="btn header-btn">Sign in</a>
                        </li>
                        <li class="d-none d-lg-block">
                            <a href="{{ url('user/signup') }}" class="btn header-btn">Sign up</a>
                        </li>
                        @else
                        <li class="d-none d-lg-block">
                          <a href="{{ url('user/profile') }}" class="btn header-btn">{{ Session::get('user_name') }}</a>
                        </li>
                        @if(Session::has('is_admin'))
                        <li class="d-none d-lg-block">
                          <a href="{{ url('cms/dashboard') }}" class="btn header-btn">Admin Panel</a>
                        </li>
                        @endif
                        <li class="d-none d-lg-block">
                        <a href="{{ url('user/logout') }}" class="btn header-btn">Logout</a>
                        </li>
                        @endif
                      </ul>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                      <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Header End -->


       {{--   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('') }}">iWATCH</a>
                <a class="nav-link text-white" href="{{ url('shop/cart') }}">
                    @if(! Cart::isEmpty())
                    <div class="total-items-in-cart">{{  Cart::getTotalQuantity() }}</div>
                    @endif
                    <i class="fas fa-shopping-cart"></i> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @if(!empty($menu))
                        @foreach($menu as $menu_item)
                        <li>
                            <a class="nav-link" href="{{ url($menu_item['url']) }}">{{ $menu_item['title'] }}</a>
                        </li>
                        @endforeach
                    @endif
                    <li>
                        <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(! Session::has('user_id'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/signin') }}">Signin</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('user/signup') }}">Signup</a>
                    </li>
                    @else
                    <li>
                        <a class="nav-link" href="{{ url('user/profile') }}">{{ Session::get('user_name') }}</a>
                    </li>
                    @if(Session::has('is_admin'))
                    <li>
                        <a class="nav-link" href="{{ url('cms/dashboard') }}">Admin Panel</a>
                    </li>
                    @endif
                    <li>
                        <a class="nav-link" href="{{ url('user/logout') }}">Logout</a>
                    </li>
                    @endif
                </ul>
                </div>
            </div>
          </nav>  --}}
    </header>
    <main style="min-height: 850px" class="mt-5">
        @yield('main_content')
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
          <div class="container">
            <div class="row d-flex justify-content-between">
              <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="single-footer-caption mb-30">
                    <!-- logo -->
                    <div class="footer-logo">
                      <a href="index.html"
                        ><img src="{{ asset('img/logo/logo2_footer.png') }}" alt=""
                      /></a>
                    </div>
                    <div class="footer-tittle">
                      <div class="footer-pera">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit
                          sed do eiusmod tempor incididunt ut labore.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Quick Links</h4>
                    <ul>
                      <li><a href="#">About</a></li>
                      <li><a href="#"> Offers & Discounts</a></li>
                      <li><a href="#"> Get Coupon</a></li>
                      <li><a href="#"> Contact Us</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>New Products</h4>
                    <ul>
                      <li><a href="#">Woman Cloth</a></li>
                      <li><a href="#">Fashion Accessories</a></li>
                      <li><a href="#"> Man Accessories</a></li>
                      <li><a href="#"> Rubber made Toys</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Support</h4>
                    <ul>
                      <li><a href="#">Frequently Asked Questions</a></li>
                      <li><a href="#">Terms & Conditions</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Report a Payment Issue</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
              <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="footer-copy-right">
                  <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This template is made with
                    <i class="ti-heart" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
                </div>
              </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="footer-copy-right f-right">
                  <!-- social -->
                  <div class="footer-social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <a href="#"><i class="fas fa-globe"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer End-->
      </footer>

    @if( Session::has('sm'))
  <script>
      toastr.options.positionClass = 'toast-bottom-full-width';
      toastr.success("{{ Session::get('sm') }}");
  </script>
  @endif 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script> 
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script>   
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>   --}}  
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>   

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>  
    <script src="{{ asset('js/slick.min.js') }}"></script>     

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('js/wow.min.js') }}"></script>   
    <script src="{{ asset('js/animated.headline.js') }}"></script>    
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>    

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script> 
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>    
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>   

    <!-- contact js -->
    <script src="{{ asset('js/contact.js') }}"></script>  
    <script src="{{ asset('js/jquery.form.js') }}"></script>  
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script> 
    <script src="{{ asset('js/mail-script.js') }}"></script>  
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>  

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('js/plugins.js') }}"></script> 
    <script src="{{ asset('js/main.js') }}"></script> 

  </body>
</html>
