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
                <h3 class="tittle">E-Ticket Anda</h3>
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
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 03"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step04 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 04"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step05">
                                    <progress class="progress" value="100" max="100"
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
                <div class="w3-container">
                    <div class="col-md-8">
                        <h2><i class="fa fa-ticket"></i> Detail E-Ticket</h2>
                        <div class="w3-panel w3-card"><br>
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <td>Kode Booking</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <?php $kode = sprintf("%010d", $tourform->id) ?>
                                        <td><strong>{{$kode}}</strong></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td>Destinasi</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>{{$tourform->destination}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>{{$tourform->name}}</strong></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Keberangkatan</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>{{$tourform->tgl_keberangkatan}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Peserta</td>
                                        <td>&nbsp;:&nbsp;&nbsp;</td>
                                        <td><strong>{{$tourform->jml_orang}} Orang</strong></td>
                                    </tr>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2>&nbsp;</h2>
                        <div class="w3-panel w3-card-4"><br>
                            <div class="col-md-12 text-center">
                                <h3>Cetak E-Ticket Anda</h3>
                                <br>
                                <a target="_blank" href="{{url('ez/tour/'.$tourform->id.'/cetak')}}">
                                    <button title="Klik tombol ini untuk mencetak E-Ticket anda."
                                            data-toggle="tooltip" data-placement="bottom" type="submit"
                                            class="btn btn-primary"><strong><i
                                                    class="fa fa-print"></i> CETAK</strong></button>
                                </a>
                                <a href="{{url('ez/tour/'.$tourform->id.'/download')}}">
                                    <button title="Klik tombol ini untuk mendownload E-Ticket anda."
                                            data-toggle="tooltip" data-placement="bottom" type="submit"
                                            class="btn btn-primary"><strong><i
                                                    class="fa fa-download"></i> PDF</strong></button>
                                </a>
                                <script>
                                    $(document).ready(function () {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });
                                </script>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <h1>&nbsp;</h1>
                <h1>&nbsp;</h1>
                <h1>&nbsp;</h1>
            </div>
        </div>
    </div>
@endsection
