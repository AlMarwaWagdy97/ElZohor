@extends('admin.app')

@section('title', trans('admin.user_scripts'))
@section('title_page', trans('admin.user_scripts'))

@section('style')
    {{-- @vite(['resources/assets/admin/css/data-tables.js']) --}}
@endsection
@section('content')

    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">



                    <div class="card-body mt-0 pt-0">
                        <div>


                            <div class="row">
                                <div class="col-md-8">
                                    <div class="accordion mt-4 mb-4" id="accordionExample2">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingOne2">
                                                <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne2"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOne2">
                                                    {{   trans('admin.header_script') }}
                                                </button>
                                            </h2>
                                            <div id="collapseOne2"
                                                 class="accordion-collapse collapse show mt-3"
                                                 aria-labelledby="headingOne2"
                                                 data-bs-parent="#accordionExample2">
                                                <div class="accordion-body">

                                                    {{-- title ------------------------------------------------------------------------------------- --}}
                                                    <div class="row mb-3">
                                                        <label for="example-text-input"
                                                               class="col-sm-2 col-form-label">{{ trans('admin.script')  }}</label>
                                                        <div class="col-sm-10">
                                                                   <textarea disabled rows="6" class="form-control"
                                                                             name="header[script]"
                                                                   >{{ @$user_script_header->script }}</textarea>
                                                        </div>
                                                        @if ($errors->has('script'))
                                                            <span class="missiong-spam">{{ $errors->script }}</span>
                                                        @endif
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>





                                <div class="col-md-4">

                                    <div class="accordion mt-4 mb-4" id="accordionExampleTwo2">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingtwo2">
                                                <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="true"
                                                        aria-controls="collapseTwo2">
                                                    {{ trans('admin.header_scripts_status') }}
                                                </button>
                                            </h2>
                                            <div id="collapseTwo2" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExampleTwo2">
                                                <div class="accordion-body">
                                                    {{-- place ------------------------------------------------------------------------------------- --}}

                                                    <div class="col-12 d-none">
                                                        <div class="row mb-3">
                                                            <label for="example-number-input  col-form-label">
                                                                @lang('admin.place'):</label>
                                                            <div class="col-sm-12">
                                                                <select   class="form-control"    id="example-number-input" name="header[place]"   >
                                                                    <option value="">...</option>
                                                                    <option   selected  value="header">@lang('admin.header')</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Status ------------------------------------------------------------------------------------- --}}
                                                    <div class="col-12">
                                                        <label class="col-sm-12 col-form-label"
                                                               for="available">{{ trans('admin.status') }}</label>
                                                        <div class="col-sm-10">
                                                            <input  disabled  class="form-check form-switch" name="header[status]" type="checkbox"
                                                                    id="switch3" switch="success"
                                                                    {{ @$user_script_header->status == 1 ? 'checked' : '' }} value="1">
                                                            <label class="form-label" for="switch3"
                                                                   data-on-label=" @lang('admin.yes') "
                                                                   data-off-label=" @lang('admin.no')"></label>
                                                        </div>
                                                    </div>


                                                    {{-- updated by ------------------------------------------------------------------------------------- --}}
                                                    <div class="col-12">
                                                        <label class="col-sm-12 col-form-label"
                                                               for="available">{{ trans('admin.updated_by') }}</label>
                                                        <div class="col-sm-10">
                                                            <input  disabled  class="form-control  "

                                                                    value="{{$user_script_header->updatedBy->name ?? ''}}">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                {{-- Butoooons ------------------------------------------------------------------------- --}}
                            </div>

                            <br>
                            <hr>
                            <br>




                            <div class="row">
                                <div class="col-md-8">
                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapseOne"
                                                        aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                    {{   trans('admin.footer_script') }}
                                                </button>
                                            </h2>
                                            <div id="collapseOne"
                                                 class="accordion-collapse collapse show mt-3"
                                                 aria-labelledby="headingOne"
                                                 data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    {{-- scripts ------------------------------------------------------------------------------------- --}}
                                                    <div class="row mb-3">
                                                        <label for="example-text-input"
                                                               class="col-sm-2 col-form-label">{{ trans('admin.script')  }}</label>
                                                        <div class="col-sm-10">
                                                                   <textarea disabled rows="6" class="form-control"
                                                                             name="footer[script]"
                                                                             id="script">{{ @$user_script_footer->script }}</textarea>
                                                        </div>
                                                        @if ($errors->has('script'))
                                                            <span class="missiong-spam">{{ $errors->script }}</span>
                                                        @endif
                                                    </div>


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
                                                    {{ trans('admin.footer_scripts_status') }}
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExampleTwo">
                                                <div class="accordion-body">
                                                    {{-- place ------------------------------------------------------------------------------------- --}}

                                                    <div class="col-12 d-none">
                                                        <div class="row mb-3">
                                                            <label for="example-number-input  col-form-label">
                                                                @lang('admin.place'):</label>
                                                            <div class="col-sm-12">
                                                                <select   class="form-control"    id="example-number-input" name="footer[place]"   >
                                                                    <option value="">...</option>
                                                                    <option selected  value="footer">@lang('admin.footer')</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Status ------------------------------------------------------------------------------------- --}}
                                                    <div class="col-12">
                                                        <label class="col-sm-12 col-form-label"
                                                               for="available">{{ trans('admin.status') }}</label>
                                                        <div class="col-sm-10">
                                                            <input  disabled  class="form-check form-switch" name="footer[status]" type="checkbox"
                                                                    id="switch33" switch="success"
                                                                    {{ @$user_script_footer->status == 1 ? 'checked' : '' }} value="1">
                                                            <label class="form-label" for="switch33"
                                                                   data-on-label=" @lang('admin.yes') "
                                                                   data-off-label=" @lang('admin.no')"></label>
                                                        </div>
                                                    </div>



                                                    {{-- updated by ------------------------------------------------------------------------------------- --}}
                                                    <div class="col-12">
                                                        <label class="col-sm-12 col-form-label"
                                                               for="available">{{ trans('admin.updated_by') }}</label>
                                                        <div class="col-sm-10">
                                                            <input  disabled  class="form-control" disabled
                                                                    value="{{$user_script_footer->updatedBy->name ?? ''}}">

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
                                        <a href="{{ route('admin.user_scripts.index') }}"
                                           class="btn btn-outline-danger waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>

                                        <a href="{{ url('admin/user_scripts_all') }}"
                                           class="btn btn-outline-danger waves-effect waves-light ml-3 btn-sm">@lang('button.edit')</a>

                                    </div>
                                </div>
                            </div>









                        </div>

                    </div>

                </div>

            </div>

        </div> <!-- container-fluid -->

@endsection


@section('script')
    {{-- @vite(['resources/assets/admin/js/data-tables.js']) --}}
@endsection
