<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $filters = $request->only(['min', 'max', 'category', 'availability']);
        
        if(!empty($filters["min"])){
            if($filters["category"] != "-1"){
                $data = Product::price($filters['min'], $filters['max'])->hascategory($filters["category"])->available($filters['availability'])->paginate(20);
            }else{
                $data = Product::price($filters['min'], $filters['max'])->available($filters['availability'])->paginate(20);
            }
            // if($filters["category"] != "-1"){
            //     $data->hasCategory($filters['category']);
            // } ->IsAvailable($filters['availability'])
            // $data->paginate(20);
        }else{
            $data = Product::paginate(20);
        }
        // $data = Product::query();

        // if($request->has("min")){
        //     $data->where("price", ">=", $request->min);
        // }

        // if($request->has("max")){
        //     $data->where("price", "<=", $request->max);
        // }

        // if($request->category != "-1"){
        //     $data->where("category_id", "=", $request->category);
        // }

        // if($request->available){
        //     $data->where("available", "=", $request->available);
        // }

        // $results = $data->paginate(20);
        
        return $this->success($data);
    }
}
