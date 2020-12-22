<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     // return $router->app->version();
//     echo '<h1>HELLO<h1>';
// });



$router->get('show_vendor/{id}/country/{country}' , 'CategoriesController@show');


$router->get('show_categories' , 'CategoriesController@index');
$router->post('add_category' , 'CategoriesController@insert');

$router->get('show_countries' , 'CountryController@index');
$router->post('add_country' , 'CountryController@insert');

$router->get('show_products' , 'ProductsController@index');
$router->post('add_product' , 'ProductsController@insert');

$router->get("show_vendors" , "VendorsController@index");
$router->post('add_vendor' , 'VendorsController@insert');

