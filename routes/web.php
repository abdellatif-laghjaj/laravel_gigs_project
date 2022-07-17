<?php

use Illuminate\Http\Request;
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
    return view("listings", [
        "heading" => "Latest Gigs",
        "listings" => [
            [
                'id' => "1",
                'title' => "Gig 1 Title",
                'author' => "@abdel"
            ],
            [
                'id' => "2",
                'title' => "Gig 2 Title",
                'author' => "@abdel"
            ],
            [
                'id' => "3",
                'title' => "Gig 3 Title",
                'author' => "@abdel"
            ],
        ]
    ]);
});

