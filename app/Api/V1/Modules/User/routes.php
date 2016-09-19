<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**
 * OAuth
 */

//Get access_token
Route::post('/oauth/access_token', function() {
 return Response::json(Authorizer::issueAccessToken());
});

Route::post('/login', 'App\Http\Controllers\Auth\PasswordGrantVerifier@verify');


//Create a test user, you don't need this if you already have.
Route::get('/register',function(){
    $user = new App\User();
    $user->name="tester";
    $user->email="test@test.com";
    $user->password = \Illuminate\Support\Facades\Hash::make("password");
    $user->save();
    return $user;
});