<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

    // ログイン画面
    public function showLoginForm()
    {
        if (!session()->has('url.intended')) {
            if(session()->get('product_url')) {
                session(['url.intended' => session()->get('product_url')]);
            } else {
                session(['url.intended' => url()->previous()]);
            }
        }
        session()->forget('product_url');

        return view('user.auth.login');
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('user.login'));
    }

    // ログイン時リダイレクト
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
