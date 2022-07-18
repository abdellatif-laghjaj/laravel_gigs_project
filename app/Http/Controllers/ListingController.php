<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listings
    public static function index()
    {
        return view("listings.index", [
            "listings" => Listing::all()
        ]);
    }

    //show single listing
    public static function show(Listing $listing)
    {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }
}
