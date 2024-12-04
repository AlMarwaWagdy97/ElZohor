@extends('site.app')
@section('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'home_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'home_meta_description_' . $current_lang)->first()->value)

@section('content')


<!--Hero Section-->
{{-- <div class="Hero d-flex justify-content-center align-items-center" style="background-image: url({{asset($settings->getItem('slider_image_for_mobile'))}}) !important"> --}}

<div id="Hero" class="Hero d-flex justify-content-center align-items-center mx-auto" style="background-image: url({{asset($settings->getItem('slider_image'))}}); width: 100%;">
    @if(substr($settings->getItem('slider_image'), -3) == "mp4")
    <video autoplay muted loop class="slide-video">
        <source src="{{ asset($settings->getItem('slider_image')) }}" type="video/mp4" type="video/mp4" />
    </video>
    @endif

    <div class="container">
        <div class="row justify-content-center align-content-center">
            <div class=" swiper">
                <div class="swiper-wrapper">
                    @forelse ($sliders as $key => $slider)
                    <div class="swiper-slide mx-xl-5">
                        <div class="fixed_text">
                            <h1 class="text-white wow" data-wow-duration="1s">
                                {{ @$slider->trans->where('locale', $current_lang)->first()->title }}
                            </h1>
                            <br>
                            <h1 class="text-white wow" data-wow-duration="1s"> {!! @$slider->trans->where('locale', $current_lang)->first()->description !!}
                            </h1>
                            <div class="btns ms-lg-5 mt-5">
                                <a href="{{ route('site.booking') }}" class="btn btn-success  me-lg-3 my-3 my-lg-0 px-5 text-white booking"> @lang('Booking Now') </a>
                                {{-- <a href="{{ @$slider->url }}" target="_blank" class="btn bg-primary text-white px-5 medicalFile"> @lang('Medical File') </a>--}}
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                <div class="swiper-button swiper-button-next text-white px-3"></div>
                <div class=" swiper-button swiper-button-prev text-white px-3  "></div>
            </div>
        </div>
    </div>

    <script>
        const change_Bg = function() {
            const backgroundElement = document.getElementById("Hero");
            // Function to detect if the device is mobile
            function isMobileDevice() {
                return window.innerWidth <= 767;
            }
    
            // Set background based on device type
            const mobileImageUrl = `<?= asset($settings->getItem('slider_image_for_mobile')) ?>`;
            const desktopImageUrl = `<?= asset($settings->getItem('slider_image')) ?>`;
    
            if (isMobileDevice()) {
                backgroundElement.style.backgroundImage = `url(${mobileImageUrl})`;
            } else {
                backgroundElement.style.backgroundImage = `url(${desktopImageUrl})`;
            }
    
            // Apply some additional styles to cover the whole viewport
            backgroundElement.style.backgroundSize = "cover";
            backgroundElement.style.backgroundPosition = "center";
        };
    
    
        window.addEventListener("resize", change_Bg);
        window.addEventListener("load", change_Bg);
        window.onbeforeunload = change_Bg()
    
    </script>
</div>



<!--Hero Section-->

<!---Our Vision --->
@include('site.components.visions')
<!---Our Vision --->

<!--OUR SPECIALTIES-->
@include('site.components.specialites')
<!--OUR SPECIALTIES-->

<!--MEET OUR DOCTORS-->
{{-- @include('site.components.meet-doctors')--}}
<!--MEET OUR DOCTORS-->

<!--community-->
@include('site.components.appointment')
<!--community-->

<!--CLIENTS-->
{{-- <x-site.layouts.client-reviews />--}}
<!--CLIENTS-->

<!--GALLERY-->
{{-- @include('site.components.gallery') --}}
<!--GALLERY-->

<!--VIDEOS-->
@include('site.components.videos')
<!--VIDEOS-->

<!--INSURANCES-->
@include('site.components.brands')
<!--INSURANCES-->

<!--INFO-->
@include('site.components.info')
<!--INFO-->

@endsection
