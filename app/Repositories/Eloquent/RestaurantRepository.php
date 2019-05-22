<?php

namespace App\Repositories\Eloquent;
use App\Repositories\RestaurantRepositoryInterface;
use App\Models\Restaurant;
use App\Repositories\CategoryRepositoryInterface;

class RestaurantRepository implements RestaurantRepositoryInterface
{
    protected $restaurant;
    protected $categoryRepository;

    /**
    * @param object $restaurant
    */
    public function __construct(
      Restaurant $restaurant,
      CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->restaurant = $restaurant;
        $this->categoryRepository = $categoryRepository;
    }

    public function getBlankModel()
    {
        return new Restaurant();
    }

    public function all()
    {
      $restaurant = $this->restaurant->all();

      return $restaurant;
    }

    public function firstOrCreate($input)
    {
      $restaurant = $this->restaurant->firstOrCreate($input);

      return $restaurant;
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

    public function restaurantsByTopSearch($word)
    {
      $models = $this->restaurant;

      $category_id = $this->categoryRepository->findCategoryId($word);

      if(!is_null($category_id)) {
        $models = $models->when($category_id, function ($query) use ($category_id) {
            return $query->where('category_id', $category_id);
        });
      }

      if(isset($word)) {
        $restaurant_name = $word;
        $models = $models->when($restaurant_name, function ($query) use ($restaurant_name) {
            return $query->orWhere('name', 'like', "%{$restaurant_name}%");
        });
      }

      if(isset($word)) {
        $description = $word;
        $models = $models->when($description, function ($query) use ($description) {
            return $query->orWhere('description', 'like', "%{$description}%");
        });
      }

      $models = $models->get();

      return $models;
    }

    public function getRestaurantsbyIds($restaurantIds)
    {
      $restaurants = $this->restaurant
        ->whereIn('id', $restaurantIds)
        ->get();

      return $restaurants;
    }

    public function searchRestaurants($input)
    {
        $name = $input['name'];

        $restaurants = $this->restaurant
        ->where('name', 'like', "%{$name}%")
        ->orWhere('description', 'like', "%{$name}%")
        ->get();

        return $restaurants;
    }
}