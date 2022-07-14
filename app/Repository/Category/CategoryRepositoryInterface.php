<?php

namespace App\Repository\Category;

use App\Repository\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getCategory();
}
