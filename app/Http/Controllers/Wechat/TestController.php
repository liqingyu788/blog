<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class TestController extends Controller
{
    //
    public function test(Request $request)
    {
        echo Input::get('id','10086');
        $all = Input::all();
        //dd(Input::only(['name','age']));
        //dd($all);
        //dd(Input::exists(['name']));  has
        //dd(Input::except(['name']));
        //dd($request->only(['name','age']));
    }
}
