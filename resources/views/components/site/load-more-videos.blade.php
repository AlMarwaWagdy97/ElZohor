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
            <a href="{{ route('site.videos.show', $video->trans->where('locale', $current_lang)->first()->slug) }}" class="btn btn-more px-5 py-2 mx-auto btn-more-dark">
                @lang('Show')
            </a>
        </div>
    </div>
</div>
@empty

@endforelse


@if($videos->count())
    <div id="loadMore" class="text-center">
        <a hx-get="{{ route('site.videos-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more px-5 py-3 mx-auto mt-5 btn-more-dark">@lang('SEE MORE')</a>
    </div>
@endif