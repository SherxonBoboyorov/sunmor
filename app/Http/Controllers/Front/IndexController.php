<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Aboutcompany;
use App\Models\Page;
use App\Models\Icon;
use App\Models\Heavytruck;
use App\Models\Companynumber;
use App\Models\Article;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Options;
use App\Models\UsefulResource;
use Illuminate\Http\RedirectResponse;
use App\Models\Quotecallback;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IndexController extends Controller
{
    public function homepage()
    {

        Meta::setTitle(Options::where('key', 'meta_title_' . LaravelLocalization::getCurrentLocale())->first()->value);
        Meta::setDescription(Options::where('key', 'meta_description_' . LaravelLocalization::getCurrentLocale())->first()->value);

        $sliders = Slider::all();
        $aboutcompanies = Aboutcompany::all();
        $pages = Page::orderBy('created_at', 'DESC')->paginate(3);
        $icons = Icon::orderBy('created_at', 'DESC')->get();
        $heavytrucks = Heavytruck::orderBy('created_at', 'DESC')->paginate(4);
        $companynumbers = Companynumber::orderBy('created_at', 'DESC')->get();
        $articles = Article::orderBy('created_at', 'DESC')->paginate(3);
        $usefulResources = UsefulResource::orderBy('created_at', 'DESC')->get();

        return view('front.index', compact(
            'sliders',
            'aboutcompanies',
            'pages',
            'icons',
            'heavytrucks',
            'companynumbers',
            'articles',
            'usefulResources'
        ));
    }

        /**
     * @throws ValidationException
     */
    public function quotecallbackSave(Request $request): RedirectResponse
    {
        $data =  $request->validate([
        'fullname' => 'required',
        'gmail' => 'required',
        'phone_number' => 'required'
       ]);
          Quotecallback::create($data);

        return back()->with('message', 'unable to sending');

    }


}
