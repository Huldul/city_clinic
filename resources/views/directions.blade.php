@extends('layout')

@section('content')
        <main class="page">
            <div class="page__wrapper">
            <div class="page__img">
                <h1 class="page__img-title">Наши направления</h1>
            </div>
            <div class="page__directions container">
                <div class="directions__list">
                  @foreach ($directions as $direction)
                    <a href="/direction/{{$direction->slug}}" class="directions__box">
                        <img width="130px" src="{{asset('storage/'.$direction->image)}}" alt="">
                        <p class="directions__subtitle">{{$direction->title}}</p>
                        <p class="directions__desc">{!!$direction->subtitle!!}</p>
                        <button class="directions__link">Подробнее</button>
                    </a>
                    @endforeach
                </div>
            </div>
            </div>
        </main>
        @endsection