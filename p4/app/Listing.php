<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function realtor()
    {
        # Listing belongs to Realtor
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Realtor');
    }

    public function features()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Feature')->withTimestamps();
    }

    public function getFullAddress($map = true)
    {
        $fullAddress = $this->address . ' ' . $this->city . ', ' . $this->state . ' ' . $this->zip;

        if ($map) {
            return rawurlencode($fullAddress);
        } else {
            return $fullAddress;
        }
    }
}
