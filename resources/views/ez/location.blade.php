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
                <h3 class="tittle">Our Location</h3>
                <span>{{$location->name}}</span>
                <hr>
                <style>
                    #map-canvas {
                        height: 300px;
                        width: 100%;
                    }

                    .controls {
                        margin-top: 10px;
                        border: 1px solid transparent;
                        border-radius: 4px;
                        box-sizing: border-box;
                        -moz-box-sizing: border-box;
                        height: 32px;
                        outline: none;
                        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                        visibility: hidden;
                    }
                </style>
                <div class="col-md-12">
                    <form id="pac-input" class="col-lg-3" method="get">
                        <div class="input-group">
                            <input class="form-control controls" id="dest" type="text" name="address"
                                   placeholder="Start type here..." value="{{$location->address}}">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary controls">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12">

                        <div id="map-canvas" style="position: relative; overflow: hidden"></div>
                        <script>
                            var dest;
                            var directionsDisplay;

                            // memanggil service Google Maps Direction
                            var directionsService = new google.maps.DirectionsService();
                            directionsDisplay = new google.maps.DirectionsRenderer();

                            $(document).ready(function () {
                                var myOptions = {
                                    zoom: 4,
                                    center: new google.maps.LatLng(-2.548926, 118.0148634),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                };

                                // posisi awal ketika halaman pertama kali dimuat
                                var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

                                // memanggil fungsi geocoder autocomplete
                                var autocomplete = new google.maps.places.Autocomplete((document.getElementById('dest')), {types: ['geocode']});

                                /*
                                 fungsi geolocation pada geocoder ini sangat penting
                                 agar pencarian daerah tujuan pada textbox ga ngaco
                                 */
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function (position) {
                                        var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                                        autocomplete.setBounds(new google.maps.LatLngBounds(geolocation, geolocation));
                                    });
                                }

                            });

                            $(document).ready(function () {
                                // ketika tombol cari di klik, maka proses pencarian rute dimulai

                                dest = $("#dest").val();

                                var defaultLatLng = new google.maps.LatLng(-2.548926, 118.0148634);

                                /*
                                 nah, pada fungsi geolocation disini adalah
                                 ketika koordinat user berhasil didapat maka peta koordinat yang digunakan
                                 adalah koordinat user, namun jika tidak berhasil maka koordinat yang digunakan
                                 adalah koordinat default (pada variable defaultLatLng)
                                 */
                                if (navigator.geolocation) {
                                    function success(pos) {
                                        drawMap(pos.coords.latitude, pos.coords.longitude);
                                    }

                                    function fail(error) {
                                        drawMap(defaultLatLng);
                                    }

                                    navigator.geolocation.getCurrentPosition(success, fail, {
                                        maximumAge: 500000,
                                        enableHighAccuracy: true,
                                        timeout: 6000
                                    });

                                } else {
                                    drawMap(defaultLatLng);
                                }

                                function drawMap(lat, lng) {

                                    var myOptions = {
                                        zoom: 15,
                                        center: new google.maps.LatLng(lat, lng),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };

                                    var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
                                    var input = document.getElementById('pac-input');
                                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                    // kita bikin marker untuk asal dengan koordinat user hasil dari geolocation
                                    var markerorigin = new google.maps.Marker({
                                        position: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                                        map: map,
                                        title: "Origin",
                                        visible: false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
                                    });

                                    // membuat request ke Direction Service
                                    var request = {
                                        origin: markerorigin.getPosition(), // untuk daerah asal, kita ambil posisi user
                                        destination: dest, // untuk daerah tujuan, kita ambil value dari textbox tujuan
                                        provideRouteAlternatives: true, // set true, karena kita ingin menampilkan rute alternatif

                                        /**
                                         * kamu bisa tambahkan opsi yang lain seperti
                                         * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
                                         * atau kamu bisa juga menambahkan opsi seperti
                                         * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
                                         */
                                        travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
                                        /**
                                         * kamu bisa ganti dengan
                                         * google.maps.TravelMode.BICYCLING (mode bersepeda)
                                         * google.maps.TravelMode.WALKING (mode berjalan)
                                         * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
                                         */
                                    };


                                    directionsService.route(request, function (response, status) {
                                        if (status == google.maps.DirectionsStatus.OK) {
                                            directionsDisplay.setDirections(response);
                                        }
                                    });
                                    // menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
                                    directionsDisplay.setMap(map);
                                    directionsDisplay.setPanel(document.getElementById('directions-panel'));

                                    // menampilkan layer traffic atau lalu-lintas pada peta
                                    var trafficLayer = new google.maps.TrafficLayer();
                                    trafficLayer.setMap(map);

                                }
                            });
                        </script>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <div id="directions-panel" style="position: relative; overflow: hidden;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
