@forelse($services as $key => $service)
    @if(fmod($key, 2) == 0 )
        <div class="row mb-5 wow bounceInLeft">
            <div class="col-md-4">
                <div class="services-img">
                    <img src="{{ asset($service->image) }}" class="img-fluid rounded" alt="about us">
                </div>
            </div>
            <div class="col-md-8">
                <div class="servicest__info px-5">
                    <h2 class="pt-5 text-main">
                        <strong>
                            {{ @$service->trans->where('locale', $current_lang)->first()->title }}
                        </strong>
                    </h2>
                    <hr>
                    <p>
                        {!! substr(@$service->trans->where('locale', $current_lang)->first()->description, 0, 350) !!} .. 
                    </p>
                    <a href="{{ route('site.services.show',  @$service->trans->where('locale', $current_lang)->first()->slug) }}" class="btn text-white bg-primary px-5"> 
                        @lang('Show')
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="row mb-5 wow bounceInRight">
            <div class="col-md-8">
                <div class="servicest__info px-5">
                    <h2 class="pt-5 text-main">
                        <strong>
                            {{ @$service->trans->where('locale', $current_lang)->first()->title }}
                        </strong>
                    </h2>
                    <hr>
                    <p>
                        {!! substr(@$service->trans->where('locale', $current_lang)->first()->description, 0, 350) !!} .. 
                    </p>
                    <a href="{{ route('site.services.show',  @$service->trans->where('locale', $current_lang)->first()->slug) }}" class="btn text-white bg-primary px-5"> 
                        @lang('Show')
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="services-img">
                    <img src="{{ asset($service->image) }}" class="img-fluid rounded" alt="about us">
                </div>
            </div>
        </div>
    @endif
@empty
@endforelse

@if($services->count())
    <div class="col-12 justify-content-center text-center" id="loadMore">
        <a hx-get="{{ route('site.services-more.loadMore', ['start' => ($start + $count), 'count' => $count]) }}" 
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white  bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
    </div>
@endif