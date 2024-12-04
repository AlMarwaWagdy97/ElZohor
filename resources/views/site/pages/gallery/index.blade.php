@extends('site.app')

@section('title', @$metaSetting->where('key', 'gallery_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'gallery_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'gallery_meta_description_' . $current_lang)->first()->value)

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
                            {{translateTitle('gallery')}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<div class="best py-3 mt-5">
    <div class="container">
        <div class="row text-center">
            <h1 class="display-lg-3 w"> {{ @$galleryInfo->trans->where('locale', $current_lang)->first()->title }} </h1>
            <h5 class="my-5 px-5 text-secound">
                {!! @$galleryInfo->trans->where('locale', $current_lang)->first()->description !!}
            </h5>
        </div>

        <div class=" G_Cards col-12 row mt-5">

            @forelse ($galleries as $key => $gallery)
            <div class=" col-12 col-lg-4 my-3 G_Card wow bounceInUp">
                <div class="card shadow" style="width: 100%;">
                    <a href="{{ route('site.gallery.show', $gallery->trans->where('locale', $current_lang)->first()->slug) }}">
                    <img class="card-img-top" src="{{ asset($gallery->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="text-center text-main">{{ $gallery->trans->where('locale', $current_lang)->first()->title }}</h3>
                        <p class="card-text text-secound">
                            {!! @$gallery->trans->where('locale', $current_lang)->first()->description !!}
                        </p>
                    </div>
                    </a>
                </div>
            </div>
            @empty
            @endforelse

            <div class="col-12 justify-content-center text-center" id="loadMore">
                <a hx-get="{{ route('site.gallery-more.loadMore', ['start' => 6, 'count' => 3]) }}"
                    hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
            </div>

        </div>
    </div>
</div>



<!--INFO-->
@include('site.components.info')
<!--INFO-->
@endsection
