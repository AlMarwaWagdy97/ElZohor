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

@if($certifications->count())
<div id="loadMore" class="text-center">
    <a hx-get="{{ route('site.certifications-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more px-5 py-3 mx-auto mt-5 btn-more-dark">@lang('SEE MORE')</a>
</div>
@endif
