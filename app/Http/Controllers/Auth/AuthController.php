<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    // 当用户成功认证后 制定跳转路由
    protected $redirectPath = '/discussions';
    // 当用户认证失败！ 制定跳转路由
    // protected $loginPath


    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     * AuthController 的 validator 方法包含了对新用户的验证规则。你可以随意的修改这个方法。
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     * AuthController 的 create 方法负责使用 Eloquent ORM 来创建新的 App\User 纪录到数据库
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            /*
             Bcrypt 其实就是Blowfish和crypt()函数的结合，我们这里通过CRYPT_BLOWFISH判断Blowfish是否可用，然后像上面一样生成一个盐值，
              不过这里需要注意的是，crypt()的盐值必须以$2a$或者$2y$开头，详细资料可以参考下面的链接：
             http://www.php.net/security/crypt_blowfish.php
             更多资料可以看这里：
             http://php.net/manual/en/function.crypt.php

             $2y$10$2XRbxH2IS2iPIMeZSn7nk.W5IPzTR0BBxNrtGq5SWM9KqAYstpnAy
             */
        ]);
    }
}
