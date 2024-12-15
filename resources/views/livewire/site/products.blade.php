<div class="row pt-3 mr-0">
    <div class="col-12 col-lg-3">
        <h3>{{ trans('categories.categories') }}</h3>
        <div class="checkboxs mt-4">
            @foreach ($categories as $key => $category)
            <div class="form-check my-3">
                <input class="form-check-input input-assumpte"  name="category" value="{{ $category->id }}" wire:click="updateCategory({{ $category->id }})" type="radio" name="{{ $key }}"
                 id="flexCheckDefault{{ $key }}" />
                <label class="form-check-label" for="flexCheckDefault{{ $key }}">
                    {{ $category->trans->where('locale', $current_lang)->first()->title }} ({{  count($category->products) }})
                </label>
            </div>
            @endforeach
        </div>
    </div>

    <div class="cards col-12 col-lg-9 row justify-content-between">
        @foreach ($products as $product)
        <div class="card col-12 col-4">
            <img src="{{ asset($product->image) }}" class="card-img-top img-fluid" alt="..." width="294px" height="220px" />
            <div class="card-body  text-center  px-0">
                <h5 class="card-title">
                    {{ @$product->trans->where('locale', $current_lang)->first()->name }}</h5>
                <p class="card-text">
                    {{ removeHTML(Str::substr(@$product->trans->where('locale', $current_lang)->first()->description, 0, 120)) }} ...
                </p>
                <a href="{{ route('site.products.show', @$product->trans->where('locale', $current_lang)->first()->slug ) }}" class="btn">@lang('More')</a>
            </div>
        </div>
        @endforeach

        @if($products->count())
            <div id="loadMore" class="text-center">
                <a hx-get="{{ route('site.products-more.loadMore', ['category_id' => $selectedCategories??0, 'start' => 3, 'count' => 3]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
                    @lang('See more')
                </a>
            </div>
        @endif

    </div>
</div>
   <div class="spinner-border text-success htmx-indicator position-fixed top-50 start-50" id="loading" role="status"
        style="z-index: 2;">
        <span class="visually-hidden">Loading...</span>
    </div>
