<?php

use Illuminate\Database\Seeder;

class AdminMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menu')->insert([
            [
              'id'        => 8,
              'parent_id' => 0,
              'title'     => 'Models',
              'icon'      => 'fa-bars',
            ]
        ]);

        DB::table('admin_menu')->insert([
        [
          'parent_id' => 8,
          'title'     => 'Categories',
          'icon'      => 'fa-bars',
          'uri'       => 'categories',
        ],
        [
          'parent_id' => 8,
          'title'     => 'Favorites',
          'icon'      => 'fa-bars',
          'uri'       => 'favorites',
        ],
        [
          'parent_id' => 8,
          'title'     => 'Images',
          'icon'      => 'fa-bars',
          'uri'       => 'images',
        ],
        [
          'parent_id' => 8,
          'title'     => 'Restaurant_Images',
          'icon'      => 'fa-bars',
          'uri'       => 'restaurantImages',
        ],
        [
          'parent_id' => 8,
          'title'     => 'Restaurants',
          'icon'      => 'fa-bars',
          'uri'       => 'restaurants',
        ],
        [
          'parent_id' => 8,
          'title'     => 'SocialProviders',
          'icon'      => 'fa-bars',
          'uri'       => 'socialProviders',
        ],
        [
          'parent_id' => 8,
          'title'     => 'Users',
          'icon'      => 'fa-bars',
          'uri'       => 'users',
        ],
      ]);
    }
}
