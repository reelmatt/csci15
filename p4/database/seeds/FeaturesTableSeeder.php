<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeaturesTableSeeder extends Seeder
{

    public function run()
    {
        $features = ['parking', 'cats', 'dogs', 'porch', 'gas', 'electric', 'water'];

        foreach ($features as $featureName) {
            $feature = new Feature();
            $feature->name = $featureName;
            $feature->save();
        }
    }
}
