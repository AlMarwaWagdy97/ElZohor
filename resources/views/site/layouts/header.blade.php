<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ @$SiteSetting['site_name'] }} | @yield('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value) </title>

    <meta name="keywords" content="@yield('meta_key', @$metaSetting->where('key', 'home_meta_key_' . $current_lang)->first()->value)">
    <meta name="description" content="@yield('meta_description', @$metaSetting->where('key', 'home_meta_description_' . $current_lang)->first()->value)">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- OpenGraph -->
    <meta property="og:title" content=" {{ @$SiteSetting['site_name'] }}  | @yield('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value) " />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta name="og:image" content="{{ asset(@$SiteSetting['logo']) }}">

    <!-- Favicons -->
    <link href="{{ @$SiteSetting['icon'] != null ? asset(@$SiteSetting['icon']) : asset('site/img/logos/logo.png') }}" rel="icon">



    <!-- Ar css-->
    @if ($current_lang == 'ar')
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.rtl.min.css') }}" />
    @else
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
    @endif
    <!--Font awesome-->
    <link rel="stylesheet" href="{{ asset('site/css/all.min.css') }}" />

    <!--Swiper-->
    <link rel="stylesheet" href="{{ asset('site/css/swiper-bundle.min.css') }}" />

    <!--Wow-->
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}" />

    <!--Custom css-->
    <link rel="stylesheet" href="{{ asset('site/css/style.css?v=0.0.14') }}" />

      <!-- Ar css-->
    @if ($current_lang == 'ar')
        <link rel="stylesheet" href="{{ asset('site/css/style-ar.css?v=0.0.12') }}" />
    @endif


    <!--Custom dev css-->
    <link rel="stylesheet" href="{{ asset('site/css/custom.css?v=0.0.19') }}" />

    {!! getScriptHeader() !!}


    @livewireStyles

</head>
