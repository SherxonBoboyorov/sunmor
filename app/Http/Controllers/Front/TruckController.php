<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Heavytruck;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TruckController extends Controller
{
    public function list()
    {
        $heavytrucks = Heavytruck::orderBy('created_at', 'DESC')->get();
        return view('front.trucks.list', compact('heavytrucks'));
    }

    public function show($slug)
    {
        $heavytruck = Heavytruck::where('slug_en', $slug)
               ->orWhere('slug_es', $slug)
               ->first();

        Meta::setTitle($heavytruck->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($heavytruck->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.trucks.show', compact('heavytruck'));
    }
}
