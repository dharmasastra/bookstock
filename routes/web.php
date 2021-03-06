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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function(){
    Route::get('/', 'Dashboard\AdminController@index');

    Route::resource('posts', 'Dashboard\BookController')->except([
        'edit', 'destroy', 'update', 'show'
    ]);
    // Route::get('posts/add', 'Dashboard\BookController@create')->name('admin.posts.add');
    // Route::get('posts/list', 'Dashboard\BookController@index')->name('admin.posts.index');
    Route::get('posts/{isbn}/edit', 'Dashboard\BookController@edit')->name('posts.edit');
    Route::get('posts/{isbn}', 'Dashboard\BookController@show')->name('posts.show');
    Route::delete('posts/{isbn}', 'Dashboard\BookController@destroy')->name('posts.destroy');
    Route::put('posts/{isbn}', 'Dashboard\BookController@update')->name('posts.update');
    Route::get('data-buku', 'Dashboard\BookController@dataBuku');

    Route::resource('categories', 'Dashboard\CategoryController');
    // Route::get('category/add', 'Dashboard\CategoryController@create')->name('admin.categories.add');
    // Route::post('category/add', 'Dashboard\CategoryController@store');
    // Route::get('category/list', 'Dashboard\CategoryController@index')->name('admin.categories.index');
    // Route::post('category/{id}/edit', 'Dashboard\CategoryController@edit')->name('admin.categories.edit');
    Route::get('data-category', 'Dashboard\CategoryController@dataCategory');

    Route::resource('users', 'UserController')->except([
        'edit', 'update', 'show'
    ]);
    Route::get('data-users', 'UserController@dataUsers');
});
