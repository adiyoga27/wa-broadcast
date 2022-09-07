@extends('layouts.app')
@section('content-header')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                {{-- <h4 class="page-title">Phonebook</h4> --}}
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Phonebook</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
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

                        <h4 class="card-title mb-0">Phonebook</h4>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="tables" class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>Name</th>
                                        <th>Device ID</th>
                                        <th>Action</th>
                                    </tr> <!-- end row -->
                                </thead>
                                <tbody>
                                    <!-- start row -->

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Custom width modal -->
                </div>
                <button type="button" class="btn waves-effect waves-light btn-primary" data-bs-toggle="modal"
                    data-bs-target="#login-modal"> <i class="mdi mdi-plus-box-outline"></i>
                    Add Phonebook
                </button>
                <!-- ---------------------
                                                                                                                                                                                                                                                                                            end Zero Configuration
                                                                                                                                                                                                                                                                                        ---------------- -->
            </div>
        </div>
    </div>



    <!-- SignIn modal content -->
    <div id="login-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary text-white">
                    <h4 class="modal-title" id="warning-header-modalLabel">Phonebook
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('phonebook') }}" class="ps-3 pe-3" method="POST">
                    @csrf
                    <div class="modal-body">


                        <div class="mb-3">
                            <label for="emailaddress1">Name</label>
                            <input class="form-control" type="text" id="name" name="name" required=""
                                placeholder="Input Your Category Phonebook ... ">
                        </div>

                        <div class="mb-3">
                            <label for="password1">Device</label>
                            <select class="form-select mr-sm-2" id="setting_id" name="setting_id">
                                <option selected>-</option>
                                @foreach ($settings as $setting)
                                    <option value="{{ $setting->id }}">{{ $setting->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-light-warning text-danger font-weight-medium">Save
                            changes</button>
                    </div>
                </form>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script>
        $(function() {
            var table = $('#tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('phonebook') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'device',
                        name: 'device'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
