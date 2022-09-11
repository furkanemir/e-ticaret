@extends('backend.layouts.master')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <a href="{{route('admin.logout')}}" class="btn icon icon-left"><i data-feather="user"></i> ÇIKIŞ</a>
        <div class="page-heading">
            <h3>Profile Statistics</h3>
            <a   href="{{route('admin.logout')}}" class="btn icon icon-left">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                </svg> çıkış</a>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Profile Views</h6>
                                            <h6 class="font-extrabold mb-0">112.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Followers</h6>
                                            <h6 class="font-extrabold mb-0">183.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Following</h6>
                                            <h6 class="font-extrabold mb-0">80.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Saved Post</h6>
                                            <h6 class="font-extrabold mb-0">112</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bordered table start -->
                <section class="section">
                    <div class="row" id="table-bordered">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bordered table</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                    </div>
                                    <!-- table bordered -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>ADI</th>
                                                <th></th>
                                                <th>SKILL</th>
                                                <th>TYPE</th>
                                                <th>LOCATION</th>
                                                <th>ACTION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-bold-500">Michael Right</td>
                                                <td>$15/hr</td>
                                                <td class="text-bold-500">UI/UX</td>
                                                <td>Remote</td>
                                                <td>Austin,Taxes</td>
                                                <td><a href="#"><i
                                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                                            data-feather="mail"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Morgan Vanblum</td>
                                                <td>$13/hr</td>
                                                <td class="text-bold-500">Graphic concepts</td>
                                                <td>Remote</td>
                                                <td>Shangai,China</td>
                                                <td><a href="#"><i
                                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                                            data-feather="mail"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Tiffani Blogz</td>
                                                <td>$15/hr</td>
                                                <td class="text-bold-500">Animation</td>
                                                <td>Remote</td>
                                                <td>Austin,Texas</td>
                                                <td><a href="#"><i
                                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                                            data-feather="mail"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Ashley Boul</td>
                                                <td>$15/hr</td>
                                                <td class="text-bold-500">Animation</td>
                                                <td>Remote</td>
                                                <td>Austin,Texas</td>
                                                <td><a href="#"><i
                                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                                            data-feather="mail"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-500">Mikkey Mice</td>
                                                <td>$15/hr</td>
                                                <td class="text-bold-500">Animation</td>
                                                <td>Remote</td>
                                                <td>Austin,Texas</td>
                                                <td><a href="#"><i
                                                            class="badge-circle badge-circle-light-secondary font-medium-1"
                                                            data-feather="mail"></i></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Bordered table end -->
            </section>
        </div>
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Horizontal Form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="fname"
                                                       placeholder="First Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="email-id" class="form-control" name="email-id"
                                                       placeholder="Email">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" id="contact-info" class="form-control" name="contact"
                                                       placeholder="Mobile">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" id="password" class="form-control" name="password"
                                                       placeholder="Password">
                                            </div>
                                            <div class="col-12 col-md-8 offset-md-4 form-group">
                                                <div class='form-check'>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox1" class='form-check-input'
                                                               checked>
                                                        <label for="checkbox1">Remember Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
@endsection

