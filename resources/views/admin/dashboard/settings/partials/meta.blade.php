@extends('admin.app')

@section('title', trans('settings.settings'))
@section('title_page', trans('settings.edit', ['name' => @$settingMain->key]) )


@section('style')
    {{-- @vite(['resources/assets/admin/css/data-tables.js']) --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <<script src="https://cdn.ckeditor.com/4.5.6/full/ckeditor.js"></script>
@endsection

@section('content')

<div class="container-fluid">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
               
                        <!-- form start -->
                        <form class="form-horizontal" action="{{route('admin.settings.update-custom', $settingMain->key)}}" method="POST" enctype="multipart/form-data" role="form" >
                            @csrf
                           
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne"
                                                    aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    @lang('settings.home')
                                                </button>
                                            </h2>
                                            <div id="collapseOne"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingOne"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="home_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['home_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="home_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['home_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="home_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['home_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo"
                                                    aria-expanded="true"
                                                    aria-controls="collapseTwo">
                                                    @lang('specialties.specialties')
                                                </button>
                                            </h2>
                                            <div id="collapseTwo"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="specialties_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['specialties_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="specialties_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['specialties_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="specialties_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['specialties_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingTree">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTree"
                                                    aria-expanded="true"
                                                    aria-controls="collapseTree">
                                                    @lang('doctors.doctors')
                                                </button>
                                            </h2>
                                            <div id="collapseTree"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingTree"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="doctors_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['doctors_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="doctors_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['doctors_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="doctors_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['doctors_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion mt-4 mb-4" id="accordionExamplebooking">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingFourbooking">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFourbooking"
                                                    aria-expanded="true"
                                                    aria-controls="collapseFourbooking">
                                                    @lang('booking.booking')
                                                </button>
                                            </h2>
                                            <div id="collapseFourbooking"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingFourbooking"
                                                data-bs-parent="#accordionExamplebooking">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="booking_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['booking_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="booking_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['booking_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="booking_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['booking_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion mt-4 mb-4" id="accordionExampleservices">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingFourservices">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFourservices"
                                                    aria-expanded="true"
                                                    aria-controls="collapseFourservices">
                                                    @lang('services.services')
                                                </button>
                                            </h2>
                                            <div id="collapseFourservices"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingFourservices"
                                                data-bs-parent="#accordionExampleservices">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="services_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['services_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="services_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['services_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="services_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['services_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion mt-4 mb-4" id="accordionExampleoffers">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingFouroffers">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFouroffers"
                                                    aria-expanded="true"
                                                    aria-controls="collapseFouroffers">
                                                    @lang('offers.offers')
                                                </button>
                                            </h2>
                                            <div id="collapseFouroffers"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingFouroffers"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="offers_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['offers_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="offers_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['offers_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="offers_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['offers_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion mt-4 mb-4" id="accordionExamplegallery">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingFourgallery">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFourgallery"
                                                    aria-expanded="true"
                                                    aria-controls="collapseFour">
                                                    @lang('gallery.gallery')
                                                </button>
                                            </h2>
                                            <div id="collapseFourgallery"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingFourgallery"
                                                data-bs-parent="#accordionExamplegallery">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="gallery_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['gallery_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="gallery_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['gallery_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="gallery_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['gallery_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion mt-4 mb-4" id="accordionExamplevideos">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingFourvideos">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFourvideos"
                                                    aria-expanded="true"
                                                    aria-controls="collapseFourvideos">
                                                    @lang('videos.videos')
                                                </button>
                                            </h2>
                                            <div id="collapseFourvideos"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingFourvideos"
                                                data-bs-parent="#accordionExamplevideos">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="videos_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['videos_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="videos_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['videos_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="videos_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['videos_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingTree">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTree"
                                                    aria-expanded="true"
                                                    aria-controls="collapseTree">
                                                    @lang('settings.contact_us')
                                                </button>
                                            </h2>
                                            <div id="collapseTree"
                                                class="accordion-collapse collapse show mt-3"
                                                aria-labelledby="headingTree"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
        
                                                    @foreach ($languages as $key => $locale)
                                                        {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="text"
                                                                    name="contact_us_meta_title_{{ $locale }}"
                                                                    value="{{ @$settings['contact_us_meta_title_' . $locale] }}"
                                                                    id="title{{ $key }}">
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="contact_us_meta_description_{{ $locale }}" class="form-control description"> {{ @$settings['contact_us_meta_description_' . $locale] }} </textarea>
                                                            
                                                            </div>
                                                        </div>
        
                                                        {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                            <div class="col-sm-10 mb-2">
                                                                <textarea name="contact_us_meta_key_{{ $locale }}" class="form-control description">   {{ @$settings['contact_us_meta_key_' . $locale] }} </textarea>
                                                        
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer text-end">
                                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-danger waves-effect waves-light ml-3">@lang('button.cancel')</a>
                                <button type="submit" class="btn btn-success">@lang('button.save')</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</div> <!-- container-fluid -->

@endsection




@section('script')
        {{-- @vite(['resources/assets/admin/js/data-tables.js']) --}}
@endsection

