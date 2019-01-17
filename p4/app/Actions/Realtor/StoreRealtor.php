<?php

namespace App\Actions\Realtor;

use App\Realtor;

class StoreRealtor
{
    public function __construct($data, $kind, $id = null)
    {
        if ($kind == 'new') {
            $realtor = new Realtor();
        } else if ($kind == 'edit') {
            $realtor = Realtor::find($id);
        }

        # Save/update the realtor to the database
        $realtor->first_name = $data['first_name'];
        $realtor->last_name = $data['last_name'];
        $realtor->company = $data['company'];
        $realtor->phone = $data['phone'];
        $realtor->email = $data['email'];

        $realtor->save();

        $this->rda = [
            'name' => $realtor->getFullName(),
            'id' => $id,
        ];
    }
}