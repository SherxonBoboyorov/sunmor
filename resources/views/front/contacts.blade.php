@extends('layouts.front')

@section('content')

     <div class="about">
        <section class="container">
            <div class="about__cart">
                <h2 class="about_us__title__h2">@lang('main.contacts')</h2>

                <ul class="about__menu">
                    <li>
                        <a href="{{ route('/') }}" class="about__link">@lang('main.main')</a>
                    </li>

                    <li>
                        <a class="about__link">@lang('main.contacts')</a>
                    </li>
                </ul>
            </div>
        </section>
     </div>

    <div class="contacts">
        <section class="container">
            <div class="contacts__cart">
                <div class="contacts__list">
                    <ul class="contacts__menu">
                        <li>
                            <h3 class="contacts__title__h3">@lang('main.address')</h3>
                            <a class="contacts__link">{{ $options->where('key', 'address_' . app()->getLocale())->first()->value }}</a>
                        </li>

                        <li>
                            <h3 class="contacts__title__h3">@lang('main.email')</h3>
                            <a href="mailto:{{ $options->where('key', 'email')->first()->value }}" class="contacts__link">{{ $options->where('key', 'email')->first()->value }}</a>
                        </li>

                        <li>
                            <h3 class="contacts__title__h3">@lang('main.phone_number')</h3>
                            <a href="tel:{{ $options->where('key', 'phone')->first()->value }}" class="contacts__link">{{ $options->where('key', 'phone')->first()->value }}</a>
                        </li>
                    </ul>


                    <form action="{{ route('saveCallback') }}" method="POST">
                        @csrf
                        <section  class="contacts__form">
                            <input type="text" name="name" placeholder="Your name" class="contacts__input" required>
                            <input type="email" name="email" placeholder="Email" class="contacts__input" required>
                            <input type="tel" name="phone" placeholder="Phone" class="contacts__input" required>
                            <input type="text" name="address" placeholder="Address" class="contacts__input" required>
                        </section>
                        <textarea placeholder="Message" name="message" class="contacts__textarea" required></textarea>

                        @if (session('message'))

                           <div style="padding: 20px; background-color: #17A9EF; color: #fff; margin-top: 15px; width: 100%">
                            <span style="margin-left: 15px; color: #fff; font-weight: bold; float: right; font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;" onclick="this.parentElement.style.display='none';">&times;</span>
                                  Your application has been successfully sent
                           </div>

                        @endif
                        <button type="submit" class="contacts__button">@lang('main.send') <span><i class="fas fa-chevron-right"></i></span></button>
                    </form>
                </div>
            </div>
        </section>

        <div class="contacts__map">
            {!! $options->where('key', 'map')->first()->value !!}
        </div>
    </div>
@endsection
