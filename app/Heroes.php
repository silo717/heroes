<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heroes extends Model
{
    protected $table = "heroes";

    protected $fillable = [
        'fullname', 'gender'
    ];

    function Powers() {
        return $this->belongsToMany('App\Powers', 'hero_powers', 'hero_id', 'power_id');
    }

    public function Address()
    {
        return $this->belongsToMany('App\Address', 'hero_address', 'address_id', 'power_id');
    }
}
