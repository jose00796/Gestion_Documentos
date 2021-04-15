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
    echo "Hola Mundo";
});

//LOGIN...
$router->post('login', 'loginController@login');
$router->post('register', 'registerController@register');
$router->get('/user', 'usersController@consulta');

//DOCUMENTOS...
$router->get('document', 'documentsController@consulta');
$router->post('document', 'documentsController@guardar');

//CARPETAS... 
$router->get('folder', 'foldersController@consulta');
$router->post('folder', 'foldersController@guardar');

//VALIJAS...
$router->get('valise', 'valisesController@consulta');
$router->post('valise', 'valisesController@guardar');

$router->group(['middleware' => 'auth'], function() use ($router){
  
    // aqui van todas las rutas que se necesitar estar autenticado para el acceso
    $router->post('logout', 'loginController@logout');
  
  });

//$router->post('users', 'usersController@UserInsert');