<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    public $timestamps = false;
    /**
     * Get the Vehicles with the Vehicle Status.
     */
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'transmission_id', 'id');
    }
}
