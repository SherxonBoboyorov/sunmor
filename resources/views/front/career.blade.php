@extends('layouts.front')

@section('content')

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">@lang('main.career')</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a class="about__link">@lang('main.career')</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <!-- about end -->

    <!-- Career start -->

    <div class="services_in">
        <section class="container">
            <div class="services_in__cart">
              @foreach ($companycarrers as $companycarrer)

                <div class="services_in__img">
                    <img src="{{ asset($companycarrer->image) }}" alt="services_in">
                </div>

                <div class="about_contint__text clearfix">
                    <p>
                        {!! $companycarrer->{'content_' . app()->getLocale()} !!}
                    </p>

                </div>

                <div class="career">
                    <div class="career__list">
                        @foreach ($careerdocuments as $careerdocument)

                        <div class="career__item">
                            <h3 class="career__title__h3">{{ $careerdocument->{'career_title_' . app()->getLocale()} }}</h3>
                            <a href="{{ asset($careerdocument->image) }}" download class="career__link">@lang('main.download')</a>
                        </div>
                       @endforeach
                    </div>
                </div>
               @endforeach
            </div>
        </section>
    </div>

    <!-- Career end -->

@endsection
