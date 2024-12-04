@extends('site.app')

@section('title', @$metaSetting->where('key', 'videos_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'videos_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'videos_meta_description_' . $current_lang)->first()->value)

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
                            {{translateTitle('videos')}}
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
            <h1 class="display-lg-3 w"> {{ @$videoInfo->trans->where('locale', $current_lang)->first()->title }} </h1>
            <h5 class="my-5 px-5 text-secound">
                {!! @$videoInfo->trans->where('locale', $current_lang)->first()->description !!}
            </h5>
        </div>

        <div class=" vedio row ">
            <div class=" col-12 col-lg-6 text-center ">
                @forelse ($videos as $video)
                <div class="col-12 d-flex justify-content-center align-items-center video-frame-content  wow bounceInLeft">
                    <img src="{{asset( $video->image) }}" class="img-fluid h-100" alt="">
                    <div>
                        <h4 class="text-main"> {{ @$video->trans->where('locale', $current_lang)->first()->title }} </h4>
                        <p class="text-secound">
                            {!! @$video->trans->where('locale', $current_lang)->first()->description !!}
                        </p>
                    </div>
                </div>
                @empty

                @endforelse
            </div>


            <div class="col-12 col-lg-6 text-center">
                @forelse ($videos as $video)
                <div class="z video-frame-single my-2  wow bounceInRight">
                    <iframe width="100%" height="100%" src="{{ $video->url }}"> </iframe>
                </div>

                @empty

                @endforelse

            </div>


            <div class="col-12 justify-content-center text-center" id="loadMore">
                <a hx-get="{{ route('site.videos-more.loadMore', ['start' => 4, 'count' => 4]) }}"
                    hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
            </div>
        </div>
    </div>
</div>



<!--INFO-->
@include('site.components.info')
<!--INFO-->
@endsection
