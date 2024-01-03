@extends('layout')

@section('content')
        <main class="page">
            <div class="page__wrapper">
            <div class="container">
                <ul class="breadcrumbs__list">
                    <li>
                        <a href="/kz/">үй</a>
                    </li>
                    <li>
                        / {{$page->title}}
                    </li>
                </ul>
            </div>
            <h1 class="page-about__title title">{{$page->title}}</h1>
            <div class="swiper about-slider">
                <div class="swiper-wrapper">
                    @foreach ($images as $image)
                    <div class="swiper-slide about-slider__slide"><img src="{{asset("storage/".$image->image)}}" alt=""></div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="container">
                <p class="about__descr">{!!$page->main!!}</p>
                <div class="about__wrapper">
                    <form class="about__form" action="/post-application" method="post">
                        @csrf
                        <h2 class="form__title title">Өтінішіңізді жіберіңіз</h2>
                        <input type="text" placeholder="Имя" name="name" required>
                        <input type="tel" placeholder="Телефон" name="number" required>
                        <textarea cols="30" rows="5" name="text"></textarea>
                        <button type="submit">Жіберу</button>
                    </form>
                    <img src="{{asset("storage/".$page->image)}}" alt="">
                </div>
            </div>
        </div>
        </main>
@endsection