@extends('site.app')

@section('title', @$video->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key', @$video->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description', @$video->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')
   <!--item -->
   <div class="item my-5 p-lg-5">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="description col-12 col-lg-6 p-3 align-content-center text-start">
            <h1> {{ @$video->trans->where('locale', $current_lang)->first()->title }} </h1>
            <p>
              {!! @$video->trans->where('locale', $current_lang)->first()->description !!}
            </p>
          </div>
        <div class="col-12 col-lg-6 p-3 align-items-center">
          <iframe width="560" height="315" src="{{ asset(@$video->url) }}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        
      </div>
    </div>
  </div>
  <!--item -->

@endsection

