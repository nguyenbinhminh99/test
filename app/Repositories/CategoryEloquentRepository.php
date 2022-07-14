<?php
namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}
