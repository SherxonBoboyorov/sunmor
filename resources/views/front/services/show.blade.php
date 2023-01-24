@extends('layouts.front')

@section('content')

     <div class="about">
      @include('alert')
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">{{ $page->{'title_' . app()->getLocale()} }}</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a href="{{ route('pages') }}" class="about__link">@lang('main.services')</a>
                    </li>

                    <li>
                        <a class="about__link">{{ $page->{'title_' . app()->getLocale()} }}</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <div class="services_in">
        <section class="container">
            <div class="services_in__cart">
                {{-- <div class="services_in__img">
                    <img src="{{ asset($page->image) }}" alt="services_in">
                </div> --}}

                <div class="about_contint__text clearfix">
                    <p>
                        {!! $page->{'description_' . app()->getLocale()} !!}
                     </p>

                </div>

                <div class="services_in__video">
                    <a data-fancybox="video-gallery" href="{{ $page->frame }}">
                        <img src="{{ asset('front/foto/tract.png') }}" alt="video"/>

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

                <div class="services_in__button">
                    <a href="#modal1" class="services_in__link modal-trigger">@lang('main.get_a_quote') <span><i class="fas fa-chevron-right"></i></span></a>
                </div>

            </div>
        </section>
    </div>

    <div class="get_a_quote modal" id="modal1">
        <div class="get_a_quote__cart">
            <form action="{{ route('quotecallbackSave') }}" method="POST">
                @csrf

                <h2 class="about_us__title__h2">@lang('main.get_a_quote')</h2>

                <section class="get_a_quote__form">
                    <input class="get_a_quote__input" type="text" name="fullname" placeholder="Your name" required>
                    <input class="get_a_quote__input" type="email" name="gmail" placeholder="Email" required>
                    <input class="get_a_quote__input" type="tel" name="phone_number" placeholder="Phone" required>
                </section>


                <button class="get_a_quote__button" type="submit">@lang('main.send') <span><i class="fas fa-chevron-right"></i></span></button>
            </form>
        </div>
    </div>
@endsection

