@extends('site.app')

@section('title', @$team->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key', @$team->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description', @$team->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')

<!--item -->
<div class="item my-5 p-lg-5">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start">
                <h1> {{ @$team->trans->where('locale', $current_lang)->first()->name }} </h1>
                <h4 class="mt-4"> {{ @$team->trans->where('locale', $current_lang)->first()->job_title }} </h4>
                <p class="mt-4">
                    {!! @$team->trans->where('locale', $current_lang)->first()->description !!}
                </p>
            </div>
            <div class="col-12 col-lg-6 p-3 align-items-center">
                <a href="{{ asset(@$team->image) }}" target="blank">
                    <img src="{{ asset(@$team->image) }}" class="img-fluid" alt=""  width="50%"/>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="text-end">
                <a href="{{ route('site.about-us') }}" class="btn btn-more mt-5 px-5 py-2 mx-auto btn-more-dark">
                    @lang('Back')
                </a>
            </div>
        </div>
    </div>
</div>
<!--item -->

@endsection
