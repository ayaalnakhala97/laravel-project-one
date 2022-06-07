<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatogrieResource;
use App\Http\Resources\FlowerResource;
use App\Models\flower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $categories = \App\Models\Category::all();

        $flower = flower::orderBy('id','desc')->take(4)->get();

        return response()->json([
            'message' => 'Welcomew to the catogries api',
            'data' =>[
                'categories' => CatogrieResource::collection($categories),
                'flower' =>FlowerResource::collection($flower),
            ]
        ],201);

    }
    //
    public function flower($id)
    {
        $flower = flower::where("category_id",$id)->get();

        return response()->json([
            'message' => 'Flower has been retrieved successfully',
            'data' =>[
                'flower' =>FlowerResource::collection($flower),
            ]
        ],201);

    }

    public function description($id){
        $description = flower::where("id", $id)->get();

        return response()->json([
            'message' => 'Flower has been  successfully',
            'data' =>[
                'description' =>FlowerResource::collection($description),
            ]
        ],201);


    }

    public function delete($id){
        $flower = flower::find($id);
        $flower->delete();
        return response()->json([
            'message'=>'successfully',
        ],201);
    }
















    //
//    public function trees()
//    {
//        $trees = flower::whereRelation('category','trees')->get();;
//
//        return response()->json([
//            'message' => 'Welcomew to the catogries api',
//            'data' =>[
//                //'categories' => CatogrieResource::collection($categories),
//                'trees' =>FlowerResource::collection($trees),
//            ]
//        ],201);
//
//    }
//
//    //
//    public function sprout()
//    {
//        $sprout = flower::whereRelation('category','name','=','sprout')->get();
//
//        return response()->json([
//            'message' => 'Welcomew to the catogries api',
//            'data' =>[
//                //'categories' => CatogrieResource::collection($categories),
//                'sprout' => FlowerResource::collection($sprout),
//            ]
//        ],201);
//
//    }
//
//    //
//    public function plant()
//    {
//
//        $plant = flower::whereRelation('category','plant')->get();
//
//        return response()->json([
//            'message' => 'Welcomew to the catogries api',
//            'data' =>[
//                //'categories' => CatogrieResource::collection($categories),
//                'plant' =>FlowerResource::collection($plant),
//            ]
//        ],201);
//
//    }
//
//    //
//    public function seed()
//    {
//        $seed = flower::whereRelation('category','seed')->get();
//
//        return response()->json([
//            'message' => 'Welcomew to the catogries api',
//            'data' =>[
//                //'categories' => CatogrieResource::collection($categories),
//                'plant' =>FlowerResource::collection($seed),
//            ]
//        ],201);
//
//    }



}
