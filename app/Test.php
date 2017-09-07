<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Test extends Model
{
    protected $fillable = [];

    private $arr = [
        'aaa'        => 'aaa',
        'aaaddddddd' => 'aaa',
        'aaaaa'      => 'aaa',
    ];

    protected function tttt($t)
    {
        $this->fortest($t);

    }

    /**
     * @param $t
     */
    protected function fortest($t)
    {
        $b = $t;
        $a = 18;
        if ('hello') {
            echo 'world';
        } else {
            echo 'nima';
        }
    }
}