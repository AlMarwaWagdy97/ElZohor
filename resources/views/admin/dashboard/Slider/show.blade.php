@extends('admin.app')

@section('title', trans('slider.slider_show'))
@section('title_page', trans('slider.show', ['name' => @$slider->title]) )


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="row">
                <div class="col-12 m-3">
                    <div class="row mb-3 text-end">                                
                        <div>
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-8 col-sm-12">

                                    @foreach ($languages as $key => $locale)
                                    <div class="accordion mt-4 mb-4" id="accordionExample">
                                        <div class="accordion-item border rounded">
                                            <h2 class="accordion-header" id="headingOne{{ $key }}">
                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $key }}" aria-expanded="true" aria-controls="collapseOne{{ $key }}">
                                                    {{ trans('lang.' . Locale::getDisplayName($locale)) }}
                                                </button>
                                            </h2>
                                            <div id="collapseOne{{ $key }}" class="accordion-collapse collapse show mt-3" aria-labelledby="headingOne{{ $key }}" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                        
    

                                                      {{-- title ------------------------------------------------------------------------------------- --}}
                                                      <div class="row mb-3">
                                                        <label for="example-text-input"
                                                        class="col-sm-2 col-form-label">{{ trans('admin.title_in') . trans('lang.' . Locale::getDisplayName($locale)) }}</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="{{ $locale }}[title]" disabled  value="{{ @$slider->trans->where('locale',$locale)->first()->title }}" id="title{{ $key }}">
                                                        </div>
                                                        @if($errors->has($locale . '.title'))
                                                            <span class="missiong-spam">{{ $errors->first($locale . '.title') }}</span>
                                                        @endif
                                                    </div>
                                                     {{-- sub title ------------------------------------------------------------------------------------- --}}
                                                     <div class="row mb-3">
                                                        <label for="example-text-sub_title" class="col-sm-2 col-form-label">{{ trans('admin.sub_title') . trans('lang.' . Locale::getDisplayName($locale)) }}</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="{{ $locale }}[sub_title]" disabled value="{{ @$slider->trans->where('locale',$locale)->first()->sub_title  }}" id="sub_title{{ $key }}">
                                                        </div>
                                                        @if ($errors->has($locale . '.sub_title'))
                                                        <span class="missiong-spam">{{ $errors->first($locale . '.sub_title') }}</span>
                                                        @endif
                                                    </div>

                                                    {{-- sub description ------------------------------------------------------------------------------------- --}}
                                                    <div class="row mb-3">
                                                        <label for="example-text-description" class="col-sm-2 col-form-label">{{ trans('admin.sub_description') . trans('lang.' . Locale::getDisplayName($locale)) }}</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="text" name="{{ $locale }}[sub_description]" disabled value="{{ @$slider->trans->where('locale',$locale)->first()->sub_description  }}" id="sub_description{{ $key }}">
                                                        </div>
                                                        @if ($errors->has($locale . '.sub_description'))
                                                        <span class="missiong-spam">{{ $errors->first($locale . '.sub_description') }}</span>
                                                        @endif
                                                    </div>
            
                                                    {{-- description ------------------------------------------------------------------------------------- --}}
                                                    <div class="row mb-3">
                                                        <label for="example-text-input"
                                                        class="col-sm-2 col-form-label">{{ trans('admin.description_in') . trans('lang.' . Locale::getDisplayName($locale)) }}
                                                    </label>
                                                        <div class="col-sm-10 mb-2">
                                                            <textarea id="description{{ $key }}" name="{{ $locale }}[description]" class="form-control" rows="4" disabled> {{@$slider->trans->where('locale',$locale)->first()->description }} </textarea>
                                                            @if($errors->has($locale . '.description'))
                                                                <span class="missiong-spam">{{ $errors->first($locale . '.description') }}</span>
                                                            @endif
                                                        </div>
                        
                                                        {{-- <script type="text/javascript">
                                                            $(function () {
                                                                CKEDITOR.replace('description{{$key}}');
                                                                $('.textarea').wysihtml5()
                                                            })
                                                        </script> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    {{ trans('admin.settings') }}
                                                </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    

                                                    @if( $slider->image != null)
                                                    @if(substr($slider->image, -3) == "mp4")
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <a href="{{ asset($slider->image) }}" target="_blank">
                                                                        <video width="200" height="200" controls muted>
                                                                            <source src="{{ asset($slider->image) }}" type="video/mp4">
                                                                        </video>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <a href="{{ asset($slider->image) }}" target="_blank">
                                                                        <img src="{{asset( $slider->image)}}" alt="" style="width:100%">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif

                                          
                                                    {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-4 col-form-label" for="available">{{ trans('admin.status') }}</label>
                                                                @if($slider->status == 1 )
                                                                    <p class="badge  bg-success" style="font-size:20px">@lang("admin.active")</p>   
                                                                @else
                                                                    <p class="badge  bg-danger" style="font-size:20px">@lang("admin.dis_active")</p>
                                                                @endif
                                                        </div>


                                                {{-- URL ------------------------------------------------------------------------------------- --}}
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label for="example-number-input" col-form-label>
                                                            @lang('slider.url'):</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="text" 
                                                                id="example-number-input" name="url"
                                                                disabled
                                                                value="{{ $slider->url }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                {{-- sort ------------------------------------------------------------------------------------- --}}
                                                <div class="col-12">
                                                    <div class="row mb-3">
                                                        <label for="example-number-input" col-form-label>
                                                            @lang('slider.sort'):</label>
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="number"
                                                                id="example-number-input" name="sort"
                                                                disabled
                                                                value="{{ $slider->sort }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <script src="https://cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
@endsection
