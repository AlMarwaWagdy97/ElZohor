@extends('admin.app')

@section('title', trans('categories.show_all'))
@section('title_page', trans('categories.show', ['name' => @$item->translate($locale)->title]) )
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="row">
                <div class="col-12 m-3">
                    <div class="row mb-3 text-end">
                        <div>
                            <a href="{{ route('admin.categories.index') }}"
                                class="btn btn-outline-primary waves-effect waves-light ml-3">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">


                                <div class="row">
                                    <div class="col-md-9">
                                        @foreach ($languages as $key => $locale)
                                            <div class="accordion mt-4 mb-4" id="accordionExample">
                                                <div class="accordion-item border rounded">
                                                    <h2 class="accordion-header" id="headingOne{{ $key }}">
                                                        <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne{{ $key }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne{{ $key }}">
                                                            {{ trans('lang.' .Locale::getDisplayName($locale))   }}

                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{ $key }}"
                                                        class="accordion-collapse collapse show mt-3"
                                                        aria-labelledby="headingOne{{ $key }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">



                                                                {{-- title ------------------------------------------------------------------------------------- --}}
                                                                  <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label">{{ trans('admin.title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="title{{ $key }}" name="{{ $locale }}[title]" disabled value="{{ @$item->trans->where('locale',$locale)->first()->title}}" class="form-control" required>
                                                                        @if($errors->has($locale .'.title'))
                                                                            <span class="missiong-spam">{{ $errors->first($locale . '.title') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            {{-- Start Slug --}}
                                                            <div class="row mb-3 slug-section">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">{{ trans('admin.slug_in') . trans('lang.' .Locale::getDisplayName($locale)) }} </label>

                                                                <div class="col-sm-10">
                                                                    <input type="text" id="slug{{ $key }}" name="{{ $locale }}[slug]" disabled  value="{{ @$item->trans->where('locale',$locale)->first()->slug }}" class="form-control slug" required>
                                                                    @if($errors->has($locale .'.slug'))
                                                                        <span class="missiong-spam">{{ $errors->first($locale . '.slug') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @include('admin.layouts.scriptSlug')
                                                            {{-- End Slug --}}

                                                            {{-- description ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label">
                                                                    {{ trans('admin.description_in') . trans('lang.' .Locale::getDisplayName($locale)) }} </label>
                                                                <div class="col-sm-10 mt-2">
                                                                    <textarea id="description{{ $key }}" name="{{ $locale }}[description]"> {{ old($locale . '.description') }} </textarea>
                                                                    @if ($errors->has($locale . '.description'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.description') }}</span>
                                                                    @endif
                                                                </div>

                                                                <script type="text/javascript">
                                                                    $(function() {
                                                                        CKEDITOR.replace('description{{ $key }}');
                                                                        $('.textarea').wysihtml5()
                                                                    })
                                                                </script>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingTwo{{ $key }}">
                                                    <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwo{{ $key }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapseTwo{{ $key }}">
                                                        @lang('admin.meta')
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo{{ $key }}"
                                                    class="accordion-collapse collapse show mt-3"
                                                    aria-labelledby="headingTwo{{ $key }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">

                                                        @foreach ($languages as $key => $locale)
                                                            {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text" disabled name="{{ $locale }}[meta_title]"  value="{{ @$item->trans->where('locale',$locale)->first()->meta_title }}"  id="title{{ $key }}">
                                                                </div>
                                                                @if ($errors->has($locale . '.meta_title'))
                                                                    <span   class="missiong-spam">{{ $errors->first($locale . '.meta_title') }}</span>
                                                                @endif
                                                            </div>

                                                            {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_description_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea name="{{ $locale }}[meta_description]" disabled class="form-control description"> {{ @$item->trans->where('locale',$locale)->first()->meta_description }} </textarea>
                                                                    @if ($errors->has($locale . '.meta_description'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.meta_description') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                class="col-sm-2 col-form-label"> {{ trans('admin.meta_key_in') . trans('lang.' .Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea name="{{ $locale }}[meta_key]" disabled class="form-control description"> {{ @$item->trans->where('locale',$locale)->first()->meta_key }} </textarea>
                                                                    @if ($errors->has($locale . '.meta_key'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.meta_key') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-3">
                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        {{ trans('admin.settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">

                                                        {{-- image ------------------------------------------------------------------------------------- --}}
                                                        @if( @$item->image != null)
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <a href="{{ asset( $item->image) }}" target="_blank">
                                                                        <img src="{{asset( $item->image)}}" alt=""  style="width:100%">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif


                                                         {{-- sort ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input"  col-form-label> @lang('categories.sort'):</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" disabled type="number" placeholder="@lang('categories.sort'):" id="example-number-input" value="{{ $item->sort }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- feature ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12 ">
                                                            <label class="col-md-3 col-form-label" for="available">{{ trans('admin.feature') }}</label>
                                                                @if($item->feature == 1 )
                                                                    <p class="badge  bg-success h3" style="font-size:20px">@lang("admin.yes")</p>
                                                                @else
                                                                    <p class="badge  bg-danger h3" style="font-size:20px">@lang("admin.no")</p>
                                                                @endif
                                                        </div>


                                                        {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-3 col-form-label" for="available">{{ trans('admin.status') }}</label>
                                                                @if($item->status == 1 )
                                                                    <p class="badge  bg-success h3" style="font-size:20px">@lang("admin.active")</p>
                                                                @else
                                                                    <p class="badge  bg-danger h3" style="font-size:20px">@lang("admin.dis_active")</p>
                                                                @endif
                                                        </div>





                                                        <div class="col-12">
                                                            <label class="col-sm-3 col-form-label"
                                                                   for="available"> تفعيل خاصية تغيير اللون</label>
                                                            @if($item->back_ground_color != "transparent" && isset($item->back_ground_color))
                                                                <p class="badge  bg-success h3" style="font-size:20px">
                                                                    @lang('admin.active')</p>
                                                            @else
                                                                <p class="badge  bg-danger h3" style="font-size:20px">
                                                                    @lang('admin.dis_active')</p>
                                                            @endif
                                                        </div>


                                                        @if($item->back_ground_color !== "transparent" && isset($item->back_ground_color))
                                                            {{-- show recent back ground ------------------------------------------------------------------------------------- --}}
                                                            <div class="col-12 background_container_whole">
                                                                <label class="col-sm-12 col-form-label"
                                                                       for="show_recent_back_ground_color">


                                                                    اللون الحالي للخلفية</label>
                                                                <div class="col-sm-10">
                                                                    <!-- Button trigger modal -->
                                                                    <button type="button"
                                                                            class="btn btn-outline-primary"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal">
                                                                        عرض
                                                                    </button>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="exampleModal"
                                                                         tabindex="-1"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        لون الخلفية </h5>
                                                                                    <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body ">
                                                                                    <div
                                                                                        style="margin: auto; width: 100%; height: 30vh;  background-color: {{$item->back_ground_color}} !important; ">
                                                                                        <br></div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-bs-dismiss="modal">
                                                                                        اغلاق
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>


                                                     </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                {{-- Butoooons ------------------------------------------------------------------------- --}}
                                <div class="row mb-3 text-end">
                                    <div>
                                        <a href="{{ route('admin.categories.index') }}"
                                            class="btn btn-outline-primary waves-effect waves-light ml-3">@lang('button.cancel')</a>
                                        <button type="submit"
                                            class="btn btn-outline-success waves-effect waves-light ml-3">@lang('button.save')</button>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div> <!-- end row-->

    </div> <!-- container-fluid -->

@endsection



@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <<script src="https://cdn.ckeditor.com/4.5.6/full/ckeditor.js"></script>
@endsection

