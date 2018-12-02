@extends('admin.panel.layouts.mcontent')
@section('nav')
    <li class="treeview">
        <a href="#">
            <i class="fa fa-globe"></i> <span>Tours</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('admin/tourcontent#addtour')}}"><i class="fa fa-pencil-square-o text-aqua"></i> Add Tour</a>
            </li>
            <li><a href="{{url('admin/tourcontent#tour')}}"><i class="fa fa-table text-aqua"></i> View Tour</a></li>
        </ul>
    </li>
    <li class="active treeview menu-open">
        <a href="#">
            <i class="fa fa-bus"></i> <span>Travels</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('admin/travelcontent#addtravel')}}"><i class="fa fa-pencil-square-o text-teal"></i> Add
                    Travel</a></li>
            <li><a href="{{url('admin/travelcontent#travel')}}"><i class="fa fa-table text-teal"></i> View Travel</a>
            </li>
        </ul>
    </li>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>Travel Contents</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/travelcontent')}}">Tables</a></li>
                <li class="active">Travel Tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary" id="traveldetail">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bus"></i> &nbsp;Detail Travel #{{$travel->id}}</h3>
                            <small>Last Updated {{$travel->updated_at}}</small>
                            <hr>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-sm-8 col-lg-offset-1">
                                <br>
                                <table>
                                    @foreach($travelcontent as $row)
                                        @if($row->id == $travel->id)
                                            <?php $rupiah = number_format($row->harga, 2, ',', '.')?>
                                            <tr>
                                                <td><strong>Operator</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$row->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jenis Kendaraan</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$row->jenis_kendaraan}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor Polisi</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$row->no_pol}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kota Asal</strong></td>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{$row->asal}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kota Tujuan</strong></td>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                <td>{{$row->tujuan}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jadwal Keberangkatan</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>({{$row->tgl_berangkat}} &ndash; {{$row->jadwal_berangkat}})</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jadwal Kedatangan</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>({{$row->tgl_datang}} &ndash; {{$row->jadwal_datang}})</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Harga</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$rupiah}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                <hr>
                                <br><br><br>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-info" id="travel">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-pencil-square"></i> &nbsp;Edit Travel #{{$travel->id}}
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('sukses')}}
                            </div>
                        @elseif(session('gagal'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {{session('gagal')}}
                            </div>
                    @endif
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" class="form-horizontal"
                                  action="{{url('admin/travelcontent/'.$travel->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="form-group{{ $errors->has('operator_id') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Operator</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="operator_id">
                                            <option disabled selected>-- Pilih Operator --</option>
                                            @foreach($operator as $row)
                                                <option value="{{$row->id}}"<?php if ($row->id == $travel->operator_id) {
                                                    echo 'selected';
                                                } ?>>{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                        <span class="fa fa-bus form-control-feedback"></span>
                                        @if ($errors->has('operator_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('operator_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('asal') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Destinasi</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="asal" id="sel1"
                                                onchange="giveSelection(this.value)" required>
                                            <option disabled>-- Pilih Kota --</option>
                                            <?php $asal = (isset($_GET['asal']) ? strtolower($_GET['asal']) : NULL); ?>
                                            <option value="blitar" <?php if ('blitar' == $travel->asal) {
                                                echo 'selected';
                                            } ?>>Blitar
                                            </option>
                                            <option value="kediri" <?php if ('kediri' == $travel->asal) {
                                                echo 'selected';
                                            } ?>>Kediri
                                            </option>
                                            <option value="malang" <?php if ('malang' == $travel->asal) {
                                                echo 'selected';
                                            } ?>>Malang
                                            </option>
                                            <option value="sidoarjo" <?php if ('sidoarjo' == $travel->asal) {
                                                echo 'selected';
                                            } ?>>Sidoarjo
                                            </option>
                                            <option value="surabaya" <?php if ('surabaya' == $travel->asal) {
                                                echo 'selected';
                                            } ?>>Surabaya
                                            </option>
                                        </select>
                                        <span class="fa fa-building-o form-control-feedback"></span>
                                        @if ($errors->has('asal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('asal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="tujuan" id="sel2">
                                            <option disabled>-- Pilih Kota --</option>
                                            <?php $tujuan = (isset($_GET['tujuan']) ? strtolower($_GET['tujuan']) : NULL); ?>
                                            <option data-option="blitar"
                                                    value="Kediri" <?php if ('kediri' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Kediri
                                            </option>
                                            <option data-option="blitar"
                                                    value="Malang" <?php if ('malang' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Malang
                                            </option>
                                            <option data-option="blitar"
                                                    value="Sidoarjo" <?php if ('sidoarjo' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Sidoarjo
                                            </option>
                                            <option data-option="blitar"
                                                    value="Surabaya" <?php if ('surabaya' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Surabaya
                                            </option>

                                            <option data-option="kediri"
                                                    value="Blitar" <?php if ('blitar' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Blitar
                                            </option>
                                            <option data-option="kediri"
                                                    value="Malang" <?php if ('malang' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Malang
                                            </option>
                                            <option data-option="kediri"
                                                    value="Sidoarjo" <?php if ('sidoarjo' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Sidoarjo
                                            </option>
                                            <option data-option="kediri"
                                                    value="Surabaya" <?php if ('surabaya' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Surabaya
                                            </option>

                                            <option data-option="malang"
                                                    value="Blitar" <?php if ('blitar' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Blitar
                                            </option>
                                            <option data-option="malang"
                                                    value="Kediri" <?php if ('kediri' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Kediri
                                            </option>
                                            <option data-option="malang"
                                                    value="Sidoarjo" <?php if ('sidoarjo' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Sidoarjo
                                            </option>
                                            <option data-option="malang"
                                                    value="Surabaya" <?php if ('surabaya' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Surabaya
                                            </option>

                                            <option data-option="sidoarjo"
                                                    value="Blitar" <?php if ('blitar' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Blitar
                                            </option>
                                            <option data-option="sidoarjo"
                                                    value="Kediri" <?php if ('kediri' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Kediri
                                            </option>
                                            <option data-option="sidoarjo"
                                                    value="Malang" <?php if ('malang' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Malang
                                            </option>
                                            <option data-option="sidoarjo"
                                                    value="Surabaya" <?php if ('surabaya' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Surabaya
                                            </option>

                                            <option data-option="surabaya"
                                                    value="Blitar" <?php if ('blitar' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Blitar
                                            </option>
                                            <option data-option="surabaya"
                                                    value="Kediri" <?php if ('kediri' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Kediri
                                            </option>
                                            <option data-option="surabaya"
                                                    value="Malang" <?php if ('malang' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Malang
                                            </option>
                                            <option data-option="surabaya"
                                                    value="Sidoarjo" <?php if ('sidoarjo' == $travel->tujuan) {
                                                echo 'selected';
                                            } ?>>Sidoarjo
                                            </option>
                                        </select>
                                        <span class="fa fa-building form-control-feedback"></span>
                                        @if ($errors->has('tujuan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tujuan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <script>
                                        var sel1 = document.querySelector('#sel1');
                                        var sel2 = document.querySelector('#sel2');
                                        var options2 = document.querySelectorAll('option');

                                        function giveSelection(selValue) {
                                            sel2.innerHTML = '';
                                            for (var i = 0; i < options2.length; i++) {
                                                if (options2[i].dataset.option === selValue) {
                                                    sel2.appendChild(options2[i]);
                                                }
                                            }
                                        }

                                        giveSelection(sel1.value);
                                    </script>
                                </div>
                                <div class="form-group{{ $errors->has('tgl_berangkat') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Keberangkatan</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="tgl_berangkat" type="date"
                                               value="{{$travel->tgl_berangkat}}">
                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                        @if ($errors->has('tgl_berangkat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_berangkat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="jadwal_berangkat" type="time"
                                               value="{{$travel->jadwal_berangkat}}">
                                        <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                        @if ($errors->has('jadwal_berangkat'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jadwal_berangkat') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('tgl_datang') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Kedatangan</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="tgl_datang" type="date"
                                               value="{{$travel->tgl_datang}}">
                                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                        @if ($errors->has('tgl_datang'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_datang') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-control" name="jadwal_datang" type="time"
                                               value="{{$travel->jadwal_datang}}">
                                        <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                        @if ($errors->has('jadwal_datang'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jadwal_datang') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Harga (Rp)</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="50000" name="harga"
                                               value="{{$travel->harga}}">
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('harga'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('harga') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection