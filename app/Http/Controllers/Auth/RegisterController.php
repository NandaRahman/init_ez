<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

    public function verifyEmailFirst()
    {
        $sql = DB::table('users')->ORDERBY('id', 'desc')->LIMIT(1)->get();
        return view('auth.email.sendVerify', compact('sql'));
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        if ($user) {
            User::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => '1', 'verifyToken' => null]);
            return view('auth.email.verified');
        } else {
            return view('auth.email.error');
        }
    }

    public function notrobot()
    {
        $token = Input::get('_token');
        $recaptcha = Input::get('g-recaptcha-response');
        return view('auth.login', compact('token', 'recaptcha'));
    }

    /*public function notrobot(Request $request)
    {
        $token = $request->input('g-recaptcha-response');

        if ($token) {
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
                'form_params' => array(
                    'secret'    => '6LfDTyIUAAAAAAeKQTu_V4VnjPw4APNenCjI9y6l',
                    'response'  => $token
                )
            ]);
            $result = json_decode($response->getBody()->getContents());
            if($result->success){
                Session::flash('success','You`re human');
                return view('auth.login');
            }else{
                Session::flash('error','You`re robot!');
                return redirect('sendEmailDone');
            }
        } else {
            return redirect('register/success');
        }
    }*/

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if (!$socialProvider) {
            //create a new user and provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()],
                ['lastname' => $socialUser->getNickname()]
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );

        } else
            $user = $socialProvider->user;

        auth()->login($user);

        return redirect('/ez');

    }
}
