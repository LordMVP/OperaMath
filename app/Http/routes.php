<?php

Route::get('test', function () {
    return view('welcome');
});


Route::get('/', ['as' => 'index', function () {
	return view('pagina.index');
}]);

// Authentication routes...
Route::get('login', [
	'uses'	=>	'Auth\AuthController@getLogin',
	'as'	=>	'pagina.login'
	]);

Route::post('login', [
	'uses'	=>	'Auth\AuthController@postLogin',
	'as'	=>	'pagina.login'
	]);

Route::get('logout', [
	'uses'	=>	'Auth\AuthController@getLogout',
	'as'	=>	'pagina.logout'
	]);

Route::get('/panel', ['as' => 'panel', function () {
	return view('pagina/funcionalidad/panel');
}]);