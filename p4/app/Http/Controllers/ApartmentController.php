<?php

namespace App\Http\Controllers;

use App\Actions\Listing\SearchListings;
use App\Actions\Listing\StoreListing;
use Illuminate\Http\Request;
use App\Listing;
use App\Realtor;
use App\Feature;

class ApartmentController extends Controller
{
    /*
     * GET /apartments
     */
    public function index()
    {
        $listings = Listing::orderBy('price')->with('realtor')->get();

        return view('apartments.index')->with([
            'listings' => $listings,
        ]);
    }

    /*
     * GET /apartments/create
     */
    public function create()
    {
        return view('apartments.create')->with([
            'realtorsForDropdown' => Realtor::getForDropdown(),
            'featuresForCheckboxes' => Feature::getForCheckboxes(),
            'listing' => new Listing(),
            'features' => [],
        ]);
    }

    /*
    * Asks user to confirm they actually want to delete the listing
    * GET /apartments/{id}/delete
    */
    public function delete($id)
    {
        $listing = Listing::find($id);

        if (!$listing) {
            return redirect('apartments')->with('alert', 'Listing not found');
        }

        return view('apartments.delete')->with([
            'listing' => $listing,
        ]);
    }

    /*
    * Actually deletes the listing
    * DELETE /apartments/{id}/delete
    */
    public function destroy($id)
    {
        $listing = Listing::find($id);

        $listing->features()->detach();

        $listing->delete();

        return redirect('/apartments')->with(
            ['success' => 'Listing successfully deleted!']
        );
    }

    /**
     * Show the form to edit an existing listing
     * GET /apartments/{id}/edit
     */
    public function edit($id)
    {
        # Find the listing the visitor is requesting to edit
        $listing = Listing::find($id);

        # Handle the case where we can't find the given listing
        if (!$listing) {
            return redirect('/apartments')->with(
                ['alert' => 'Listing ' . $id . ' not found.']
            );
        }

        $realtor = Realtor::find($listing->realtor_id);

        # Show the listing edit form
        return view('apartments.edit')->with([
            'realtorsForDropdown' => Realtor::getForDropdown(),
            'featuresForCheckboxes' => Feature::getForCheckboxes(),
            'features' => $listing->features()->pluck('features.id')->all(),
            'listing' => $listing,
            'realtor' => $realtor,
        ]);
    }

    /**
     * Display results from user's search along with repeat form for user to
     * update search parameters
     * GET /apartments/search/results
     */
    public function results(Request $request)
    {
        $listings = Listing::all();

        $allFeatures = $request->input('features');
        $matchedFeatures = Feature::matchInput($allFeatures);

        #Retrieve data from form
        $searchQueries = [
            'price' => $this->price = $request->input('price'),
            'beds' => $this->beds = $request->input('beds'),
            'baths' => $this->baths = $request->input('baths'),
            'sqft' => $this->sqft = $request->input('sqft'),
            'features' => $matchedFeatures,
        ];

        $featuresForCheckboxes = Feature::getForCheckboxes();
        $results = new SearchListings($listings, $searchQueries);

        return view('apartments.results')->with([
            'results' => $results->listings,
            'queries' => $results->queries,
            'queryString' => $results->formatQueries($featuresForCheckboxes),
            'data' => $searchQueries,
            'featuresForCheckboxes' => $featuresForCheckboxes,
            'submitted' => true,
        ]);
    }

    /**
     * Show form with inputs user can search current listings from
     * GET /apartments/search
     */
    public function search()
    {
        return view('apartments.search')->with([
            'featuresForCheckboxes' => Feature::getForCheckboxes(),
        ]);
    }

    /*
     * GET /apartments/{id}
     */
    public function show($id)
    {
        $listing = Listing::find($id);

        if (!$listing) {
            return redirect('/apartments')->with(
                ['alert' => 'Listing ' . $id . ' not found.']
            );
        }

        return view('apartments.show')->with([
            'listing' => $listing,
            'features' => $listing->features()->pluck('features.name')->toArray(),
        ]);
    }

    /**
     * Process the form to create a new listing
     * POST /apartments
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string',
            'city' => 'required|alpha',
            'state' => 'required|alpha|size:2',
            'zip' => 'required|digits:5',
            'price' => 'nullable|numeric',
            'date_available' => 'nullable|date',
            'reference_url' => 'nullable|url',
            'beds' => 'nullable|numeric',
            'baths' => 'nullable|numeric',
            'sqft' => 'nullable|numeric',
            'realtor_id' => 'required',
        ]);

        $action = new StoreListing($request, 'new');

        # Send the user back to the page to add a book; include the title as part of the redirect
        # so we can display a confirmation message on that page
        return redirect('/apartments/')->with([
            'success' => 'Your listing ' . $action->rda['address']. ' was added.'
        ]);
    }

    /**
     * Process the form to edit an existing listing
     * PUT /apartments/{id}
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required|string',
            'city' => 'required|alpha',
            'state' => 'required|alpha|size:2',
            'zip' => 'required|digits:5',
            'price' => 'nullable|numeric',
            'date_available' => 'nullable|date',
            'reference_url' => 'nullable|url',
            'beds' => 'nullable|numeric',
            'baths' => 'nullable|numeric',
            'sqft' => 'nullable|numeric',
            'realtor_id' => 'required',
        ]);

        $action = new StoreListing($request, 'edit', $id);

        # Send the user back to the edit page in case they want to make more edits
        return redirect('/apartments/' . $action->rda['id'] . '/')->with([
            'success' => 'Your changes were saved!'
        ]);
    }
}
