<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/images/icon.png">
    <title>Ez Travel - Feedback Received</title>
</head>
<body onload="window.print()">
<div>
    <center><img style="width: 10%; length: 10%;" src="https://i.imgur.com/UHp7uVR.png"></center>
    <center><h2 class="tittle" style="color: #49c2f5">EZ Travel</h2>
        <span style="color: #49c2f5">Ez Travel - Easier to Get Travel!</span>
        <hr>
        <br>
    </center>
</div>

<div>
    <h3>Feedback Received</h3>
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
<table id="example4" class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Phone</th>
        <th>Messages</th>
        <th>Sended_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contact as $row)
        <tr><?php $kode = sprintf("%05d", $row->id); ?>
            <td>{{$kode}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->message}}</td>
            <td>{{$row->created_at.' &mdash; '.$row->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>