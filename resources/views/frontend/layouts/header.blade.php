<!DOCTYPE html>
<html lang="en">


<!-- molla/index-11.html  22 Nov 2019 09:58:23 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/')}}/assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/')}}/assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/')}}/assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="{{asset('front/')}}/assets/images/icons/site.html">
    <link rel="mask-icon" href="{{asset('front/')}}/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{asset('front/')}}/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/demos/demo-11.css">

    @yield('style')
    <script>
        function removeCart(id){
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "GET",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (response) {
                    $( "#cartDropDown" ).load(window.location.href + " #cartDropDown" );
                    $( "#cartIcon" ).load(window.location.href + " #cartIcon" );
                }
            });
        }
    </script>
</head>
<body>
<div class="page-wrapper">
    <header class="header header-7">
        <div class="header-middle sticky-header">
            <div class="container">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="{{route('homepage')}}" class="logo">
                        <img src="{{asset('front/')}}/assets/images/demos/demo-11/logo.png" alt="Molla Logo" width="82" height="25">
                    </a>
                </div><!-- End .header-left -->

                <div class="header-right">

                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container @if(request()->segment(1) == "") active @endif">
                                <a href="{{route('homepage')}}" class="sf-with-ul">Anasayfa</a>
                            </li>
                            <li class="@if(request()->segment(1) == "category") active @endif">
                                <a href="#" class="sf-with-ul">Kategoriler</a>

                                <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">Kategoriler</div><!-- End .menu-title -->
                                                        <ul>
                                                            @foreach($categories as $category)
                                                                <li><a href="{{route('categorySingle',[$category->id,$category->slug])}}"><strong>{{$category->name}}</strong></a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <img src="{{asset('front/')}}/assets/images/menu/banner-1.jpg" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                            </li>

                            <li>
                                <a href="#" class="sf-with-ul">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="blog.html" class="sf-with-ul">İletişim</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->

                    <div class="header-search">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="#" method="get">
                            <div class="header-search-wrapper">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->


                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            @if(!\Illuminate\Support\Facades\Auth::user())
                                                <a href="{{route('login')}}">Giriş Yap</a>
                                                <br>
                                                <hr>
                                                <a href="{{route('register')}}">Kayıt Ol</a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                <a href="{{route('user.setting')}}">Ayarlar</a>
                                                <br>
                                                <hr>
                                                <a href="{{route('logout')}}">Çıkış Yap</a>
                                            @endif

                                        </h4>
                                    </div><!-- End .product-cart-details -->
                                </div><!-- End .product -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                    <div id="cartIcon" class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            @php $total = 0; $quantity = 0; @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $quantity ++ @endphp
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                            <span id="quantity" class="cart-count">{{$quantity}}</span>
                            @if($total >0)
                                <span class="cart-txt">{{$total}} ₺</span>
                            @endif
                        </a>
                        @if($total>0)
                            <div id="cartDropDown" class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a id="product_name" href="{{route('single',[$details['id'],$details['slug']])}}">{{$details['name']}}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$details['quantity']}}</span>
                                                x {{$details['price']}} ₺
                                            </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{ $details['image'] }}" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove" onclick="removeCart({{$details['id']}})" title="Remove Product"><i class="icon-close "></i></a>
                                            </div><!-- End .product -->
                                        @endforeach
                                    @endif
                                    <div class="dropdown-cart-total">
                                        <span>Toplam</span>

                                        <span class="cart-total-price">{{$total}} ₺</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{route('cart')}}" class="btn btn-primary">Sepet</a>
                                        <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .cart-dropdown -->
                        @endif
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
    </header><!-- End .header -->

