@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <script>
        t1 = window.setTimeout(function () {
            alert("Sesi anda telah habis! Klik OK untuk mengulangi proses pemesanan.");
            window.location = "/ez";
        }, 600000);
    </script>
</div>
@endsection
