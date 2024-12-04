@extends('site.app')

@section('title', @$metaSetting->where('key', 'contact_us_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'contact_us_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'contact_us_meta_description_' . $current_lang)->first()->value)

@section('content')
<!--Bath-->
<div class="bath py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $contactUs->trans->where('locale',$current_lang)->first()->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<div class="container  my-5 rounded">
    <div class="row text-center">
        <h1 class="text-main"> {{ @$contactUs->trans->where('locale', $current_lang)->first()->title }}</h1>
        <h5 class="my-5 px-5 text-secound">
            {!! @$contactUs->trans->where('locale', $current_lang)->first()->description !!}
        </h5>
    </div>
    <div class="row py-5">
        <div class="col-lg-8 col-12 text text-center wow bounceInLeft">
            @livewire('site.contact-us')
        </div>
        <div class="col-lg-4 col-12 wow bounceInRight py-3">
            <img src="{{ asset(@$contactUs->image) }}" class="img-fluid rounded" alt="">
            <div class="Info_icons mt-5 text-center">
                <a href="{{ $settings->getItem('facebook') }}"><i class="fa-brands fa-facebook rounded-circle text-white bg-main p-3 me-2"></i></a>
                <a href="{{ $settings->getItem('twitter') }}"><i class="fa-brands fa-x-twitter rounded-circle text-white bg-main p-3 me-2"></i></a>
                <a href="{{ $settings->getItem('instagram') }}"><i class="fa-brands fa-instagram rounded-circle text-white bg-main p-3 me-2"></i></a>
            </div>
        </div>

        <!--book  an appointment-->
    </div>
    <!--book  an appointment-->
    <div class="row maps">
        <div class="col-12">
            <iframe src="{{ $settings->getItem('maps') }}"></iframe>
        </div>
    </div>


</div>


<!--INFO-->
@include('site.components.info')
<!--INFO-->

@endsection
