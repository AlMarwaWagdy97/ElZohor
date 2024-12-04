@extends('site.app')

@section('title', @$metaSetting->where('key', 'specialties_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'specialties_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'specialties_meta_description_' . $current_lang)->first()->value)

@section('content')

<!--OUR SPECIALTIES-->
<div class="OURSPECIALTIES py-5">
    <div class="container">
        <div class="row pt-5">

            <div class="col-12 text-center">
                <h1 class="text-secound">  {{translateTitle('our')}} <span class="display-lg-3 w">    {{translateTitle('specialties')}} </span> </h1>
            </div>

            @forelse ($specialties as $key => $specialty)
                @if(fmod($key, 4) == 0 && $key == 0)
                    <div class="cards col-12 row text-center wow bounceInLeft">
                @elseif(fmod($key, 4) == 0 )
                    </div>
                    <div class="cards col-12 row text-center wow bounceInRight">
                @endif
                <a href="{{ route('site.specialites.show', $specialty->trans->where('locale', $current_lang)->first()->slug) }}?doctor={{ @$specialty->trans->where('locale', $current_lang)->first()->slug  }}" class="col-12 col-lg  S_card mt-3 bg-white p-3 ms-2">
                    <img src="{{ asset($specialty->image) }}" class="mt-3">
                    <h4 class="mt-3 ">
                        {{ @$specialty->trans->where('locale', $current_lang)->first()->title }}
                    </h4>
                    <p>
                        {!! removeHTML(substr(@$specialty->trans->where('locale', $current_lang)->first()->description, 0, 400)) !!}
                    </p>
                </a>
                @empty

                @endforelse
            </div>

            <div class="col-12 justify-content-center text-center" id="loadMore">
                <a  hx-get="{{ route('site.specialites.loadMore', ['start' => 8, 'count' => 4]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
            </div>

        </div>
    </div>
</div>
<!--OUR SPECIALTIES-->

@endsection
