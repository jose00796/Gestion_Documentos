<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\documentsController;
use App\Http\Controllers\usersController;

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

$router->get('/key',function(){
    return \illuminate\Support\Str::random(32) ;
});

//LOGIN...
$router->post('login', 'loginController@login');
$router->post('register', 'registerController@register');
$router->get('/user', 'usersController@consulta');

//DOCUMENTOS...
$router->get('document', 'documentsController@consulta');
$router->post('insertar-document', 'documentsController@guardar');
$router->delete('eliminar-document/{id}', 'documentsController@eliminar');
$router->put('actualizar-document/{id}', 'documentsController@actualizar');

//CARPETAS... 
$router->get('folder', 'foldersController@consulta');
$router->post('insertar-folder', 'foldersController@guardar');
$router->delete('eliminar-folder/{id}', 'foldersController@eliminar');
$router->put('actualizar-folder/{id}', 'foldersController@actualizar');

//VALIJAS...
$router->get('valise', 'valisesController@consulta');
$router->post('insertar-valise', 'valisesController@guardar');
$router->delete('eliminar-valise/{id}', 'valisesController@eliminar');
$router->put('actualizar-valise/{id}', 'valisesController@actualizar');

//FUENTE_EXTERNA
$router->get('external_source', 'external_sourcesController@consulta');
$router->post('insertar-external_source', 'external_sourcesController@guardar');
$router->delete('eliminar-external_source/{id}', 'external_sourcesController@eliminar');
$router->put('actualizar-external_source/{id}', 'external_sourcesController@actualizar');

$router->group(['middleware' => 'auth'], function() use ($router){
  
    // aqui van todas las rutas que se necesitar estar autenticado para el acceso
    $router->post('logout', 'loginController@logout');
  
  });

//$router->post('users', 'usersController@UserInsert');