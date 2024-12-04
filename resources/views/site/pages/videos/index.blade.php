@extends('site.app')

@section('title', @$metaSetting->where('key', 'videos_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'videos_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'videos_meta_description_' . $current_lang)->first()->value)

@section('content')
<!--item -->
<div class="vedios mt-5">
    <div class="container">
        <div class="title my-3 row text-center">
            <h1 class="mb-3">{{@$videoInfo->trans && $videoInfo->trans->count() > 0 ? @$videoInfo->trans[0]->title : '' }}</h1>
        <p>
            {!! @$videoInfo->trans[0]->description !!}
        </p>
    </div>
    @forelse ($videos as $video)
        <div class="row text-center mt-5 wow bounceInRight">
            <div class="col-12 col-lg-6">
                <iframe width="560" height="315" src="{{ @$video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="col-12 col-lg-6 text-start align-content-center">
                <img src="{{asset( $video->image) }}" alt="" />
                <div class="text">
                    <h1>{{ @$video->trans->where('locale', $current_lang)->first()->title }}</h1>
                    <p>
                        {!! @$video->trans->where('locale', $current_lang)->first()->description !!}
                    </p>
                    <a href="{{ route('site.videos.show', $video->trans[0]->slug) }}" class="btn btn-more px-5 py-2 mx-auto btn-more-dark">
                        @lang('Show')
                    </a>
                </div>
            </div>
        </div>
    @empty

    @endforelse


    <div id="loadMore" class="text-center">
        <a hx-get="{{ route('site.videos-more.loadMore', ['start' => 4, 'count' => 4]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
            @lang('See more')
        </a>
    </div>
</div>
</div>
<!--item -->


@endsection
