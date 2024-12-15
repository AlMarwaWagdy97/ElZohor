@extends('site.app')

{{-- @section('title', @$page->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$page->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$page->trans->where('locale', $current_lang)->first()->meta_description) --}}

@section('content')
<div class="Jobs mt-5 position-relative wow fadeInUpBig" data-wow-offset="300">
    <div class="container position-relative z-3">
        <h2 class="text-capitalize text-center">الوظائف</h2>
        <div class="row text-center pt-2">
            @foreach($careers as $career)
            <div class="col-12 col-lg-4 mb-3">
                <div class="card mx-auto">
                    <div class="card-header"> {{$career->category?->transNow?->title}}</div>
                    <div class="card-body">
                        <h5 class="card-title"> {{optional($career->transNow)->title}}</h5>
                        <p class="card-text"> {!!  optional($career->transNow)->description !!} </p>
                        <a href="#" class="apply-btn btn">قدم من هنا </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
