<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Test::all();
        return response()->json([
            'message'=> 'Not found',
            'data'=>$items
        ],200);
        /*第一引数にメッセージ、第二引数にステータスコード*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Test;
        $item->name=$request->name;
        $item->age=$request->age;
        $item->save();
        return response()->json([
            'message'=>'Created successfully',
            'data'=>$item
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        $item=Test::where('id',$test->id)->first();
        if($item){
            return response()->json([
                'message'=>'OK',
                'data'=>$item
            ],200);
        } else {
            return response()->json([
                'message'=>'Not found',
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        $item=Test::where('id',$test->id)->first();
        $item->name=$request->name;
        $item->age=$request->age;
        $item->save();
        if($item){
            return response()->json([
                'message'=>'Updated successfully',
            ],200);
        } else {
            return response()->json([
                'message'=>'Not found'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        $item=Test::where('id', $test->id)->delete();
        if($item){
            return response()->json([
                'message'=>'Delete successfully',
            ],200);
        } else {
            return response()->json([
                'message'=>'Not found',
            ],404);
        }
    }
}
