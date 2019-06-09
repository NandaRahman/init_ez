@extends('admin.panel.layouts.mtables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>Tour and Travel Orders</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('admin.table')}}">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info" id="tour">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-globe"></i> &nbsp;All Tour Orders</h3>
                            <div class="box-tools pull-right">
                                <a target="_blank" href="{{url('admin/tablestour/print')}}">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-print"></i> PRINT ALL</strong>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @if(session('tour'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('tour')}}
                            </div>
                    @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Name</th>
                                    <th>Email/Phone</th>
                                    <th>Destination</th>
                                    <th>Departure</th>
                                    <th>Paid</th>
                                    <th>Note</th>
                                    <th>Due_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tour as $row)
                                    <tr><?php $kode = sprintf("%010d", $row->id);
                                        $rupiah = number_format($row->total, 2, ",", ".")?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}<br>{{$row->phone}}</td>
                                        <td>{{$row->destination}}</td>
                                        <td>{{$row->tgl_keberangkatan}}</td>
                                        <td>Rp{{$rupiah}}</td>
                                        @if($row->catatan == null)
                                            <td>-</td>
                                        @else
                                            <td>{{$row->catatan}}</td>
                                        @endif
                                        <td>{{$row->updated_at}}</td>
                                        <td style="text-align: center">
                                            <a onclick="return confirm('Are you sure wanna delete this tour order from {{$row->name}} ?')"
                                               href="{{url('admin/tablestour/'.$row->id.'/delete')}}"
                                               data-toggle="tooltip" title="DELETE">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Name</th>
                                    <th>Email/Phone</th>
                                    <th>Destination</th>
                                    <th>Departure</th>
                                    <th>Paid</th>
                                    <th>Note</th>
                                    <th>Due_at</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-success" id="travel">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-bus"></i> &nbsp;All Travel Orders</h3>
                            <div class="box-tools pull-right">
                                <a target="_blank" href="{{url('admin/tablestravel/print')}}">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-print"></i> PRINT ALL</strong>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @if(session('travel'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('travel')}}
                            </div>
                    @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Tipe</th>
                                    <th>Name</th>
                                    <th>Email/Phone</th>
                                    <th>Operator</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Paid</th>
                                    <th>Driver</th>
                                    <th>Note</th>
                                    <th>Due_at</th>
                                    <th>Status</th>
                                    <th>Over</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($travel as $row)
                                    <tr><?php $kode = sprintf("%010d", $row->id);
                                        $rupiah = number_format($row->total, 2, ",", ".")?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->tipe_travel}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}<br>{{$row->handphone}}</td>
                                        <td>{{$row->operator}}<br>{{$row->jenis_kendaraan}}</td>
                                        <td>

                                            {{(!empty($row->asal)?$row->asal:$row->nama_bandara).' ('.$row->tgl_keberangkatan.' &mdash; '.$row->jadwal_keberangkatan.')'}}
                                        </td>
                                        <td>{{$row->tujuan.' ('.$row->tgl_datang.' &mdash; '.$row->jadwal_datang.')'}}</td>
                                        <td>Rp{{$rupiah}}</td>
                                        <td>
                                            <?php
                                            if ($row->tipe_travel=="Sewa_Mobil"){
                                                $driver = \App\driver::find($row->driver_id);
                                                if (!empty($driver)) echo $driver->name;
                                                else echo "Tidak Ada";
                                            }else{
                                                echo "N/A";
                                            }
                                            ?>

                                        </td>
                                        @if($row->note == null)
                                            <td>-</td>
                                        @else
                                            <td>{{$row->note}}</td>
                                        @endif
                                        <td>{{$row->updated_at}}</td>
                                        <td>@if($row->status==1)Sudah Kembali @else Disewa<br/><a href="{{url('admin/tablestravel/'.$row->id.'/status')}}"><button class="btn btn-success"><i class="fa fa-check"></i> Kembali</button></a> @endif</td>
                                        <td>
                                            <?php
                                                if ($row->status==1){
                                                    $over = \App\overtime::where("travelform_id",$row->id)->first();
                                                    if (!empty($over)) echo  $over->total_overtime." hours<br/>".$over->must_paid." rupiah";
                                                    else echo "Tepat Waktu";
                                                }else{
                                                    echo "N/A";
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <a onclick="return confirm('Are you sure wanna delete this travel order from {{$row->name}} ?')"
                                               href="{{url('admin/tablestravel/'.$row->id.'/delete')}}"
                                               data-toggle="tooltip" title="DELETE">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>OrderID</th>
                                    <th>Name</th>
                                    <th>Email/Phone</th>
                                    <th>Operator</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Paid</th>
                                    <th>Driver</th>
                                    <th>Note</th>
                                    <th>Due_at</th>
                                    <th>Status</th>
                                    <th>Over</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-warning" id="member">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-users"></i> &nbsp;All Member Joined</h3>
                            <div class="box-tools pull-right">
                                <a target="_blank" href="{{url('admin/tablesmember/print')}}">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-print"></i> PRINT ALL</strong>
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
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('status')}}
                            </div>
                    @endif
                    <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example3" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>MemberID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Joined_at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $row)
                                    <tr><?php $kode = sprintf("%05d", $row->id); ?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->lastname}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->updated_at}}</td>
                                        @if(is_null($row->deleted_at))
                                            <td><span class="label label-success">Active</span></td>
                                        @else
                                            <td><span class="label label-danger">Banned</span></td>
                                        @endif
                                        <td style="text-align: center">
                                            @if(is_null($row->deleted_at))
                                                <a onclick="return confirm('Are you sure wanna ban {{$row->name.' '.$row->lastname}} ?')"
                                                   href="{{url('admin/tablesmember/'.$row->id.'/banned')}}"
                                                   data-toggle="tooltip" title="BANNED">
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-ban"></i>
                                                    </button>
                                                </a>
                                                <a>
                                                    <button class="btn btn-warning" disabled>
                                                        <i class="fa fa-refresh" data-toggle="tooltip"
                                                           title="RESTORE"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a>
                                                    <button class="btn btn-danger" disabled>
                                                        <i class="fa fa-ban" data-toggle="tooltip" title="BANNED"></i>
                                                    </button>
                                                </a>
                                                <a onclick="return confirm('Are you sure wanna restore {{$row->name.' '.$row->lastname}} ?')"
                                                   data-toggle="tooltip" title="RESTORE"
                                                   href="{{url('admin/tablesmember/'.$row->id.'/restore')}}">
                                                    <button class="btn btn-warning">
                                                        <i class="fa fa-refresh"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>MemberID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Joined_at</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-danger" id="feedback">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-comments"></i> &nbsp;All Feedback Received</h3>
                            <div class="box-tools pull-right">
                                <a target="_blank" href="{{url('admin/tablesfeedback/print')}}">
                                    <button type="button" class="btn btn-box-tool">
                                        <strong><i class="fa fa-print"></i> PRINT ALL</strong>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @if(session('feedback'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('feedback')}}
                            </div>
                    @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example4" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Messages</th>
                                    <th>Sended_at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $row)
                                    <tr><?php $kode = sprintf("%05d", $row->id); ?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->message}}</td>
                                        <td>{{$row->created_at.' &mdash; '.$row->updated_at}}</td>
                                        <td style="text-align: center;">
                                            <a onclick="return confirm('Are you sure wanna delete this feedback from {{$row->name}} ?')"
                                               href="{{url('admin/tablesfeedback/'.$row->id.'/delete')}}"
                                               data-toggle="tooltip" title="DELETE">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Messages</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
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
    <style>

    </style>
@endsection