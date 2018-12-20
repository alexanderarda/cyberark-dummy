<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'PasswordVault/API'], function () use ($router) {

    # POST Auth
    $router->post('/auth/Cyberark/Logon', 'AuthController@postAuthLogon');

    # GET
    $router->get('/inquiry/{accNo}', 'ApiController@getBalance');
    $router->get('/history/{accNo}', 'ApiController@getHistory');




});
