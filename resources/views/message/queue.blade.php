@extends('layouts.app')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

@endsection
@section('content-header')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Pesan Antrian</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pesan Antrian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <!-- ---------------------
            start Zero Configuration
        ---------------- -->
        <div class="card">
            <div class="border-bottom title-part-padding">
                
            <h4 class="card-title mb-0">Queue</h4></div>
            <div class="card-body">
                <div class="table-responsive">
                     <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                             
                            </tr> <!-- end row -->
                        </thead>
                        <tbody>
                            @foreach($messages as $row)
                            <tr>
                                <th>{{$row->name}}</th>
                                <th>{{$row->phone}}</th>
                                <th>{{$row->is_sent ? 'Terkirim' : 'Belum Terkirim'}}</th>
                                <th>Action</th>
                             
                            </tr> <!-- end row -->
                            @endforeach
                         
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- ---------------------
            end Zero Configuration
        ---------------- -->
    </div>
</div>
</div>
@endsection
@section('js')
    <!--This page plugins -->

    <script src="{{url('assets/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/dist/js/pages/datatable/custom-datatable.js')}}"></script>
    <script src="{{url('assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection