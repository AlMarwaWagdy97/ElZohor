@extends('site.app')

@section('title', @$product->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$product->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$product->trans->where('locale', $current_lang)->first()->meta_description)

@section('content')
<div class="item my-5 p-lg-5">
    <div class="container">

        <div class="row text-center justify-content-center">
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start wow bounceInUp">
                <h1> {{ @$product->trans->where('locale', $current_lang)->first()->name }} </h1>
                <p>
                    {!! @$product->trans->where('locale', $current_lang)->first()->description !!}
                </p>
            </div>
            <div class="col-12 col-lg-6 p-3 align-items-center wow bounceInDown">
                <a href="{{ asset(@$product->image) }}" target="blank">
                    <img src="{{ asset(@$product->image) }}" class="img-fluid" alt=""  width="50%"/>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="text-end">
                <a href="{{ url('/categories') }}" class="btn btn-more mt-5 px-5 py-2 mx-auto btn-more-dark">
                    @lang('Back')
                </a>
            </div>
        </div>
    </div>
</div>
<!--item -->
@endsection
