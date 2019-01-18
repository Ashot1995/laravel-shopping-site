<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin';


    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function socialLogin($provider)
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

        $googleUser = Socialite::driver($provider)->user();


            $user = User::where("provider_id", $googleUser->id)->first();
            session(['google_token'=>$googleUser->token]);

            if (!$user) {

                $user = User::create([
                    'token'=>$googleUser->token,
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'provider_id' => $googleUser->id

                ]);
//                $user = new User();
//                $user->name = $googleUser->name;
//                $user->email = $googleUser->email;
//                $user->provider_id = $googleUser->id;
            }
            Auth::login($user, true);
            return redirect('/home');


    }
}


