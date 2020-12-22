<?php



namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\VendorsResource;
use App\Http\Resources\ProductsResource;


class VenCat extends CategoriesResource{
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
            'Vendors'     => $arr,
            ];
    }
}


?>