@extends('layouts.master')

@section('title', 'Ez Travel - Tour`s Form')

@section('content')
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cl-effect-11">
            <li><a data-hover="Kembali" href="/ez">Kembali</a></li>
            @if (Auth::guest())
                <li>
                    <a data-hover="Login/Register" href="{{ route('login') }}">
                        Login/Register
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a data-hover="{{Auth::user()->email}}" href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false" style="text-transform: lowercase">
                        {{ Auth::user()->email}} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{url('ez/member/'.Auth::user()->id.'/history')}}"><i
                                        class="fa fa-shopping-cart"></i> Riwayat Pemesanan</a>
                        </li>
                        <li>
                            <a href="{{url('ez/member/'.Auth::user()->id.'/edit')}}"><i class="fa fa-edit"></i> Edit
                                Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    </div><!-- /.container-fluid -->
    </nav>
    </div>
    </div>
    </div>
    </nav>
    <div class="content">
        <div class="promotions">
            <div class="container">
                <h3 class="tittle">Cek Pesanan Anda</h3>
                <span>Ez Travel - Tour</span>
                <center>
                    <div class="container" style="width: 51%">
                        <div class="progress-group">
                            <div class="wrapper">
                                <div class="step step01 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 01"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step02">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 02"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step03">
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 03"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step04 complete">
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 04"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step05">
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 05"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                            </div>
                            <div class="progress-labels">
                                <div class="label" style="color: black">Isi Data</div>
                                <div class="label" style="color: black">Review</div>
                                <div class="label" style="color: black">Pembayaran</div>
                                <div class="label" style="color: black">Proses</div>
                                <div class="label" style="color: black">E-Ticket</div>
                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <div class="w3-container col-md-12">
                    <div class="col-md-8">
                        <h2><i class="fa fa-user"></i> Identitas Diri</h2>
                        <div class="w3-panel w3-card"><br>
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><strong>{{$request->name}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>Alamat Email</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br><strong>{{$request->email}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>No. Telp/HP</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br><strong>{{$request->phone}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>Metode Pembayaran</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br>
                                        @if($request->payment_methods == "BCA" || $request->payment_methods == "Mandiri")
                                            <strong>Transfer {{$request->payment_methods}}</strong>
                                        @else
                                            <strong>Melalui {{$request->payment_methods}}</strong>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2><i class="fa fa-usd"></i> Rincian Harga</h2>
                        <div class="w3-panel w3-card-4"><br>
                            <?php
                            $harga = ($request->jml_orang) * ($request->total);
                            $dibayar = $harga - $bank;
                            if ($voucher == 'uas2016') {
                                $totvoucher = $harga / 10;
                                $rpvoucher = number_format($totvoucher, 2, ",", ".");
                            }
                            $rptotal = number_format($harga, 2, ",", ".");
                            $rpharga = number_format($request->total, 2, ",", ".");
                            $rpdibayar = number_format($dibayar, 2, ",", ".");
                            ?>
                            <table>
                                @if($voucher == 'uas2017')
                                    <tr>
                                        <td>Kode Voucher</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$voucher}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Harga Tour per Orang</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$rpharga}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Peserta</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$request->jml_orang}}</strong>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&nbsp;<strong>&times;</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4><strong>Harga yang Harus Dibayar</strong></h4></td>
                                        <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                        <td align="right"><h4><strong>Rp{{0}},-</strong>&nbsp;&nbsp;&nbsp;</h4></td>
                                    </tr>
                                @elseif($voucher == 'uas2016')
                                    <tr>
                                        <td>Kode Voucher</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$voucher}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Harga Tour per Orang</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$rpharga}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Peserta</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$request->jml_orang}}</strong>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&nbsp;<strong>&times;</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4><strong>Harga yang Harus Dibayar</strong></h4></td>
                                        <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                        <td align="right"><h4><strong>Rp{{$rpvoucher}}</strong>&nbsp;&nbsp;&nbsp;</h4>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>Harga Tour per Orang</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>Rp{{$rpharga}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Peserta</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>{{$request->jml_orang}}</strong>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&nbsp;<strong>&times;</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Harga</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right"><strong>Rp{{$rptotal}}</strong>&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unique Code</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td align="right">
                                            @if($request->payment_methods == "BCA" || $request->payment_methods == "Mandiri")
                                                <strong>Rp -{{$bank}}</strong>&nbsp;&nbsp;&nbsp;
                                            @else
                                                <strong>{{$non_bank}}</strong>&nbsp;&nbsp;&nbsp;
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td align="right">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&nbsp;<strong>&minus;</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h4><strong>Harga yang Harus Dibayar</strong></h4></td>
                                        <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                        <td align="right"><h4><strong>Rp{{$rpdibayar}}</strong>&nbsp;&nbsp;&nbsp;</h4>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <br>
                        <h2><i class="fa fa-tags"></i> Detail Pesanan</h2>
                        <div class="w3-panel w3-card">
                            <div class="col-md-14">
                                <div class="w3-panel w3-card-2 col-md-6">
                                    <table>
                                        <tr>
                                            <td><h4><strong>Nomor Pemesanan</strong></h4></td>
                                            <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                            @foreach($sql as $row)
                                                <?php
                                                $id = ($row->id) + 1;
                                                $kode = sprintf("%010d", $id)
                                                ?>
                                                <td><h4><strong>{{$kode}}</strong></h4></td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-10">
                                    <table>

                                        <tr>
                                            <td>Destinasi Tujuan</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->destination}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Keberangkatan</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->tgl_keberangkatan}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Peserta</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->jml_orang}} Orang</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Catatan Khusus</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            @if($request->catatan == "")
                                                <td>(kosong)</td>
                                            @else
                                                <td><strong>{{$request->catatan}}</strong></td>
                                            @endif
                                        </tr>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <h2><i class="fa fa-hand-o-right"></i> Tahap Selanjutnya</h2>
                        <div class="w3-panel w3-card-4"><br>
                            <div class="col-md-12 text-center">
                                <h3>Lanjut ke Pembayaran</h3>
                                <form class="form-horizontal" role="form" method="get" action="/ez/tour/payment">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="name" value="{{$request->name}}">
                                    <input type="hidden" name="payment_methods" value="{{$request->payment_methods}}">
                                    <input type="hidden" name="email" value="{{$request->email}}">
                                    <input type="hidden" name="phone" value="{{$request->phone}}">
                                    @if($voucher == 'uas2017')
                                        <input type="hidden" name="total" value="0">
                                    @elseif($voucher == 'uas2016')
                                        <input type="hidden" name="total" value="{{$totvoucher}}">
                                    @else
                                        <input type="hidden" name="total" value="{{$dibayar}}">
                                    @endif
                                    <input type="hidden" name="destination" value="{{$request->destination}}">
                                    <input type="hidden" name="tgl_keberangkatan"
                                           value="{{$request->tgl_keberangkatan}}">
                                    <input type="hidden" name="jml_orang" value="{{$request->jml_orang}}">
                                    <input type="hidden" name="catatan" value="{{$request->catatan}}">
                                    <input type="hidden" class="form-control" name="tipe_travel" value="{{$request->tipe_travel}}">
                                    <input type="hidden" name="now" value="{{$now}}">
                                    <br>
                                    <button title="Dengan mengklik tombol ini maka anda telah menyetujui syarat dan ketentuan yang berlaku."
                                            data-toggle="tooltip" data-placement="bottom" type="submit"
                                            class="btn btn-primary"><strong>PEMBAYARAN <i
                                                    class="fa fa-chevron-right"></i></strong></button>
                                    <script>
                                        $(document).ready(function () {
                                            $('[data-toggle="tooltip"]').tooltip();
                                        });
                                    </script>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        t1 = window.setTimeout(function () {
            alert("Sesi anda telah habis! Klik OK untuk mengulangi proses pemesanan.");
            window.location = "/ez";
        }, 1200000);
    </script>
@endsection
