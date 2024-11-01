<?php

use App\Admin\Controllers\CategoriaController;
use App\Admin\Controllers\ClienteController;
use App\Admin\Controllers\ProductoController;
use App\Admin\Controllers\ProveedorController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Facades\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('productos', ProductoController::class);
    $router->resource('categorias', CategoriaController::class);
    $router->resource('proveedors', ProveedorController::class);
    $router->resource('clientes', ClienteController::class);
});
