<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Http\Requests\SearchRequest;

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


    public function index(SearchRequest $request)
    {
        $q = \Request::query();

        if(isset($q['word'])) {
            $q['word'] = htmlspecialchars($q['word'], ENT_QUOTES, "UTF-8" );
            $restaurants = $this->restaurantRepository->restaurantsByTopSearch($q['word']);

        } else {
            $restaurants = $this->restaurantRepository->all();
        }

        if ($restaurants->isEmpty()) { $message = 'まだレストランはありません'; }
        if (!$restaurants->isEmpty()) { $message = ''; }

        $restaurants->load('category', 'restaurantImages.image');

        return view('pages.restaurant.index',
            [
                'restaurants' => $restaurants,
                'message'     => $message
            ]
        );
    }

    public function show(Restaurant $restaurant)
    {
        $restaurant->load('category', 'restaurantImages.image');

        return view('pages.restaurant.show',
            [
                'restaurant' => $restaurant
            ]
        );
    }
}
