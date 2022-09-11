@extends('backend.layouts.master')
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
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-content">
            <section class="row">

                <!-- Bordered table start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Horizontal Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.ürün.güncelle.post',$product->id)}}" enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>ürün adı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input value="{{$product->name}}" type="text" class="form-control" name="name"
                                                               placeholder="" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün adı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group" style="display: flex;flex-direction: column-reverse;flex-wrap: wrap;align-content: flex-start;">
                                                        <div class="swiper mySwiper" style="width: 150px;height: 150px">
                                                            <div class="swiper-wrapper">
                                                                @if(isset($product->getImages))
                                                                    @foreach($product->getImages as $image)
                                                                        <div class="swiper-slide"><img src="{{$image->path}}" alt=""></div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div class="swiper-button-next"></div>
                                                            <div class="swiper-button-prev"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün fotoğrafı</label>
                                                    </div>
                                                    <div class="col-md-6 form-group">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün fotoğrafı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="file" name="image[]" class="form-control" multiple required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün kategorisi</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-control" name="category" required>

                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" @if($product->getCategory->id == $category->id) selected @endif>{{$category->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün fiyatı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input value="{{$product->price}}" type="number" class="form-control" name="price"
                                                               placeholder="" required>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Kaydet</button>
                                                        <button type="reset"
                                                                class="btn btn-light-secondary me-1 mb-1">Sıfırla</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Bordered table end -->
            </section>
        </div>
    </div>
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



