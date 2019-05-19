<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
        [
          'name' => 'イタリアンダイニング ケシキ／マンダリン オリエンタル 東京',
          'description_title' => 'イタリアの伝統的な家庭料理を38階の最上階で食べる非日常性',
          'description' => 'ホテル最上階、38階のイタリアンダイニング「ケシキ」は、床から天井まで一面の大きな窓から大手町・丸の内の摩天楼、皇居の森、晴れた日にはaaaaaaaaaaaaaaaaaaa',
          'category_id' => 1,
          'lunch_price_zone' => 3000,
          'dinner_price_zone' => 5000,
          'address' => '東京都渋谷区2-334-4',
          'nearest_station' => '渋谷駅',
          'nearest_station_minutes' => 5,
          'admin_evaluate' => 3,
        ]
      ]);
    }
}
