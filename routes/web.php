<?php

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




Route::group(['prefix' => 'admin'], function(){

  Route::get('salut', function(){
    return 'salut';
  });

  Route::get('salut/{slug}-{id}', function($slug, $id){
    return "Lien : " . route('salut', ['slug' => $slug, 'id' => $id]);
  })->where('slug', '[a-z0-9\-]+')
    ->where('id', '[0-9]+')
    ->name('salut');

});

Route::get('/', function () {
    return view('welcome');
});
