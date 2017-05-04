<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

use App\Http\Requests\LoginFormRequest;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        return view('user.login');
    }

    public function login(LoginFormRequest $request)
    {
        $credentials = [
            "username" => $request->get("username"),
            "password" => $request->get("password"),
        ];

        if (Auth::attempt($credentials))
        {
            return redirect()->intended('/');
        }else{
            return redirect()->back()->withErrors([ "username" => Lang::get("auth.failed"), ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("Login");
    }
}
