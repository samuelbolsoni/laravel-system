<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return View::make('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Customers (Clientes)
Route::resource('customers', 'Customers\CustomersController');
Route::get('customers_add', function(){
	return View::make('customers/create-edit', ['href' => 'customers_add']);
});
Route::any('customers/search','Customers\CustomersController@search');
Route::post('customers/delete_customer', ['uses'=>'Customers\CustomersController@delete_customer']);

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

// Pizzas
Route::resource('pizzas', 'Pizzas\PizzasController');
Route::get('pizzas_add', function(){
	return View::make('pizzas/create-edit', ['href' => 'pizzas_add']);
});
Route::any('pizzas/search','Pizzas\PizzasController@search');
Route::post('pizzas/delete_pizza', ['uses'=>'Pizzas\PizzasController@delete_pizza']);

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

// Drinks
Route::resource('drinks', 'Drinks\DrinksController');
Route::get('drinks_add', function(){
	return View::make('drinks/create-edit', ['href' => 'drinks_add']);
});
Route::any('drinks/search','Drinks\DrinksController@search');
Route::post('drinks/delete_drink', ['uses'=>'Drinks\DrinksController@delete_drink']);

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});
