<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'country_id',
        'created_at',
        'updated_at',
    ];


    public function product()
    {
        return $this->belongsTo(Products::class, 'id');
    }


    public function Country()
    {
        return $this->belongsTo(Country::class, 'id');
    }
    
}
