<div class=" col-12 col-lg-6 text-center ">
    @forelse ($videos as $video)
    <div class="col-12 d-flex justify-content-center align-items-center video-frame-content  wow bounceInLeft">
        <img src="{{asset( $video->image) }}" class="img-fluid" alt="">
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


@if($videos->count())
    <div class="col-12 justify-content-center text-center" id="loadMore">
        <a hx-get="{{ route('site.videos-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" 
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white  bg-success bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
    </div>
@endif