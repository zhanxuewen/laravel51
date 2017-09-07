<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRegisterRequest $request)
    {
//        dd($request->all());
        $data = [
            'confirm_code'  => str_random(48),
            'avatar'        => '/images/default-avatar.png',
        ];
        // 保存用户数据
        $user = User::register(array_merge($request->all(),$data));
        // 发送邮件
        $subject = 'Confirm Your Email';
        $view = 'email.register';

//        $this->sendTo($user,$subject, $view, $data);
        // 重定向
        return redirect('/discussions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('users.register');
    }

    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param $param
     */
    private function sendTo($user, $subject, $view, $data=[])
    {
        \Mail::send($view, $data, function ($message) use($user, $subject){
            $message->to($user->mail)->subject($subject);
        });
    }

    public function confirmEmail($confirm_code)
    {
        $user = User::where('confirm_code',$confirm_code)->first();
        if (is_null($user)){
            return redirect('/discussions');
        }
        $user->is_confirmed = 1;
        $user->confirm_code = str_random(48);
        $user->save();

//        \Session::flash('email_confirm',value)  // 简单提示怎么用？？、
        return redirect('user/login');
    }

    public function login()
    {
        return view('users.login');
    }

    public function signin(Requests\UserLoginRequest $request)
    {
//        dd($request->all());

        if (\Auth::attempt([
            'email' => $request->get('email'),
            'password'=> $request->get('password'),
            'is_confirmed'=>1,
        ])){
            return redirect('/discussions');
        }

        \Session::flash('user_login_failed', '密码不正确或邮箱没有验证');
        return redirect('/user/login')->withInput(); // 携带参数回去
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/discussions');
    }

    public function avatar()
    {
        return view('users.crop');
    }

    public function changeAvatar(Request $request)
    {
//        dd('avatar');

        $file = $request->file('avatar');

        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return \Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }
//        dd($file);
        $destinationPath = 'upload';
        $filename = \Auth::user()->id.'_'.time().'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        Image::make($destinationPath.'/'.$filename)->fit(400)->save();


        return \Response::json(
            [
                'success' => true,
                'avatar' => "/".$destinationPath.'/'.$filename,
            ]
        );
//        return redirect('/user/avatar');
    }

    public function cropAvatar(Request $request )
    {
//        dd($request->all());
        $photo = mb_substr($request->get('photo'),1);
        $width = (int)$request->get('w');
        $height = (int)$request->get('h');
        $xAlign = (int)$request->get('x');
        $yAlign = (int)$request->get('y');

        Image::make($photo)->crop($width,$height,$xAlign,$yAlign)->save();

        $user = \Auth::user();
        $user->avatar = $request->get('photo');
        $user->save();

//        $user = User::find(\Auth::user()->id);
//        $user->avatar = '/'.$destinationPath.'/'.$filename;
//        $user->save();
        return redirect('/user/avatar');
    }


}
