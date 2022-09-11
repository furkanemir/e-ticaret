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
                                        <form method="post" action="{{route('admin.ürün.ekle.post')}}" enctype="multipart/form-data" class="form form-horizontal">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>ürün adı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="name"
                                                               placeholder="ürün adı giriniz" required>
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
                                                        <select class="form-control" name="category" id="category" required>
                                                            <option value="">seçim yapınız</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün fiyatı</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" class="form-control" name="price"
                                                               placeholder="ürün fiyatı giriniz" required>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>ürün açıklaması</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" class="form-control" name="description"
                                                               placeholder="ürün açıklaması giriniz" required>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                        </div>
                                                    </div>
                                                    <div class="col-12" id="giyim_hidden">
                                                        <div class="col-4">
                                                            <label for=""> Renk :</label>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text">
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
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
    // bişey.elected(
    // div.display()s
    // )
    console.log($( "#category option" ).filter(':selected').val())
if($( "#category option:selected" ).val() == 2){
    console.log('bahar');
    $("#giyim_hidden").show();
}
</script>


