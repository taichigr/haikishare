<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::SHOP_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:shop');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('shop');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('shop.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'shop_name' => ['required', 'string', 'max:255'],
            'branch_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:shops'],
            'prefecture_id' => ['required', 'numeric', 'digits_between:1,2'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'regex:/^[a-zA-Z0-9-_]+$/', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Shop::create([
            'name'     => $data['shop_name'],
            'branch_name'     => $data['branch_name'],
            'email'    => $data['email'],
            'prefecture_id' => $data['prefecture_id'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
