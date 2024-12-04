@extends('site.app')

@section('title', @$client->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key', @$client->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description', @$client->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')
<div class="item my-5 p-lg-5">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start">
                <h1> {{ @$client->trans->where('locale', $current_lang)->first()->name }} </h1>
                <p>
                    {!! @$client->trans->where('locale', $current_lang)->first()->description !!}
                </p>
            </div>
            <div class="col-12 col-lg-6 p-3 align-items-center">
                <img src="{{ asset(@$client->image) }}" class="img-fluid" alt="" />
            </div>

        </div>
    </div>
</div>
<!--item -->

@endsection
