<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 14:20
 */

namespace App\Mailer;


class UserMailer extends Mailer
{
    public function welcome($user)
    {
//        $subject = 'Welcome To YourLab';
//        $view = 'email.welcome';
//        $data = ['name'=>$user->name, 'confirm_code'=>$user->confirm_code];
//
//        $this->sendTo($user,$subject,$view,$data);


        $subject = 'YourLab 邮箱确认';
        $view = 'welcome';
        $data = ['%name%' => [$user->name],'%confirm_code%' => [$user->confirm_code]];
        $this->sendTo($user, $subject, $view, $data);
    }

    public function forgetPassword()
    {

    }
}