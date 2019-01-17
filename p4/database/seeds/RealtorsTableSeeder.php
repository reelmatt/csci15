<?php

use Illuminate\Database\Seeder;
use App\Realtor;

class RealtorsTableSeeder extends Seeder
{

    public function run()
    {
        /**format --- ['first_name', 'last_name', 'company', 'phone', 'email']**/
        $realtors = [
            ['John', 'Smith',   'Apartment Rental Experts', '617123555',  'john@arx.com'],
            ['Jane', 'Doe',     'Zillow',                   '6173452000', 'jane@zillow.com'],
            ['Rand', 'McNally', 'Zillow',                   '6177891000', 'bob@zillow.com'],
            ['Troy', 'McClure', 'Zillow',                   '718123555',  'troy@zillow.com'],
            ['Kara', 'Thrace',  'Apartment Rental Experts', '7183452000', 'kara@arx.com'],
            ['Dee',  'Adama',   'Apartment Rental Experts', '7187891000', 'dee@arx.com'],
        ];

        $count = count($realtors);

        # Loop through each realtor, adding them to the database
        foreach ($realtors as $realtorData) {
            $realtor = new Realtor();

            $realtor->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $realtor->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $realtor->first_name = $realtorData[0];
            $realtor->last_name = $realtorData[1];
            $realtor->company = $realtorData[2];
            $realtor->phone = $realtorData[3];
            $realtor->email = $realtorData[4];

            $realtor->save();

            $count--;
        }
    }
}
