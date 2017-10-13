<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class phpUnitExecController extends Controller
{
    public function test1()
    {
        $data = [
            'happy' => 'coding',
            'work'  => 'hard',
        ];
        return json_encode($data);
    }
}
