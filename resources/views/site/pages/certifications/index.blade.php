@extends('site.app')

@section('title', @$metaSetting->where('key', 'certifcations_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'certifcations_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'certifcations_meta_description_' . $current_lang)->first()->value)

@section('content')

<div class="test mt-5 Partners-single">
    <div class="container">

        <div class="leadership row mt-5 mb-2">
            <div class="Title mb-5 mt-5 d-flex justify-content-center align-content-center align-items-center">
                {{-- <div class="titleImg d-flex mx-3 text-center">
                    <img src="{{ asset('site/imgs/logo.png') }}" class="mb-3" alt="" />
                </div> --}}
{{--                <h1 class="text-capitalize text-center">@lang('Certifications')</h1>--}}
                <h1 class="text-capitalize"> {{App\Settings\HomeSettingSingleton::getInstance()->getItem('certifications_page') && App\Settings\HomeSettingSingleton::getInstance()->getItem('certifications_page')->trans ? App\Settings\HomeSettingSingleton::getInstance()->getItem('certifications_page')->trans[0]->title : '' }} </h1>

            </div>
        </div>

        <div class="row">
            @forelse ($certifications as $key => $certification)
            @if(fmod($key, 2) == 0 )
            <div class="row text-center mt-5 wow bounceInRight">
                <div class="col-12 col-lg-6">
                    <a href="{{ route('site.certifications.show', $certification->trans->where('locale', $current_lang)->first()->slug) }}">
                        <img src="{{ asset($certification->image) }}" alt="" width="40%" />
                    </a>
                </div>
                <div class="col-12 col-lg-6 my-auto text-start">
                    <h1>{{ $certification->trans->where('locale', $current_lang)->first()->title }}</h1>
                    <p>
                        {!! $certification->trans->where('locale', $current_lang)->first()->description !!}
                    </p>
                    <a href="{{ route('site.certifications.show', $certification->trans->where('locale', $current_lang)->first()->slug) }}" class="btn btn-more px-5 py-2 mx-auto btn-more-dark">
                        @lang('Show')
                    </a>
                </div>
            </div>
            @else
            <div class="row text-center mt-5 wow bounceInLeft">
                <div class="col-12 col-lg-6 my-5 my-auto text-start">
                    <h1>{{ $certification->trans->where('locale', $current_lang)->first()->title }}</h1>
                    <p>
                        {!! $certification->trans->where('locale', $current_lang)->first()->description !!}
                    </p>
                    <a href="{{ route('site.certifications.show', $certification->trans->where('locale', $current_lang)->first()->slug) }}" class="btn btn-more px-5 py-2 mx-auto btn-more-dark">
                        @lang('Show')
                    </a>
                </div>
                <div class="col-12 col-lg-6">
                    <a href="{{ route('site.certifications.show', $certification->trans->where('locale', $current_lang)->first()->slug) }}">
                        <img src="{{ asset($certification->image) }}" alt="" width="40%" />
                    </a>
                </div>
            </div>
            @endif
            @empty

            @endforelse


            <div id="loadMore" class="text-center">
                <a hx-get="{{ route('site.certifications-more.loadMore', ['start' => 4, 'count' => 2]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
                    @lang('See more')
                </a>
            </div>
        </div>


    </div>
</div>

@endsection
