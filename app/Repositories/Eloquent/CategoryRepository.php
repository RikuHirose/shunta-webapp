<?php

namespace App\Repositories\Eloquent;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    /**
    * @param object $category
    */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }


}