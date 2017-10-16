<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class collectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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

    public function test1()
    {
//        $collection = collect(['taylor', 'abligail',null])->map(function ($name){
//            return strtoupper($name);
//        });


//            ->reject(function ($name){
//           return empty($name);
//        });
//        $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
//        dd($collection);
//        $collapsed = $collection->collapse();
//        dd($collapsed);

//        $collection1 = collect([1,2,3,4,5]);
//        $collection2 = collect([1,9,3,7,5]);
//        $diff = $collection1->diff($collection2);
//        print_r($diff);
//        $diff = $collection2->diff($collection1);
//        dd($diff);


//        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
//        $chunk = $collection->forPage(3, 3);
//        dd($chunk);

//        $collection = collect([
//            ['account_id' => 'account-x10', 'product' => 'Chair'],
//            ['account_id' => 'account-x105', 'product' => 'Bookcase'],
//            ['account_id' => 'account-x11', 'product' => 'Desk'],
//        ]);

//        $grouped = $collection->groupBy('account_id');
////        dd($grouped);
//        dd($grouped->toArray());

//        $keyed = $collection->keyBy('account_id');
//        dd($keyed->toArray());

//        $collection = collect([
//            ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
//            ['name' => 'Chair', 'colors' => ['Black']],
//            ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
//        ]);
//
//        $sorted = $collection->sortBy(function ($product, $key){
//            return count($product['colors']);
//        });
//
//        dd($sorted->values()->toArray());


//        abort(404, 'Unauthorized action11111111.');

//        \Log::info('Showing user profile for user: '.\Auth::user());
//        dd('Showing user profile for user: '.\Auth::user());

//        echo app_path();
//        echo "<hr>";
//        echo base_path();
//        echo "<hr>";
//        echo config_path();
//        echo "<hr>";
//        echo database_path();
//        echo "<hr>";
//
//
//        echo public_path();
//        echo "<hr>";
//        echo storage_path();
//        echo "<hr>";
//
//        die();

//       var_dump($value = ends_with('This is my name', 'name'));
//       die();

        $url = action('collectionController@test1');
        dd($url);
    }
}
