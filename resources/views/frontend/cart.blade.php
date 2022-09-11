@extends('frontend.layouts.master')
@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Sepet<span>Mağaza</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <div class="page-content" id="tableCart">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                @if(session('cart'))
                                    <tr>
                                        <th>Ürün</th>
                                        <th>Fiyat</th>
                                        <th></th>
                                    </tr>
                                @else
                                    <tr>

                                        <th></th>
                                    </tr>
                                @endif
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ $details['image'] }}" alt="Product image">
                                                        </a>
                                                    </figure>
                                                    <h3 class="product-title">
                                                        <a href="{{route('single',[$details['id'],$details['slug']])}}">{{$details['name']}}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{$details['price']}} ₺</td>
                                            <td class="remove-col"><a href="#" onclick="removeCart({{$details['id']}})" class="btn-remove"><i class="icon-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                @else

                                        <td><h4><strong>Sepetiniz Şuan Boş</strong></h4></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table><!-- End .table table-wishlist -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <br>
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Sepet Tutarı</h3><!-- End .summary-title -->
                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-total">
                                        @if($total>0)
                                            <td>Toplam:</td>
                                            <td>{{$total}} ₺</td>
                                        @else
                                            <td></td>
                                            <td>Sepette Ürün Yok</td>
                                        @endif
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->
                                @if($total>0)
                                    <a href="{{route('order.index')}}" class="btn btn-outline-primary-2 btn-order btn-block">Ödemeyi Tamamla</a>
                                @endif
                            </div><!-- End .summary -->
                            <a href="{{route('homepage')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>Alışverişe Devam Et</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function removeCart(id){
            Swal.fire({
                title: 'Ürünü Silmek İstediğinize Emin misiniz?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText:'Kapat',
                confirmButtonText: 'Evet, Sil!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "GET",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function (response) {
                            console.log(response)
                            $( "#cartDropDown" ).load(window.location.href + " #cartDropDown" );
                            $( "#cartIcon" ).load(window.location.href + " #cartIcon" );
                            $( "#tableCart" ).load(window.location.href + " #tableCart" );
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı',
                                html: '<strong>İşlem Başarılı Fiş İstiyor musunuz?</strong>',
                                footer: '<strong> Furkan A.Ş LTD ŞTİ Company </strong>'
                            })
                        }
                    });

                }
            })

        }
    </script>
@endsection
