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
        <div class="container">
            <div class="toolbox toolbox-filter">
                <div class="toolbox-left">
                    <hr>

                </div><!-- End .toolbox-left -->

            </div><!-- End .filter-toolbox -->


            <div class="products-container" data-layout="fitRows">
                @if($products->count()>0)
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
                                        <a href="{{route('single',[$product->id,$product->slug])}}" class="btn-product btn-quickview" title="Quick view">
                                            <span>Göz At</span>
                                        </a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{route('single',[$product->id,$product->slug])}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                    <a href="{{route('categorySingle',[$product->id,$product->getCategory->slug])}}">
                                        <span>{{$product->getCategory->name}}</span>
                                    </a>
                                    <br>
                                    <strong><span>{{$product->price}} ₺</span></strong>
                                    <br>
                                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('d-m-Y')}}</span>

                                    <div class="product-action">
                                        <br>
                                        <hr>
                                        <a href="#" class="btn-product btn-cart"><span>Sepete Ekle</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .product-action -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div>

                    @endforeach
                @else
                    <h1 style="text-align: center">Ürün Bulunamadı</h1>

                @endif
            </div><!-- End .products-container -->
            <br>
            <hr>
        </div><!-- End .container -->
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
@endsection
