<?php

Route::get('/', ['as' => 'index', function () {
    return view('pagina.index');
}]);

// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'pagina.login',
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'pagina.login',
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'pagina.logout',
]);

Route::get('/panel', ['as' => 'panel', function () {
    return view('pagina/funcionalidad/panel');
}]);

Route::group(['prefix' => 'admin'], function () {

    Route::resource('usuarios', 'usuarios_controller');

    Route::get('usuarios/{id}/webedit', [
        'uses' => 'usuarios_controller@webedit',
        'as'   => 'admin.usuarios.webedit',
    ]);

    Route::get('webusuarios', [
        'uses' => 'usuarios_controller@webindex',
        'as'   => 'admin.usuarios.webindex',
    ]);

    Route::post('usuarios/webstore', [
        'uses' => 'usuarios_controller@webstore',
        'as'   => 'admin.usuarios.webstore',
    ]);

    /*Route::get('estadistica_datos/{id1}/{id2?}/{id3?}', [
    'uses'    =>    'estadisticas_controller@modelo',
    'as'    =>    'estadistica.modelo'
    ])*/

    Route::get('usuarios/{id}/destroy', [
        'uses' => 'usuarios_controller@destroy',
        'as'   => 'admin.usuarios.destroy',
    ]);
});

Route::group(['prefix' => 'admin'], function () {

    Route::resource('perfil', 'perfil_controller');

    Route::get('almacenar_respuesta/{id1}/{id2}/{id3}', [
        'uses' => 'ejercicios_controller@almacenar',
        'as'   => 'ejercicios.respuesta',
    ]);

});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('ejercicios', 'ejercicios_controller');
});

Route::get('error', [
    'uses' => 'errores_controller@index',
    'as'   => 'error.pagina',
]);
