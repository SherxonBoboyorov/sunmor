<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\RedirectResponse;
use App\Models\Quotecallback;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServicesController extends Controller
{
    public function list() {
        $pages = Page::orderBy('created_at', 'DESC')->get();
        return view('front.services.list', compact('pages'));
    }

    public function show($slug)
    {
        $page = Page::where('slug_en', $slug)
             ->orWhere('slug_es', $slug)
             ->first();

        Meta::setTitle($page->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($page->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.services.show', compact('page'));
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
