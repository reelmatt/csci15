<?php

namespace App\Actions\Listing;

use App\Listing;

class StoreListing
{
    public function __construct($data, $kind, $id = null)
    {
        if ($kind == 'new') {
            $listing = new Listing();
        } else if ($kind == 'edit') {
            $listing = Listing::find($id);
        }

        # Save/update the listing to the database
        $listing->address = ucwords($data['address']);
        $listing->city = ucwords($data['city']);
        $listing->state = strtoupper($data['state']);
        $listing->zip = $data['zip'];
        $listing->price = $data['price'];
        $listing->date_available = date('Y-m-d', strtotime($data['date_available']));
        $listing->reference_url = $data['reference_url'];
        $listing->beds = $data['beds'];
        $listing->baths = $data['baths'];
        $listing->sqft = $data['sqft'];
        $listing->realtor_id = $data['realtor_id'];

        if ($kind == 'new') {
            $listing->save();
            $listing->features()->sync($data['features']);
        } else if ($kind == 'edit') {
            $listing->features()->sync($data['features']);
            $listing->save();
        }

        $this->rda = [
            'address' => $listing->address,
            'id' => $id,
        ];
    }
}