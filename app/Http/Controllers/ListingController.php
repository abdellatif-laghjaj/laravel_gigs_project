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
            "listings" => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
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
            'company' => ['required', Rule::unique('listings', 'company')],
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'location' => ['required', 'max:50'],
            'website' => ['required', 'url'],
            'description' => ['required', 'max:500'],
            'tags' => ['required', 'max:255'],
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        //redirect to homepage
        return redirect("/")->with("message", "Listing created successfully");
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }
}
