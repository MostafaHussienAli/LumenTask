<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];


    public function Vendors()
    {
        return $this->hasMany(Vendors::class , 'country_id');   
    }
}
