@extends('admin.panel.layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$ordertour}}</h3>
                            @if($ordertour > 1 )
                                <p>New Tour Orders</p>
                            @else
                                <p>New Tour Order</p>
                            @endif
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-globe"></i>
                        </div>
                        <a href="{{url('admin/tables#tour')}}" class="small-box-footer">Detail <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{$ordertravel}}</h3>
                            @if($ordertravel > 1 )
                                <p>New Travel Orders</p>
                            @else
                                <p>New Travel Order</p>
                            @endif
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-bus"></i>
                        </div>
                        <a href="{{url('admin/tables#travel')}}" class="small-box-footer">Detail <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$member}}</h3>
                            @if($member > 1 )
                                <p>New Members</p>
                            @else
                                <p>New Member</p>
                            @endif
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                        <a href="{{url('admin/tables#member')}}" class="small-box-footer">Detail <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$contact}}</h3>
                            <p>New Feedback</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{url('admin/tables#feedback')}}" class="small-box-footer">Detail <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-globe"></i>
                            <h3 class="box-title">Latest Tour Orders</h3>

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
                            <div class="table-responsive">
                                <table class="table no-margin table-hover">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Destination</th>
                                        <th>Departure</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tour as $row)
                                        <tr><?php $kode = sprintf("%010d", $row->id);?>
                                            <td>{{$kode}}</td>
                                            <td>{{$row->name}}</td>
                                            <td><span class="label label-info">{{$row->destination}}</span></td>
                                            <td>{{$row->tgl_keberangkatan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{url('admin/tables#tour')}}" class="btn btn-sm btn-info btn-flat pull-left">View
                                All
                                Tour Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-bus"></i>
                            <h3 class="box-title">Latest Travel Orders</h3>

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
                            <div class="table-responsive">
                                <table class="table no-margin table-hover">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Destination</th>
                                        <th>Departure</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($travel as $row)
                                        <tr><?php $kode = sprintf("%010d", $row->id);?>
                                            <td>{{$kode}}</td>
                                            <td>{{$row->name}}</td>
                                            <td><span class="label label-success">{{$row->asal}} <i
                                                            class="fa fa-long-arrow-right"></i> {{$row->tujuan}}</span>
                                            </td>
                                            <td>{{$row->tgl_keberangkatan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <a href="{{url('admin/tables#travel')}}" class="btn btn-sm btn-success btn-flat pull-right">View
                                All
                                Travel Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <i class="fa fa-globe"></i>
                            <h3 class="box-title">Recently Added Tour Contents</h3>

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
                            <ul class="products-list product-list-in-box">
                                @foreach($tourcontent as $row)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{asset('storage/tour/'.$row->url)}}" alt="Tour Image"/>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{url('admin/tourcontent/'.$row->id.'/edit#tourdetail')}}"
                                               class="product-title">{{$row->name}}
                                                &mdash; {{$row->paket}}
                                                <?php $rupiah = number_format($row->harga, 2, ",", ".");?>
                                                <span class="label label-info pull-right">Rp{{$rupiah}}
                                                    / orang</span></a>
                                            <span class="product-description">
                                                <?php $sentence = "{$row->keterangan}"; $sentence = explode(" ", $sentence);
                                                for ($i = 0; $i < 14; $i++) {
                                                    echo $sentence[$i] . " ";
                                                }
                                                ?>
                                                ...
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{url('admin/tourcontent#tour')}}" class="uppercase">View All Tour</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
