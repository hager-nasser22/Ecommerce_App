@extends('admin.layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                            <img src="{{ asset('storage/admin/assets/images/dashboard/Group126@2x.png') }}"
                                class="gradient-corona-img img-fluid" alt="">
                        </div>
                        <div class="col-5 col-sm-7 col-xl-8 p-0">
                            <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                            <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique
                                layouts!</p>
                        </div>
                        <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                            <span>
                                <a href="https://www.bootstrapdash.com/product/corona-admin-template/" target="_blank"
                                    class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Visitors by Countries</h4>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-us"></i>
                                            </td>
                                            <td>USA</td>
                                            <td class="text-right"> 1500 </td>
                                            <td class="text-right font-weight-medium"> 56.35% </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-de"></i>
                                            </td>
                                            <td>Germany</td>
                                            <td class="text-right"> 800 </td>
                                            <td class="text-right font-weight-medium"> 33.25% </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-au"></i>
                                            </td>
                                            <td>Australia</td>
                                            <td class="text-right"> 760 </td>
                                            <td class="text-right font-weight-medium"> 15.45% </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-gb"></i>
                                            </td>
                                            <td>United Kingdom</td>
                                            <td class="text-right"> 450 </td>
                                            <td class="text-right font-weight-medium"> 25.00% </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-ro"></i>
                                            </td>
                                            <td>Romania</td>
                                            <td class="text-right"> 620 </td>
                                            <td class="text-right font-weight-medium"> 10.25% </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="flag-icon flag-icon-br"></i>
                                            </td>
                                            <td>Brasil</td>
                                            <td class="text-right"> 230 </td>
                                            <td class="text-right font-weight-medium"> 75.00% </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="audience-map" class="vector-map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
