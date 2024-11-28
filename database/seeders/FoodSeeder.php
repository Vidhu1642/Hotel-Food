<?php

// database/seeders/FoodSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Hotel;

class FoodSeeder extends Seeder
{
    public function run()
    {
        // Get the hotels to assign them to the foods
        $hotelA = Hotel::where('name', 'Hotel A')->first();
        $hotelB = Hotel::where('name', 'Hotel B')->first();

        // Adding some sample food items with hotel_id as foreign key
        Food::create([
            'name' => 'Pizza',
            'hotel_id' => $hotelA->id, // Hotel A
            'price' => 9.99,
        ]);

        Food::create([
            'name' => 'Burger',
            'hotel_id' => $hotelA->id, // Hotel A
            'price' => 5.99,
        ]);

        Food::create([
            'name' => 'Pasta',
            'hotel_id' => $hotelB->id, // Hotel B
            'price' => 12.99,
        ]);

        Food::create([
            'name' => 'Sushi',
            'hotel_id' => $hotelB->id, // Hotel B
            'price' => 14.99,
        ]);

        Food::create([
            'name' => 'Salad',
            'hotel_id' => $hotelA->id, // Hotel A
            'price' => 7.49,
        ]);

        // Add more sample food items as needed...
    }
}
