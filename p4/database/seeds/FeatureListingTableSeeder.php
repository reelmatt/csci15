<?php

use Illuminate\Database\Seeder;
use App\Feature;
use App\Listing;

class FeatureListingTableSeeder extends Seeder
{
    public function run()
    {
        $listings = [
            '375 Main St' => ['cats', 'dogs', 'parking'],
            '167 Boylston St' => ['cats', 'dogs', 'gas', 'electric'],
            '2971 Washington St' => ['parking', 'porch'],
            '15 Phillips St' => ['parking'],
            '30 Sparks St' => ['parking', 'gas'],
            '24 Rossmore St' => ['cats', 'dogs', 'parking'],
            '85 Ellery St' => ['cats', 'gas'],
            '98 Sheridan St #2' => ['porch', 'gas', 'electric', 'water', 'cats'],
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($listings as $title => $features) {
            # First get the book
            $listing = Listing::where('address', 'like', $title)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($features as $featureName) {
                $feature = Feature::where('name', 'LIKE', $featureName)->first();

                # Connect this tag to this book
                $listing->features()->save($feature);
            }
        }
    }
}
