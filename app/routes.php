<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/buy', function() {
	return View::make('buy');
});

/*
Route::post('/buy', function() {
	$billing = App::make('Acme\Billing\BillingInterface');

	$billing->charge([
		'email' => Input::get('email'),
		'token' => Input::get('stripeToken')
		]);

	return 'Charge was successful';
});
*/

Route::post('/buy', 'BillingController@charge');