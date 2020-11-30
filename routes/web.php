<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tickets','TicketsController@index')->name('ticket');
Route::get('/tickets/add','TicketsController@create')->name('ticket-add');
Route::post('/tickets/add','TicketsController@store')->name('ticket-add');
Route::get('/tickes/{slug}','TicketsController@show')->name('ticket-detail');
Route::get('/tickets/{slug?}/edit','TicketsController@edit')->name('ticket-edit');
Route::post('/ticket/{slug}/update','TicketsController@update')->name('ticket-update');
Route::post('/ticket/destroy/{slug}','TicketsController@destroy')->name('ticket-destroy');
Route::get('sendemail', function () {
    $data = array(
        'name' => "ThienTran Store",
    );
    Mail::send('emails.welcome', $data, function ($message) {
        $message->to('thientran98qb@gmail.com')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});
Route::post('/commennt','CommentController@newComment')->name('comment');
Route::group(['prefix' => 'admin','namespace'=>'Admin','as'=>'admin-','middleware'=>'manager'], function () {
    Route::get('/','PagesController@home')->name('home');
    Route::get('roles', 'RolesController@index')->name('roles');
    Route::get('roles/create', 'RolesController@create')->name('add-role');
    Route::post('roles/create', 'RolesController@store')->name('add-role');
    Route::group(['prefix' => 'users','as'=>'user-'], function () {
        Route::get('/','UserController@index')->name('index');
        Route::get('/{id}/edit','UserController@edit')->name('edit');
        Route::post('/{id}/edit','UserController@update')->name('edit');
    });
    Route::group(['prefix'=>'category','as'=>'category-'],function(){
        Route::get('/','CategoriesController@index')->name('index');
        Route::get('add','CategoriesController@create')->name('add');
        Route::post('add','CategoriesController@store')->name('add');
        Route::get('edit/{id}','CategoriesController@edit')->name('edit');
        Route::post('edit/{id}','CategoriesController@update')->name('edit');
        Route::post('delete/{id}','CategoriesController@destroy')->name('delete');
    });
    Route::group(['prefix'=>'posts','as'=>'post-'],function(){
        Route::get('/','PostsController@index')->name('index');
        Route::get('add','PostsController@create')->name('add');
        Route::post('add','PostsController@store')->name('add');
        Route::get('edit/{id}','PostsController@edit')->name('edit');
        Route::post('edit/{id}','PostsController@update')->name('edit');
        Route::post('delete/{id}','PostsController@destroy')->name('delete');
    });
});
Route::get('/blog','BlogController@index')->name('blog-index');
Route::get('welcome/{locale}',function($locale){
    App::setLocale($locale);
});