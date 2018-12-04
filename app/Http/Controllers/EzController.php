<?php

namespace App\Http\Controllers;

use App\City;
use App\contact;
use App\car;
use App\driver;
use App\Http\Requests;
use App\Libs\TransferPayment;
use App\Marker;
use App\Tour;
use App\tourform;

use App\travel;
use App\travelform;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EzController extends Controller
{
    public function index()
    {
        $ez = City::all();
        $data = [
            'city' => $ez
        ];
        $location = DB::table('markers')->get();
        $sql = DB::table('tours')->select('cities.name', 'tours.id', 'tours.paket', 'tours.durasi', 'tours.harga', 'tours.keterangan', 'tours.url')->leftjoin('cities', 'tours.city_id', '=', 'cities.id')->where('tours.status',1)->get();
        $bandara = DB::table('bandaras')->get();
//        dd($bandara);
        return view('ez/home', $data, compact('sql', 'location', 'bandara'));
    }

    public function contact(Request $request)
    {
        contact::create($request->all());
        return redirect('/ez');
    }

    public function location(Marker $location)
    {
        return view('ez/location', compact('location'));
    }

    public function showtour()
    {
        $ez = City::all();
        $data = [
            'city' => $ez
        ];
        $sql = DB::table('tours')->where('tours.status',1)->get();
        $kotaID = Input::get('kota');
        $kota = City::find($kotaID);
        return view('ez/tour/tour', $data, compact('sql', 'kota'));
    }

    public function showtourdetail(Tour $tour)
    {
        $ez = City::all();
        $data = [
            'city' => $ez
        ];
        $sql = DB::table('tourpicts')->select('tourpicts.url', 'tourpicts.caption', 'tours.id', 'tourpicts.tour_id')->leftjoin('tours', 'tourpicts.tour_id', '=', 'tours.id')->get();
        $voucher = DB::table('vouchers')->orderby('id', 'desc')->limit(1)->get();
        return view('ez/tour/detail', $data, compact('tour', 'sql', 'voucher'));
    }

    public function showTourForm(Tour $tour, Request $request)
    {
        $ez = City::all();
        $data = [
            'city' => $ez
        ];
        $request->all();
        return view('ez/tour/form', $data, compact('tour'));
    }

    public function showReviewTourForm(Request $request)
    {
        $bank = transferPayment::bankPayment();
        $non_bank = transferPayment::non_bankPayment();

        $voucher = Input::get('voucher');
        $now = date("Y-m-d h:i:s");
        $request->all();
        $sql = DB::table('tourforms')->ORDERBY('id', 'desc')->LIMIT(1)->get();
        return view('ez/tour/review', compact('request', 'sql', 'now', 'voucher', 'bank', 'non_bank'));
    }

    public function showPaymentTourForm(Request $request)
    {
        $sekarang = $request->now;
        $request->all();
        $non_bank = transferPayment::non_bankPayment();
        return view('ez/tour/payment', compact('request', 'sekarang', 'non_bank'));
    }

    public function tourstore(Request $request)
    {
        tourform::create($request->all());
        return redirect('ez/tour/process');
    }

    public function showProcessTourForm()
    {
        $sql = DB::table('tourforms')->ORDERBY('id', 'desc')->LIMIT(1)->get();
        return view('ez/tour/proses', compact('sql'));
    }

    public function eticket(tourform $tourform)
    {
        return view('ez/tour/report', compact('tourform'));
    }

    public function cetakTour(tourform $tourform)
    {
        return view('ez/tour/cetak', compact('tourform'));
    }

    public function downloadPDFTicketTour(tourform $tourform)
    {
        $kode = sprintf("%010d", $tourform->id);
        $html = '<div>
<center><img style="width: 10%; length: 10%;"  src="https://i.imgur.com/UHp7uVR.png"></center>
<center><h2 class="tittle" style="color: #49c2f5">EZ Travel</h2>
    <span style="color: #49c2f5">Ez Travel - Easier to Get Travel!</span><hr><br></center>
</div>

<div>
    <h3>E-ticket Receipt</h3><hr><br>
</div>
<table>
    <tr>
        <td>Kode Booking</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td style="color: #49c2f5 ;"><strong>' . $kode . '</strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    </tr>
    <tr>
        <td>Destinasi</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $tourform->destination . '</strong></td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $tourform->name . '</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>Tanggal Keberangkatan</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $tourform->tgl_keberangkatan . '</strong></td>
    </tr>
    <tr>
        <td>Jumlah Peserta</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $tourform->jml_orang . ' Orang</strong></td>
    </tr>
</table>

<br><hr><br>

<p style="color:grey ">Mohon simpan e-tiket ini baik-baik sebagai tanda bukti transaksi anda bersama EZ Travel</p>';
        $pdf = PDF::loadHTML($html);
        return $pdf->download('TourTicket_' . $tourform->name . '_' . $tourform->tgl_keberangkatan . '.pdf');
    }

    public function showTravel(Request $request)
    {
        $asal = Input::get('asal'); // ini diambil dari input form(sesuaikan dengan 'name')
        $nama_bandara = Input::get('nama_bandara');
        $tgl_berangkat = Input::get('tgl_berangkat');
        $tujuan = Input::get('tujuan');
        $tipe_travel = Input::get('tipe_travel');
        session([
            "asal"=>$asal,
            "tgl_berangkat"=>$tgl_berangkat,
            "tujuan"=>$tujuan,
            "tipe_travel"=>$tipe_travel,
            "nama_bandara"=>$nama_bandara
        ]);
        $sql = car::get();
        return view('ez/travel/travel', compact('sql', 'asal', 'tgl_berangkat', 'tipe_travel','tujuan'));
    }

    public function showTravelForm(Request $request)
    {
        $travel = json_decode(json_encode($request->all()+[
                "asal"=>session('asal'),
                "tgl_berangkat"=>session('tgl_berangkat'),
                "tujuan"=>session('tujuan'),
                "tipe_travel"=>session('tipe_travel'),
                "nama_bandara"=>session('nama_bandara')
            ]));
        $drivers = driver::all();
        return view('ez/travel/form', compact("travel","drivers"));
    }

    public function showReviewTravelForm(Request $request)
    {
        $bank = transferPayment::bankPayment();
        $non_bank = transferPayment::non_bankPayment();

        $earlier = new \DateTime($request->tgl_berangkat);
        $later = new \DateTime($request->tgl_datang);
        $diff = $later->diff($earlier)->format("%a");
        $now = date("Y-m-d h:i:s");
        $durasi = ++$diff;
        $sql = DB::table('travelforms')->ORDERBY('id', 'desc')->LIMIT(1)->get();
        return view('ez/travel/review', compact('request', 'sql', 'now','durasi', 'bank', 'non_bank'));
    }

    public function showPaymentTravelForm(Request $request)
    {
        $bank = transferPayment::bankPayment();
        $non_bank = transferPayment::non_bankPayment();

        $sekarang = $request->now;
        $request->all();
        return view('ez/travel/payment', compact('request', 'sekarang', 'bank', 'non_bank'));
    }

    public function travelstore(Request $request)
    {
        travelform::create($request->all());
        return redirect('ez/travel/process');
    }

    public function showProcessTravelForm()
    {
        $sql = DB::table('travelforms')->ORDERBY('id', 'desc')->LIMIT(1)->get();
        return view('ez/travel/proses', compact('sql'));
    }

    public function eticketTravel(travelform $travelform)
    {
        return view('ez/travel/report', compact('travelform'));
    }

    public function cetakTravel(travelform $travelform)
    {
        return view('ez/travel/cetak', compact('travelform'));
    }

    public function downloadPDFTicketTravel(travelform $travelform)
    {
        $kode = sprintf("%010d", $travelform->id);
        $html = '<div>
<center><img style="width: 10%; length: 10%;"  src="https://i.imgur.com/UHp7uVR.png"></center>
<center><h2 class="tittle" style="color: #49c2f5">EZ Travel</h2>
    <span style="color: #49c2f5">Ez Travel - Easier to Get Travel!</span><hr><br></center>
</div>

<div>
    <h3>E-ticket Receipt</h3><hr><br>
</div>
<table>
    <tr>
        <td>Kode Booking</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td style="color: #49c2f5 ;"><strong>' . $kode . '</strong></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->name . '</strong></td>
        <td>&nbsp;</td>
    </tr>';
        if ($travelform->tipe_travel == "Sewa_Mobil")
            $html .= '<tr>
        <td>Driver</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>'. (new \App\driver)->find($travelform->driver_id)->name.'</strong></td>
    </tr>';
        $html .= '<tr>
        <td>Operator</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->operator . ' &mdash; ' . $travelform->jenis_kendaraan . '
            (' . $travelform->no_pol . ')</strong></td>
    </tr>
    <tr>
        <td>Keberangkatan</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->asal . '
            (' . $travelform->tgl_keberangkatan . ' &ndash; ' . $travelform->jadwal_keberangkatan . '
            )</strong></td>
    </tr>
    <tr>
        <td>Kedatangan</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->tujuan . '
            (' . $travelform->tgl_datang . ' &ndash; ' . $travelform->jadwal_datang . '
            )</strong></td>
    </tr>
    <tr>
        <td>Jumlah Penumpang</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->jml_orang . ' Orang</strong></td>
    </tr>
    <tr>
        <td>Catatan Khusus</td>
        <td>&nbsp;:&nbsp;&nbsp;</td>
        <td><strong>' . $travelform->note . '</strong></td>
    </tr>
</table>

<br><hr><br>

<p style="color:grey ">Mohon simpan e-tiket ini baik-baik sebagai tanda bukti transaksi anda bersama EZ Travel</p>';
        $pdf = PDF::loadHTML($html);
        return $pdf->download('TravelTicket_' . $travelform->name . '_' . $travelform->tgl_keberangkatan . '.pdf');
    }
}
