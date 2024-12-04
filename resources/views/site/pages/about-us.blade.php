@extends('site.app')

@section('title', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_description)

@section('content')
<!--item -->
<div class="item my-5 p-lg-2">
    <div class="container">

        <div class="row text-center justify-content-center">
            <div class="page-content description col-12 col-lg-6 p-3 align-content-center text-start">
                <h1> {{ @$aboutUs->trans->where('locale', $current_lang)->first()->title }} </h1>
                <p class="">
                    {!! @$aboutUs->trans->where('locale', $current_lang)->first()->content !!}
                </p>
                <div class="text-center">
                    @php
                    $settings = App\Settings\SettingSingleton::getInstance();
                    $directorSpeech = $settings->getItem('director_speech');
                @endphp

                @if($directorSpeech)
                <button type="button" class="btn btn-more mt-5 px-5 py-2 mx-auto btn-more-dark" data-bs-toggle="modal" data-bs-target="#staticBackdropDirectorSpeech">
                    @lang("CEO's speech")
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdropDirectorSpeech" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header text-center">
                            @lang("CEO's speech")
                        </div>
                        <div class="modal-body">
                            {!! @$directorSpeech !!}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('close')</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
                </div>
            </div>

            <div class="col-12 col-lg-6 p-3 align-items-center">
                <img src="{{ asset(@$aboutUs->image) }}" class="img-fluid" alt="" />
            </div>
        </div>



        @if(count($teams))
            <div class="row description  text-center justify-content-center">
{{--                <h1 class="text-center text-capitalize mt-5"> @lang('Team Leaders') </h1>--}}

                <h1 class="text-center text-capitalize mt-5"> {{App\Settings\HomeSettingSingleton::getInstance()->getItem('teams')->trans[0]->title}} </h1>

                <div class="leaders mt-4 p-3">
                    <div class="row justify-content-center text-center">
                        @forelse($teams as $key => $team)
                        <div class="col-12 col-lg-4 leader d-flex justify-content-end align-content-center align-items-center mb-5">
                            <div class="flex-grow-1">
                                <a href="{{ route('site.teams.show', $team->trans->where('locale', $current_lang)->first()->slug) }}">
                                    <img src="{{ asset($team->image) }}" alt="" width="137px" />
                                </a>
                                <div class="info mt-3">
                                    <a href="{{ route('site.teams.show', $team->trans->where('locale', $current_lang)->first()->slug) }}">
                                        <p class="my-2 text-black text-center">{{ $team->trans->where('locale', $current_lang)->first()->name }}</p>
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
        @endif

        @if(count($directors))
            <div class="row description  text-center justify-content-center">
                <h1 class="text-center text-capitalize mt-5"> @lang('Board of Directors') </h1>
                <div class="leaders mt-4 p-3">
                    <div class="row justify-content-center text-center">
                        @forelse($directors as $key => $director)
                        <div class="col-12 col-lg-4 leader d-flex justify-content-end align-content-center align-items-center mb-5">
                            <div class="flex-grow-1">
                                <a href="{{ route('site.teams.show', $director->trans->where('locale', $current_lang)->first()->slug) }}">
                                    <img src="{{ asset($director->image) }}" alt="" width="137px" />
                                </a>
                                <div class="info mt-3">
                                    <a href="{{ route('site.teams.show', $director->trans->where('locale', $current_lang)->first()->slug) }}">
                                        <p class="my-2 text-black text-center">{{ $director->trans->where('locale', $current_lang)->first()->name }}</p>
                                    </a>
                                    <span>
                                        {{ $director->trans->where('locale', $current_lang)->first()->job_title }}
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
                    </div>
                </div>

            </div>
        @endif
    </div>
</div>
<!--item -->

</div>


@endsection
