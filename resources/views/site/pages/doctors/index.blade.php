@extends('site.app')

@section('title', @$metaSetting->where('key', 'doctors_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'doctors_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'doctors_meta_description_' . $current_lang)->first()->value)

@section('content')
 <!--Bath-->
<div class="bath py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">   {{translateTitle('home')}} </a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                                  {{translateTitle('doctors')}}
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
        <div class="row">
            {{-- @livewire('site.doctors') --}}
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase my-lg-4 my-3 text-lg-center text-secound">
                        {{--  @lang('BEST DOCTORS') <span class="text-title"> @lang('FOR YOU') </span>--}}
                        <span class="text-title"> {{translateTitle('our_doctors')}} </span>
                    </h1>
                </div>
                <div class="col-12  text-lg-start text-center  mb-5">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" hx-get="{{ route('site.best-doctors.loadMore', ['specialty_id' => 0, 'start' => 0, 'count' => 6]) }}" hx-indicator="#loading" hx-target="#loadDoctor" hx-swap="innerHTML">
                                @lang('All')
                            </a>
                        </li>
                        @forelse ($specialties as $specialty)
                            <li class="nav-item mt-1">
                                <a class="nav-link" hx-get="{{ route('site.best-doctors.loadMore', ['specialty_id' => $specialty->id, 'start' => 0, 'count' => 6]) }}"
                                    hx-indicator="#loading" hx-target="#loadDoctor" hx-swap="innerHTML">
                                    {{ @$specialty->trans->where('locale', $current_lang)->first()->title }}
                                </a>
                            </li>
                        @empty

                        @endforelse
                    </ul>
                </div>

            </div>


            <div class="row">
                <div class="doctorCards col-12 gx-lg-3 gy-3 justify-content-center row ms-0" id="loadDoctor">

                    @forelse ($doctors as $doctor)
                    <div class="col-lg-4 col-12">
                        <a href="{{ route('site.doctors.show',  @$doctor->trans->where('locale',$current_lang)->first()->slug ) }}">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($doctor->image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize"> {{ $doctor->trans->where('locale', $current_lang)->first()->title }} </h5>
                                    <span> {{ $doctor->specialty->trans->where('locale', $current_lang)->first()->title }} </span>
                                    <hr>
                                    <p class="card-text doc-desc">
                                        {!! substr(@ removeHTML( $doctor->trans->where('locale', $current_lang)->first()->description), 0, 250) !!}
                                    </p>
                                    <div class="icons mt-3">
                                        <a href="{{ @$doctor->facebook }}"> <i class="fa-brands fa-facebook-f fs-5 mx-2"></i> </a>
                                        <a href="{{ @$doctor->twitter }}"> <i class="fa-brands fa-x-twitter fs-5 mx-2"></i> </a>
                                        <a onclick="Copy();"> <i class="fa-solid fa-share-nodes fs-5 mx-2"></i> </a>
                                        <input type="text" style="display:none;" value="Hello World" id="url">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    @endforelse





                    @if ($doctors->count())
                    <div class="seemore text-center mt-5" id="loadMore">
                        <a class="btn bg-main text-white" hx-get="{{ route('site.best-doctors.loadMore', ['specialty_id' => $selectedCategories ?? 0, 'start' => 6, 'count' => 6]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML">
                            @lang('See more')
                        </a>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
