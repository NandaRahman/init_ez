<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EditController extends Controller
{
    use AuthenticatesUsers;

    public function showEditForm(User $user)
    {
        return view('auth.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);
        $data = $request->all();

        $user = User::find(auth()->user()->id);
        if (!Hash::check($data['password'], $user->password)) {
            Session::flash('status', 'Password lama anda salah!');
            return back();
        } else {
            $user->forceFill([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->new_password)
            ])->save();
        }
        Session::flash('ok', 'Successfully, updated!');
        return back();
    }

    public function showHistoryForm(User $user)
    {
        $tourorder = DB::table('tourforms')->where('email', $user->email)->count();
        $travelorder = DB::table('travelforms')->where('email', $user->email)->count();
        $tour = DB::table('tourforms')->get();
        $travel = DB::table('travelforms')->get();
        return view('auth.history', compact('user', 'tour', 'travel', 'tourorder', 'travelorder'));
    }

    public function cetakTour(User $user)
    {
        $tourform = DB::table('tourforms')->get();
        return view('auth.cetaktour', compact('user', 'tourform'));
    }

    public function cetakTravel(User $user)
    {
        $travelform = DB::table('travelforms')->get();
        return view('auth.cetaktravel', compact('user', 'travelform'));
    }
}
