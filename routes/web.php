<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

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

//All listings
Route::get('/', [ListingController::class, 'index']);

//show create post
Route::get("/listings/create", [ListingController::class, "create"]);

//store listing data
Route::post("/listings", [ListingController::class, "store"]);

//show edit form
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Single listing
Route::get("/listing/{listing}", [ListingController::class, 'show']);
