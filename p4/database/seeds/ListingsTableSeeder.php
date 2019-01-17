<?php

use Illuminate\Database\Seeder;
use App\Listing;
use App\Realtor;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**format --- ['address', 'city', 'state', 'zip', 'price', 'realtor', 'date_avail', 'reference_url', beds, baths, sqft]**/
        $listings = [
            ['39 Baker St #1',     'Malden',        'MA', '02148', 2000, 'John Smith',   '2018-09-01', 'https://www.zillow.com/homedetails/39-Baker-St-1-Malden-MA-02148/2092055813_zpid/',           3, 1, 1592],
            ['375 Main St',        'Malden',        'MA', '02149', 2300, 'Jane Doe',     '2018-04-01', 'https://www.zillow.com/homedetails/375-Main-St-106-Everett-MA-02149/2090942460_zpid/',        2, 1, null],
            ['167 Boylston St',    'Boston',        'MA', '02116', 1795, 'Rand McNally', '2018-06-01', 'https://www.zillow.com/homedetails/167-Boylston-St-Boston-MA-02116/59133304_zpid/',           1, 1, 900],
            ['2971 Washington St', 'Boston',        'MA', '02119', 2175, 'Troy McClure', '2018-09-01', 'https://www.zillow.com/homedetails/2971-Washington-St-432-Boston-MA-02119/2089863392_zpid/',  2, 1, 800],
            ['15 Phillips St',     'Watertown',     'MA', '02472', 2900, 'Kara Thrace',  '2018-05-01', 'https://www.apartmentrentalexperts.com/ApartmentForRent/Listing/132663',                      3, 2, null],
            ['30 Sparks St',       'Cambridge',     'MA', '02138', 2900, 'Kara Thrace',  '2018-09-01', 'https://www.apartmentrentalexperts.com/ApartmentForRent/Listing/172943',                      2, 1, null],
            ['24 Rossmore St',     'Somerville',    'MA', '02143', 2875, 'Dee Adama',    '2018-09-01', 'https://www.apartmentrentalexperts.com/ApartmentForRent/Listing/142112',                      3, 1, null],
            ['85 Ellery St',       'Cambridge',     'MA', '02138', 2500, 'Dee Adama',    '2018-09-01', 'https://www.apartmentrentalexperts.com/ApartmentForRent/Listing/129435',                      2, 1, null],
            ['98 Sheridan St #2',  'Jamaica Plain', 'MA', '02130', 2200, 'Rand McNally', '2018-09-01', 'https://www.zillow.com/homedetails/98-Sheridan-St-2-Jamaica-Plain-MA-02130/2097661782_zpid/', 2, 1, null],
        ];

        $count = count($listings);

        foreach ($listings as $key => $listingData) {
            # First, figure out the id of the realtor we want to associate with this listing

            # Extract just the last name from the listing data...
            # Troy McClure => ['Troy', 'McClure'] => 'McClure'
            $name = explode(' ', $listingData[5]);
            $lastName = array_pop($name);

            # Find that author in the authors table
            $realtor_id = Realtor::where('last_name', '=', $lastName)->pluck('id')->first();

            $listing = new Listing();

            $listing->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $listing->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $listing->address = $listingData[0];
            $listing->city = $listingData[1];
            $listing->state = $listingData[2];
            $listing->zip = $listingData[3];
            $listing->price = $listingData[4];
            $listing->realtor_id = $realtor_id;
            $listing->date_available = $listingData[6];
            $listing->reference_url = $listingData[7];
            $listing->beds = $listingData[8];
            $listing->baths = $listingData[9];
            $listing->sqft = $listingData[10];

            $listing->save();
            $count--;
        }
    }
}
