@extends('admin.app')

@section('title', trans('product.create_products'))
@section('title_page', trans('product.create_products'))

@section('content')

    <div class="container-fluid">
        <!-- start row -->
        <div class="row">
            <div class="row">
                <div class="col-12 m-3">
                    <div class="row mb-3 text-end">
                        <div>
                            <a href="{{ route('admin.products.index') }}"
                                class="btn btn-outline-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!---- field sections --->
                                    <div class="col-md-8">
                                        <!---main fields -->
                                        @foreach ($languages as $key => $locale)
                                            <div class="accordion mt-4 mb-4" id="accordionExample">
                                                <div class="accordion-item border rounded">
                                                    <h2 class="accordion-header" id="headingOne{{ $key }}">
                                                        <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseOne{{ $key }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapseOne{{ $key }}">
                                                            {{ trans('lang.' . Locale::getDisplayName($locale)) }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{ $key }}"
                                                        class="accordion-collapse collapse show mt-3"
                                                        aria-labelledby="headingOne{{ $key }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <!-- name --->
                                                            <div class="row mb-3">
                                                                <label for="name{{ $locale }}"
                                                                    class="col-sm-2 col-form-label">
                                                                    {{ trans('product.name') }}
                                                                    {{ trans('lang.' . $locale) }} {{-- Use the $locale variable directly --}}
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        name="{{ $locale }}[name]"
                                                                        value="{{ old($locale . '.name') }}"
                                                                        id="title{{ $key }}">
                                                                </div>
                                                                @if ($errors->has($locale . '.name'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first($locale . '.name') }}</span>
                                                                @endif
                                                            </div>

                                                            <!-- slug --->
                                                            <div class="row mb-3 slug-section">
                                                                <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label">{{ trans('admin.slug_in') . trans('lang.' . Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" id="slug{{ $key }}"
                                                                        name="{{ $locale }}[slug]"
                                                                        value="{{ old($locale . '.slug') }}"
                                                                        class="form-control slug" required>
                                                                    @if ($errors->has($locale . '.slug'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.slug') }}</span>
                                                                    @endif
                                                                </div>
                                                                @include('admin.layouts.scriptSlug')
                                                                {{-- End Slug --}}
                                                            </div>

                                                            <!-----description--->
                                                            <div class="row mt-3">
                                                                <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label">
                                                                    {{ trans('admin.content_in') . trans('lang.' . Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea id="content{{ $key }}" name="{{ $locale }}[description]" class="m-auto form-control "
                                                                        style="margin-top: 10px"> {{ old($locale . '.description') }} </textarea>
                                                                    @if ($errors->has($locale . '.description'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.description') }}</span>
                                                                    @endif
                                                                </div>


                                                                <script type="text/javascript">
                                                                    CKEDITOR.replace('content{{ $key }}', {
                                                                        filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}",
                                                                        filebrowserUploadMethod: 'form'
                                                                    });
                                                                </script>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                        <!---end main fields -->
                                        <!--- meta fields --->
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
                                                                    class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') . trans('lang.' . Locale::getDisplayName($locale)) }}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        name="{{ $locale }}[meta_title]"
                                                                        value="{{ old($locale . '.meta_title') }}"
                                                                        id="title{{ $key }}">
                                                                </div>
                                                                @if ($errors->has($locale . '.meta_title'))
                                                                    <span
                                                                        class="missiong-spam">{{ $errors->first($locale . '.meta_title') }}</span>
                                                                @endif
                                                            </div>

                                                            {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label"> @lang('admin.meta_description_in')
                                                                    {{ trans('lang.' . Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea name="{{ $locale }}[meta_description]" class="form-control description"> {{ old($locale . '.meta_description') }} </textarea>
                                                                    @if ($errors->has($locale . '.meta_description'))
                                                                        <span
                                                                            class="missiong-spam">{{ $errors->first($locale . '.meta_description') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label"> @lang('admin.meta_key_in')
                                                                    {{ trans('lang.' . Locale::getDisplayName($locale)) }}
                                                                </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea name="{{ $locale }}[meta_key]" class="form-control description"> {{ old($locale . '.meta_key') }} </textarea>
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
                                    <!---- field sections --->
                                </div>

                                    <!--settings-->
                                    <div class="col-md-4">

                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                        {{ trans('admin.settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">

                                                        <!-- parent Category -->
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input">
                                                                    @lang('categories.parent'):
                                                                </label>
                                                                <div class="col-sm-12">
                                                                    <select class="form-select form-select-sm select2"
                                                                            name="category_id">
                                                                        <option value="" selected>
                                                                            {{ trans('categories.select_parent') }} </option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                                {{ str_repeat('ـــ ', $category->level - 1) }}
                                                                                {{ @$category->trans->where('locale', $current_lang)->first()->title }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            @error('category_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        {{-- image ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input" col-form-label>
                                                                    @lang('admin.image'):</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" type="file"
                                                                           placeholder="@lang('admin.image'):" id="example-number-input"
                                                                           name="image" value="{{ old('image') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- sort ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input" col-form-label>
                                                                    @lang('admin.sort'):</label>
                                                                <div class="col-sm-12">
                                                                    <input class="form-control" type="number"
                                                                           placeholder="@lang('admin.sort'):" id="example-number-input"
                                                                           name="sort" value="{{ old('sort') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- feature ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                   for="available">{{ trans('admin.feature') }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-check form-switch" name="feature" type="checkbox"
                                                                       id="switch1" switch="success" checked value="1">
                                                                <label class="form-label" for="switch1"
                                                                       data-on-label=" @lang('admin.yes') "
                                                                       data-off-label=" @lang('admin.no')"></label>
                                                            </div>
                                                        </div>
                                                        {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                   for="available">{{ trans('admin.status') }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-check form-switch" name="status" type="checkbox"
                                                                       id="switch3" switch="success" checked value="1">
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
                                    <!-- end settings-->

                                </div>

                        <!-- Butons ------>
                        <div class="row mb-3 text-end">
                            <div>
                                <a href="{{ route('admin.products.index') }}"
                                    class="btn btn-outline-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                                <button type="submit"
                                    class="btn btn-outline-success waves-effect waves-light ml-3 btn-sm">@lang('button.save')</button>
                            </div>
                        </div>
                        <!--End  Butons ------>



                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection


@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
@endsection
