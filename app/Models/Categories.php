<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
    ];


    public function Products()
    {
        return $this->hasMany(Products::class , 'cat_id');   
    }

    public function Vendors()
    {
        $arr = Array();
        $arrays =[];
        $arr =  ($this->hasMany(Products::class, 'cat_id'));   


        foreach($arr as $object)
        {
            $arrays[] = $object->toArray();
        }
        // Dump array with object-arrays
        
        return $arr;
    }
}
