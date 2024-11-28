<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample food data with categories
        $foods = [
            [
                'name' => 'Pizza',
                'hotel_id' => 1, // Assuming hotel with ID 1 exists
                'price' => 9.99,
                'category' => 'Fast Food'
            ],
            [
                'name' => 'Burger',
                'hotel_id' => 1,
                'price' => 5.99,
                'category' => 'Fast Food'
            ],
            [
                'name' => 'Pasta',
                'hotel_id' => 2,
                'price' => 12.99,
                'category' => 'Italian'
            ],
            [
                'name' => 'Sushi',
                'hotel_id' => 2,
                'price' => 14.99,
                'category' => 'Japanese'
            ],
            [
                'name' => 'Salad',
                'hotel_id' => 3,
                'price' => 7.49,
                'category' => 'Vegetarian'
            ]
        ];

        // Insert food data into the food table
        foreach ($foods as $food) {
            Food::create([
                'name' => $food['name'],
                'hotel_id' => $food['hotel_id'],
                'price' => $food['price'],
                'category' => $food['category'] // Add category field
            ]);
        }
    }
}
