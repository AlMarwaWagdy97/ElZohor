@extends('site.app')

@section('title', @$new->meta_title)
@section('meta_key', @$new->meta_key)
@section('meta_description', @$new->meta_description)

@section('content')
<!--item -->
<div class="item my-5 p-lg-2">
    <div class="container">

        <div class="row text-center justify-content-center">
            <div class="col-12 col-lg-6 p-3 align-items-center wow bounceInRight">
                <img src="{{ asset(@$new->image) }}" class="img-fluid" alt="" />
            </div>
            <div class="description col-12 col-lg-6 p-3 align-content-center text-start wow bounceInLeft">
                <h1 dir="ltr">{{ @$new->title }}</h1>
                <p dir="ltr">
                    {!! @$new->description !!}
                </p>
            </div>
        </div>

    </div>
</div>
<!--item -->

</div>
@endsection