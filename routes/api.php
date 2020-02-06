<?php





// route authentication
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::post('logout', 'Api\UserController@logout');

// route countries && cities
Route::get('countries', 'Api\UserController@Countries');
Route::get('cities', 'Api\UserController@Cities');


Route::get('home', 'Api\AawnController@home');
Route::get('about', 'Api\AawnController@about');
Route::get('events', 'Api\AawnController@Events');
Route::get('events/details', 'Api\NewsController@events_details');
Route::get('products', 'Api\AawnController@products');
Route::get('search', 'Api\AawnController@search');
Route::get('orders/custom', 'Api\AawnController@orders');
Route::get('categories', 'Api\AawnController@Categories');
Route::get('Products/details', 'Api\AawnController@Products_details');
Route::get('agent', 'Api\AgentController@agent');
Route::post('send', 'Api\AgentController@send');



    // group of  api
    Route::group(['middleware'=>'auth:api'],function(){

        Route::get('my/order', 'Api\AawnController@myorders');
        Route::get('other/order', 'Api\AawnController@other_orders');
        Route::get('orders/delete', 'Api\AawnController@destroy');
        Route::post('profile/update', 'Api\ProfilesController@update');
        Route::post('profile/agent', 'Api\ProfilesController@agent');
        Route::post('profile/update/password', 'Api\ProfilesController@updatePassword');
        Route::post('profile/delete', 'Api\ProfilesController@delete');
        Route::post('advertise/store', 'Api\AdvertiseController@store');
        Route::get('interest', 'Api\InterestsController@index');
        Route::post('interest/store', 'Api\InterestsController@Interest');
        Route::post('favourite/store', 'Api\FavouritesController@Favourite');
    
    });
