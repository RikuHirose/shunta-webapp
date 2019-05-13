<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    protected $userService;
    protected $restaurantRepository;
    protected $categoryRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserService $userService,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->userService      = $userService;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository = $categoryRepository;
    }


    public function index(Request $request)
    {
        $q = \Request::query();

         if(isset($q['q'])) {
            $q['q'] = htmlspecialchars($q['q'], ENT_QUOTES, "UTF-8" );
            $restaurants = $this->restaurantRepository->restaurantsByTopSearch($q['q']);

        } else {
            $restaurants = $this->restaurantRepository->getAllRestaurants();
        }

        return view('pages.restaurant.index',
            [
                'restaurants' => $restaurants
            ]
        );
    }
}
