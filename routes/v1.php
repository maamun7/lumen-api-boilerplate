<?php

$router->get('/', function () {
    return 'Hello world';
});

$router->group(['namespace' => 'Api', 'prefix' => 'v1'], function ($router) {
	$router->post('login', ['uses' => 'AuthController@postLogin']);

	// Register through app/site
	$router->post('register', ['uses' => 'AuthController@postRegister']);
	// Register through facebook
    $router->post('register-fb', ['uses' => 'AuthController@postRegisterThroughFacebook']);
});


