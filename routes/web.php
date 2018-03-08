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

Route::get('/', 'IndexController@index')->name('index');
Route::get('memberIndex', 'IndexController@memberIndex')->name('memberIndex');
Route::get('setSchool/{id}', 'IndexController@setSchool')->name('setSchool');

//登录注册
Route::get('register', 'PassportController@showRegisterForm')->name('passport.register');
Route::post('register', 'PassportController@register')->name('passport.register');
Route::get('login', 'PassportController@showLoginForm')->name('passport.login');
Route::post('login', 'PassportController@login')->name('passport.login');
Route::get('logout', 'PassportController@logout')->name('passport.logout');
Route::get('forgot', 'PassportController@showForgotForm')->name('passport.forgot');
Route::post('forgot', 'PassportController@forgot')->name('passport.forgot');

//个人信息
Route::get('user', 'UserController@index')->name('user.index');
Route::prefix('user')->group(function (){
    Route::get('avatar', 'UserController@avatar')->name('user.avatar');
    Route::post('avatar', 'UserController@updateAvatar')->name('user.avatar');
    Route::get('name', 'UserController@name')->name('user.name');
    Route::post('name', 'UserController@updateName')->name('user.name');
    Route::post('gander', 'UserController@updateGender')->name('user.gender');
    Route::post('school', 'USerController@updateSchool')->name('user.school');
});

//书本
Route::get('books/list', 'BooksController@list')->name('books.list');
Route::get('books/my', 'BooksController@my')->name('books.my');
Route::post('upload_image', 'BooksController@uploadImage')->name('books.upload_image');
Route::get('books/show-self/{book}', 'BooksController@showSelf')->name('books.show_self');//注意此处是一个隐式绑定
Route::get('books/toggle_show', 'BooksController@toggleShow')->name('books.toggle_show');
Route::resource('books', 'BooksController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

