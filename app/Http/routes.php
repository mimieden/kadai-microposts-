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

Route::get('/', 'WelcomeController@index');

// ユーザ登録
Route::get('/signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('/signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

//ログイン時のみ
Route::group(['middleware' => 'auth'], function () {
    //ユーザー機能(その他)
    //Route::get('users', 'UsersController@index');
    //Route::get('users/{id}', 'UsersController@show');
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    //フォロー機能
    Route::group(['prefix' => 'users/{id}'], function () { 
        //POST /users/{id}/follow <フォロー>
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        //DELETE /users/{id}/unfollow <アンフォロー>
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        //GET /users/{id}/followings <フォローしているユーザ一覧>
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        //GET /users/{id}/followers <フォローされているユーザ(フォロワー)一覧>
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });    
    
    //マイクロポスト
    //Route::post('microposts', 'MicropostsController@store');
    //Route::delete('microposts/{id}', 'MicropostsController@destroy');
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});


