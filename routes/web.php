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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/about", function (){
    return response("<h1>About Us</h1>");
});

Route::get("/posts", function (){
    return "<h1>Posts</h1>";
});

Route::get("/posts/{id}", function ($id){
    return "Post #".$id;
})->where("id", "[0-9]*");


