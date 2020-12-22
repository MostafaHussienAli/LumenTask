<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'cat_id',
        'ven_id',
        'created_at',
        'updated_at',
    ];


    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'id');
    }


    public function Vendors()
    {
        return $this->belongsTo(Vendors::class, 'id');
    }

}
