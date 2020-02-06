<?php
/**
 * |--------------------------------------------------------------------------
 * | Admin Routes
 * |-------------
 * Created by PhpStorm.
 * User: Karim Helmy
 * Date: 1/12/2019
 * Time: 5:47 PM
 */

   //////// SingleTon Start
    $singletonarray = [
        'at'=>'admin',
        'aurl'=>'admin',
        'language'=>['ar','en'],
    ];
    foreach($singletonarray as $key => $value)
    {
        app()->singleton($key,function() use ($value){
            return $value;
        });
    }

//////// SingleTon End



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Config::set('auth.defines', 'admin');
    // Login

    Route::get('login', 'AdminAuthController@login');
    Route::get('/recovery/password', 'AdminAuthController@forget_password');
    Route::post('/recovery/password', 'AdminAuthController@send_password');
    Route::post('login', 'AdminAuthController@dologin');

    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('/', 'AdminController@admin');


        // News

        Route::resource('department_news','DepNews');
        Route::resource('news','NewsController');
        Route::get('comments/{id}/edit', 'NewsController@comments');
        Route::post('comments/{id}/delete', 'NewsController@deleteComment')->name('comments.destroy');
        Route::delete('news/destroyimage/{id}', 'NewsController@destroyimage');

        // Admins

        Route::any('logout', 'AdminAuthController@logout');
        Route::get('/admins', 'AdminController@index');
        Route::get('/admins/create', 'AdminController@create');
        Route::post('/admins', 'AdminController@store');
        Route::get('/admins/edit/{id}', 'AdminController@edit');
        Route::post('/admins/update/{id}', 'AdminController@update');


        // Users

        Route::get('/users/create', 'UserController@create');
        Route::get('/users', 'UserController@index');
        Route::post('/users', 'UserController@store');
        Route::get('/users/edit/{id}', 'UserController@edit');
        Route::get('/users/show/{id}', 'UserController@show');
        Route::post('/users/update/{id}', 'UserController@update');
        Route::post('/users/all/delete', 'UserController@allDelete');
        Route::post('/users/block', 'UserController@block');


        // Countries

        Route::get('/countries/create', 'CountriesController@create');
        Route::get('/countries', 'CountriesController@index');
        Route::post('/countries', 'CountriesController@store');
        Route::get('/countries/edit/{id}', 'CountriesController@edit');
        Route::post('/countries/update/{id}', 'CountriesController@update');
        Route::delete('countries/destroy/{id}', 'CountriesController@destroy');
        Route::get('/countries/cities/{id}', 'CountriesController@show');
        Route::post('countries/check/parent','CountriesController@check_parent');
        Route::get('/countries/city_agents/{id}', 'CountriesController@city_agents');
        Route::post('countries/check/parent','AgentController@check_parent');

        // Agents

        Route::get('/agents/create', 'AgentController@create');
        Route::post('/agents/store', 'AgentController@store');
        Route::get('/getcities/{id}','AgentController@getCities');
        Route::get('/agents', 'AgentController@index');
        Route::get('/agents/edit/{id}', 'AgentController@edit');
        Route::post('/agents/update/{id}', 'AgentController@update');


        // FAQ And Gallery

        Route::resource('faq','FaqController');
        Route::resource('slider','SliderController');


        // Products

        Route::resource('department_product','DepProductController');
        Route::post('department_product/check/parent','DepProductController@check_parent');
        Route::resource('products','ProductsController');
        Route::post('products/import_products','ProductsController@import_products');
        Route::post('products/check/parent','ProductsController@check_parent');
        Route::delete('products/destroyimage/{id}', 'ProductsController@destroyimage');
        Route::post('/products/all/delete', 'ProductsController@allDelete');

        // Setting

        Route::get('/setting', 'SettingsController@index');
        Route::post('/setting', 'SettingsController@setting_save');


        ////order///
        Route::get('/orders','OrderController@index');
        Route::get('/orders/details/{id}','OrderController@details');
        Route::post('/orders/status/{id}','OrderController@status');

        ////tickets///
        Route::get('/tickets','SupportTicketsController@index');
        Route::get('/tickets/details/{id}','SupportTicketsController@details');
        Route::post('/tickets/status/{id}','SupportTicketsController@status');

        ////contactus
        Route::get('/allcontact','AdminController@allContact');
        Route::get('/deletecontact/{id}','AdminController@deleteContact');

        ///aboutUs
        Route::get('/updateabout','AdminController@updateAboutUs');
        Route::post('/editabout','AdminController@editAbout');


        // Lang

        Route::get('lang/{lang}', function ($lang) {
            session()->has('lang') ? session()->forget('lang') : '';

            if ($lang == 'ar') {
                Session()->put('lang', 'ar');
            } else {
                Session()->put('lang', 'en');
            }

            return back();
        });
    });
});
