<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Http\Resources\ProductsResource as ProductsResourceResource;

class ProductsController extends Controller
{
    public function index(){
        $Product = Products::get();
        return ProductsResourceResource::Collection($Product , 200);

        // $usage_manual_details = UsageManualDetails::find($id);
        // if(is_null($usage_manual_details)){
        //     return response()->json(['message'=>'Not found'] , 404);
        // }
    }



    public function insert(Request $request){

            // $rules = [
            //     'name'        => 'required',
            //     'description' => 'required',
            //     'product_id'  => 'required',
            //     'country_id'  => 'required',
            // ];

            // $validator = Validator::make($request->all() , $rules);

            // if ($validator->fails()){
            //     return new VendorsResourceResource($validator->errors()->all() , 400);
            // }

            $image = $request->file('image');
            $imageName = mt_rand(). time().'.'.$image->getClientOriginalExtension();
            $image->move('Images' , $imageName);

            $Product = array(
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imageName,
                'cat_id'      => $request->cat_id,
                'ven_id'      => $request->ven_id,
            );
            
            return new ProductsResourceResource(Products::create($Product) , 200);

    }
}
