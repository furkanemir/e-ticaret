@extends('backend.layouts.master')
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
                                        <form method="post" action="{{route('admin.kategori.ekle.post')}}" class="form form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Kategori Adı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="kategori adı giriniz" required>
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
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

