@extends('site.app')

@section('title', @$page->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key', @$page->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description', @$page->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')
<!--Bath-->
<div class="bath py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $page->trans->where('locale',$current_lang)->first()->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<div class="container page my-5 rounded">
    <div class="row py-5">
        <div class="col-lg-8 col-12 text text-center wow bounceInLeft">
            <h1 class="text-main"> {{ @$page->trans->where('locale', $current_lang)->first()->title }}</h1>
            <h5 class="my-5 px-5 text-secound">
                {!! @$page->trans->where('locale', $current_lang)->first()->content !!}
            </h5>
        </div>
        <div class="col-lg-4 col-12 wow bounceInRight">
            <img src="{{ asset(@$page->image) }}" class="img-fluid rounded" alt="">
        </div>
    </div>
</div>


<!--INFO-->
@include('site.components.info')
<!--INFO-->

@endsection
