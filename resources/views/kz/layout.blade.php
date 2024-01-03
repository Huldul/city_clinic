<!DOCTYPE html>
<html lang="kz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        <title>{{$seo->title}}</title>

        <meta name="description" content="{{$seo->description}}">
        <meta name="keywords" content="{{$seo->keywords}}">
</head>
<body>
    <div class="wrapper">
    @include('components/header')
    @yield('content')
    @include('components/footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset("js/index.js")}}"></script>
</body>
</html>