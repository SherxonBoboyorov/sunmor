@extends('layouts.front')


@section('content')

    <!-- about start -->

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">{{ $heavytruck->{'truck_name_' . app()->getLocale()} }}</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a href="{{ route('heavytrucks') }}" class="about__link">@lang('main.trucks')</a>
                    </li>

                    <li>
                        <a class="about__link">{{ $heavytruck->{'truck_name_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <div class="trucks_in">
        <section class="container">
            <div class="trucks_in__cart">
                <div class="trucks_in__img">
                    <img src="{{ asset($heavytruck->image) }}" alt="trucks_in">
                </div>
                <div class="about_contint__text clearfix">
                    <p>
                        {!! $heavytruck->{'truck_description_' . app()->getLocale()} !!}
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
