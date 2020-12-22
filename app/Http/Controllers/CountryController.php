<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Http\Resources\CountryResource as CountryResourceResource;

// use Validator;

class CountryController extends Controller
{
    public function index(){
        $Country = Country::get();
        return CountryResourceResource::Collection($Country , 200);

        // $usage_manual_details = UsageManualDetails::find($id);
        // if(is_null($usage_manual_details)){
        //     return response()->json(['message'=>'Not found'] , 404);
        // }
    }

    public function insert(Request $request){

        // $rules = [
        //     'name' => 'required',
        // ];

        // $validator = Validator::make($request->all() , $rules);

        // if ($validator->fails()){
        //     return new CountryResourceResource($validator->errors()->all() , 400);
        // }

        $Country = array(
            'name' => $request->name,
        );
        
        return new CountryResourceResource(Country::create($Country) , 200);

    }
}
