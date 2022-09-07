@extends('layouts.app')
@section('content-header')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Setup</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Setting</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Whatsapp</li>
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
                        <h4 class="card-title mb-0">Setup Your Whatsapp</h4>
                    </div>
                    <div class="card-body">
                        <div id="cardimg" class="text-center p-3">
                        </div>
                    </div>
                    <div class="p-3 border-top">
                        <div class="text-center">
                            <a type="button" id="scan"
                                class="btn btn-info rounded-pill px-4 waves-effect waves-light scan">Scan</a>
                            <a type="button" id="status"
                                class="btn btn-warning rounded-pill px-4 waves-effect waves-light status">Check Status</a>
                            <a type="button" id="logout"
                                class="btn btn-danger rounded-pill px-4 waves-effect waves-light logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.0/socket.io.js"
        integrity="sha512-+l9L4lMTFNy3dEglQpprf7jQBhQsQ3/WvOnjaN/+/L4i0jOstgScV0q2TjfvRF4V+ZePMDuZYIQtg5T4MKr+MQ=="
        crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script>
        var cardBody = "";
        var socket = io.connect('http://localhost:3000/');
        socket.emit('ready', 'sdf');
        socket.on('loader', function() {
            $('#cardimg').html(`<div id="loader" class="loader">
                            <div class="mb-3 row">
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                Menghubungkan ke Whatsapp ...
                            </div>
                        </div>`);
        })
        socket.on('message', function(msg) {
            $('.log').html(`<li>` + msg + `</li>`);
            console.log(msg);
        })
        socket.on('qr', function(src) {
            $('#cardimg').html(` <img src="` + src +
                `" class="card-img-top" alt="cardimg" id="qrcode" style="height:250px; width:250px;">`);
            console.log(src);
        });
        socket.on('authenticated', function(src) {
            $('#cardimg').html(`<h2 class="text-center text-success mt-4">Whatsapp Connected.<br>` + src + `<h2>`);
            console.log(src);
        });
        socket.on('user', function(user) {
            cardBody = ``;
            if (user.status == 'connected') {
                cardBody += `<center> <div class="col-sm-8"><div class="alert alert-success" role="alert">
                    <strong>Success - </strong> Whatsapp Terhubung
                </div></div></center>`;
            } else {
                cardBody += `<div class="alert alert-danger" role="alert">`;
            }
            cardBody += `
            <div class="mb-3 row">
                            <label for="com1" class="col-sm-4 text-end control-label col-form-label">ID</label>
                            <div class="col-sm-4">
                                <input disabled type="text" class="form-control" id="id" value="+` + formatPhone(user
                    .id) + `">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="com1" class="col-sm-4 text-end control-label col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <input disabled type="text" class="form-control disabled" id="name" placeholder="` +
                user.name + `">
                            </div>
                        </div>
                `;
            $('#cardimg').html(cardBody);
            console.log(user);
        })
        $('#logout').click(function() {
            $('#cardimg').html(`<h2 class="text-center text-dark mt-4">Please wait..<h2>`);
            $('.log').html(`<li>Connecting..</li>`);
            socket.emit('logout', 'delete');
        })
        $('#scan').click(function() {
            socket.emit('scanqr', 'scanqr');
        })
        $('#status').click(function() {
            socket.emit('cekstatus', 'cekstatus');
        })
        socket.on('isdelete', function(msg) {
            console.log(msg);
            $('#cardimg').html(msg);
        })

        function formatPhone(phone) {
            return phone.substring(0, 13);
        }
    </script>
@endsection
