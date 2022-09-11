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
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table with outer spacing</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text">Using the most basic table up, here’s how
                                        <code>.table</code>-based tables look in Bootstrap. You can use any example
                                        of below table for your table and it can be use with any type of bootstrap tables.
                                    </p>
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                        <table class="table table-lg">
                                            <thead>
                                            <tr>
                                                <th>ürün fotoğrafı</th>
                                                <th>ürün adı</th>
                                                <th>Kategori Adı</th>
                                                <th>ürün fiyatı</th>
                                                <th>durumu</th>
                                                <th>Oluşturulma Tarihi</th>
                                                <th>İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>
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
                                                    </td>
                                                    <td class="text-bold-500">{{$product->name}}</td>
                                                    <td class="text-bold-500">{{$product->getCategory->name}}</td>
                                                    <td class="text-bold-500">{{$product->price}} ₺</td>
                                                    <td>
                                                        <input class="switch" article-id="{{$product->id}}" type="checkbox"
                                                               @if($product->status==1) checked @endif
                                                               data-toggle="toggle" data-on="Aktif" data-off="Pasif"
                                                               data-onstyle="success" data-offstyle="danger">
                                                    </td>
                                                    <td>{{$product->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('admin.ürün.sil',$product->id)}}" class="btn btn-sm btn-danger">sil</a>
                                                        <a href="{{route('admin.ürün.güncelle',$product->id)}}" class="btn btn-sm btn-info">güncelle</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch').change(function(){
                id = $(this)[0].getAttribute('article-id');
                statu=$(this).prop('checked');
                $.get("{{route('admin.switch')}}", {id:id,statu:statu}, function (data,status){
                });
            })
        })
    </script>


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
