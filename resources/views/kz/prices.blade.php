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
                            / Бағасы
                        </li>
                    </ul>
                </div>
                <section class="page__prices prices container">
                    <div class="prices__wrapp">
                        <h1 class="prices__title title">Бағасы</h1>
                    @foreach ($services as $service)
                    <div class="prices__wrapper">
                        <div class="prices__box" data-accordeon-trigger="1">
                            <div class="prices__group">
                                <img width="70px" src="{{asset('storage/'.$service->icon)}}" alt="">
                                  <p class="prices__subtitle">{{$service->title}}</p>
                            </div>
                        </div>
                        <div class="prices__content" data-accordeon-content="1">
                            <ul class="prices__list">
                                @foreach ($service->serviceprices as $subservices)
                                <li class="prices__item">
                                    <p class="prices__note">{{$subservices->title}}</p>
                                    <span class="prices__price">{{$subservices->price}}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div> 
                    </div>
                    @endforeach
                    @include('components/socials')
                </div>
                </section>
            </div>
        </main>
        @endsection