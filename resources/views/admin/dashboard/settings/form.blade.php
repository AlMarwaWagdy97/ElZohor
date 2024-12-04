@extends('admin.app')

@section('title', trans('settings.settings'))
@section('title_page', trans('settings.edit', ['name' => @$settingMain->key]))


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
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-gray-dark">

                            <!-- form start -->
                            <form class="form-horizontal" action="{{ route('admin.settings.update', $settingMain->id) }}"
                                method="POST" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">

                                    @foreach ($settings as $setting)
                                            <div class="float-end col-10">

                                            @if ($setting->type == 0)
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    {{ trans('settings.' . $setting->key) }} </label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="{{ $setting->key }}"
                                                        value="{{ $setting->value }}">
                                                </div>
                                            </div>
                                        @elseif($setting->type == 1)
                                            <div class="row mb-3">
                                                <div class="col-md-2">
                                                    <label for="example-number-input" col-form-label>
                                                        {{ trans('settings.' . $setting->key) }} :</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="file"
                                                        placeholder="@lang('admin.image'):" id="example-number-input"
                                                        name="{{ $setting->key }}">
                                                </div>
                                                @if ($setting->value)
                                                    <div class="col-sm-4"
                                                        style="max-width: 200px; max-height: 150px; background-color: #e7e7e7;">
                                                        <img style="width: 100px;height:100px"
                                                            src="{{ asset($setting->value) }}" alt="" />
                                                    </div>
                                                @else
                                                    <div class="col-sm-4" style="width: 200px; height: 150px;">
                                                        <img src="{{ admin_path('images/not_found.PNG') }}" width="150"
                                                            height="150" alt="" />
                                                    </div>
                                                @endif


                                            </div>
                                        @elseif($setting->type == 6)
                                            <div class="row mb-3">
                                                <div class="col-md-2">
                                                    <label for="example-number-input" col-form-label>
                                                        {{ trans('settings.' . $setting->key) }} :</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input class="form-control" type="file"
                                                        placeholder="@lang('admin.pdf'):" id="example-number-input"
                                                        name="{{ $setting->key }}">
                                                </div>
                                                @if ($setting->value)
                                                    <div class="col-sm-4">
                                                        <a href="{{ asset($setting->value) }}" target="_blank">
                                                            <img style="width: 100px; height:100px"
                                                                src="{{ admin_path('images/pdf.png') }}" alt="" />
                                                        </a>
                                                    </div>
                                                @endif


                                            </div>
                                        @elseif($setting->type == 2)
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    {{ trans('settings.' . $setting->key) }} </label>
                                                <div class="col-sm-10">
                                                    <textarea id="content{{ $setting->key }}" name="{{ $setting->key }}" class="form-control"> {{ $setting->value }} </textarea>
                                                </div>
                                            </div>
                                        @elseif($setting->type == 3)
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="global_meta_title">
                                                    {{ trans('settings.' . $setting->key) }}
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="global_meta_title"
                                                        placeholder="{{ trans('settings.' . $setting->key) }}"
                                                        name="{{ $setting->key }}" class="form-control"
                                                        value="{{ $setting->value }}" />
                                                    <iframe style="margin-top: 10px" src="{{ $setting->value }}"
                                                        frameborder="0"></iframe>
                                                </div>
                                            </div>
                                        @elseif($setting->type == 4)
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    {{ trans('settings.' . $setting->key) }} </label>
                                                <div class="col-sm-10">
                                                    <textarea id="content{{ $setting->key }}" name="{{ $setting->key }}" class="form-control"> {{ $setting->value }} </textarea>
                                                </div>
                                            </div>
                                            <hr>
                                        @elseif($setting->type == 5)
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    {{ trans('settings.' . $setting->key) }} </label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" name="{{ $setting->key }}"
                                                        value="{{ $setting->value }}">
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                            <div class="float-end col-2">
                                                <a class="btn btn-sm btn-secondary {{ $setting->featured === 1 ? 'bg-success' : ''}}" href="{{url('admin/update_featured/' . $setting->id . "?featured=1" )}}">featured   </a>
                                                <a class="btn btn-sm btn-secondary {{ ($setting->featured === 0 ||  $setting->featured === null) ? 'bg-danger' : ''}}" href="{{url('admin/update_featured/' . $setting->id . "?featured=0" )}}">no featured   </a>

                                            </div>

                                            {{--                                            <select class="form-control d-inline-block"  name="{{ $setting->key }}_featured">--}}
{{--                                                <option value="">....</option>--}}
{{--                                                <option value="1">featured</option>--}}
{{--                                                <option value="0">not featured</option>--}}

{{--                                            </select>--}}

                                    @endforeach
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-end">
                                    <a href="{{ route('admin.settings.index') }}"
                                        class="btn btn-outline-danger waves-effect waves-light ml-3">@lang('button.cancel')</a>
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
