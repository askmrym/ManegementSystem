<?php
use App\Http\Controllers\ProductController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list', 'ProductController@showList')->name('list');

Route::get('/detail/{id}', 'ProductController@showDetail')->name('detail');

Route::delete('/delete{id}', 'ProductController@delete')
->name('list.delete');

Route::get('/create', 'ProductController@create')->name('create');

Route::post('/store', 'ProductController@store')->name('store');

Route::get('/edit/{id}', 'ProductController@edit')->name('edit');

Route::post('/update/{id}','ProductController@update')->name('update');