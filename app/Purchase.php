<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $table = 'purchase';

    protected $fillable = ['customerName', 'offeringID', 'quantity'];

    public $timestamps = false;

    function offering()
    {
        return $this->hasOne('App\Offering', 'id', 'offeringID');
    }
}
