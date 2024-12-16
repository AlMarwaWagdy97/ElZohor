@extends('site.app')

@section('title', @$metaSetting->where('key', 'contact_us_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'contact_us_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'contact_us_meta_description_' . $current_lang)->first()->value)

@section('content')
    <!--Form-->
    <style>
        .text-red-500 {
            color: #dc3545;
        }
    </style>

    <div class="Content_Us mt-5 p-lg-5">
        <div class="container">
            <div class="row">
                <div class="ContentInfo col-12 col-lg-6">
                    <div class="conteantHeader">
                        <p>
                            {!! @$jobApp->trans[0]->description !!}
                        </p>
                    </div>
                    <div class="info my-5" style="
                font-family: SomarSans-Bold;
                font-size: 17px;
                color: #292d32;
                opacity: 0.8;">
                        <h1> {{ @$jobApp->trans[0]->title }} </h1>
                        <div class="infoIcons">
                            <div class="location mt-3">
                                <div class="location d-flex justify-content-lg-start align-items-center mb-3">
                                    <i class="bx bx-location-plus display-6 me-lg-2"> </i>
                                    <span class="ms-3 ms-lg-0"> {{ $settings->getItem('address') }} </span>
                                </div>
                            </div>

                            <div class="email">
                                <div class="email d-flex justify-content-lg-start align-items-center mb-3">
                                    <i class="bx bx-envelope display-6 me-2"></i>
                                    <span dir="ltr" class="mx-1 mx-lg-0">
                                    <a class="no_uder_line" href="mailto:{{ $settings->getItem('email') }}">
                                        {{ $settings->getItem('email') }}
                                    </a>
                                </span>
                                </div>
                            </div>

                            <div class="phone">
                                <div class="phone d-flex justify-content-lg-start align-items-center mb-3">
                                    <i class="bx bx-phone display-6 me-2"></i>
                                    <span dir="ltr">
                                    @php
                                        $mobile = explode('-',  $settings->getItem('mobile'));
                                    @endphp
                                        @forelse ($mobile as $key => $num)
                                            <a class="no_uder_line" href="tel:{{$num }}">
                                            <span dir="ltr"> {{ $num }}</span>
                                        </a>
                                            @if( ($key + 1 ) < count($mobile ))<span class="mx-2">-</span>@endif
                                        @empty
                                            <a class="no_uder_line" href="tel:{{ $settings->getItem('mobile') }}">
                                            <span dir="ltr"> {{ $settings->getItem('mobile') }}</span>
                                        </a>
                                        @endforelse

                                    </span>

                                </div>
                            </div>

                            {{--                        <div class="phone">--}}
                            {{--                            <div class="phone d-flex justify-content-lg-start align-items-center mb-3">--}}
                            {{--                                <i class="bx bxl-whatsapp display-6 me-2"></i>--}}
                            {{--                                <span dir="ltr" class="mx-1 mx-lg-0">--}}
                            {{--                                    <a href="https://wa.me/{{ $settings->getItem('whatsapp') }}" target="_blank">--}}
                            {{--                                        {{ $settings->getItem('whatsapp') }}--}}
                            {{--                                    </a>--}}
                            {{--                                </span>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}

                            <div class="col--md-12 pe-3 maps">
                                <iframe src="{{ $settings->getItem('maps') }}" frameborder="0" width="100%" height="250px"></iframe>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="ContentForm col-12 col-lg-6">
                    <h1> نريد انضمامك معنا </h1>
                    <p>ارسل لنا وسنقوم بالرد في اقرب وقت</p>

                    <livewire:site.apply-component :career_id="'{{$career_id}}'"/>

                </div>
            </div>
        </div>
    </div>
    <!--Form-->
@endsection
