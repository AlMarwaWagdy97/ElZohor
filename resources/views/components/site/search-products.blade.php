@forelse ($products as $product)
    <div class="card col-12 col-lg-4">
        <div class="prod-img">
            <img src="{{ asset($product->image) }}" class="card-img-top img-fluid h-100"  />
            {{-- <h1>{{ $product->id }}</h1>
            <p>{{ $product->category->title }}</p> --}}
        </div>
        <div class="card-body px-0">
            <h5 class="card-title">
                {{ @$product->trans()->where('locale', $current_lang)->first()->name }}</h5>
            <p class="card-text">
                {{ removeHTML(Str::substr(@$product->trans->where('locale', $current_lang)->first()->description, 0, 120)) }}
                ...
            </p>
            <a href="{{ route('site.products.show', @$product->trans()->where('locale', $current_lang)->first()->slug) }}?key={{ $start + $count }}"
                class="btn">@lang('Show')</a>
        </div>
    </div>
@empty
    <div class="alert alert-info text-center" role="alert">
        No More products found with this search.
    </div>
@endforelse


@if (Request()->has('search') && Request('search') !== '')
    <div id="loadMore" class="text-center">
        <a hx-get="{{ route('site.products-more.loadMore', ['category_id' => $category_id, 'start' => $start + $products->count(), 'count' => 6, 'search' => Request('search')]) }}"
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML"
            class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
            @lang('See more')
        </a>
    </div>
@else
    <div id="loadMore" class="text-center">
        <a hx-get="{{ route('site.products-more.loadMore', ['category_id' => $category_id, 'start' => 6, 'count' => 6]) }}"
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML"
            class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
            @lang('See more')
        </a>
    </div>
@endif
