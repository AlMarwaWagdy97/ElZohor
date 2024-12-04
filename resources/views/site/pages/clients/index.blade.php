@extends('site.app')

@section('title', @$metaSetting->where('key', 'clients_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'clients_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'clients_meta_description_' . $current_lang)->first()->value)

@section('content')

   <!--Partners' success-->
<div class="Partners Partners-single  mt-5 position-relative y z-2 wow bounceInDown">
    <div class="container">
        <div class="row mt-5">
            <div class="Title mb-5 mt-5 d-flex justify-content-center align-content-center align-items-center">
                {{-- <div class="titleImg d-flex mx-3 text-center">
                    <img src="{{ asset('site/imgs/logo.png') }}" class="mb-3" alt="" />
                </div> --}}
{{--                <h1 class="text-capitalize text-center">@lang('Some of our Partners')</h1>--}}
                                <h1 class="text-capitalize text-center">{{App\Settings\HomeSettingSingleton::getInstance()->getItem('client')->trans[0]->title}}</h1>


            </div>

            <div class="company my-3 text-center col-12">
                <div class="row">
                    @forelse ($clients as $key => $client)
                    <div class="col-12  col-lg-3 mt-5 ">
                        <div class="client">
                                <img src="{{ asset($client->image) }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                    @empty

                    @endforelse

                    <div id="loadMore">
                        <a hx-get="{{ route('site.clients-more.loadMore', ['start' => 8, 'count' => 8]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more mt-5 px-5 py-3 mx-auto">
                            @lang('See more')
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Partners' success-->
@endsection
