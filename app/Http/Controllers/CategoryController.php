<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $data = Category::all();
        $data->prepend(["id" => -1, "name" => "All"]);
        
        return $this->success($data);
    }
}
