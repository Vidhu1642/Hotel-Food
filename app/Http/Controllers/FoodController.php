<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foodItems = Food::with('hotel')->get();
        return response()->json($foodItems);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $foods = Food::where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($foods);
    }
}

