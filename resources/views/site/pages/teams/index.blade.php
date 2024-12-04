@extends('site.app')

@section('title', @$metaSetting->where('key', 'teams_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'teams_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'teams_meta_description_' . $current_lang)->first()->value)

@section('content')

   <!--Leadership section-->
<div class="leadership mt-lg-5 mt-3 py-lg-5 wow bounceInUp" data-wow-offset="10">
    <div class="container">
        <div class="Title mb-5">
            <div class="d-flex flex-wrap flex-md-nowrap">
                <div class="d-flex justify-content-center align-content-center align-items-center mx-auto">
                    {{-- <div class="titleImg d-flex align-items-center align-content-center mx-3">
                        <img src="{{ asset('site/imgs/logo12.png') }}" class="mb-3" alt="" />
                    </div> --}}
{{--                    <h1 class="text-capitalize"> @lang('Team Leaders') </h1>--}}
                    <h1 class="text-capitalize"> {{App\Settings\HomeSettingSingleton::getInstance()->getItem('teams')->trans[0]->title}} </h1>

                </div>
                <button type="button" class="btn admin justify-content-end flex-grow-1 p-3 m-2 order-1 order-lg-0 flex-lg-grow-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    @lang('Board of Directors')
                </button>
                <!-- Button trigger modal -->
            </div>
            <div class="TEST text-center mt-3">
                <!-- Modal -->
                <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mx-auto" id="exampleModalLabel">
                                    @lang('Board of Directors')
                                </h5>
                                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <a href="{{ asset($settings->getItem('CEO_image')) }}" target="_blank">
                                    <img src="{{ asset($settings->getItem('CEO_image')) }}" alt="" width="100%" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="leaders mt-5 p-3">
            <div class="row justify-content-center text-center">
                @forelse($teams as $key => $team)
                <div class="col-12 col-lg-4 leader d-flex justify-content-end align-content-center align-items-center mb-5">
                    <div class="flex-grow-1">
                        <a href="{{ route('site.teams.show', $team->trans->where('locale', $current_lang)->first()->slug) }}">
                            <img src="{{ asset($team->image) }}" alt="" width="137px" />
                        </a>
                        <div class="info mt-3">
                            <a href="{{ route('site.teams.show', $team->trans->where('locale', $current_lang)->first()->slug) }}">
                                <p class="my-2 text-black">{{ $team->trans->where('locale', $current_lang)->first()->name }}</p>
                            </a>
                            <span>
                                {{ $team->trans->where('locale', $current_lang)->first()->job_title }}
                            </span>
                        </div>
                        <div class="underling mx-auto"></div>
                    </div>
                    @if(fmod($key, 3) != 2)
                    <div class="x flex-shrink-1 d-lg-block d-none"></div>
                    @else
                    <div class="y flex-shrink-1 d-lg-block d-none"></div>
                    @endif
                </div>
                @empty

                @endforelse
                <div id="loadMore">
                    <a hx-get="{{ route('site.teams-more.loadMore', ['start' => 6, 'count' => 6]) }}" hx-indicator="#loading" hx-target="#loadMore" hx-swap="outerHTML" class="btn btn-more mt-5 px-5 py-3 mx-auto btn-more-dark">
                        @lang('See more')
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Leadership section-->
@endsection
