<h3 style="color: rgba(0,0,0,0.5)">Ez Travel account</h3>
<hr>
<h1 style="color: #2daad0">Verifikasi alamat e-mail Anda</h1>
<p><br>Untuk menyelesaikan pengaturan akun Ez Travel ini, kita hanya perlu memastikan bahwa alamat email ini milik Anda.
</p><br>
<style>
    .button {
        top: 100%;
        left: 100%;
        right: 100%;
        bottom: 100%;
        margin: -1px 0 0 -1px;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        font-family: Helvetica;
        border-radius: 14px;
    }

    .d-windows {
        background: transparent;
        color: #27ccb4;
        border: 2px solid #27ccb4;
    }

    .d-windows:hover {
        color: #ffffff;
        background-color: #27ccb4;
    }

    .btn-lg,
    .btn-group-lg > .btn {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.3333333;
    }

    .btn-group > .btn-lg + .dropdown-toggle {
        padding-right: 12px;
        padding-left: 12px;
    }

    .btn-lg .caret {
        border-width: 5px 5px 0;
        border-bottom-width: 0;
    }

    .dropup .btn-lg .caret {
        border-width: 0 5px 5px;
    }
</style>
<a style="text-decoration: none" class="btn button d-windows btn-lg"
   href="{{route('sendEmailDone',["email" => $user->email, "verifyToken"=>$user->verifyToken])}}">
    <strong>Aktifkan Akun ({{$user->email}})</strong>
</a><br><br>
<p>
    Jika anda menolak permintaan ini, <a href="{{route('ez')}}">klik disini</a> untuk membatalkannya.</p><br>
<p>Terimakasih,<br>Ez Travel account team</p>