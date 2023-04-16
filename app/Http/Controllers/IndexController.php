<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use App\Models\Artisan;
use App\Models\Categories;

class IndexController extends Controller
{
    
    public function Index()
    {
        // get main categories and its first children
        $categories = Categories::where('parent_id', NULL)->with('children')->get();
        return view('Site.index', [
            'categories' => $categories,
        ]);
    }

}
