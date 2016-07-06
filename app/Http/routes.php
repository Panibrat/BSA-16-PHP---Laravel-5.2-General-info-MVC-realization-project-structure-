<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Lib\Binary\Academy\UserRepository;
use App\User;
use App\Lib\Binary\Academy\Smartphone;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phone', function() {
   //dd(app()->make('Smartphone')->name); 
   //dd(app()->make('Smartphone')->getInfo()); 

   //return Response::view('gravatar', app()->make('Smartphone'));
    //return Response::view('phone');
    //return view('welcome');
    //return view('phone', ['test' => 'qweqwe']);
    return view('phone', app()->make('Smartphone')->getInfo());

});

Route::get('/pc', function() {
    dd(app()->make('Computer'));
    //dd(App::make('Computer'));
    //dd(app('Computer'));
});

Route::get('/users', function(UserRepository $users) {
    dd($users->getAll());
});

// Register user hack
Route::get('/create', function() {
    return User::firstOrCreate([
        'name' => 'Michael',
        'email' => 'mmorozovm@gmail.com',
        'password' => bcrypt('test'),
    ]);
});

Route::get('/gravatar', function() {

    return Response::view('gravatar', ['image' => Gravatar::get('mmorozovm@gmail.com')]);
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/home', 'HomeController@getIndex');

Route::get('auth/vk', 'Auth\AuthController@redirectToVK');
Route::get('auth/vk_callback', 'Auth\AuthController@handleVKCallback');
