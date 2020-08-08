<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    protected function getCategories()
    {
         return Category::all();
    }
}
