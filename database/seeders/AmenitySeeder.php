<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'name' => 'Club Room',
                'description' => 'Maximum Reservation Time:4 hrs
                Must be booked at least:2 Days in advance and no more than 60 Days in advance
                Individual Max Reservations Per Day:3',
                'price' => 100
            ],
            [
                'name' => 'Guest suite',
                'description' => 'Must be booked at least:5 Days in advance and no more than 60 Days in advance',
                'price' => 150
            ],
            [
                'name' => 'Swimming pool',
                'description' => 'the spacious rooftop pool features an infinity edge, tons of seating, and expansive views. If that wasn\'t enough, they truly stepped it up a notch by offering an underwater sound system and one-acre of beautiful landscape.',
                'price' => null
            ],
            [
                'name' => 'Fitness center',
                'description' => 'Modern Apartments with Timeless elegance.” The Axis on Wycliff, located in Turtle Creek, boasts modern details and cool interior tones, giving it a very luxurious vibe. Axis is also home to a two-level fitness facility. The bottom floor is cardio central, hosting all your treadmills, ellipticals, and a few arm/leg machines while the top floor has tons of floor space for stretching, HIIT workouts, and stationary bikes for cycling. Oh! And, it overlooks the pool, and working out with a pool view is always the best.',
                'price' => null
            ],
            [
                'name' => 'Laundry',
                'description' => 'A leader in multifamily laundry since 1947, WASH sells top-brand commercial laundry equipment specially designed for multifamily settings, so you can rest assured that your new washers and dryers will stand up to the heavy demands of your apartment\'s busy common-area laundry room.',
                'price' => null
            ]
        ];

        foreach ($amenities as $amenity) {
            $amenity['user_id'] = 3;
            $amenity['property_id'] = 1;
            Amenity::factory()->create($amenity);
        }
    }
}
