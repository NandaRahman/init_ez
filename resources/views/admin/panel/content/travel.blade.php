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
                    <div class="box box-success" id="travel">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bus"></i> &nbsp;All Car Contents</h3>
                            <div class="box-tools pull-right">
                                <a href="#addtravel">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-plus"></i> ADD TRAVEL CAR</strong>
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
                        @endif
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Merk</th>
                                    <th>Nopol</th>
                                    <th>Kapasitas</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($travelcontent as $row)
                                    <tr><?php $rupiah = number_format($row->harga, 2, ",", ".")?>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->merk_mobil}}</td>
                                        <td>{{$row->nopol_mobil}}</td>
                                        <td>{{$row->kapasitas_mobil}}</td>
                                        <td>{{$row->harga_mobil}}</td>
                                        <td>@if(!empty($row->gambar_mobil)) {{$row->gambar_mobil}} @else Tidak Ada @endif</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure wanna delete {{$row->nama}} ?')"
                                               href="{{url('admin/travelcontent/'.$row->id.'/delete')}}">
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
                                    <th>Operator</th>
                                    <th>Type</th>
                                    <th>Keberangkatan</th>
                                    <th>Kedatangan</th>
                                    <th>Harga</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-success" id="addtravel">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plus-square"></i> &nbsp;Add Travel Content</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{url('admin/travelcontent/adds')}}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('merk_mobil') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Car Types</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" min="1" name="merk_mobil" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('harga_mobil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('harga_mobil') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('nopol_mobil') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Car License Plate</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" min="1" name="nopol_mobil" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('nopol_mobil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nopol_mobil') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('kapasitas_mobil') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Car Capacity</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="1" name="kapasitas_mobil" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('kapasitas_mobil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('kapasitas_mobil') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('harga_mobil') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Car Price</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" min="1" name="harga_mobil" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('harga_mobil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('harga_mobil') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('gambar_mobil') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Car Image</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" min="1" name="gambar_mobil" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('gambar_mobil'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gambar_mobil') }}</strong>
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


            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success" id="driver">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bus"></i> &nbsp;All Drivers</h3>
                            <div class="box-tools pull-right">
                                <a href="#adddriver">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-plus"></i> ADD DRIVER</strong>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                        @endif
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($drivers))
                                    @foreach($drivers as $row)
                                        <tr><?php $rupiah = number_format($row->harga, 2, ",", ".")?>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>
                                                <a onclick="return confirm('Are you sure wanna delete {{$row->nama}} ?')"
                                                   href="{{url('admin/driver/'.$row->id.'/delete')}}">
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash" data-toggle="tooltip"
                                                           title="DELETE"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-success" id="adddriver">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-plus-square"></i> &nbsp;Add Driver</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.driver.add')}}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" min="1" name="name" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" min="1" name="phone" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} has-feedback">
                                    <label for="inputName" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="address" required>
                                        <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
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

        </section>
        <!-- /.content -->
    </div>
@endsection