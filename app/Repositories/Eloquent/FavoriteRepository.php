<?php

namespace App\Repositories\Eloquent;
use App\Repositories\FavoriteRepositoryInterface;
use App\Models\Favorite;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    protected $favorite;

    /**
    * @param object $favorite
    */
    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }


}