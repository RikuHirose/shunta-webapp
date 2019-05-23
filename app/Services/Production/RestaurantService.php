<?php
namespace App\Services\Production;

use App\Models\Restaurant;
use App\Repositories\RestaurantRepositoryInterface;
use App\Services\RestaurantServiceInterface;

class RestaurantService implements RestaurantServiceInterface
{
  protected $restaurantRepository;

  public function __construct(
        RestaurantRepositoryInterface $restaurantRepository
  )
  {
      $this->restaurantRepository = $restaurantRepository;
  }

  public function getRestaurantsByParameter($parameter)
  {

    if(isset($parameter)) {
        $word       = isset($parameter['word']) ? e($parameter['word']) : null;
        $high_price = isset($parameter['high_price']) ? e($parameter['high_price']) : null;
        $low_price  = isset($parameter['low_price']) ? e($parameter['low_price']) : null;

        // ?? lunch or dinnerかparameterから判定する
        $restaurants = $this->restaurantRepository->restaurantsByTopSearch($word, $high_price, $low_price);

    } else {
        $restaurants = $this->restaurantRepository->all();
    }

    return $restaurants;

  }

}