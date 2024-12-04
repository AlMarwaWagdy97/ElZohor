@forelse($offers as $key => $offer)
<div class="col-12 col-md-4 mb-4 mb-md-5 wow animate__zoomIn">
    <a href="{{ route('site.offers.show', @$offer->id) }}">
        <div class="services__card" style="background-image: url('{{ asset($offer->image) }}' )">
            {{-- <h2 class="services__card-title heading--border-left"> {{ @$offer->trans->where('locale', $current_lang)->first()->title }}</h2>
            <p class="services__card-content">
                {!! removeHTML(@$offer->trans->where('locale', $current_lang)->first()->description) !!} ..
            </p> --}}
        </div>
    </a>
</div>
@empty
@endforelse


@if($offers->count())
    <div class="col-12 justify-content-center text-center" id="loadMore">
        <a hx-get="{{ route('site.offers-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" 
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white  bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
    </div>
@endif