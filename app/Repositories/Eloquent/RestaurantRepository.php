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


}