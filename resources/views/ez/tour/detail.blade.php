@extends('layouts.master')

@section('title', 'Ez Travel - Tours')

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
                        {{ Auth::user()->email }} <span class="caret"></span>
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
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="search-form">
        <div class="container">
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tour" aria-controls="tour" role="tab"
                                                              data-toggle="tab">TOUR</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tour">
                        <form action="/ez/tour" class="" method="get" role="search">
                            <div class="col-xs-3 form-group">
                                <label>Destinasi Kota</label>
                                <select required class="form-control selectpicker" name="kota" id="destination"
                                        data-live-search="true">
                                    <option disabled selected>-- Pilih Kota --</option>
                                    @foreach($city as $row)
                                        <option value="{{$row->id}}" <?php if ($row->id == $tour->city_id) {
                                            echo 'selected';
                                        } ?>>{{$row->name}}</option>
                                    @endforeach
                                </select>
                                <span class="input-icon"><i class="fa fa-angle-down fa-lg"></i></span>
                            </div>
                            <div class="col-xs-3 form-group">
                                <button type="submit" class="btn btn-primary btn-block">CARI TOUR <i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="promotions">
            <div class="about-section" id="about">
                <div class="container">
                    @foreach($voucher as $row)
                        @if(Auth::user())
                            <h3 class="tittle">Selamat anda mendapatkan Voucher++! Untuk menggunakan voucher ini, anda
                                harus memasukkan kode berikut saat pengisian form:</h3>
                            <span><Strong style="text-transform: uppercase">Kode: {{$row->voucher}}</Strong></span>
                            <hr>
                        @endif
                    @endforeach
                    <h3 class="tittle">{{$tour->paket}}</h3>
                    <span>Kota: {{$tour->city->name}}</span>
                    <div class="about-grids">
                        <div class="col-md-6 about-grid">
                            <div class="content-carousel" id="beranda">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php $a = 0 ?>
                                        @foreach($sql as $row)
                                            @if($row->tour_id == $tour->id)
                                                <li data-target="#myCarousel" data-slide-to="{{$a++}}"></li>
                                            @endif
                                        @endforeach
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        @foreach($sql as $row)
                                            @if($row->tour_id == $tour->id)
                                                <div class="item">
                                                    <img src="{{asset('storage/tour/tourpict/'.$row->url)}}">
                                                    <div class="carousel-caption">
                                                        <h3>{{$row->caption}}</h3>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button"
                                       data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"
                                                      aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button"
                                       data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"
                                                      aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <script>
                                        $(document).ready(function (e) {
                                            $('.carousel-indicators:nth-child(1)').addClass('active');
                                            $('.item:nth-child(1)').addClass('active');
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 about-grid1">
                            <div class="about-top">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-road" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Rute Destinasi</h4>
                                    <p>{{$tour->keterangan}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="about-top1">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Fasilitas</h4>
                                    <p>{{$tour->fasilitas}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="about-top1">
                                <div class="about-left">
                                    <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                                </div>
                                <div class="about-right">
                                    <h4>Transportasi</h4>
                                    <p>{{$tour->transportasi}}</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div align="center" class="more m2">
                <a href="form" class="btn effect6">PILIH PAKET TOUR</a>
            </div>
        </div>
    </div>
@endsection