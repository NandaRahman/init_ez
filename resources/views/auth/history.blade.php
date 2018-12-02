@extends('layouts.masterlogreg')

@section('title', 'Ez Travel - Riwayat Pemesanan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Riwayat Pemesanan Anda</h2>
                <div class="w3-container -align-center center-block">
                    <div class="w3-panel w3-card">
                        <div style="height: 25px; border-bottom: 1px solid rgba(0,0,0,0.1); text-align: center">
                            <span style="font-size: 28px; background-color: #FFFFFF; padding: 0 10px;">TOUR</span>
                        </div>
                        <br>
                        <style>
                            #example1 th {
                                text-align: center;
                                vertical-align: middle;
                            }

                            #example1 td {
                                text-align: center;
                                vertical-align: middle;
                            }
                        </style>
                        <div class="text-right">
                            @if($tourorder > 0)
                                <a target="_blank" href="{{url('ez/member/history/cetaktour')}}">
                                    <button data-toggle="tooltip" title="Cetak Riwayat Pemesanan Tour"
                                            class="btn btn-info">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </a>
                            @else
                                <a>
                                    <button onclick="return alert('Belum ada riwayat pemesanan tour. Silahkan melakukan pemesanan.')"
                                            data-toggle="tooltip"
                                            title="Cetak Riwayat Pemesanan Tour"
                                            class="btn btn-info">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                        <br>
                        <table class="table table-responsive table-bordered table-hover" width="100%"
                               id="example1" cellspacing="0">
                            <thead>
                            <tr class="bg-primary">
                                <th>Kode Booking</th>
                                <th>Customer</th>
                                <th>Destinasi</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Jumlah Peserta</th>
                                <th>Total Pembayaran</th>
                                <th>Catatan</th>
                                <th>Due_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tour as $row)
                                @if($row->email == Auth::user()->email)
                                    <tr>
                                        <?php
                                        $id = ($row->id) + 1;
                                        $kode = sprintf("%010d", $id);
                                        $rupiah = number_format($row->total, 2, ",", ".");
                                        ?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->destination}}</td>
                                        <td>{{$row->tgl_keberangkatan}}</td>
                                        <td>{{$row->jml_orang}}</td>
                                        <td>Rp{{$rupiah}}</td>
                                        <td>{{$row->catatan}}</td>
                                        <td>{{$row->updated_at}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="bg-primary">
                                <th>Kode Booking</th>
                                <th>Customer</th>
                                <th>Destinasi</th>
                                <th>Tanggal Keberangkatan</th>
                                <th>Jumlah Peserta</th>
                                <th>Total Pembayaran</th>
                                <th>Catatan</th>
                                <th>Due_at</th>
                            </tr>
                            </tfoot>
                        </table>
                        <br>
                        <div style="height: 25px; border-bottom: 1px solid rgba(0,0,0,0.1); text-align: center">
                            <span style="font-size: 28px; background-color: #FFFFFF; padding: 0 10px;">TRAVEL</span>
                        </div>
                        <br>
                        <style>
                            #example2 th {
                                text-align: center;
                                vertical-align: middle;
                            }

                            #example2 td {
                                text-align: center;
                                vertical-align: middle;
                            }
                        </style>
                        <div class="text-right">
                            @if($travelorder > 0)
                                <a target="_blank" href="{{url('ez/member/history/cetaktravel')}}">
                                    <button data-toggle="tooltip" title="Cetak Riwayat Pemesanan Travel"
                                            class="btn btn-info">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </a>
                            @else
                                <a>
                                    <button onclick="return alert('Belum ada riwayat pemesanan travel. Silahkan melakukan pemesanan.')"
                                            data-toggle="tooltip"
                                            title="Cetak Riwayat Pemesanan Travel"
                                            class="btn btn-info">
                                        <i class="fa fa-print"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                        <br>
                        <script>
                            $(document).ready(function () {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>
                        <table class="table table-responsive table-bordered table-hover" width="100%"
                               id="example2" cellspacing="0">
                            <thead>
                            <tr class="bg-primary">
                                <th>Kode Booking</th>
                                <th>Customer</th>
                                <th>Operator</th>
                                <th>Keberangkatan</th>
                                <th>Kedatangan</th>
                                <th>Jumlah Penumpang</th>
                                <th>Total Pembayaran</th>
                                <th>Catatan</th>
                                <th>Due_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($travel as $row)
                                @if($row->email == Auth::user()->email)
                                    <tr>
                                        <?php
                                        $id = ($row->id) + 1;
                                        $kode = sprintf("%010d", $id);
                                        $rupiah = number_format($row->total, 2, ",", ".");
                                        ?>
                                        <td>{{$kode}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            <strong><h3>{{$row->operator}}</h3></strong>
                                            <strong><h4>{{$row->jenis_kendaraan}}</h4></strong>
                                            {{$row->no_pol}}<br>
                                        </td>
                                        <td>
                                            {{$row->tgl_keberangkatan}}<br>
                                            <strong><h3>{{$row->jadwal_keberangkatan}}</h3></strong>
                                            <strong><h4>{{$row->asal}}</h4></strong>
                                        </td>
                                        <td>{{$row->tgl_datang}}<br>
                                            <strong><h3>{{$row->jadwal_datang}}</h3></strong>
                                            <strong><h4>{{$row->tujuan}}</h4></strong></td>
                                        <td>{{$row->jml_orang}}</td>
                                        <td>Rp{{$rupiah}}</td>
                                        <td>{{$row->note}}</td>
                                        <td>{{$row->updated_at}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="bg-primary">
                                <th>Kode Booking</th>
                                <th>Customer</th>
                                <th>Operator</th>
                                <th>Keberangkatan</th>
                                <th>Kedatangan</th>
                                <th>Jumlah Penumpang</th>
                                <th>Total Pembayaran</th>
                                <th>Catatan</th>
                                <th>Due_at</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $("#example2").DataTable();
            /*$("#example1").DataTable({
             "paging": false,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": false,
             "autoWidth": false
             });*/
        });
    </script>
@endsection
