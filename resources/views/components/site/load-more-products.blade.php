@forelse ($products as $product)
    <div class="card col-12 col-lg-4">
        <div class="prod-img">
            <img src="{{ asset($product->image) }}" class="card-img-top img-fluid h-100" />
            {{-- <h1>{{ $product->id }}</h1>
            <p>{{ $product->category->title }}</p> --}}
        </div>
        <div class="card-body px-0">
            <h1 class="card-title h5">
                {{ @$product->trans()->where('locale', $current_lang)->first()->name }}</h1>
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
        No More products found.
    </div>
@endforelse


@if ($products->count())
    <div id="loadMore" class="text-center">
        <a hx-get="{{ route('site.products-more.loadMore', ['category_id' => $category_id, 'start' => $start + $count, 'count' => $count, 'search' => request()->search]) }}"
            hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML"
            class="btn btn-more px-5 py-3 mx-auto mt-5 btn-more-dark">@lang('See more')</a>
    </div>
@endif
