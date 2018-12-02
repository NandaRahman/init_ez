@extends('admin.panel.layouts.mcontent')
@section('nav')
    <li class="active treeview menu-open">
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
    <li class="treeview">
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
                <small>Tour Contents</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/tourcontent')}}">Tour Tables</a></li>
                <li class="active">Edit Tour</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary" id="tourdetail">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-globe"></i> &nbsp;Detail Tour #{{$tour->id}}</h3>
                            <small>Last Updated {{$tour->updated_at}}</small>
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
                                <table>
                                    @foreach($tourcontent as $row)
                                        @if($row->id == $tour->id)
                                            <?php $rupiah = number_format($row->harga, 2, ',', '.')?>
                                            <tr>
                                                <td><strong>Gambar</strong></td>
                                                <td> :&nbsp;</td>
                                                <td><img width="25%" src="{{asset('storage/tour/'.$row->url)}}"
                                                         class="img-responsive">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Paket</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$row->name.', '.$row->paket}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Durasi</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$row->durasi}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Harga</strong></td>
                                                <td> :&nbsp;</td>
                                                <td>{{$rupiah}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keterangan</strong></td>
                                                <td> :&nbsp;</td>
                                                <td style="text-align: justify">{{$row->keterangan}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fasilitas</strong></td>
                                                <td> :&nbsp;</td>
                                                <td style="text-align: justify">{{$row->fasilitas}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Transportasi</strong></td>
                                                <td> :&nbsp;</td>
                                                <td style="text-align: justify">{{$row->transportasi}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-info" id="tour">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> &nbsp;Edit Tour #{{$tour->id}}
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
                        @elseif(session('ok'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('ok')}}
                            </div>
                    @endif
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" class="form-horizontal"
                                  action="{{url('admin/tourcontent/'.$tour->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <label class="input-group-btn">
                                                    <span class="btn btn-info">
                                                        Browse&hellip;<input name="url" type="file"
                                                                             style="display: none;" multiple>
                                                    </span>
                                            </label>
                                            <input type="text" value="{{$tour->url}}" id="img_gallery"
                                                   class="form-control" readonly>
                                        </div>
                                        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                                        @if ($errors->has('url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                        @if(session('file'))
                                            <span class="help-block">
                                                <strong>{{ session('file') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Kota</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="city_id">
                                            <option disabled selected>-- Pilih Kota --</option>
                                            @foreach($city as $row)
                                                <option value="{{$row->id}}" <?php if ($row->id == $tour->city_id) {
                                                    echo 'selected';
                                                } ?>>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="fa fa-building form-control-feedback"></span>
                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('paket') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Paket</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="paket">
                                            <option disabled selected>-- Pilih Paket --</option>
                                            <option value="Paket A" <?php if ('Paket A' == $tour->paket) {
                                                echo 'selected';
                                            } ?>>Paket A
                                            </option>
                                            <option value="Paket B" <?php if ('Paket B' == $tour->paket) {
                                                echo 'selected';
                                            } ?>>Paket B
                                            </option>
                                        </select>
                                        <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                        @if ($errors->has('paket'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('paket') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('durasi') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Durasi</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="durasi">
                                            <option disabled selected>-- Pilih Durasi --</option>
                                            <option value="2 Hari 1 Malam" <?php if ('2 Hari 1 Malam' == $tour->durasi) {
                                                echo 'selected';
                                            } ?>>2 Hari 1 Malam
                                            </option>
                                            <option value="3 Hari 2 Malam" <?php if ('3 Hari 2 Malam' == $tour->durasi) {
                                                echo 'selected';
                                            } ?>>3 Hari 2 Malam
                                            </option>
                                            <option value="4 Hari 3 Malam" <?php if ('4 Hari 3 Malam' == $tour->durasi) {
                                                echo 'selected';
                                            } ?>>4 Hari 3 Malam
                                            </option>
                                            <option value="5 Hari 4 Malam" <?php if ('5 Hari 4 Malam' == $tour->durasi) {
                                                echo 'selected';
                                            } ?>>5 Hari 4 Malam
                                            </option>
                                        </select>
                                        <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                        @if ($errors->has('durasi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('durasi') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Harga (Rp)</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="200000" value="{{$tour->harga}}"
                                               name="harga">
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('harga'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('harga') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <textarea name="keterangan"
                                                  class="form-control">{{$tour->keterangan}}</textarea>
                                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                        @if ($errors->has('keterangan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('keterangan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('fasilitas') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Fasilitas</label>
                                    <div class="col-sm-8">
                                        <textarea name="fasilitas" class="form-control">{{$tour->fasilitas}}</textarea>
                                        <span class="glyphicon glyphicon-king form-control-feedback"></span>
                                        @if ($errors->has('fasilitas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fasilitas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('transportasi') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Transportasi</label>
                                    <div class="col-sm-8">
                                        <textarea name="transportasi"
                                                  class="form-control">{{$tour->transportasi}}</textarea>
                                        <span class="fa fa-bus form-control-feedback"></span>
                                        @if ($errors->has('transportasi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('transportasi') }}</strong>
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
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-image"></i> &nbsp;Add Tour Picts</h3>
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
                            <form method="post" class="form-horizontal" action="{{url('admin/tourcontent/tourpict')}}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Gambar Slider Tour</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <label class="input-group-btn">
                                                    <span class="btn btn-info">
                                                        Browse&hellip;<input name="url" type="file"
                                                                             style="display: none;" required>
                                                    </span>
                                            </label>
                                            <input type="text" id="img_gallery"
                                                   class="form-control" required readonly>
                                        </div>
                                        <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                                        @if ($errors->has('url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('url') }}</strong>
                                            </span>
                                        @endif
                                        @if(session('file'))
                                            <span class="help-block">
                                                <strong>{{ session('file') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Caption</label>
                                    <div class="col-sm-8">
                                        <input placeholder="ex: GWK (Garuda Wisnu Kencana)" type="text" name="caption"
                                               class="form-control">
                                        <span class="fa fa-sticky-note form-control-feedback"></span>
                                        @if ($errors->has('caption'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('caption') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div style="visibility: hidden"
                                     class="form-group{{ $errors->has('tour_id') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">ID Tour</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tour_id" class="form-control" value="{{$tour->id}}">
                                        <span class="fa fa-building form-control-feedback"></span>
                                        @if ($errors->has('tour_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tour_id') }}</strong>
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