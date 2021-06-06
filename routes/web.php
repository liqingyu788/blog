<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//斜杠必须是 \
Route::group(['prefix'=>'wechat/Appointment'],function (){
    Route::get('index','Wechat\AppointmentController@index');

    Route::get('add','Wechat\AppointmentController@add');
    Route::get('edit','Wechat\AppointmentController@edit');
    Route::get('find','Wechat\AppointmentController@find');
    Route::get('del','Wechat\AppointmentController@del');
});

//对应多个请求方式
/*Route::match(['get','post'],'/test',function (){
  echo 12;
});*/

//包含所有的请求
/*Route::any('test1/{id?}',function ($id = ''){
    echo 123 . $id;
});*/

Route::get('test','Wechat\TestController@test');