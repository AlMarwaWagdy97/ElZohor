@extends('site.app')

@section('title', @$page->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$page->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$page->trans->where('locale', $current_lang)->first()->meta_description)

@section('content')
<!--item -->
<div class="item my-5 p-lg-2">
    <div class="container">

        <div class="row text-center justify-content-center">
            <div class="col-12 col-lg-6 p-3 align-items-center wow bounceInRight">
                <img src="{{ asset(@$page->image) }}" class="img-fluid" alt="" />
            </div>
            <div
                class="description col-12 col-lg-6 p-3 align-content-center text-start wow bounceInLeft"
            >
                <h1 dir="ltr">{{ @$page->trans->where('locale', $current_lang)->first()->title }}</h1>
                <p dir="ltr">
                    {!! @$page->trans->where('locale', $current_lang)->first()->content !!}
                </p>
            </div>
        </div>

    </div>
</div>
<!--item -->

</div>
@endsection



