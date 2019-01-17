<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realtor extends Model
{
    public function listing()
    {
        # Realtor has many Listings
        # Define a one-to-many relationship.
        return $this->hasMany('App\Listing');
    }

    public function getFullName($reverse = false)
    {
        if ($reverse) {
            return $this->last_name . ', ' . $this->first_name;
        } else {
            return $this->first_name . ' ' . $this->last_name;
        }
    }

    public function getListings()
    {
    }

    public static function getForDropdown()
    {
        $realtors = self::orderBy('last_name')->get();

        $realtorsForDropdown = [];
        foreach ($realtors as $realtor) {
            $realtorsForDropdown[$realtor->id] = $realtor->getFullName($reverse = true);
        }

        return $realtorsForDropdown;
    }

    public function formatPhone()
    {
        $areaCode = substr($this->phone, 0, 3);
        $prefix = substr($this->phone, 3, 3);
        $line = substr($this->phone, 6, 4);

        return '(' . $areaCode . ') ' . $prefix . '-' . $line;
    }
}
