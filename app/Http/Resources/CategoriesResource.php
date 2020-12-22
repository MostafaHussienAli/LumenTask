<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VendorsResource;
use App\Http\Resources\ProductsResource;


class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $arr = Array();
        $arrays = Array();
        $i = 0;
        foreach($this->Vendors as $object )
        {
            $arrays[] = $object->vendors;
        }
        $arr = $arrays;


        
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'image'       => $this->image,
            'Vendors'     => $arr,
            'Products'    => ProductsResource::Collection($this->Products),
            ];
    }

    public function toVendor($request)
    {

        $arr = Array();
        $arrays = Array();
        $i = 0;
        foreach($this->Vendors as $object )
        {
            $arrays[] = $object->vendors;
        }
        $arr = $arrays;


        
        return [
            'Vendors'     => $arr,
            ];
    }
}


