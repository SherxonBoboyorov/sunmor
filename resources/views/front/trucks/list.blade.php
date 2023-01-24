@extends('layouts.front')

@section('content')

    <!-- about start -->

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">@lang('main.trucks')</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a class="about__link">@lang('main.trucks')</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <!-- about end -->


    <!-- Trucks start -->

    <div class="trucks">
        <section class="container">
            <div class="trucks__cart">
                <div class="trucks__list">
                    @foreach ($heavytrucks as $heavytruck)
                    <div class="trucks__item">
                        <a href="{{ route('heavytruck', $heavytruck->{'slug_' . app()->getLocale()}) }}">
                            <div class="trucks__img">
                                <img src="{{ asset($heavytruck->image) }}" alt="trucks">
                            </div>

                            <h3 class="trucks__title__h3">{{ $heavytruck->{'truck_name_' . app()->getLocale()} }}</h3>
                            <h5 class="trucks__title__h5">
                                <svg width="71" height="12" viewBox="0 0 71 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M70.5303 6.53033C70.8232 6.23744 70.8232 5.76256 70.5303 5.46967L65.7574 0.696699C65.4645 0.403806 64.9896 0.403806 64.6967 0.696699C64.4038 0.989593 64.4038 1.46447 64.6967 1.75736L68.9393 6L64.6967 10.2426C64.4038 10.5355 64.4038 11.0104 64.6967 11.3033C64.9896 11.5962 65.4645 11.5962 65.7574 11.3033L70.5303 6.53033ZM0 6.75H70V5.25H0V6.75Z" fill="#1B5178"/>
                                </svg>
                            </h5>
                        </a>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- Trucks end -->

@endsection
