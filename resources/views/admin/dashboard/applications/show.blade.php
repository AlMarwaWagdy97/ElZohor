@extends('admin.app')

@section('title', trans('admin.applications_show' , ['name' => ''] ))
@section('title_page', trans('admin.applications_show', ['name' => @$application->title]) )

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="row">
                <div class="col-12 m-3">
                    <div class="row mb-3 text-end">
                        <div>
                            <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>

                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        بيانات
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show mt-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">



                                                        {{-- title ------------------------------------------------------------------------------------- --}}
                                                        <div class="row mb-3">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label"> الاسم </label>
                                                            <div class="col-sm-10">
                                                                <input disabled class="form-control" type="text" name="name" value="{{ @$application->name }}" id="name">
                                                            </div>

                                                        </div>


                                                        <div class="row mb-3 slug-section">
                                                            <label for="example-text-input" class="col-sm-2 col-form-label">  الموبايل </label>

                                                            <div class="col-sm-10">
                                                                <input type="text" id="mobile" name="mobile" value="{{ @$application->mobile }}" class="form-control slug mb-3"  disabled>

                                                            </div>


                                                            <label for="example-text-input" class="col-sm-2 col-form-label">  الايميل </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="email" name="email" value="{{ @$application->email }}" class="form-control slug mb-3"  disabled>

                                                            </div>

                                                            {{-- address ------------------------------------------------------------------------------------- --}}
                                                            <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">  العنوان </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea class="form-control" id="address" name="address" disabled> {{ @$application->address }}  </textarea>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                    <div class="col-md-4">

                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        {{ trans('admin.settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="col-sm-3 mb-3">
                                                            {{--                                                        @if ($application->image != null)--}}
                                                            {{--                                                            <img src="{{ asset($application->image) }}" alt="" style="width:100%">--}}
                                                            {{--                                                        @endif--}}
                                                        </div>
                                                        {{-- image ------------------------------------------------------------------------------------- --}}
                                                        {{--                                                    <div class="col-12">--}}
                                                        {{--                                                        <div class="row mb-3">--}}
                                                        {{--                                                            <label for="example-number-input" col-form-label>--}}
                                                        {{--                                                                @lang('admin.image'):</label>--}}
                                                        {{--                                                            <div class="col-sm-12">--}}
                                                        {{--                                                                <input class="form-control" type="file" placeholder="@lang('admin.image'):" id="example-number-input" name="image" value="{{ old('image') }}">--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                    </div>--}}
                                                        {{-- sort ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input" col-form-label>
                                                                    CV :</label>
                                                                <div class="col-sm-12">


                                                                    <a @if( $application->file) href="{{  asset( $application->file) }}" download
                                                                       @else href="#" @endif>
                                                                        <i class="fa fa-download"></i>
                                                                    </a>


                                                                </div>
                                                            </div>
                                                        </div>







                                                        {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label" for="available">{{ trans('admin.status') }}</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-select" name="status"  disabled >
                                                                    <option value="0" {{ @$application->status === 0 ? 'selected' : '' }}>لم يشاهد</option>
                                                                    <option value="1" {{ @$application->status === 1 ? 'selected' : '' }}>  تم مشاهدته</option>
                                                                    <option value="2" {{ @$application->status === 2 ? 'selected' : '' }}> تم الاتصال به  </option>
                                                                    <option value="3" {{ @$application->status === 3 ? 'selected' : '' }}> تم الفبول</option>
                                                                    <option value="4" {{ @$application->status === 4 ? 'selected' : '' }}> تم الرفض  </option>

                                                                </select>
{{--                                                                <label class="form-label" for="switch3" data-on-label=" @lang('admin.yes') " data-off-label=" @lang('admin.no')"></label>--}}
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label" for="available"> وظيفة </label>
                                                            <div class="col-sm-10">
                                                                <h5>{{optional($application->career)->transNow?->title}}</h5>
                                                                {{--                                                            <label class="form-label" for="switch3" data-on-label=" @lang('admin.yes') " data-off-label=" @lang('admin.no')"></label>--}}
                                                            </div>
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
                                        <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-danger waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>

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
