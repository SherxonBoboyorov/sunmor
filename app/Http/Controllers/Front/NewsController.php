<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NewsController extends Controller
{
    public function list()
    {
        $articles = Article::orderBy('created_at', 'DESC')->paginate(12);
        return view('front.articles.list', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug_en', $slug)
            ->orWhere('slug_es', $slug)
            ->first();

        Meta::setTitle($article->{'meta_title_' . LaravelLocalization::getCurrentLocale()});
        Meta::setDescription($article->{'meta_description_' . LaravelLocalization::getCurrentLocale()});

        return view('front.articles.show', compact('article'));
    }
}
