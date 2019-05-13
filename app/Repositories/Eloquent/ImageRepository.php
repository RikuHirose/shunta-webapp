<?php

namespace App\Repositories\Eloquent;
use App\Repositories\ImageRepositoryInterface;
use App\Models\Image;

class ImageRepository implements ImageRepositoryInterface
{
    protected $image;

    /**
    * @param object $image
    */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }


}