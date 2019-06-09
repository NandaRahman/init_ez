<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/images/icon.png">
    <title>Ez Travel - Travel Orders</title>
</head>
<body onload="window.print()">
<div>
    <center><img style="width: 10%; length: 10%;" src="https://i.imgur.com/UHp7uVR.png"></center>
    <center>
        <h2 class="tittle" style="color: #49c2f5">EZ Travel</h2>
        <span style="color: #49c2f5">Ez Travel - Easier to Get Travel!</span>
        <hr>
        <br>
    </center>
</div>

<div>
    <h3>Travel Orders</h3>
    <hr>
    <br>
</div>
<style>
    .table-bordered {
        border: 1px solid #eceeef
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #eceeef
    }

    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 2px
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd !important
    }
</style>
<table id="example2" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>OrderID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Operator</th>
        <th>Type</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Paid</th>
        <th>Note</th>
        <th>Due_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($travelform as $row)
        <tr><?php $kode = sprintf("%010d", $row->id);
            $rupiah = number_format($row->total, 2, ",", ".")?>
            <td>{{$kode}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->handphone}}</td>
            <td>{{$row->operator}}</td>
            <td>{{$row->jenis_kendaraan}}</td>
            <td>{{$row->asal.' ('.$row->tgl_keberangkatan.' &mdash; '.$row->jadwal_keberangkatan.')'}}</td>
            <td>{{$row->tujuan.' ('.$row->tgl_datang.' &mdash; '.$row->jadwal_datang.')'}}</td>
            <td>Rp{{$rupiah}}</td>
            @if($row->note == null)
                <td>-</td>
            @else
                <td>{{$row->note}}</td>
            @endif
            <td>{{$row->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>