<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function AboutIndex()
    {

        $about = About::find(1);

        return view('Site.about', [
            'about' => $about,
        ]);
    }
}