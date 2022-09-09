@extends('layouts.app')
@section('content-header')
<title>Device</title>
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
                            <a href="#">Device</a>
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
                    <h4 class="card-title mb-0">Device</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tables" class="table table-striped table-bordered text-nowrap">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>Device ID</th>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Port</th>
                                    <th>API Key</th>
                                    <th>Status</th>
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
            <button type="button" class="btn waves-effect waves-light btn-primary" data-bs-toggle="modal" data-bs-target="#form-modal"> <i class="mdi mdi-plus-box-outline"></i>
                Add Device
            </button>
            <!-- ---------------------
                                                                                                                                                                                                                                                                                            end Zero Configuration
                                                                                                                                                                                                                                                                                        ---------------- -->
        </div>
    </div>
</div>
<!-- SignIn modal content -->
<div id="form-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary text-white">
                <h4 class="modal-title" id="warning-header-modalLabel">Form Device
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('device') }}" class="ps-3 pe-3" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="emailaddress1">Name</label>
                        <input class="form-control" type="text" id="name" name="name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">URL</label>
                        <input class="form-control" type="text" id="url" name="url" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">PORT</label>
                        <input class="form-control" type="text" id="port" name="port" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">API KEY</label>
                        <input class="form-control" type="text" id="api_key" name="api_key" required="">
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Set Active</label>
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
<div id="modal_edit" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary text-white">
                <h4 class="modal-title" id="warning-header-modalLabel">Form Device
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="ps-3 pe-3" id="form-edit">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="emailaddress1">Name</label>
                        <input id="id" name="id" hidden>
                        <input class="form-control" type="text" id="name" name="name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">URL</label>
                        <input class="form-control" type="text" id="url" name="url" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">PORT</label>
                        <input class="form-control" type="text" id="port" name="port" required="">
                    </div>
                    <div class="mb-3">
                        <label for="emailaddress1">API KEY</label>
                        <input class="form-control" type="text" id="api_key" name="api_key" required="">
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" id="is_active" name="is_active" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Set Active</label>
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
<div id="modal_permission" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary text-white">
                <h4 class="modal-title" id="warning-header-modalLabel">Permission Device
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="ps-3 pe-3" id="form-edit">
                @csrf
                <div class="modal-body">

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
    var table;
    $(function() {
        table = $('#tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('device') }}",
            columns: [{
                    data: 'device_id',
                    name: 'device_id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'url',
                    name: 'url'
                },
                {
                    data: 'port',
                    name: 'port'
                },
                {
                    data: 'api_key',
                    name: 'api_key'
                },
                {
                    data: 'is_active',
                    name: 'is_active',
                    render: function(data, type, full, meta) {
                        if (data) {
                            return '<span class="badge bg-success">Active</span>';
                        }
                        return '<span class="badge bg-success">Non Active</span>';
                    }
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

    $('#modal_edit').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        var id = div.data('id');
        $.ajax({
            type: "GET",
            url: "device/" + id,
            dataType: "JSON",
            success: function(response) {
                if (response.status) {
                    console.log(response.data)
                    modal.find('#id').attr("value", div.data('id'));
                    modal.find('#name').attr("value", response.data['name']);
                    modal.find('#url').attr("value", response.data['url']);
                    modal.find('#port').val(response.data['port']);
                    modal.find('#api_key').val(response.data['api_key']);
                    modal.find('#is_active').prop("checked", response.data['is_active'] ? true : false);


                } else {
                    Swal.fire(
                        'Gagal!',
                        'Gagal Menyimpan Data',
                        'error'
                    )
                }

            }
        });
    });


    $("#form-edit").submit(function(e) {
        e.preventDefault();
        var form = $('#form-edit')[0];
        var formData = new FormData();
        var id = form['id'].value;
        console.log()
        formData.append('url', form['url'].value);
        formData.append('port', form['port'].value);
        formData.append('api_key', form['api_key'].value);
        formData.append('name', form['name'].value);
        formData.append('is_active', form['is_active'].value);
        formData.append('_method', 'PUT');

        console.log(formData)
        $.ajax({
            type: "POST",
            url: "device/" + id,
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            success: function(response) {
                if (response.status) {

                    $('#modal_edit').modal('hide');
                    table.ajax.reload();

                }
            },
            error: function(response) {
                // $("#wait").css("display", "none");
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: response.responseJSON.messages,
                    footer: ''
                });
            }
        });
    });

    $(document).on('click', '#btnDelete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "device/" + id,
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire(
                                'Berhasil',
                                'Berhasil Di Simpan',
                                'success'
                            ).then((result) => {
                                table.ajax.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Gagal Menyimpan Data',
                                'error'
                            )
                        }
                    }
                });
            }
        })
    });
</script>
@endsection