@extends('layout')

@section('content')
        <main class="page">
            <div class="page__wrapper">
            <section class="page__slider">
                <div class="page__slider-wrapper">
                    <h1 class="page__slider-title">{{$indexpage->head_title}}</h1>
                    <p class="page__slider-desc">{!!$indexpage->head_subtitle!!}</p>
                    <a href="#" class="page__slider-link">Подробнее</a>
                </div>
                <div class="swiper main-slider">
                    <div class="swiper-wrapper">
                        @foreach ($indexswipers as $indexswiper)
                        
                        <div class="swiper-slide main-slider__slide"><img src="{{asset('storage/'.$indexswiper->image)}}" alt=""></div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <section class="page__directions directions">
                <div class="directions__wrapper container">
                    <h2 class="directions__title title">Наши направления</h2>
                    <div class="directions__container">
                        @foreach ($directions_ind as $direction)
                        <a href="/direction/{{$direction->slug}}" class="directions__box">
                            <img src="{{asset('storage/'.$direction->image)}}" style="width: 150px" alt="">
                            <p class="directions__subtitle">{{$direction->title}}</p>
                            <button class="directions__link">Подробнее</button>
                        </a>
                        @endforeach
                    </div>
                    <a class="directions__other" href="/directions">Смотреть все</a>
                </div>
            </section>
            <section class="page__numbers numbers">
                <div class="numbers__wrapper container">
                    <h2 class="numbers__title title">{{$indexpage->stat_title}}</h2>
                    <div class="numbers__container">
                        <div class="numbers__group">
                            <span>{{$indexpage->stat1_num}}</span>
                            <p class="numbers__desc">{{$indexpage->stat1_subtitle}}</p>
                        </div>
                        <div class="numbers__group">
                            <span>{{$indexpage->stat2_num}}</span>
                            <p class="numbers__desc">{{$indexpage->stat2_subtitle}}</p>
                        </div>
                        <div class="numbers__group">
                            <span>{{$indexpage->stat3_num}}</span>
                            <p class="numbers__desc">{{$indexpage->stat3_subtitle}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="page__video video container">
                <h2 class="video__title title">Видео</h2>
                <div class="video__wrapper">
                    @foreach ($videos as $video)
                    <video class="anim{{$loop->iteration}}" src="{{asset('storage/'.$video->video)}}" controls></video>
                    @endforeach
                </div>
            </section>
            <section class="page__socials socials container">
                <h2 class="socials__title title">Мы в Instagram - <a target="_blank"
                        href="https://www.instagram.com/city.emhana?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA==">city.emhana</a>
                </h2>
                <div class="socials__wrapper">
                    @foreach ($instagrams as $instagram)
                    <a target="_blank"
                    href="{{$instagram->url}}"><img
                        src="{{asset('storage/'.$instagram->image)}}" alt=""></a>
                    @endforeach
                </div>
            </section>
            <section class="page__about about">
                <div class="about__wrapper container">
                    <div class="about__container">
                        <div class="about__box">
                            <h2 class="about__title">{{$indexpage->foot_title}}</h2>
                            {!!$indexpage->foot_main!!}
                        </div>
                        <img src="./img/about-img.png" alt="">
                    </div>
                </div>
            </section>
            </div>
        </main>
@endsection