@extends('site.app')

@section('title', @$career->meta_title)
@section('meta_key', @$career->meta_key)
@section('meta_description', @$career->meta_description)

@section('content')
<!--item -->
<div class="item my-5 p-lg-2">
    <div class="container">

        <div class="row text-center justify-content-center">
            <div class="col-12 col-lg-6 p-3 align-items-center wow bounceInRight">
                <img src="{{ asset(@$career->image) }}" class="img-fluid" alt="" />
            </div>
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start wow bounceInLeft">
                <h1 dir="ltr">{{ @$career->title }}</h1>
                <p dir="ltr">
                    {!! @$career->description !!}
                </p>
            </div>
        </div>

    </div>
</div>
<!--item -->

</div>
@endsection
