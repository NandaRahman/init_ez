<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/images/icon.png">
    <title>Ez Travel - Travel E-Ticket</title>
</head>
<body onload="window.print()">
<?php $kode = sprintf("%010d", $travelform->id);?>
<div>
    <center><img style="width: 10%; length: 10%;" src="https://i.imgur.com/UHp7uVR.png"></center>
    <center><h2 class="tittle" style="color: #49c2f5">EZ Travel</h2>
        <span style="color: #49c2f5">Ez Travel - Easier to Get Travel!</span>
        <hr>
        <br></center>
</div>

<div>
    <h3>E-ticket Receipt</h3>
    <hr>
    <br>
</div>
<table>
    <tr>
        <td>Kode Booking</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td style="color: #49c2f5 ;"><strong>{{$kode}}</strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->name}}</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Operator</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->operator}} &mdash; {{$travelform->jenis_kendaraan}}
                ({{$travelform->no_pol}})</strong></td>
    </tr>
    <tr>
        <td>Keberangkatan</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->asal}}
                ({{$travelform->tgl_keberangkatan}} &ndash; {{$travelform->jadwal_keberangkatan}}
                )</strong></td>
    </tr>
    <tr>
        <td>Kedatangan</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->tujuan}}
                ({{$travelform->tgl_datang}} &ndash; {{$travelform->jadwal_datang}}
                )</strong></td>
    </tr>
    <tr>
        <td>Jumlah Penumpang</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->jml_orang}} Orang</strong></td>
    </tr>
    <tr>
        <td>Catatan Khusus</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>{{$travelform->note}}</strong></td>
    </tr>
</table>

<br>
<hr>
<br>

<p style="color:grey ">Mohon simpan e-tiket ini baik-baik sebagai tanda bukti transaksi anda bersama EZ Travel</p>
</body>
</html>