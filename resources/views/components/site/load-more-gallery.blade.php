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

@if($galleries->count())
<div class="col-12 justify-content-center text-center" id="loadMore">
    <a hx-get="{{ route('site.gallery-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white  bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
</div>
@endif
