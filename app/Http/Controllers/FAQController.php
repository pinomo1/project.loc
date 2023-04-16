<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function FAQIndex()
    {

        $faqs = FAQ::all();

        return view('Site.faq', [
            'faqs' => $faqs,
        ]);
    }
}