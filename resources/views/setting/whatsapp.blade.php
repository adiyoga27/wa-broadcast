@extends('layouts.app')
@section('content-header')
<title>Scan Whatsapp Anda</title>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <!-- <h4 class="page-title">Setup Whatsapp</h4> -->
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
        <center>
            <div class="col-6" style="border-radius: 1em">

                <div class="card">
                    <h5 class="card-header">Your Device</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td width="100px"> Name</td>
                                        <td width="10px">:</td>
                                        <td>{{ $device->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Device ID</td>
                                        <td>:</td>
                                        <td>{{ $device->device_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>API Key</td>
                                        <td>:</td>
                                        <td>{{ $device->api_key }}</td>
                                    </tr>
                                    <tr>
                                        <td>URL</td>
                                        <td>:</td>
                                        <td>{{ $device->url }}</td>
                                    </tr>
                                    <tr>
                                        <td>Port</td>
                                        <td>:</td>
                                        <td>{{ $device->port }}</td>
                                    </tr>

                                </table>

                            </div>
                            <div class="col-md-6">

                                <div id="cardimg" class="text-center p-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 border-top">
                        <div class="text-center">
                            <a type="button" id="scan" class="btn btn-info rounded-pill px-4 waves-effect waves-light scan" title="Klik Untuk Scan Aplikasi Whatsapp Anda"><i class="mdi mdi-qrcode-scan"></i>&nbsp Scan</a>
                            <a type="button" id="status" class="btn btn-warning rounded-pill px-4 waves-effect waves-light status" title="Check status koneksi whatsapp anda"><i class="mdi mdi-logout-variant"></i>&nbsp Status</a>
                            <a type="button" id="logout" class="btn btn-danger rounded-pill px-4 waves-effect waves-light logout" title="Logout Whatsapp Anda"><i class="mdi mdi-logout-variant"></i>&nbsp Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <div>
        <div class="col-12">
            <div class="card" style="border-radius: 2em;">
                <div class="card-body">
                    <h3>PENTING !</h3>
                    <p>
                    <ol>
                        <li> Support WhatsApp versi Multi Device.</li>
                        <li> Pastikan koneksi internet Anda stabil.</li>
                        <li> Jika ada kesulitan saat SCAN QRCODE, silahkan klik tombol Reset/Refresh Halaman kemudian SCAN Kembali.</li>
                        <li> Khusus versi WhatsApp Baru (Multiple Device) :</li>
                        <ul>
                            <li> Untuk saat ini hanya bisa mengirim pesan teks biasa dan gambar.</li>
                            <li> Untuk Disconnect silahkan Logout dari aplikasi WhatsApp yang ada di Ponsel Anda, kemudian klik Reset.</li>
                        </ul>
                    </ol>


                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.0/socket.io.js" integrity="sha512-+l9L4lMTFNy3dEglQpprf7jQBhQsQ3/WvOnjaN/+/L4i0jOstgScV0q2TjfvRF4V+ZePMDuZYIQtg5T4MKr+MQ==" crossorigin="anonymous"></script>
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