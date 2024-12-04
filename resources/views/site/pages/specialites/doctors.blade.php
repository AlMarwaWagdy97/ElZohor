@extends('site.app')

@section('title', @$specialty->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$specialty->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$specialty->trans->where('locale', $current_lang)->first()->meta_description)

@section('content')

<!--Bath-->
<div class="bath py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('site.specialites') }}">     {{translateTitle('specialties')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ @$specialty->trans->where('locale', $current_lang)->first()->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<div class="specialities-show container my-5">
    <div class="row">
        <div class="col-12 col-md-9 text-start py-3">
            <h1 class="text-secound">
                <span class="display-lg-3 w text-success">
                    {{ @$specialty?->trans()->where('locale', $current_lang)->first()->title }}
                </span>
            </h1>
            <p class="text-secound fw-bold py-3"> {!! @$specialty?->trans()->where('locale', $current_lang)->first()->description !!} </p>
        </div>
        <div class="col-12 col-md-3 ">
            <img src="{{ asset(@$specialty->image) }}" class="img-fluid" alt="">
        </div>
        {{-- <div class=" col col-md-5 d-flex justify-content-center  ">
        </div> --}}
    </div>
</div>


<!--MEET OUR DOCTORS-->
@if(count($doctors ))
    <hr>
    <div class="Meet py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title text-center">
                        <h1>@lang('MEET OUR DOCTORS')</h1>
                    </div>
                </div>

                @forelse($doctors as $doctor)
                <div class="col-12 my-5 row text-center justify-content-center align-items-center wow slideInLeft">
                    <div class="col-12 row justify-content-lg-center  ">
                        <div class="col-lg-6 col-12  px-0  ms-3 ms-lg-4 ms-xl-0">
                            <img src="{{ asset($doctor->image) }}" class="img-fluid" alt="{{ @$doctor->trans->where('locale', $current_lang)->first()->title }}">
                        </div>


                        <div class="text col-lg-6 col-12 row text-lg-start text-center py-4 ms-3 ms-xl-0">
                            <h1>
                                <a href="{{ route('site.doctors.show', @$doctor->trans->where('locale', $current_lang)->first()->slug) }}">
                                    {{ @$doctor->trans->where('locale', $current_lang)->first()->title }}
                                </a>
                            </h1>
                            <div class=" my-5 mx-2">
                                {!!  $doctor->trans->where('locale', $current_lang)->first()->description !!}
                            </div>
                            <div class="col-12 text-center">
                                <a href="{{ route('site.doctors.show', @$doctor->trans->where('locale', $current_lang)->first()->slug) }}" class="btn w-50 text-white mx-auto q">@lang('MAKE AN APPOINTMENT')</a>
                            </div>
                        </div>

                    </div>
                </div>
                @empty
                @endforelse
            </div>


            <div class="col-12 justify-content-center text-center" id="loadMore">
                <a hx-get="{{ route('site.doctors.loadMore', ['specialty_id' => $specialty->id, 'start' => 4, 'count' => 4]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn text-white bg-success me-3 px-5 my-5">@lang('SEE MORE')</a>
            </div>


        </div>
    </div>
@endif
<!--MEET OUR DOCTORS-->


<!--INFO-->
@include('site.components.info')
<!--INFO-->


@endsection
