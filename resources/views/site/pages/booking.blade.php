@extends('site.app')

@section('title', @$metaSetting->where('key', 'booking_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'booking_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'booking_meta_description_' . $current_lang)->first()->value)

@section('content')
<!--Bath-->
<div class="bath py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">   {{translateTitle('appointment')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<!--book  an appointment-->
<div class="book py-3 my-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-8  col-12 row wow slideInLeft">
                <div class="col-12">
                    <h1 class="text-uppercase my-lg-5 my-3 text-lg-start text-center text-secound">    {{translateTitle('book')}}  <span class="text-title">   {{translateTitle('an_appointment')}}</span> </h1>
                </div>

                <div class="col-12 form text-lg-start text-center row">
                    @livewire('site.booking')
                </div>

            </div>


            <div class="col-lg-3 col-12 row  text-lg-start text-center ourinfo  wow slideInRight">
                <div class="col-12 ">
                    <h3 class="my-5 text-secound">@lang('OUR') <span class="x">@lang('Address')</span></h3>
                    <span>{{ $settings->getItem('address') }} </span>
                </div>
                <div class="col-12">
                    <h3 class="text-secound">@lang('GET IN') <span class="x">@lang('TOUCH')</span></h3>
                    <span class="d-block text-black">@lang('Email')</span>
                    <span> {{ $settings->getItem('email') }} </span>
                    <span class="d-block text-black mt-2">@lang('Phone')</span>
                    <h4 class="x"> {{ $settings->getItem('mobile') }}</h4>

                    <div class="Info_icons mt-5">
                        <a href="{{ $settings->getItem('facebook') }}"><i class="fa-brands fa-facebook rounded-circle text-white bg-main p-3 me-2"></i></a>
                        <a href="{{ $settings->getItem('twitter') }}"><i class="fa-brands fa-x-twitter rounded-circle text-white bg-main p-3 me-2"></i></a>
                        <a href="{{ $settings->getItem('instagram') }}"><i class="fa-brands fa-instagram rounded-circle text-white bg-main p-3 me-2"></i></a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</div>
<!--book  an appointment-->

<!--INFO-->
@include('site.components.info')
<!--INFO-->

@endsection
