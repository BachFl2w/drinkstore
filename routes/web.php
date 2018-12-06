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


Auth::routes();

Route::post('login_admin', 'UserController@login')->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.index');

    Route::get('logout', 'UserController@logoutAdmin')->name('admin.logout');

    Route::group(['prefix' => 'role'], function () {

        Route::get('index', 'RoleController@index')->name('admin.role.index');

        Route::get('json', 'RoleController@getDataJson')->name('admin.role.json');

        Route::post('store', 'RoleController@store')->name('admin.role.store');

        Route::post('update/{id}', 'RoleController@update')->name('admin.role.update');

        Route::get('destroy/{id}', 'RoleController@destroy')->name('admin.role.destroy');

    });

    Route::group(['prefix' => 'user'], function() {

        Route::get('index', 'UserController@index')->name('admin.user.index');

        Route::get('create', 'UserController@create')->name('admin.user.create');

        Route::post('store', 'UserController@store')->name('admin.user.store');

        Route::get('edit/{user}', 'UserController@edit')->name('admin.user.edit');

        Route::post('update/{user}', 'UserController@update')->name('admin.user.update');

        Route::get('/destroy/{user}', 'UserController@destroy')->name('admin.user.destroy');

        Route::get('/active/{user}', 'UserController@active')->name('admin.user.active');
    });

    Route::group(['prefix' => 'feedback'], function() {
        Route::get('index', 'FeedbackController@index')->name('admin.feedback.index');

        Route::get('edit/{id}', 'FeedbackController@edit')->name('admin.feedback.edit');

        Route::post('send_mail', 'FeedbackController@send')->name('admin.feedback.send_mail');

        Route::post('update/{id}', 'FeedbackController@update')->name('admin.feedback.update');
    });

    Route::group(['prefix' => 'product'], function () {

        Route::get('index', 'ProductController@index')->name('admin.product.index');

        Route::get('getDataJson', 'ProductController@getDataJson')->name('admin.product.json');

        Route::post('store', 'ProductController@store')->name('admin.product.store');

        Route::get('{id}/images', 'ProductController@getImages')->name('admin.product.images');

        Route::post('upload-image', 'ProductController@uploadMoreImage')->name('admin.product.uploadimage');

        Route::get('show/{id}', 'ProductController@show')->name('admin.product.show');

        Route::post('update/{id}', 'ProductController@update')->name('admin.product.update');

        Route::post('change-main-image', 'ProductController@changMainImage')->name('admin.product.change_main_image');

    });

    Route::group(['prefix' => 'category'], function() {

        Route::get('index', 'CategoryController@index')->name('admin.category.index');

        Route::get('create', 'CategoryController@create')->name('admin.category.create');

        Route::post('store', 'CategoryController@store')->name('admin.category.store');

        Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');

        Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('destroy/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'topping'], function() {

        Route::get('index', 'ToppingController@index')->name('admin.topping.index');

        Route::get('create', 'ToppingController@create')->name('admin.topping.create');

        Route::post('store', 'ToppingController@store')->name('admin.topping.store');

        Route::get('edit/{id}', 'ToppingController@edit')->name('admin.topping.edit');

        Route::post('update/{id}', 'ToppingController@update')->name('admin.topping.update');

        Route::get('destroy/{id}', 'ToppingController@destroy')->name('admin.topping.destroy');
    });

    Route::group(['prefix' => 'order'], function() {

        Route::get('json', 'OrderController@getDataJson')->name('admin.order.json');

        Route::get('index', 'OrderController@index')->name('admin.order.index');

        Route::get('detail/index/{id}', 'OrderDetailController@index')->name('admin.detail.index');

        Route::get('detail/{id_order}', 'OrderDetailController@show')->name('admin.detail.json');
    });
});
