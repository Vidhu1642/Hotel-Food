<?php

// database/seeders/HotelSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run()
    {
        // Adding some sample hotels
        Hotel::create([
            'name' => 'Hotel A',
            'location' => 'New York',
        ]);

        Hotel::create([
            'name' => 'Hotel B',
            'location' => 'Los Angeles',
        ]);
    }
}
