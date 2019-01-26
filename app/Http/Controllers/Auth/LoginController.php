<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest')->except('logout');
    }

    //单位时间内最大登陆尝试次数
//    protected $maxAttempts = 3;

    //单位时间值
//    protected $decayMinutes = 5;

    /**
     * 通过用户名登录
     * @return string
     */
    /*
    public function username()
    {
        return 'name';
    }
    */


    //支持的登陆字段
    //protected $supportFields = ['name', 'email'];

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // 将支持的登录字段都传递到 UserProvider 进行查询
    /*
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        foreach ($this->supportFields as $field) {
            if (empty($credentials[$field])) {
                $credentials[$field] = $credentials[$this->username()];
            }
        }
    }
    */
}
