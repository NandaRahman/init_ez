@extends('layouts.master')

@section('title', 'Ez Travel - Travels')

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
    <br><br><br><br><br><br><br><br><br>
    <div class="search-form">

        <div class="content">
            <div class="promotions">
                <div class="container">
                    <h2 class="tittle">Hasil Pencarian</h2>
                    <h4 class="text-center">@if($tipe_travel == 'Sewa_Mobil') Sewa Mobil @else Transportasi Bandara @endif</h4>
                    <span style="text-transform: capitalize"><i class="fa fa-road"> <i
                                    class="fa fa-long-arrow-right"></i> </i> &nbsp;<i
                                class="fa fa-arrows-v"></i>&nbsp; @if(empty($tujuan)) {{$asal}} @else {{$tujuan}} @endif<i
                                class="fa fa-calendar"> {{$tgl_berangkat}}</i>
                    </span>
                    <div class="promotion-grids">
                        <div class="w3-container -align-center center-block">
                            <div class="w3-panel w3-card">
                                <br>
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
                                <table class="table table-responsive table-bordered table-hover" width="100%"
                                       id="example1" cellspacing="0">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>Kendaraan</th>
                                        <th>Kapasitas</th>
                                        <th>Harga</th>
                                        <th>Jumlah Tersedia</th>
                                        <th>Tautan</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($sql as $row)
                                        <tr>
                                            <td><strong><h3>{{$row->merk_mobil}}</h3></strong>
                                                <img height="150" src="{{asset("mobil")}}\{{$row->gambar_mobil}}" alt="{{asset("mobil")}}\{{$row->gambar_mobil}}">
                                            </td>
                                            <td>
                                                <span class="fa fa-bus"></span>
                                                <strong><h4>{{$row->jenis_kendaraan}}</h4></strong>
                                                Max. {{$row->kapasitas_mobil}} Penumpang
                                            </td>
                                            <?php $rupiah = number_format($row->harga_mobil, 2, ",", ".");?>
                                            <td>Rp{{$rupiah}}</td>
                                            <td>{{$row->available_car()}}</td>
                                            <td>
                                                @if($row->available_car() > 0 )
                                                    <form role="form" method="get" action="/ez/travel/{{$row->id}}/form">
                                                        <input type="hidden" name="car_id" value="{{$row->id}}">
                                                        <input type="hidden" name="nama" value="{{$row->merk_mobil}}">
                                                        <input type="hidden" name="harga" value="{{$row->harga_mobil}}">
                                                        <input type="hidden" name="jenis_kendaraan" value="mobil">
                                                        <input type="hidden" name="kapasitas" value="{{$row->kapasitas_mobil}}">
                                                        <button type="submit" class="btn btn-primary"  >Pilih</button>
                                                    </form>
                                                @else
                                                    <div class="alert alert-warning">Not Available</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="bg-primary">
                                        <th>Kendaraan</th>
                                        <th>Kapasitas</th>
                                        <th>Harga</th>
                                        <th>Jumlah Tersedia</th>
                                        <th>Tautan</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
