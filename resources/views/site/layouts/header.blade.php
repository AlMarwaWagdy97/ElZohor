<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>  {{ @$SiteSetting['site_name'] }}  | @yield('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value) </title>

    <meta name="keywords" content="@yield('meta_key', @$metaSetting->where('key', 'home_meta_key_' . $current_lang)->first()->value)">
    <meta name="description" content="@yield('meta_description', @$metaSetting->where('key', 'home_meta_description_' . $current_lang)->first()->value)">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- OpenGraph -->
    <meta property="og:title" content=" {{ @$SiteSetting['site_name'] }}  | @yield('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value) " />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="og:image" content="{{ asset(@$SiteSetting['logo']) }}">

    <!-- Favicons -->
    <link rel="icon" href="{{ @$SiteSetting['icon'] != null ? asset(@$SiteSetting['icon']) : asset('site/img/logos/logo.png') }}">

    <!-- Custom Stylsheet-->
    <link rel="stylesheet" href="{{ asset('site/css/style.css?v=0.0.25') }}" />

    <!--Bootstrap cdn -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
    <!--Font awsome-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!--Animation -->
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}" />
    <!--Swiper-->
    <link rel="stylesheet" href="{{ asset('site/css/swiper-bundle.min.css') }}" />


    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet" />
    <!-- Dev Custom Stylsheet-->

{{--    <link rel="stylesheet" href="{{ asset('site/css/custom.css?v=0.0.29') }}" />--}}

    <link href="https://fonts.google.com/specimen/Almarai" rel="stylesheet" />



    @livewireStyles

    <meta name="google-site-verification" content="lzd_eamR4oRwvYVmSDxecezC1OSvfQu0NV7ZuOur4qQ" />
    <meta name="msvalidate.01" content="807DDFACF860884AD3701C5CF3F8468D" />
    <meta name="yandex-verification" content="3cae406f213fb564" />





    {!! getScriptHeader() !!}


    {{--    <!-- Google tag (gtag.js) -->--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZ48Z2EJ79"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}

{{--        function gtag() {--}}
{{--            dataLayer.push(arguments);--}}
{{--        }--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'G-YZ48Z2EJ79');--}}

{{--    </script>--}}







</head>
