<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
        [
          'url' => 'https://rlx.jp/relux/img/hotelpictures/RP21591_1029.jpg?1549501666'
        ]
      ]);
    }
}
