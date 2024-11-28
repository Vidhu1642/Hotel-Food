<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('foods')->get();
        return response()->json($hotels);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $hotels = Hotel::where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($hotels);
    }
}
