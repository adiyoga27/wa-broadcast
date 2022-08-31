@extends('layouts.app')
@section('css')
    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{url('assets/libs/apexcharts/dist/apexcharts.css')}}"> --}}
    <link href="{{url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
@endsection
@section('content-header')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="ri-emotion-line fs-6 text-muted"></i>
                                <p class="fs-4 mb-1">New Clients</p>
                            </div>
                            <div class="ms-auto">
                                <h1 class="fw-light text-end">23</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 75%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="ri-image-fill fs-6  text-muted"></i>
                                <p class="fs-4 mb-1">New Projects</p>
                            </div>
                            <div class="ms-auto">
                                <h1 class="fw-light text-end">169</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="ri-money-euro-circle-line fs-6 text-muted"></i>
                                <p class="fs-4 mb-1">New Invoices</p>
                            </div>
                            <div class="ms-auto">
                                <h1 class="fw-light text-end">157</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 65%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <i class="ri-bar-chart-fill fs-6 text-muted"></i>
                                <p class="fs-4 mb-1">New Sales</p>
                            </div>
                            <div class="ms-auto">
                                <h1 class="fw-light text-end">236</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 70%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    
</div>
@endsection
@section('js')
<script src="{{url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{url('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
{{-- <script src="{{url('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script> --}}
{{-- <script src="{{url('assets/dist/js/pages/dashboards/dashboard1.js')}}"></script> --}}
@endsection