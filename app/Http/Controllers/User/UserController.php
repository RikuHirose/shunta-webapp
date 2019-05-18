<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Services\UserService;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserService $userService,
        UserRepositoryInterface $userRepository,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->userService          = $userService;
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
    }

    public function show()
    {
        return view('pages.user.show',
            [
            ]
        );
    }

    public function edit()
    {
        return view('pages.user.edit',
            [
            ]
        );
    }

    public function update(UserRequest $request)
    {
        $input = $request->only($this->userRepository->getBlankModel()->getFillable());
        $user = $this->userRepository->update(\Auth::user(), $input);

        return view('pages.user.edit',
            [
            ]
        );
    }
}