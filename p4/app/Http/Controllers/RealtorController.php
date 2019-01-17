<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realtor;
use App\Actions\Realtor\StoreRealtor;

class RealtorController extends Controller
{
    /*
     * GET /realtors
     */
    public function index()
    {
        $realtors = Realtor::orderBy('last_name')->with('listing')->get();

        return view('realtors.index')->with([
            'realtors' => $realtors,
        ]);
    }

    /*
     * GET /realtors/create
     */
    public function create()
    {
        return view('realtors.create')->with([
            'realtor' => new Realtor(),
        ]);
    }

    /**
     * Asks user to confirm they actually want to delete the realtor
     * If the realtor has associated listings, the user is asked to
     * delete those first
     * GET /realtors/{id}/delete
     */
    public function delete($id)
    {
        $realtor = Realtor::find($id);

        if (!$realtor) {
            return redirect('realtors')->with('alert', 'Realtor not found');
        }

        return view('realtors.delete')->with([
            'realtor' => $realtor,
        ]);
    }

    /*
    * Actually deletes the realtor
    * DELETE /realtors/{id}/delete
    */
    public function destroy($id)
    {
        $realtor = Realtor::find($id);

        $realtor->delete();

        return redirect('/realtors')->with(
            ['success' => 'Listing successfully deleted!']
        );
    }

    /**
     * Show the form to edit an existing listing
     * GET /realtors/{id}/edit
     */
    public function edit($id)
    {
        # Find the book the visitor is requesting to edit
        $realtor = Realtor::find($id);

        # Handle the case where we can't find the given book
        if (!$realtor) {
            return redirect('/realtors')->with(
                ['alert' => 'Realtor ' . $id . ' not found.']
            );
        }

        # Show the book edit form
        return view('realtors.edit')->with([
            'realtor' => $realtor
        ]);
    }

    /*
     * GET /realtors/{id}
     */
    public function show($id)
    {
        $realtor = Realtor::find($id);

        if (!$realtor) {
            return redirect('/realtors')->with(
                ['alert' => 'Realtor ' . $id . ' not found.']
            );
        }

        return view('realtors.show')->with([
            'realtor' => $realtor,
        ]);
    }

    /**
     * Process the form to create a new realtor
     * POST /realtors
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'required|string',
            'phone' => 'required|digits:9',
            'email' => 'required|email',
        ]);

        $action = new StoreRealtor($request, 'new');

        return redirect('/realtors/')->with([
            'success' => 'Your realtor ' . $action->rda['name'] . ' was added.'
        ]);
    }

    /**
     * Process the form to edit an existing listing
     * PUT /realtors/{id}
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company' => 'required|string',
            'phone' => 'required|digits:9',
            'email' => 'required|email',
        ]);

        $action = new StoreRealtor($request, 'edit', $id);

        # Send the user back to the edit page in case they want to make more edits
        return redirect('/realtors/' . $action->rda['id'] . '/')->with([
            'success' => 'Your changes were saved!'
        ]);
    }
}
