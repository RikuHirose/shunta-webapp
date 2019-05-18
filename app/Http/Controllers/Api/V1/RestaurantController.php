<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Services\UserService;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    protected $imageRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserService $userService,
        UserRepositoryInterface $userRepository,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository
    )
    {
        $this->userService          = $userService;
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->imageRepository      = $imageRepository;
    }

}
