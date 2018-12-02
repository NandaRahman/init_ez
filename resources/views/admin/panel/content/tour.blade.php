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
                <li><a href="{{url('admin/tourcontent')}}">Tables</a></li>
                <li class="active">Tour Tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info" id="tour">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-globe"></i> &nbsp;All Tour Contents</h3>
                            <div class="box-tools pull-right">
                                <a href="#addtour">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-plus"></i> ADD TOUR</strong>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-trash"></i> Alert!</h4>
                                {{session('status')}}
                            </div>
                        @elseif(session('add'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('add')}}
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
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Paket</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tourcontent as $row)
                                    <tr><?php $rupiah = number_format($row->harga, 2, ",", ".")?>
                                        <td>{{$row->id}}</td>
                                        <td><img width="50%" src="{{asset('storage/tour/'.$row->url)}}"
                                                 class="img-responsive"
                                                 alt="Error"/>
                                        </td>
                                        <td>{{$row->name.', '.$row->paket}}</td>
                                        <td>{{$row->durasi}}</td>
                                        <td>Rp{{$rupiah}}</td>
                                        <td>
                                            @if($row->status==1)
                                                BUKA<br/><a href="{{url('admin/tourcontent/'.$row->id.'/status/0')}}"><button class="btn btn-danger"><i class="fa fa-check"></i> TUTUP</button></a>
                                            @else
                                                TUTUP<br/><a href="{{url('admin/tourcontent/'.$row->id.'/status/1')}}"><button class="btn btn-success"><i class="fa fa-check"></i> BUKA</button></a>
                                            @endif
                                        </td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                            <a href="{{url('admin/tourcontent/'.$row->id.'/edit#tour')}}">
                                                <button class="btn btn-warning">
                                                    <i class="fa fa-edit" data-toggle="tooltip"
                                                       title="EDIT"></i>
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Are you sure wanna delete {{$row->name.', '.$row->paket}} ?')"
                                               href="{{url('admin/tourcontent/'.$row->id.'/delete')}}">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash" data-toggle="tooltip"
                                                       title="DELETE"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Gambar</th>
                                    <th>Paket</th>
                                    <th>Durasi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box box-primary" id="addtour">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plus-circle"></i> &nbsp;Add Tour Content</h3>
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
                            <form method="post" class="form-horizontal" action="{{url('admin/tourcontent/adds')}}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Gambar</label>
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
                                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Kota</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="city_id" required>
                                            <option value="" disabled selected>-- Pilih Kota --</option>
                                            @foreach($city as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
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
                                        <select class="form-control" name="paket" required>
                                            <option value="" disabled selected>-- Pilih Paket --</option>
                                            <option value="Paket A">Paket A</option>
                                            <option value="Paket B">Paket B</option>
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
                                        <select class="form-control" name="durasi" required>
                                            <option value="" disabled selected>-- Pilih Durasi --</option>
                                            <option value="2 Hari 1 Malam">2 Hari 1 Malam</option>
                                            <option value="3 Hari 2 Malam">3 Hari 2 Malam</option>
                                            <option value="4 Hari 3 Malam">4 Hari 3 Malam</option>
                                            <option value="5 Hari 4 Malam">5 Hari 4 Malam</option>
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
                                        <input class="form-control" type="number" min="200000" name="harga" required>
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
                                        <textarea name="keterangan" class="form-control" required></textarea>
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
                                        <textarea name="fasilitas" class="form-control" required></textarea>
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
                                        <textarea name="transportasi" class="form-control" required></textarea>
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
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection