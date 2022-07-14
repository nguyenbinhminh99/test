<?php

namespace App\Http\Controllers;

use App\Services\Say;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repository\CategoryRepos;

class TestController extends Controller
{
    public function sayHello(){
        $say = new Say();
        dd($say);
    }

    public function show(){
        CategoryRepos::show();
    }
}
