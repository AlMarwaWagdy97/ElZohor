@extends('admin.app')

@section('title', trans('admin.title_translations_show'))
@section('title_page', trans('admin.title_translations_show') )


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="row">
                <div class="col-12 m-3">
                    <div class="row mb-3 text-end">
                        <div>
                            <a href="{{ url('admin/title-translation') }}"
                                class="btn btn-outline-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="accordion mt-4 mb-4" id="accordionExample2">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingImage">
                                                    <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseImage"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                        @lang('admin.key')
                                                    </button>
                                                </h2>
                                                <div id="collapseImage"
                                                     class="accordion-collapse collapse show mt-3"
                                                     aria-labelledby="headingImage"
                                                     data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        <div class="row mb-3">
                                                            {{-- key ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                       class="col-sm-2 col-form-label">{{ trans('admin.key')   }}</label>
                                                                <div class="col-sm-10">
                                                                    <input disabled class="form-control" type="text" name="key" value="{{ @$titleTranslation->key  }}">
                                                                </div>
                                                                @if ($errors->has('key'))
                                                                    <span class="missiong-spam">{{ $errors->first('key') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                        {{   trans('admin.title') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne"
                                                     class="accordion-collapse collapse show mt-3"
                                                     aria-labelledby="headingOne"
                                                     data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">

                                                        @foreach ($languages as $key => $locale)
                                                            @if(@$titleTranslation && is_object(json_decode($titleTranslation->value)))
                                                                {{-- title ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                           class="col-sm-2 col-form-label">{{ trans('admin.title_in') .   trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10">
                                                                        <input disabled class="form-control" type="text"
                                                                               name="{{ $locale }}[title]"
                                                                               value="{{json_decode($titleTranslation->value)->$locale}}"
                                                                               id="title{{ $key }}">
                                                                    </div>
                                                                    @if ($errors->has($locale . '.title'))
                                                                        <span class="missiong-spam">{{ $errors->first($locale . '.title') }}</span>
                                                                    @endif
                                                                </div>



                                                                {{-- description ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                           class="col-sm-2 col-form-label">{{ trans('admin.description') .   trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10">
                                                                    <textarea  disabled class="form-control"
                                                                              name="{{ $locale }}[description]"
                                                                              id="description{{ $key }}">{{json_decode($titleTranslation->description)->$locale}} </textarea>
                                                                    </div>
                                                                    @if ($errors->has($locale . '.description'))
                                                                        <span class="missiong-spam">{{ $errors->first($locale . '.description') }}</span>
                                                                    @endif
                                                                </div>

                                                                <br>
                                                                <br>
                                                                <hr>
                                                            @else
                                                                {{-- title ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                           class="col-sm-2 col-form-label">{{ trans('admin.title_in') .   trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10">
                                                                        <input disabled class="form-control" type="text"
                                                                               name="{{ $locale }}[title]"
                                                                               value=""
                                                                               id="title{{ $key }}">
                                                                    </div>
                                                                    @if ($errors->has($locale . '.title'))
                                                                        <span class="missiong-spam">{{ $errors->first($locale . '.title') }}</span>
                                                                    @endif
                                                                </div>



                                                                {{-- description ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                           class="col-sm-2 col-form-label">{{ trans('admin.description') .   trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10">
                                                                    <textarea  disabled class="form-control"
                                                                              name="{{ $locale }}[description]"
                                                                              id="description{{ $key }}"> </textarea>
                                                                    </div>
                                                                    @if ($errors->has($locale . '.description'))
                                                                        <span class="missiong-spam">{{ $errors->first($locale . '.description') }}</span>
                                                                    @endif
                                                                </div>

                                                                <br>
                                                                <br>
                                                                <hr>

                                                            @endif
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>





                                    <div class="col-md-4">

                                        <div class="accordion mt-4 mb-4" id="accordionExampleTwo">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingtwo">
                                                    <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                                                            aria-controls="collapseTwo">
                                                        {{ trans('admin.settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse show"
                                                     aria-labelledby="headingTwo" data-bs-parent="#accordionExampleTwo">
                                                    <div class="accordion-body">
                                                        <div class="col-sm-3 col-md-6 mb-3">
                                                            {{--                                                            @if ($title-translation->image != null)--}}
                                                            {{--                                                                <img src="{{ asset($title-translation->image) }}" alt=""--}}
                                                            {{--                                                                    style="width:100%">--}}
                                                            {{--                                                            @endif--}}
                                                        </div>
                                                        {{-- image ------------------------------------------------------------------------------------- --}}
                                                        {{--                                                        <div class="col-12">--}}
                                                        {{--                                                            <div class="row mb-3">--}}
                                                        {{--                                                                <label for="example-number-input" col-form-label>--}}
                                                        {{--                                                                    @lang('admin.image'):</label>--}}
                                                        {{--                                                                <div class="col-sm-12">--}}
                                                        {{--                                                                    <input disabled class="form-control" type="file"--}}
                                                        {{--                                                                        placeholder="@lang('admin.image'):" id="example-number-input"--}}
                                                        {{--                                                                        name="image" value="{{ old('image') }}">--}}
                                                        {{--                                                                </div>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                        {{-- portfolios  ------------------------------------------------------------------------------- --}}
                                                        {{--                                                           <div class="col-12">--}}
                                                        {{--                                                            <div class="row mb-3">--}}
                                                        {{--                                                                <label for="example-number-input"> @lang('title-translation.portfolio'):</label>--}}
                                                        {{--                                                                <div class="col-sm-12">--}}
                                                        {{--                                                                    <select class="form-select form-select-sm " name="portfolio_id" >--}}
                                                        {{--                                                                        <option value="" disabled selected> {{ trans('admin.select') }}</option>--}}
                                                        {{--                                                                        @foreach ($portfolios as $portfolio)--}}
                                                        {{--                                                                            <option value="{{ $portfolio->id }}" {{ $title-translation->portfolio_id == $portfolio->id ? 'selected' : '' }}>  {{ @$portfolio->trans->where('locale', $current_lang)->first()->title }} </option>--}}
                                                        {{--                                                                        @endforeach--}}
                                                        {{--                                                                    </select>--}}
                                                        {{--                                                                </div>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                            @error('category_id')--}}
                                                        {{--                                                                <span class="text-danger">{{ $message }}</span>--}}
                                                        {{--                                                            @enderror--}}
                                                        {{--                                                        </div>--}}
                                                        {{-- sort ------------------------------------------------------------------------------------- --}}
                                                        {{--                                                        <div class="col-12">--}}
                                                        {{--                                                            <div class="row mb-3">--}}
                                                        {{--                                                                <label for="example-number-input" col-form-label>--}}
                                                        {{--                                                                    @lang('title-translation.sort'):</label>--}}
                                                        {{--                                                                <div class="col-sm-12">--}}
                                                        {{--                                                                    <input disabled class="form-control" type="number" id="example-number-input"  name="sort" value="{{ @$title-translation->sort }}">--}}
                                                        {{--                                                                </div>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}

                                                        {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                   for="available">{{ trans('admin.status') }}</label>
                                                            <div class="col-sm-10">
                                                                <input disabled class="form-check form-switch" name="status" type="checkbox"
                                                                       id="switch3" switch="success"
                                                                       {{ @$titleTranslation->status == 1 ? 'checked' : '' }} value="1">
                                                                <label class="form-label" for="switch3"
                                                                       data-on-label=" @lang('admin.yes') "
                                                                       data-off-label=" @lang('admin.no')"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    {{-- Butoooons ------------------------------------------------------------------------- --}}
                                    <div class="row mb-3 text-end">
                                        <div>
                                            <a href="{{url('/admin/title-translation')}}"
                                               class="btn btn-outline-danger waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                                            <button type="submit"
                                                    class="btn btn-outline-success waves-effect waves-light ml-3 btn-sm">@lang('button.save')</button>
                                        </div>
                                    </div>
                                </div>

                            </div>


{{--                                <div class="row">--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <div class="accordion mt-4 mb-4" id="accordionExample">--}}
{{--                                            <div class="accordion-item border rounded">--}}
{{--                                                <h2 class="accordion-header" id="headingOne">--}}
{{--                                                    <button class="accordion-button fw-medium" type="button"--}}
{{--                                                        data-bs-toggle="collapse"--}}
{{--                                                        data-bs-target="#collapseOne"--}}
{{--                                                        aria-expanded="true"--}}
{{--                                                        aria-controls="collapseOne">--}}
{{--                                                        {{   trans('admin.title')  }}--}}
{{--                                                    </button>--}}
{{--                                                </h2>--}}
{{--                                                <div id="collapseOne"--}}
{{--                                                    class="accordion-collapse collapse show mt-3"--}}
{{--                                                    aria-labelledby="headingOne"--}}
{{--                                                    data-bs-parent="#accordionExample">--}}
{{--                                                    <div class="accordion-body">--}}

{{--                                                        @foreach ($languages as $key => $locale)--}}
{{--                                                            --}}{{-- title ------------------------------------------------------------------------------------- --}}
{{--                                                            <div class="row mb-3">--}}
{{--                                                                <label for="example-text-input"--}}
{{--                                                                    class="col-sm-2 col-form-label">{{ trans('admin.title_in') .   trans('lang.' .Locale::getDisplayName($locale)) }}</label>--}}
{{--                                                                <div class="col-sm-10">--}}
{{--                                                                    <input disabled class="form-control" type="text"--}}
{{--                                                                    name="{{ $locale }}[title]" disabled--}}
{{--                                                                    value="{{ @$title-translate->trans->where('locale', $locale)->first()->title }}"--}}
{{--                                                                    id="title{{ $key }}">--}}
{{--                                                                </div>--}}
{{--                                                          --}}
{{--                                                            </div>--}}
{{--                                                        @endforeach--}}


{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}





{{--                                    <div class="col-md-4">--}}

{{--                                        <div class="accordion mt-4 mb-4" id="accordionExample">--}}
{{--                                            <div class="accordion-item border rounded">--}}
{{--                                                <h2 class="accordion-header" id="headingTwo">--}}
{{--                                                    <button class="accordion-button fw-medium" type="button"--}}
{{--                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"--}}
{{--                                                        aria-controls="collapseTwo">--}}
{{--                                                        {{ trans('admin.settings') }}--}}
{{--                                                    </button>--}}
{{--                                                </h2>--}}
{{--                                                <div id="collapseTwo" class="accordion-collapse collapse show"--}}
{{--                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">--}}
{{--                                                    <div class="accordion-body">--}}
{{--                                                        <div class="col-sm-3 col-md-6 mb-3">--}}
{{--                                                            @if ($title-translate->image != null)--}}
{{--                                                                <img src="{{ asset($title-translate->image) }}" alt=""--}}
{{--                                                                    style="width:100%">--}}
{{--                                                            @endif--}}
{{--                                                        </div>--}}

{{--                                                            --}}{{-- portfolio  ------------------------------------------------------------------------------- --}}
{{--                                                            <div class="col-12">--}}
{{--                                                                <div class="row mb-3">--}}
{{--                                                                    <label for="example-number-input"> @lang('title-translate.portfolio'):</label>--}}
{{--                                                                    <div class="col-sm-12">--}}
{{--                                                                        <p class="h2 text-primary ">{{ @$title-translate->portfolio ?@$title-translate->portfolio->trans->where('locale',$current_lang)->first()->title: "__"  }}</p>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                          --}}
{{--                                                            </div>--}}
{{--                                                     --}}
{{--                                                --}}
{{--                                                        --}}{{-- sort ------------------------------------------------------------------------------------- --}}
{{--                                                        <div class="col-12">--}}
{{--                                                            <div class="row mb-3">--}}
{{--                                                                <label for="example-number-input" col-form-label>--}}
{{--                                                                    @lang('title-translate.sort'):</label>--}}
{{--                                                                <div class="col-sm-12">--}}
{{--                                                                    <input disabled class="form-control" type="number" id="example-number-input" disabled  name="sort" value="{{ @$title-translate->sort }}">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-12 ">--}}
{{--                                                            <label class="col-md-3 col-form-label" for="available">{{ trans('admin.feature') }}</label>--}}
{{--                                                                @if($title-translate->feature == 1 )--}}
{{--                                                                    <p class="badge  bg-success h3" style="font-size:20px">@lang("admin.yes")</p>   --}}
{{--                                                                @else--}}
{{--                                                                    <p class="badge  bg-danger h3" style="font-size:20px">@lang("admin.no")</p>--}}
{{--                                                                @endif   --}}
{{--                                                        </div>--}}
{{--                                                 --}}
{{--                                                    --}}{{-- Status ------------------------------------------------------------------------------------- --}}
{{--                                                        <div class="col-12">--}}
{{--                                                            <label class="col-sm-3 col-form-label" for="available">{{ trans('admin.status') }}</label>--}}
{{--                                                                @if($title-translate->status == 1 )--}}
{{--                                                                    <p class="badge  bg-success h3" style="font-size:20px">@lang("admin.active")</p>   --}}
{{--                                                                @else--}}
{{--                                                                    <p class="badge  bg-danger h3" style="font-size:20px">@lang("admin.dis_active")</p>--}}
{{--                                                                @endif--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}



{{--                                    </div>--}}
{{--                        --}}
{{--                                    --}}{{-- Butoooons ------------------------------------------------------------------------- --}}
{{--                                    <div class="row mb-3 text-end">--}}
{{--                                        <div>--}}
{{--                                            <a href="{{ route('title-translation.index') }}"--}}
{{--                                                class="btn btn-outline-danger waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- end row-->

    </div> <!-- container-fluid -->

@endsection



