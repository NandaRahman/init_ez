<?php

namespace App\Http\Controllers;

use App\Admin;
use App\contact;
use App\overtime;
use App\tour;
use App\tourform;
use App\tourpicts;
use App\travel;
use App\driver;
use App\car;
use App\travelform;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sql = DB::table('contacts')->whereraw('created_at = curdate()')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();

        $tour = DB::table('tourforms')->orderby('id', 'desc')->limit(4)->get();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $travel = DB::table('travelforms')->orderby('id', 'desc')->limit(4)->get();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();

        $tourcontent = DB::table('tours')->select('cities.name', 'tours.id', 'tours.paket', 'tours.durasi', 'tours.harga', 'tours.keterangan', 'tours.url')->leftjoin('cities', 'tours.city_id', '=', 'cities.id')->orderby('id', 'desc')->limit(4)->get();

        $member = DB::table('users')->whereraw('created_at = curdate()')->count();

        $notif = $contact + $ordertour + $ordertravel + $member;

        return view('admin.panel.dashboard', compact('city','contact', 'sql', 'tour', 'ordertour', 'travel', 'ordertravel', 'member', 'notif', 'tourcontent', 'travelcontent'));
    }

    public function showEditProfileForm(Admin $admin)
    {
        $sql = DB::table('contacts')->whereraw('created_at = curdate()')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;
        $me = DB::table('admins')->get();
        return view('admin.panel.profile', compact('admin', 'sql', 'contact', 'ordertravel', 'ordertour', 'member', 'notif', 'me'));
    }

    public function updateAdmin(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);
        $input = $request->all();
        $data = Admin::find(auth()->user()->id);
        if (!Hash::check($input['password'], $data->password)) {
            Session::flash('status', 'Password lama anda salah!');
            return back();
        } else {
            if ($request->hasFile('url')) {
                $old = Storage::files('public/profile');
                if ($old) {
                    Storage::delete('public/profile/' . $admin->url);
                }

                $img = $request->file('url');
                $name = $img->getClientOriginalName();
                if ($request->file('url')->isValid()) {
                    $request->url->storeAs('public/profile', $name);
                    $admin->update([
                        'url' => $name,
                        'name' => $request->name,
                        'lastname' => $request->lastname,
                        'email' => $request->email,
                        'password' => bcrypt($request->new_password),
                        'address' => $request->address,
                        'education' => $request->education,
                        'skills' => $request->skills,
                        'biography' => $request->biography
                    ]);
                    Session::flash('ok', 'Successfully, updated!');
                    return back();
                }
            } else {
                Session::flash('file', 'There`s no any file selected...');
                return back();
            }
        }
        return redirect('admin/dashboard');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function add(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Session::flash('berhasil', 'Successfully, add an Admin');
        return back();
    }

    public function TableAdminDelete(Admin $admin)
    {
        $admin->delete();
        Session::flash('ban', 'Successfully, banned!');
        return back();
    }

    public function TableAdminRestore($admin)
    {
        Admin::withTrashed()->find($admin)->restore();
        Session::flash('restore', 'Successfully, restored!');
        return back();
    }


    public function tables()
    {
        $sql = DB::table('contacts')->orderby('created_at', 'desc')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;

        $tour = DB::table('tourforms')->get();
        $travel = DB::table('travelforms')->get();
        $users = User::withTrashed()->get();
        $feedback = DB::table('contacts')->get();

        return view('admin.panel.tables', compact('sql', 'contact', 'ordertour', 'ordertravel', 'member', 'notif', 'tour', 'travel', 'users', 'feedback'));
    }

    public function TableTourPrint()
    {
        $tourform = DB::table('tourforms')->orderby('id', 'desc')->get();
        return view('admin.panel.tablesprint.tour', compact('tourform'));
    }

    public function TableTourDelete(tourform $tourform)
    {
        $tourform->delete();
        Session::flash('tour', 'Successfully, deleted!');
        return redirect('admin/tables#tour');
    }

    public function TableTravelDelete(travelform $travelform)
    {
        $travelform->delete();
        Session::flash('travel', 'Successfully, deleted!');
        return redirect('admin/tables#travel');
    }

    public function TableFeedbackDelete(contact $contact)
    {
        $contact->delete();
        Session::flash('feedback', 'Successfully, deleted!');
        return redirect('admin/tables#feedback');
    }

    public function TableTravelPrint()
    {
        $travelform = DB::table('travelforms')->orderby('id', 'desc')->get();
        return view('admin.panel.tablesprint.travel', compact('travelform'));
    }

    public function TableMemberPrint()
    {
        $user = DB::table('users')->orderby('id', 'desc')->get();
        return view('admin.panel.tablesprint.member', compact('user'));
    }

    public function TableMemberBanned(User $user)
    {
        $user->delete();
        Session::flash('status', 'Successfully, banned!');
        return redirect('admin/tables#member');
    }
    public function TableMemberRestore($user)
    {
        User::withTrashed()->find($user)->restore();
        Session::flash('status', 'Successfully, restored!');
        return redirect('admin/tables#member');
    }

    public function TableFeedbackPrint()
    {
        $contact = DB::table('contacts')->orderby('id', 'desc')->get();
        return view('admin.panel.tablesprint.feedback', compact('contact'));
    }

    //tour
    public function showTourContent()
    {
        $sql = DB::table('contacts')->orderby('created_at', 'desc')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;
        $city = DB::table('cities')->get();

        $tourcontent = DB::table('tours')->select('cities.name', 'tours.id', 'tours.paket', 'tours.durasi', 'tours.harga', 'tours.keterangan', 'tours.url', 'tours.fasilitas', 'tours.transportasi', 'tours.created_at','tours.status')->leftjoin('cities', 'tours.city_id', '=', 'cities.id')->get();
        return view('admin.panel.content.tour', compact('sql', 'contact', 'ordertour', 'ordertravel', 'member', 'notif', 'tourcontent', 'city'));
    }

    public function deleteTourContent(tour $tour)
    {
        $tour->delete();
        Session::flash('status', 'Successfully, deleted!');
        return back();
    }

    public function storeTourContent(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('url')) {
            $img = $request->file('url');
            $name = $img->getClientOriginalName();
            if ($request->file('url')->isValid()) {
                $request->url->storeAs('public/tour', $name);
                $input['url'] = $name;
            }
        } else {
            Session::flash('file', 'There`s no any file selected...');
            return redirect('admin/tourcontent#tour');
        }
        $add = tour::create($input);
        if ($add) {
            Session::flash('add', 'Successfully, added!');
            return redirect('admin/tourcontent#tour');
        } else {
            Session::flash('gagal', 'Failed to create Tour Data!');
            return redirect('admin/tourcontent#tour');
        }
        /*tour::create($request->all());
        Session::flash('add', 'Successfully, added!');
        return redirect('admin/tourcontent#tour');*/
    }

    public function storeTourPict(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('url')) {
            $img = $request->file('url');
            $name = $img->getClientOriginalName();
            if ($request->file('url')->isValid()) {
                $request->url->storeAs('public/tour/tourpict', $name);
                $input['url'] = $name;
            }
        } else {
            Session::flash('file', 'There`s no any file selected...');
            return redirect('admin/tourcontent#tour');
        }
        $add = tourpicts::create($input);
        if ($add) {
            Session::flash('add', 'Successfully, added!');
            return redirect('admin/tourcontent#tour');
        } else {
            Session::flash('gagal', 'Failed to create Tour Data!');
            return redirect('admin/tourcontent#tour');
        }
    }

    public function showEditTourForm(tour $tour)
    {
        $sql = DB::table('contacts')->orderby('created_at', 'desc')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;
        $city = DB::table('cities')->get();
        $tourcontent = DB::table('tours')->select('cities.name', 'tours.id', 'tours.paket', 'tours.durasi', 'tours.harga', 'tours.keterangan', 'tours.url', 'tours.fasilitas', 'tours.transportasi', 'tours.created_at')->leftjoin('cities', 'tours.city_id', '=', 'cities.id')->get();
        return view('admin.panel.content.edittour', compact('sql', 'contact', 'ordertour', 'ordertravel', 'member', 'notif', 'tour', 'city', 'tourcontent'));
    }

    public function statusTourContent($tour, $status)
    {
        $tour = tour::find($tour);
        $update = $tour->update(['status'=>$status]);
        if ($update) {
            Session::flash('sukses', 'Successfully, updated!');
            return back();
        } else {
            Session::flash('gagal', 'Failed to update!');
            return back();
        }
    }

    public function UpdateTourContent(Request $request, tour $tour)
    {
        $input = $request->all();
        if ($request->hasFile('url')) {
            $old = Storage::files('public/tour');
            if ($old) {
                Storage::delete('public/tour/' . $tour->url);
            }
            $img = $request->file('url');
            $name = $img->getClientOriginalName();
            if ($request->file('url')->isValid()) {
                $request->url->storeAs('public/tour', $name);
                $input['url'] = $name;
            }
        } else {
            Session::flash('file', 'There`s no any file selected...');
            return back();
        }
        $update = $tour->update($input);
        if ($update) {
            Session::flash('ok', 'Successfully, updated!');
            return back();
        }
        return 'gagal';
    }


    //travel

    public function showTravelContent()
    {
        $sql = DB::table('contacts')->orderby('created_at', 'desc')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;
        $operator = DB::table('operators')->get();
        $city = DB::table('cities')->get();
        $drivers = driver::all();
        $travelcontent = car::get();
        return view('admin.panel.content.travel', compact('city','sql', 'contact', 'ordertour', 'ordertravel', 'member', 'notif', 'travelcontent', 'operator','drivers'));
    }

    public function deleteTravelContent($travel)
    {
        car::find($travel)->delete();
        Session::flash('status', 'Successfully, deleted!');
        return back();
    }

    public function storeTravelContent(Request $request)
    {
        $photoName = time().'.'.$request->gambar_mobil->getClientOriginalExtension();
        $request->gambar_mobil->move(public_path('mobil'), $photoName);
        car::insert([
            "merk_mobil"=>$request->merk_mobil,
            "jumlah_total"=>$request->jumlah_total,
            "city"=>strtoupper($request->city),
            "nopol_mobil"=>$request->nopol_mobil,
            "kapasitas_mobil"=>$request->kapasitas_mobil,
            "harga_mobil"=>$request->harga_mobil,
            "gambar_mobil"=>$photoName,
        ]);

        Session::flash('add', 'Successfully, added!');
        return redirect('admin/travelcontent#travel');
    }

    public function showEditTravelForm(travel $travel)
    {
        $sql = DB::table('contacts')->orderby('created_at', 'desc')->get();
        $contact = DB::table('contacts')->whereraw('created_at = curdate()')->count();
        $ordertour = DB::table('tourforms')->whereraw('created_at = curdate()')->count();
        $ordertravel = DB::table('travelforms')->whereraw('created_at = curdate()')->count();
        $member = DB::table('users')->whereraw('created_at = curdate()')->count();
        $notif = $contact + $ordertour + $ordertravel + $member;
        $operator = DB::table('operators')->get();

        return view('admin.panel.content.edittravel', compact('sql', 'contact', 'ordertour', 'ordertravel', 'member', 'notif', 'travel', 'operator', 'travelcontent'));
    }


    public function editTravelStatus($travel)
    {
        $travelform = travelform::find($travel);
        $update = $travelform->update(['status'=>1]);
        $d1=new DateTime($travelform->tgl_datang." ".$travelform->jadwal_datang);
        $d2=new DateTime(date("Y-m-d H:i:s"));
        $diff_hours = intval(abs(($d1->getTimestamp()-$d2->getTimestamp())/3600));
        if ($d1 < $d2) {
            $overtime_paid = intval($diff_hours*($travelform->total*10/100));
            overtime::create([
                "travelform_id"=>$travelform->id,
                "total_overtime"=>$diff_hours,
                "must_paid"=>$overtime_paid
            ]);
        }

        if ($update) {
            Session::flash('sukses', 'Successfully, updated!');
            return back();
        } else {
            Session::flash('gagal', 'Failed to update!');
            return back();
        }
    }


    public function storeDriver(Request $request)
    {
        driver::create($request->all()+['status'=>0]);
        Session::flash('berhasil', 'Successfully, add an Driver');
        return back();
    }

    public function deleteDriver(driver $driver)
    {
        $driver->delete();
        Session::flash('status', 'Successfully, deleted!');
        return back();
    }

    public function UpdateTravelContent(Request $request, $travel)
    {
        $update = car::find($travel)->update($request->all());
        if ($update) {
            Session::flash('sukses', 'Successfully, updated!');
            return back();
        } else {
            Session::flash('gagal', 'Failed to update!');
            return back();
        }
    }
}
