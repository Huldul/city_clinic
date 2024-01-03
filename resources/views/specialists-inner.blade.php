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
                            <a href="/specialists">/ Наши специалисты</a>
                        </li>
                        <li>
                            / {{$worker->name}}
                        </li>
                    </ul>
                    <section class="page__spec-inner spec-inner">
                        <h1 class="spec-inner__title title">Наши специалисты</h1>
                        <div class="spec-inner__wrapper">
                            <div class="spec-inner__container">
                                
                                <img src="{{asset("storage/".$worker->image)}}" alt="">
                                <p class="doctors__name">{{$worker->name}}</p>
                                <p class="spec-inner__note">{{$worker->qualification}}</p>
                                <button class="doctors__btn">Записаться на прием</button>
                            </div>
                            <div class="spec-inner__container">
                                <div class="spec-inner__box">
                                    <p class="spec-inner__subtitle">Стаж работы</p>
                                    <p class="spec-inner__desc">{{$worker->working_hours}}</p>
                                </div>
                                <div class="spec-inner__box">
                                    <p class="spec-inner__subtitle">Образование</p>
                                    <p class="spec-inner__desc">{{$worker->education}}</p>
                                </div>
                                <div class="spec-inner__box">
                                    <p class="spec-inner__subtitle">Опыт работы</p>
                                    <p class="spec-inner__desc">{{$worker->experience}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @include('components/socials')
                    </section>
                </div>
            </div>
        </main>
@endsection
