<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SocialProfile;
use App\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    private $_alowedDrivers = ['github', 'facebook', 'twitter'];
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(string $driver)
    {
        // dd($driver);
        if (in_array($driver, $this->_alowedDrivers)) {
            return Socialite::driver($driver)->redirect();
        }
        
        abort(404);
    }
    public function callback(string $driver)
    {
        $user = Socialite::driver($driver)->user();

        $newUser = SocialProfile::attempt($user->id, $driver)->first();
        if ($newUser) {
            Auth::loginUsingId($newUser->user_id);
            return back();
        }
        $newUser = User::create();
        $socialProfile = new SocialProfile();
        $socialProfile->url = $user->user['html_url'];
        $socialProfile->name = $user->user['name'];
        $socialProfile->email = $user->user['email'];
        $socialProfile->type = $driver;
        $socialProfile->profile_id = $user->id;
        $socialProfile->avatar = $user->avatar;
        $newUser->profiles()->save($socialProfile);

        Auth::loginUsingId($newUser->user_id);

        return back();
    }

    public function logout()
    {
        Auth::logout();
    }
}
