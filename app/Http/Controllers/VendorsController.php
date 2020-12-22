<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vendors;
use App\Http\Resources\VendorsResource as VendorsResourceResource;

class VendorsController extends Controller
{
    public function index(){
        $vendors = Vendors::get();
        return VendorsResourceResource::Collection($vendors , 200);

        // $usage_manual_details = UsageManualDetails::find($id);
        // if(is_null($usage_manual_details)){
        //     return response()->json(['message'=>'Not found'] , 404);
        // }
    }



    public function insert(Request $request){

            // $rules = [
            //     'name' => 'required',
            //     'description' => 'required',
            //     'product_id' => 'required',
            //     'country_id' => 'required',
            // ];

            // $validator = Validator::make($request->all() , $rules);

            // if ($validator->fails()){
            //     return new VendorsResourceResource($validator->errors()->all() , 400);
            // }

            $image = $request->file('image');
            $imageName = mt_rand(). time().'.'.$image->getClientOriginalExtension();
            $image->move('Images' , $imageName);

            $vendors = array(
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imageName,
                'country_id'  => $request->country_id,
            );
            
            return new VendorsResourceResource(Vendors::create($vendors) , 200);

    }
}
