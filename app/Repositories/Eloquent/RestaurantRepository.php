<?php

namespace App\Repositories\Eloquent;
use App\Repositories\RestaurantRepositoryInterface;
use App\Models\Restaurant;

class RestaurantRepository implements RestaurantRepositoryInterface
{
    protected $restaurant;

    /**
    * @param object $restaurant
    */
    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function lessonsByBreadCrumbSearch($q)
    {
        $models = $this->restaurant
        ->where('lesson_professor', 'like', "%{$q}%")
        ->orwhere('sub_title', 'like', "%{$q}%")
        ->orwhere('subsub_title', 'like', "%{$q}%")
        ->orwhere('lesson_title', 'like', "%{$q}%")
        ->get();

        return $models;
    }

    public function restaurantsByTopSearch($q)
    {
      // $models = $this->restaurant;

      // if(isset($q['name'])) {
      //     $restaurant_name  = $q['name'];
      //     $models = $models->when($restaurant_name, function ($query) use ($restaurant_name) {
      //         return $query->where('name', 'like', "%{$restaurant_name}%");
      //     });
      // }

      // if(isset($q['year'])) {
      //     $year              = $q['year'];
      //     $models = $models->when($year, function ($query) use ($year) {
      //         return $query->where('year', $year);
      //     });
      // }

      // $models = $models->get();

      return $models;
    }

    public function getAllRestaurants() {

      $models = $this->restaurant->all();

      return $models;
    }
}