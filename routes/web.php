<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Carbon\Carbon;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('', [
        'uses' => 'App\Http\Controllers\CategoryController@index',
        'as' => 'category.index'
    ]);

    Route::get('show/{id}',[
        'uses' => 'App\Http\Controllers\CategoryController@show',
        'as' => 'category.show'
    ]);

    Route::get('create',[
        'uses' => 'App\Http\Controllers\CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::post('create',[
        'uses' => 'App\Http\Controllers\CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::get('update/{id}',[
        'uses' => 'App\Http\Controllers\CategoryController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('update/{id}',[
        'uses' => 'App\Http\Controllers\CategoryController@update',
        'as' => 'category.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'App\Http\Controllers\CategoryController@confirm',
        'as' => 'category.confirm'
    ]);

    Route::post('delete/{id}',[
        'uses' => 'App\Http\Controllers\CategoryController@destroy',
        'as' => 'category.destroy'
    ]);
});


use App\Events\formSubmit;

Route::get('/counter', function () {
    return view('counter');
});
Route::get('/sender', function () {
    return view('sender');
});
Route::post('/sender', function () {
    $price = request()->price;
    $name = request()->name;
    $auction = request()->auction;
    $session = request()->session;
    $time = Carbon::now('Asia/Ho_Chi_Minh');
    event(new formSubmit($price, $name, $auction, $session, $time));
    return redirect('/sender');
});

Route::get('/test', function (){
    // Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
    $dt = Carbon::create(Carbon::now()->timestamp);
    $dt2 = Carbon::create(2018, 10, 18, 13, 40, 16);
    $now = Carbon::now();
    echo $dt->diffForHumans($now); //12 phút trước
    echo $dt2->diffForHumans($now);
    echo $now;
});

Route::get('markAsRead', function(){
    foreach ($this->unreadNotifications as $notification) {
        $notification->markAsRead();
    }
    return redirect()->back();
})->name('markRead');
