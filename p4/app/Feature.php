<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function listings()
    {
        return $this->belongsToMany('App\Listing')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $features = self::orderBy('name')->get();

        $featuresForCheckboxes = [];

        foreach ($features as $feature) {
            $featuresForCheckboxes[$feature->id] = $feature->name;
        }

        return $featuresForCheckboxes;
    }

    public static function matchInput($input)
    {
        $features = self::orderBy('name')->get();

        $matchedInput = [];

        foreach ($features as $feature) {
            $pass = ($input != null) ? $input : ['blah'];
            if (in_array($feature->id, $pass)) {
                $matchedInput[$feature->id] = $feature->name;
            }
        }

        return $matchedInput;
    }
}
