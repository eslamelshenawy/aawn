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
// langauge (Arabic - English)
Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';

    if ($lang == 'ar') {
        Session()->put('lang', 'ar');
    } else {
        Session()->put('lang', 'en');
    }

    return back();
});

// Static Pages [Home - About Us]
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');

Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/agent', 'HomeController@agent');
Route::post('/send', 'HomeController@send');


// Login
Auth::routes();
Route::get('/login', function () {
    if (isset(Auth::user()->id)) {
        return redirect('/');
    } else {
        return view('auth.login');
    }
})->name('login');
#########################################  Authenication ###################################################
//Make Login
Route::post('/login/store', 'AuthController@loginStore');
//Make Register
Route::post('/register/store', 'AuthController@registerStore');

Route::get('/active/{active}', 'AuthController@active');

//////////// FaceBook \\\\\\\\\\\\\\
Route::get('login/facebook', 'AuthController@redirectToFacebook');
Route::get('login/facebook/callback', 'AuthController@handleFacebookCallback');

//////////// Twitter \\\\\\\\\\\\\\
Route::get('login/twitter', 'AuthController@redirectToTwitter');
Route::get('login/twitter/callback', 'AuthController@handleTwitterCallback');

//////////// Instagram \\\\\\\\\\\\\\
Route::get('login/instagram', 'AuthController@redirectToInstagram');
Route::get('login/instagram/callback', 'AuthController@handleInstagramCallback');

//////////// Google \\\\\\\\\\\\\\
Route::get('login/google', 'AuthController@redirectToGoogle');
Route::get('login/google/callback', 'AuthController@handleGoogleCallback');

Route::get('list', 'NewsController@list');
Route::get('news/{id}', 'NewsController@index');
Route::get('products/{type}/{dept?}', 'ProductsController@index');
Route::get('prod/show/{id}', 'ProductsController@show');
Route::get('/getcities/{id}','ProfilesController@getCities');
Route::get('/getdepts/{id}','ProfilesController@getDepts');

//Logout
Route::group(['middleware' => 'auth','restrictIp'], function(){
    //Logout
    Route::get('/logout', 'AuthController@logout');

    ######################################### Profile #############################
    Route::get('profile/dashboard', 'ProfilesController@dashboard');
    Route::get('profile', 'ProfilesController@dashboard');
    Route::get('profile/ads', 'ProfilesController@products');
    Route::get('profile/edit', 'ProfilesController@edit');
    Route::post('profile/update', 'ProfilesController@update')->name('profile.update');
    Route::post('profile/agent', 'ProfilesController@agent')->name('profile.agent');
    Route::post('profile/update/password', 'ProfilesController@updatePassword')->name('profile.password');
    Route::post('user/delete', 'ProfilesController@delete');

    ######################################### Favourite #############################
    Route::get('favourite', 'FavouritesController@index');
    Route::post('favourite/store', 'FavouritesController@Favourite')->name('favourite');

    ######################################### Interest #############################
    Route::get('interest', 'InterestsController@index');
    Route::post('interest/store', 'InterestsController@Interest')->name('interest');

    ######################################### Products #############################
    Route::get('product/create/{id?}', 'ProductsController@create');
    Route::post('products/store', 'ProductsController@store')->name('products.store');
    Route::get('edit/{id}', 'ProductsController@edit');
    Route::post('update/{id}', 'ProductsController@update')->name('products.update');
    Route::post('products/delete', 'ProductsController@destroy')->name('products.delete');
    Route::post('/image/delete', 'ProductsController@image');

    ######################################### News #############################
    Route::post('news/store', 'NewsController@store');

    ######################################### Make Order #############################
    Route::post('order/{product_id}', 'OrdersController@store');
    Route::get('other/order', 'OrdersController@other');
    Route::get('my/order', 'OrdersController@my');
    Route::post('orders/delete', 'OrdersController@destroy')->name('orders.delete');
    Route::post('accept/{id}', 'OrdersController@accept');
    Route::post('refuse/{id}', 'OrdersController@refuse');
    Route::get('delivery/{id}', 'OrdersController@delivery');
});

//ClearCache
Route::get('/clearcache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
