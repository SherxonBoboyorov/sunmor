@extends('layouts.front')

@section('content')

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">{{ $article->{'title_' . app()->getLocale()} }}</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a href="{{ route('articles') }}" class="about__link">@lang('main.news')</a>
                    </li>

                    <li>
                        <a class="about__link">{{ $article->{'title_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <div class="trucks_in">
        <section class="container">
            <div class="trucks_in__cart">
                <div class="trucks_in__img">
                    <img src="{{ asset($article->image) }}" alt="trucks_in">

                    <h4 class="trucks_in__data__h4">{{  date('d.m.Y', strtotime($article->created_at)) }}</h4>
                </div>
                <div class="about_contint__text clearfix">
                    <p>
                        {!! $article->{'description_' . app()->getLocale()} !!}
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
