<?php

use Illuminate\Database\Seeder;

class RestaurantImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_images')->insert([
        [
          'image_id' => 1,
          'restaurant_id' => 1,
        ]
      ]);
    }
}
