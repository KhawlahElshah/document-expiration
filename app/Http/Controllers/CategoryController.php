<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->documents()->get()->groupBy('category.name');

        return view('categories.index')->with('categories', $categories);
    }
}
