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
                        <form name="tourdestination_searchForm" class="" id="tourdestination_searchForm" method="get"
                              onchange="form.submit()">
                            <div class="col-xs-3 form-group">
                                <label>Destinasi Kota</label>
                                <select class="form-control" name="kota" id="kota" required>
                                    <option disabled selected>-- Pilih Kota --</option>
                                    @foreach($city as $row)
                                        <option value="{{$row->id}}" <?php if ($row->id == $kota->id) {
                                            echo 'selected';
                                        } ?>>{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-3 form-group">
                                <button type="submit" class="btn btn-primary btn-block">CARI TOUR <i
                                            class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="promotions">
                <div class="container">
                    <h2 class="tittle">Hasil Pencarian</h2>
                    <span>Kota: {{$kota->name}}</span>
                    <div class="promotion-grids">
                        @foreach($sql as $row)
                            @if($row->city_id == $kota->id)
                                <div class="col-md-4 promation-grid">
                                    <div class="portfolio-item">
                                        <img src="{{asset('storage/tour/'.$row->url)}}" class="img-responsive"
                                             alt="Error"/>
                                        <div class="overlay">
                                            <a id="order" href="tour/{{$row->id}}/detail">
                                                <button class="button d-windows"><h5><strong>DETAIL</strong></h5>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="prom-text">
                                        <h4>{{$row->paket}}</h4>
                                        <div class="prom-bottom">
                                            <div class="prom-left">
                                                <h5> {{$row->durasi}} </h5>
                                            </div>
                                            <div class="prom-right">
                                                <?php $rupiah = number_format($row->harga, 2, ",", ".");?>
                                                <h5> Rp{{$rupiah}} / orang </h5>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <p><?php $sentence = "{$row->keterangan}"; $sentence = explode(" ", $sentence);
                                            for ($i = 0; $i < 14; $i++) {
                                                echo $sentence[$i] . " ";
                                            }
                                            ?>
                                            ...</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{--<div class="col-md-4 promation-grid">
                            <div class="portfolio-item">
                                <img src="/images/tour/question.gif" class="img-responsive" alt=""/>
                                <div class="overlay">
                                    <a id="order" href="#">
                                        <button class="button d-windows"><h5><strong>DETAIL</strong></h5></button>
                                    </a>
                                </div>
                            </div>
                            <div class="prom-text">
                                <h4>Request Paket</h4>
                                <div class="prom-bottom">
                                    <div class="prom-left">
                                        <h5> ? Hari ? Malam </h5>
                                    </div>
                                    <div class="prom-right">
                                        <h5> Rp ? / orang </h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <p>Dengan Request Paket ini anda dapat menentukan destinasi tour sesuai yang anda
                                    inginkan.</p>
                            </div>
                        </div>--}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
