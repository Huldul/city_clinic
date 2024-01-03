@extends('layout')

@section('content')
        <main class="page">
            <div class="page__wrapper">
            <div class="container">
                <ul class="breadcrumbs__list">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <a href="/directions">/ Направления</a>
                    </li>
                    <li>
                        / {{$direction->title}}
                    </li>
                </ul>
                <section class="page__surgery surgery">
                    <h1 class="surgery__title title">{{$direction->title}}</h1>
                    <p class="surgery__desc">{!!$direction->main!!}</p>
                    <div class="surgery__doctors doctors">
                        @foreach ($workers as $worker)
                        <div class="doctors__box">
                            <img src="{{asset('storage/'.$worker->image)}}" alt="">
                            <p class="doctors__name">{{$worker->name}}</p>
                                <p class="doctors__note">{{$worker->qualification}}</p>
                                <a href="/specialist/{{$worker->slug}}"><button class="doctors__btn">Записаться на прием</button></a>
                        </div>
                        @endforeach
                    </div>
                </section>
                <section class="page__services sub-services">
                    <h2 class="sub-services__title title">Список подуслуг</h2>
                    @foreach ($subdirections as $subdirection)
                    <div class="sub-services__box">
                        <div class="sub-services__group">
                            <p class="sub-services__subtitle">{{$subdirection->title}}</p>
                            <p class="sub-services__desc">{{$subdirection->subtitle}}</p>
                            <a class="sub-services__link" href="/service/{{$subdirection->slug}}">Подробнее</a>
                        </div>
                        <img src="{{asset("storage/".$subdirection->image)}}" alt="">
                    </div>
                    @endforeach
                </section>
            </div>
            </div>
        </main>
        @endsection