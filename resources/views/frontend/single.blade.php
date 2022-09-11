@extends('frontend.layouts.master')

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->getCategory->name}}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->
        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="@if(isset($product->getImages)) {{$product->getImages->first()->path}} @endif" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @if(isset($product->getImages))
                                            @foreach($product->getImages as $index=>$key)
                                                @if($index != 0)
                                                    <a class="product-gallery-item active" href="#" >
                                                        <img src="{{$key->path}}" alt="product side">
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->
                                <div class="product-price">
                                    {{$product->price}} ₺
                                </div><!-- End .product-price -->
                                    <p>{{$product->name}}</p>
                                <div class="product-content">
                                    <h5>ürün açıklaması:</h5>
                                    <p>{{$product->description}}</p>
                                </div><!-- End .product-content -->
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Adet:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->
                                <div class="product-details-action">
                                    <a href="#" onclick="addToCart({{$product->id}})" class="btn-product btn-cart"><span>Sepete Ekle</span></a>
                                </div><!-- End .product-details-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->
                <h2 class="title text-center mb-4">Bunları da Beğenebilirsin</h2><!-- End .title text-center -->
                @foreach($otherProducts as $item)
                    @if($item->id != $product->id)
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">Yeni</span>
                                    <a href="{{route('single',[$item->id,$item->slug])}}">
                                        <img src="@if(isset($item->getImages)) {{$item->getImages->first()->path}} @endif" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="{{route('categorySingle',[$item->getCategory->id,$item->getCategory->slug])}}">{{$item->getCategory->name}}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('single',[$item->id,$item->slug])}}">{{$item->name}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{$item->price}} ₺
                                    </div><!-- End .product-price -->

                                    <div class="product-nav product-nav-thumbs">
                                        @if(isset($item->getImages))
                                            @foreach($item->getImages as $index=>$key)
                                                @if($index != 0)
                                                    <a href="{{route('single',[$item->id,$item->slug])}}" class="active">
                                                        <img src="{{$key->path}}" alt="product desc">
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->

                        </div>
                    @endif
                @endforeach
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function addToCart(id){
            var qty = document.getElementById('qty').value;
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    'quantity':qty
                },
                success: function (response) {
                    $( "#cartDropDown" ).load(window.location.href + " #cartDropDown" );
                    $( "#cartIcon" ).load(window.location.href + " #cartIcon" );
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        html: '<strong>'+response.name+'</strong> İsimli Ürün Başarıyla Eklendi',
                        footer: '<strong> Furkan A.Ş LTD ŞTİ Company </strong>'
                    })
                }
            });
        }
    </script>
@endsection

