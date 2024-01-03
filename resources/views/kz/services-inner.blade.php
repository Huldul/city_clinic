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
                            <a href="/kz/directions">/ Бағыттар</a>
                        </li>
                        <li>
                            / {{$subdirection->title}}
                        </li>
                    </ul>
                    <section class="page__services services">
                        <h1 class="services__title title">{{$subdirection->title}}</h1>
                        <img src="./img/services-img.png" alt="">
                        <span class="services__date">{{$subdirection->created_at}}</span>
                        <p class="services__subtitle">{{$subdirection->title}}</p>
                        
                        <p class="services__desc">{!!$subdirection->main!!}</p>
                        @include('components/socials')
                    </section>
                </div>
            </div>
        </main>
        @endsection