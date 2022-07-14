<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepos {

    public static function show(){
        $categories = Category::all();
        foreach ($categories as $c) {
        echo 'Category: ' . $c->name ;
        }
    }
}