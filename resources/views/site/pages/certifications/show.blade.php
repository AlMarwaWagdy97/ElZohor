@extends('site.app')

@section('title', @$certification->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key', @$certification->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description', @$certification->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')
<!--item -->
<div class="item my-5 p-lg-5">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start">
                <h1> {{ @$certification->trans->where('locale', $current_lang)->first()->title }} </h1>
                <p>
                    {!! @$certification->trans->where('locale', $current_lang)->first()->description !!}
                </p>
            </div>
            <div class="col-12 col-lg-6 p-3 align-items-center">
                <a href="{{ asset(@$certification->image) }}" target="blank">
                    <img src="{{ asset(@$certification->image) }}" class="img-fluid" alt=""  width="50%"/>
                </a>
            </div>

        </div>
    </div>
</div>
<!--item -->
@endsection
