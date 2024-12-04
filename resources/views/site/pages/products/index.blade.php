@extends('site.app')

@section('title', @$metaSetting->where('key', 'products_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'products_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'products_meta_description_' . $current_lang)->first()->value)

@section('content')
<style>
    input[type=radio] {
        border-radius:0 !important;
    }


     .Products {
    & .checkboxs {
    .input-assumpte:checked {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e") !important;
    }
    }
    }



    .btn-purple{
     background-color:    #905885;
        color: white;
    }
</style>
    <!--item -->
    <div class="Products">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-lg-4">
                    <h2>{{ $productInfo->trans()->where('locale', $current_lang)->first()->title }}</h2>
{{--                    <p>{!! $productInfo->trans()->where('locale', $current_lang)->first()->description !!}</p>--}}
                </div>
{{--                <div class="searcharea col-12 col-lg-8 align-content-center">--}}
{{--                    <form hx-post="{{ route('site.searchProducts') }}" hx-indicator="#loading" hx-target="#loadProduct"--}}
{{--                        hx-swap="innerHTML">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-lg-10 ">--}}
{{--                                <input class="form-control" type="text" name="search" placeholder="" />--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-lg-2 ">--}}
{{--                                <input type="hidden" name="start" value="0"> <!-- Default value for start -->--}}
{{--                                <input type="hidden" name="count" value="6"> <!-- Default value for count -->--}}
{{--                                <button type="submit" class="btn btn-more px-5 py-3 mx-auto btn-more-dark">--}}
{{--                                    @lang('search') </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>

            <hr />


            <div class="row pt-3 mr-0">
                <div class="col-12 col-lg-3">
{{--                    <h3>{{ trans('categories.categories') }}</h3>--}}
                    <div class="checkboxs mt-4">
                        @foreach ($categories as $key => $category)
                            <div class="form-check my-3">
                                <input class="form-check-input input-assumpte" name="category" value="{{ $category->id }}"
                                    type="radio" name="{{ $key }}" id="flexCheckDefault{{ $key }}"
                                    hx-get="{{ route('site.categories.loadMore', ['category_id' => $category->id, 'search' => request()->input('search') ?? '', 'start' => 0, 'count' => 6, 'totalProducts' => count($category->products)]) }}"
                                    hx-indicator="#loading"
                                    hx-target="#loadProduct" hx-swap="innerHTML"
                                    @if($selected_categories == $category->id) checked @endif
                                     />

                                <label class="form-check-label" for="flexCheckDefault{{ $key }}">
                                    {{ $category->trans->where('locale', $current_lang)->first()->title }}
{{--                                    ({{ count($category->products->where('status', 1)) }})--}}
                                </label>
                            </div>

                        @endforeach
                        <a href="{{ route('site.products-reset') }}"  class="btn btn-more px-5 py-1 mx-auto btn-more-dark btn btn-purple">
                            @lang('reset')
                        </a>
                    </div>
                </div>

                <div class="cards col-12 col-lg-9 row " id="loadProduct">
                    @foreach ($products as $product)
                        <div class="card col-12 col-lg-4">
                            <div class="prod-img">
                                <img src="{{ asset($product->image) }}" class="card-img-top img-fluid h-100" />
                                {{-- <h1>{{ $product->id }}</h1>
                                <p>{{ $product->category->title }}</p> --}}
                            </div>
                            <div class="card-body px-0 text-center">
                                <h1 class="card-title h5">
                                    {{ @$product->trans->where('locale', $current_lang)->first()->name }}</h1>
                                <p class="card-text">
                                    {{ removeHTML(Str::substr(@$product->trans->where('locale', $current_lang)->first()->description, 0, 120)) }}
                                    ...
                                </p>
                                <a @if( @$product->trans->where('locale', $current_lang)->first()->slug)    href="{{ route('site.products.show', @$product->trans->where('locale', $current_lang)->first()->slug ) }}?key={{ @request()->key }}"  @endif
                                    class="btn">@lang('Show')</a>
                            </div>
                        </div>
                    @endforeach

                    @if ($products->count())
                        <div id="loadMore" class="text-center">
                            <a hx-get="{{ route('site.products-more.loadMore', ['category_id' => $selectedCategories ?? 0, 'start' => @request()->key ??6, 'count' => 6]) }}"
                                hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML"
                                class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark btn-purple">
                                @lang('See more')
                            </a>
                        </div>
                    @endif

                </div>
            </div>

            <div class="spinner-border text-success htmx-indicator position-fixed top-50 start-50" id="loading"
                role="status" style="z-index: 2;">
                <span class="visually-hidden">Loading...</span>
            </div>

            {{-- @livewire('site.products') --}}

        </div>
    </div>
    <!--item -->

@endsection
