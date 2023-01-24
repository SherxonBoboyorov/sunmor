@extends('layouts.front')

@section('content')

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">@lang('main.about')</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>
                    <li>
                        <a class="about__link">@lang('main.about')</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <div class="about_contint">
        <section class="container">
            <div class="about_contint__cart">
               @foreach ($aboutcompanies as $aboutcompany)
                <div class="about_contint__text clearfix">
                    <p>
                        {!! $aboutcompany->{'content_' . app()->getLocale()} !!}
                    </p>

                </div>
                <div class="about_contint__video">
                    <a data-fancybox="video-gallery" href="{{ $aboutcompany->frame }}">
                        <img src="{{ asset('front/foto/slick_2.png') }}" alt="video"/>

                        <!-- play start -->

                        <div class="button__min is-play" href="#">
                            <div class="button-outer-circle has-scale-animation"></div>
                            <div class="button-outer-circle has-scale-animation has-delay-short"></div>
                            <div class="button-icon is-play">
                                <img class="about_contint_in__video__img__play" alt="All" src="{{ asset('front/foto/play.svg') }}">
                            </div>
                        </div>

                        <!-- play end -->
                    </a>
                </div>
               @endforeach
            </div>
        </section>
    </div>

    <div class="our_partners">
        <section class="container">
            <div class="our_partners__cart">
                <h2 class="about_us__title__h2">@lang('main.our_partners')</h2>
                <h4 class="services__title__h4">@lang('main.companies_that_trust_us')</h4>

                <div class="our_partners__list owl-carousel">

                    @foreach ($usefulResources as $usefulResource)

                    <div class="our_partners__item">
                        <a>
                            <img src="{{ asset($usefulResource->image) }}" alt="our_partners">
                        </a>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
    </div>

@endsection
