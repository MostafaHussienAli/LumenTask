<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Vendors;
use App\Http\Resources\CategoriesResource as CategoriesResourceResource;
use App\Http\Resources\VenCat ;

class CategoriesController extends Controller
{
    public function index(){
        $Category = Categories::get();
        return CategoriesResourceResource::Collection($Category , 200);
    }

    Public function show($id,$country){
        
        $Category = Categories::where('id',$id)->first();
        
        $products = Products::where('cat_id',$Category->id)->pluck('ven_id');

        $vendors = Vendors::whereIn('id',$products)->Where('country_id',$country)->get();

        if(is_null($Category))
        {
            return response()->json(['message'=>'Not found'] , 404);
        }

        return response()->json($vendors);

    }

    public function insert(Request $request){

            $image = $request->file('image');
            $imageName = mt_rand(). time().'.'.$image->getClientOriginalExtension();
            $image->move('Images' , $imageName);

            $Category = array(
                'name'        => $request->name,
                'description' => $request->description,
                'image'       => $imageName,
            );
            
            return new CategoriesResourceResource(Categories::create($Category) , 200);

    }
}
