@extends('site.app')

@section('title', @$metaSetting->where('key', 'insurance_meta_title_' . app()->getLocale())->first()->value)
@section('meta_key', @$metaSetting->where('key', 'insurance_meta_key_' . app()->getLocale())->first()->value)
@section('meta_description', @$metaSetting->where('key', 'insurance_meta_description_' . app()->getLocale())->first()->value)

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
                         {{translateTitle('insurance')}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--Bath-->

 <div class="best py-3 mt-5">
    <div class="container">
        <div class="row text-center">
            <h1 class="display-lg-3 w"> {{ $insurance->trans  ? $insurance->trans[0]->title : '' }} </h1>
         </div>
    </div>
</div>


<main class="services my-3">
    <!-- SERVICES SECTION START -->
    <div class="container">
        <section class="about wow animate__zoomIn animated">
            <div class="services-container">
                <div class="row w-100">
                                      <img
                                        src="{{asset($insurance->image)}}"
                                        class="img-fluid"
                                        alt=""
                                    />





                                 <h5 class="my-5 px-5 text-secound text-start">
                                    @if(@$insurance->trans && $insurance->trans  != null)   {!!   @$insurance->trans->where('locale', app()->getLocale())->first()->description !!} @endif
                                </h5>




                 </div>

            </div>
        </section>
    </div>
    <!-- SERVICES SECTION END -->
</main>


<!--INFO-->
@include('site.components.info')
<!--INFO-->
@endsection
