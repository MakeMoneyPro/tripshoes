<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group([ 'namespace' => 'Frontend' ], function () {
	/*Log in with access code and email*/
	Route::post('/postLogin', 'AuthController@postLogin');
	
	Route::post('/postRegister', 'UserController@postRegister');
	Route::get('/sendusemail', 'HomeController@contact');
	Route::post('/postSendCode', 'HomeController@postSendCode');
	Route::get('/signup', 'HomeController@signup');
	Route::get('/',['as' => 'home','uses' => 'HomeController@index']);//21,22,1,11,5
	Route::post('/sendEmailChangePassword','PasswordController@sendEmailChangePassword');
	Route::get('/resetPassword', 'PasswordController@resetPassword');
	Route::post('/postResetPassword', 'PasswordController@postResetPassword');
	/*Log out*/
	Route::get('/logout', 'UserController@logout');
	/*Trip no login*/
	Route::get('/trip',['as' => 'trip','uses' => 'TripController@index']);
	Route::get('/trip/{id}',['uses' => 'TripController@show']);
	Route::get('/tripswithlogin', 'TripController@tripwithlogin');
	/*Information website*/
	Route::get('about',['as' => 'about', 'uses' => 'InfoController@about']);
	Route::get('support',['as' => 'support', 'uses' => 'InfoController@support']);
	/*Blog*/
	Route::get('/blog',['as' => 'blog.index', 'uses' => 'BlogController@index']);
	Route::get('/blog/{id}', ['as' => 'blog.article', 'uses' => 'BlogController@article']);

	Route::post('/getEarlyAccess', 'HomeController@getEarlyAccess');
	Route::post('/enquire', 'TripController@enquire');
	Route::group(['middleware' => 'auth'], function(){
		/*My booking*/
		Route::get('bookings', ['as' => 'booking.index', 'uses' => 'MyBookingController@index']);
		Route::get('bookings/{id}', ['as' => 'booking.show', 'uses' => 'MyBookingController@show']);
		Route::post('/promo','MyBookingController@comparepromo');
		
		/*Cart*/
		Route::post('/addtocart/{id}', 'BookingController@addtocart');
		Route::get('/trip1', 'BookingController@trip1');
		Route::post('/updateCart', 'BookingController@updateCart');
		Route::get('/deleteBooking', 'BookingController@deleteBooking');
		Route::get('/trip2', 'BookingController@trip2');
		Route::post('/trip2', 'BookingController@posttrip2');

		Route::get('/trip3', 'BookingController@trip3');
		/*Profile with ajax*/
		Route::get('/profile',['as' =>'profile', 'uses' => 'UserController@getprofile']);
		Route::post('profile/avatar/', ['as' => 'profile.upload', 'uses' => 'UserController@upload']);
		Route::post('/updateLeftProfile', 'UserController@updateLeftProfile');
		Route::post('/transaction', 'PaypalController@postPayment');
		Route::get('payment/status', array(
		    'as' => 'payment.status',
		    'uses' => 'PaypalController@getPaymentStatus',
		));
	});
});

