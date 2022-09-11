@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        @if(session('cart'))
            <div class="page-content">
                <div class="checkout">
                    <div class="container">
                        <form action="{{route('order.create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Ödeme Detay</h2><!-- End .checkout-title -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>AD - Soyad *</label>
                                            <input name="name" type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                    </div><!-- End .row -->

                                    <label>Ülke *</label>
                                    <input name="country" type="text" class="form-control" required>

                                    <label>Sokak Adı *</label>
                                    <input name="street" type="text" class="form-control" placeholder="Evinizin Bulunduğu Sokak Adı" required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Şehir *</label>
                                            <input name="city" type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Mahalle *</label>
                                            <input name="neighbourhood" type="text" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input name="phone" type="tel" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-lg-9 -->
                                <aside class="col-lg-3">
                                    <br>
                                    <div class="summary">
                                        <h3 class="summary-title">Sipariş Özeti</h3><!-- End .summary-title -->

                                        <table class="table table-summary">
                                            <thead>
                                            <tr>
                                                <th>Ürün</th>
                                                <th>Fiyatı</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @php $total = 0 @endphp
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            {{--                                        foreach--}}
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <tr>
                                                        <td><a href="{{route('single',[$details['id'],$details['slug']])}}">{{$details['name']}}</a></td>
                                                        <td>{{$details['price']}} ₺</td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            <tr class="summary-subtotal">
                                                <td>Toplam:</td>
                                                <td>{{$total}} ₺</td>
                                            </tr><!-- End .summary-subtotal -->
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Siparişi Tamamla</span>
                                            <span class="btn-hover-text">Ödemeye Git</span>
                                        </button>
                                    </div><!-- End .summary -->
                                </aside><!-- End .col-lg-3 -->
                            </div><!-- End .row -->
                        </form>
                    </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        @else
            <br>
            <hr>

            <div style="text-align: center">

                <h1 >Sepetiniz Şuan Boş</h1>
                <a style="font-size: 20px" href="{{route('homepage')}}">Hadi Sepeti Dolduralım</a>
            </div>
        @endif
    </main><!-- End .main -->
@endsection
