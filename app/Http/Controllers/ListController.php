<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ListController extends Controller
{
    public function index(Request $request){
        $filters = $request->only(['min', 'max', 'category', 'available']);
        $data = Product::with(['category'])->all();
        
        return $this->success($data);
    }
}
