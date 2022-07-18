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
            "listings" => Listing::latest()->filter(request(['tag', 'search']))->get(),
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
