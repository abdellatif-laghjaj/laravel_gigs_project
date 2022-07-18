<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        return view("listings.index", [
            "listings" => Listing::latest()->filter(request(['tag', 'search']))->get(),
        ]);
    }

    //show single listing
    public function show(Listing $listing)
    {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }

    //create a listning
    public function create()
    {
        return view("listings.create");
    }

    //store a listing
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', 'max:50'],
            'company' => ['required', Rule::unique('Listings', 'company')],
            'email' => ['required', 'email', Rule::unique('Listings', 'email')],
            'website' => ['required', 'url'],
            'description' => ['required', 'max:500'],
            'tags' => ['required', 'max:255'],
            'logo' => ['required', 'image'],
        ]);

        redirect('/');
    }
}
