@extends('backend.layouts.master')
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
                                                <th>Kategori Adı</th>
                                                <th>Oluşturulma Tarihi</th>
                                                <th>İşlemler</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td class="text-bold-500">{{$category->name}}</td>
                                                        <td>{{$category->created_at}}</td>
                                                        <td>
                                                            <a href="{{route('admin.kategori.sil',$category->id)}}" class="btn btn-sm btn-danger">sil</a>
                                                            <a href="{{route('admin.kategori.güncelle',$category->id)}}" class="btn btn-sm btn-info">güncelle</a>
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
