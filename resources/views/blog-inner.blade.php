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
                        / {{$blog->title}}
                    </li>
                </ul>
                <section class="page__blog blog blog-inner">
                    <h1 class="blog__title title">{{$blog->title}}</h1>
                    <img src="./img/blog-inner-img.png" alt="">
                    <span class="page__date">{{$blog->created_at}}</span>
                    <p class="blog__subtitle blog-inner__subtitle">{{$blog->subtitle}}</p>
                    <p class="blog-inner__desc">{!!$blog->main!!}</p>
                        @include('components/socials')
                </section>
            </div>
        </div>
        </main>
        @endsection