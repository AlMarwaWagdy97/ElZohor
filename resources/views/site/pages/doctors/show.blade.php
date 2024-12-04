@extends('site.app')

@section('title', @$doctor->trans->where('locale',$current_lang)->first()->meta_title)
@section('meta_key',  @$doctor->trans->where('locale',$current_lang)->first()->meta_key)
@section('meta_description',  @$doctor->trans->where('locale',$current_lang)->first()->meta_description)

@section('content')

<!--Bath-->
<div class="bath py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('site.specialites.show', $doctor->specialty->trans->where('locale',$current_lang)->first()->slug) }}">
                                {{ $doctor->specialty->trans->where('locale',$current_lang)->first()->title }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $doctor->trans->where('locale',$current_lang)->first()->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

<!--Single Doctor -->
<div class="Single py-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="Basic_info col-lg-4 col-12 mt-lg-4 row wow bounceInLeft">

                <div class="quickProfile col-12 p-4 bg-main text-center rounded">
                    <h6> @lang('Name'): {{ $doctor->trans->where('locale',$current_lang)->first()->title }}</h6>
                    <hr>
                    <h6 class="my-3"> @lang('Phone'): {{ $doctor->phone }} </h6>
                    <hr>
                    <h6 class="my-3"> @lang('Email'): {{ $doctor->email }}</h6>
                    <hr>
                    <h6 class="my-3"> @lang('Address'): {{ $doctor->address }} </h6>
                    <hr>
                    <h6 class="my-3"> @lang('Specifity'): {{ $doctor->specialty->trans->where('locale',$current_lang)->first()->title }} </h6>
                    <hr>
                    <h6 class="my-3"> @lang('Degree'): {{ $doctor->degree }}</h6>
                    <hr>
                    {{-- <button class="btn bg-white w-100 text-center my-3"> VEIW TIMETABLE</button> --}}
                </div>


                <div class="form col-12 p-4  rounded">
                    @livewire('site.doctor-booking',  ['specialty_id' => @$doctor->specialty->id, 'doctor_id' => $doctor->id ])
                </div>
            </div>

            <div class="Detailed_info col-lg-8 col-12 mt-5 ms-2 wow bounceInRight">

                <!--info-->
                <div class="social d-flex flex-lg-nowrap flex-wrap justify-content-between">
                    <div class="Infoname mt-3 mt-lg-0">
                        <h3 class="text-uppercase text-main"><span class="text-black text-secound"></span> {{ $doctor->trans->where('locale',$current_lang)->first()->title }} </h3>
                        <p class="text-capitalize fs-5 text-secondary"> {{ $doctor->specialty->trans->where('locale',$current_lang)->first()->title }} </p>
                    </div>
                    <div class="Infoicons mb-3 mb-lg-0">
                        <a href="{{ $doctor->facebook }}"><i class="fa-brands fa-facebook fs-3 p-2 x rounded-circle"></i></a>
                        <a href="{{ $doctor->twitter }}"><i class="fa-brands fa-x-twitter fs-3 mx-3 p-2 x rounded-circle"></i></a>
                        <a onclick="Copy();"><i class="fa-solid fa-share-nodes fs-3 p-2 x rounded-circle"></i></a>
                        <input type="text" style="display:none;" value="Hello World" id="url">

                    </div>
                </div>
                <!--info-->

                <!--img-->
                <img src="{{ asset($doctor->image) }}" class="img-fluid" alt="">
                <!--img-->

                <!--text-->
                <div class="">
                    <p class="mt-5 text-secound"> 
                        {!! $doctor->trans->where('locale', $current_lang)->first()->description !!}
                     </p>

                    
                </div>
                <h3 class="text-secound"> @lang('Appointments')</h3>
                <div class="Infocommunity row mt-4">
                    {!! $doctor->trans->where('locale', $current_lang)->first()->appointments  !!}
                </div>
                <hr class="my-5">
                <!---TEXT-->
            </div>

            {{-- <div class="col-lg-8 offset-lg-4 row wow bounceInUp">
                <div class="text col-12 mb-lg-4  d-flex  align-items-center justify-content-lg-between justify-content-center">
                    <h1 class="text-main"> @lang('WHAT')  <span class="text-main">@lang('CLIENTS SAY')</span> </h1>
                    <div class="arrow position-relative d-none d-lg-block">
                        <div class=" swiper-button swiper-button-prev px-3 rounded "></div>
                        <div class="swiper-button swiper-button-next px-3 rounded "></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="swiper X">
                        <div class="swiper-wrapper">
                            @forelse ($reviews as $key => $review)

                            <div class="swiper-slide my-3">
                                <div class="ClientsCard">
                                    <p class="text-secound"> 
                                        {!! @$review->trans->where('locale', $current_lang)->first()->description !!}
                                    </p>
                                    <div class="card-footer d-flex bg-transparent mt-5">
                                        <img class="avatar" src="{{ asset($review->image) }}" alt="{{ @$review->trans->where('locale', $current_lang)->first()->title }}">
                                        <div class="Slideinfo ">
                                            <h6 class="text-main"> 
                                                {{ @$review->trans->where('locale', $current_lang)->first()->title }}
                                            </h6>
                                            <span class="user-name">
                                                {{ @$review->trans->where('locale', $current_lang)->first()->type }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!--Singlge Doctor -->

    <!--INFO-->
    @include('site.components.info')
    <!--INFO-->
</div>
@endsection
