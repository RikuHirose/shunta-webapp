<?php
namespace App\Helpers\Production;

use App\Helpers\FavoriteHelperInterface;
use App\Repositories\FavoriteRepositoryInterface;

use App\Models\Favorite;

class FavoriteHelper implements FavoriteHelperInterface
{
    /** @var RestaurantRepositoryInterface */
    protected $favoriteRepository;

    public function __construct(
        FavoriteRepositoryInterface $favoriteRepository
    ) {
        $this->favoriteRepository = $favoriteRepository;
    }

    public static function defaultFavorited($restaurant, $currentUser)
    {
        $favorite = new Favorite();

        $favorite = $favorite->where('user_id', $currentUser['id'])
            ->where('restaurant_id', $restaurant['id'])
            ->exists();

        return $favorite;
    }
}
