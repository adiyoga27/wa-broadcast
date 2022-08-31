@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets//extra-libs/summernote/summernote-lite.min.css') }}">
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
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Form Pesan</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">  
                            <div class="mb-3">
                                <label>Device Sender</label>
                                <input type="text" class="form-control" name="setting_id" value="">
                            </div>
                            <div class="mb-3">
                                <label>Photo   <span class="help">(Kosongkan Jika Tidak Mengirim Foto)</span></label>
                                <input class="form-control" type="file" id="formFile" name="image[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label>Video  <span class="help">(Kosongkan Jika Tidak Mengirim Video)</span></label>
                                <input class="form-control" type="file" id="formFile" name="video[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label>File  <span class="help">(Kosongkan Jika Tidak Mengirim File)</span></label>
                                <input class="form-control" type="file" id="formFile" name="file[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="example-email">Isi Pesan </label>
                                <textarea class="summernote" name="message" > </textarea>

                              
                            </div>
                            <div class="col-12">
                                <div class="d-md-flex align-items-center mt-3">
                                  
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button type="submit" class="btn btn-info font-weight-medium rounded-pill px-4">
                                            <div class="d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send feather-sm fill-white me-2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                                Submit
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-12">
                <!-- ---------------------
                    start Zero Configuration
                ---------------- -->
                <div class="card">
                    <div class="border-bottom title-part-padding">

                        <h4 class="card-title mb-0">Queue</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Message</th>
                                        <th>Picture</th>
                                        <th>Video</th>
                                        <th>File</th>

                                        <th>Action</th>

                                    </tr> <!-- end row -->
                                </thead>
                                <tbody>
                                    @foreach ($messages as $row)
                                        <tr>
                                            <th>{{ $row->message }}</th>
                                            <th>{{ $row->message }}</th>
                                            <th>{{ $row->message }}</th>
                                            <th>{{ $row->message }}</th>
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

    <script src="{{ url('assets/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/dist/js/pages/datatable/custom-datatable.js') }}"></script>
    <script src="{{ url('assets/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script src="../assets/extra-libs/summernote/summernote-lite.min.js"></script>
    <script>
        /************************************/
        //default editor
        /************************************/
        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
    </script>
@endsection
