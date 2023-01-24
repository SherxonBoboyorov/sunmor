<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Aboutcompany;
use App\Models\UsefulResource;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $aboutcompanies = Aboutcompany::all();
        $usefulResources = UsefulResource::orderBy('created_at', 'DESC')->get();

        return view('front.about', compact(
            'aboutcompanies',
            'usefulResources'
        ));
    }
}
