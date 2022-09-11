@extends('frontend.layouts.master')
@section('style')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <main class="main">
        <div class="intro-slider-container mb-4">
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "responsive": {
                            "992": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                <div class="intro-slide" style="background-image: url({{asset('front/')}}/assets/images/demos/demo-11/slider/slide-1.jpg);">
                    <div class="container intro-content">
                        <h3 class="intro-subtitle text-primary">SEASONAL PICKS</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title">Get All <br>The Good Stuff</h1><!-- End .intro-title -->

                        <a href="category.html" class="btn btn-outline-primary-2">
                            <span>DISCOVER MORE</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .intro-slide -->

                <div class="intro-slide" style="background-image: url({{asset('front/')}}/assets/images/demos/demo-11/slider/slide-2.jpg);">
                    <div class="container intro-content">
                        <h3 class="intro-subtitle text-primary">all at 50% off</h3><!-- End .h3 intro-subtitle -->
                        <h1 class="intro-title text-white">The Most Beautiful <br>Novelties In Our Shop</h1><!-- End .intro-title -->

                        <a href="category.html" class="btn btn-outline-primary-2 min-width-sm">
                            <span>SHOP NOW</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .intro-content -->
                </div><!-- End .intro-slide -->
            </div><!-- End .intro-slider owl-carousel owl-simple -->

            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->

        <div class="container">
            <div class="toolbox toolbox-filter">
                <div class="toolbox-left">
                    <a href="#" class="filter-toggler">Filters</a>

                </div><!-- End .toolbox-left -->
                <div class="toolbox-right">
                    <ul class="nav-filter product-filter">
                        <li class="active"><a href="#" data-filter="*">All</a></li>
                        <li><a href="" data-filter=".furniture">Furniture</a></li>
                        <li><a href="#" data-filter=".lighting">Lighting</a></li>
                        <li><a href="#" data-filter=".accessories">Accessories</a></li>
                        <li><a href="#" data-filter=".sale">Sale</a></li>
                    </ul>
                </div><!-- End .toolbox-right -->
            </div><!-- End .filter-toolbox -->

            <div class="widget-filter-area" id="product-filter-area">
                <a href="#" class="widget-filter-clear">Clean All</a>

                <div class="filter-area-wrapper">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h3 class="widget-title">
                                    Category:
                                </h3><!-- End .widget-title -->

                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">All</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">24</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-2">
                                            <label class="custom-control-label" for="cat-2">Furniture</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">3</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-3">
                                            <label class="custom-control-label" for="cat-3">Lighting</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-4">
                                            <label class="custom-control-label" for="cat-4">Accessories</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">4</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-5">
                                            <label class="custom-control-label" for="cat-5">Sale</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h3 class="widget-title">
                                    Sort by:
                                </h3><!-- End .widget-title -->

                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" checked id="sort-1" name="sortby">
                                            <label class="custom-control-label" for="sort-1">Default</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="sort-2" name="sortby">
                                            <label class="custom-control-label" for="sort-2">Popularity</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="sort-3" name="sortby">
                                            <label class="custom-control-label" for="sort-3">Average Rating</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="sort-4" name="sortby">
                                            <label class="custom-control-label" for="sort-4">Newness</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="sort-5" name="sortby">
                                            <label class="custom-control-label" for="sort-5">Price: Low to High</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="radio" class="custom-control-input" id="sort-6" name="sortby">
                                            <label class="custom-control-label" for="sort-6">Price: High to Low</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h3 class="widget-title">
                                    Colour:
                                </h3><!-- End .widget-title -->

                                <div class="filter-colors filter-colors-vertical">
                                    <a href="#" style="background: #b87145;"><span>Brown</span></a>
                                    <a href="#" style="background: #f0c04a;"><span>Yellow</span></a>
                                    <a href="#" style="background: #333333;"><span>Black</span></a>
                                    <a href="#" class="selected" style="background: #cc3333;"><span>Red</span></a>
                                    <a href="#" style="background: #ebebeb;"><span>White</span></a>
                                </div><!-- End .filter-colors -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h3 class="widget-title">
                                    Price:
                                </h3><!-- End .widget-title -->

                                <div class="filter-price">
                                    <div class="filter-price-text">
                                        Price Range:
                                        <span id="filter-price-range"></span>
                                    </div><!-- End .filter-price-text -->

                                    <div id="price-slider"></div><!-- End #price-slider -->
                                </div><!-- End .filter-price -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .filter-area-wrapper -->
            </div><!-- End #product-filter-area.widget-filter-area -->

            <div class="products-container" data-layout="fitRows">
                @if(isset($products))
                    @foreach($products as $product)
                        <div class="product-item furniture col-6 col-md-4 col-lg-3">
                            <div class="product product-4">
                                <figure class="product-media">
                                    <div class="swiper mySwiper" style="width: 100%">
                                        <div class="swiper-wrapper">
                                            @if(isset($product->getImages))
                                                @foreach($product->getImages as $image)
                                                    <div class="swiper-slide product-image"><img src="{{$image->path}}" alt=""></div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>

                                    <div class="product-action">
                                        <a href="{{route('single',[$product->id,$product->slug])}}" class="btn-product " title="Quick view">
                                            <span>Göz At</span>
                                        </a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{route('single',[$product->id,$product->slug])}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <a href="{{route('categorySingle',[$product->getCategory->id,$product->getCategory->slug])}}">
                                        <span>{{$product->getCategory->name}}</span>
                                    </a>
                                    <br>
                                    <strong><span>{{$product->price}} ₺</span></strong>
                                    <br>
                                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('d-m-Y')}}</span>

                                    <div class="product-action">
                                        <br>
                                        <hr>
                                        <a href="#" onclick="addToCart({{$product->id}})" class="btn-product btn-cart"><span>Sepete Ekle</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div>
                    @endforeach
                @endif
            </div><!-- End .products-container -->
        </div><!-- End .container -->

        <div class="more-container text-center mt-0 mb-7">
            <a href="category.html" class="btn btn-outline-dark-3 btn-more"><span>more products</span><i class="la la-refresh"></i></a>
        </div><!-- End .more-container -->
    </main><!-- End .main -->


@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        function addToCart(id){
            $.ajax({
                url: '{{ route('add.to.cart') }}',
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

@endsection
