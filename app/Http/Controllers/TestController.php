<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test1()
    {
        $user_ids = \App\User::lists('id');
        dd($user_ids);
    }
}
