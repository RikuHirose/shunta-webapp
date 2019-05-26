<?php
namespace App\Helpers\Production;

use App\Helpers\ImageHelperInterface;
use Illuminate\Http\Request;

class ImageHelper implements ImageHelperInterface
{
    public function __construct(
    ) {
    }

    public function getFirstImageForRestaurant($restaurant)
    {
        // $restaurant->restaurantImages[0]がなかったらdefault imageをreturnする
        $fullUrl = self::convertFullImageUrl($restaurant->restaurantImages[0]->image->url);

        return $fullUrl;
    }

    public function convertFullImageUrl($imageUrl)
    {
        $fullUrl = 'https://s3-ap-northeast-1.amazonaws.com/farie/'.$imageUrl;

        return $fullUrl;
    }

}
