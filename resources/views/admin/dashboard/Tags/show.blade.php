@extends('admin.app')

@section('title', trans('tags.show'))
@section('title_page', trans('tags.show', ['name' => @$tag->trans->where('locale',$current_lang)->first()->title]) )


@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="row">
                <div class="col-12 m-3">

                    <div class="row mb-3 text-end">
                        <div>
                            <a href="{{ route('admin.tag.index') }}"
                                class="btn btn-primary waves-effect waves-light ml-3 btn-sm">@lang('button.cancel')</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('admin.tag.update',$tag->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-8">
                                        @foreach ($languages as $key => $locale)
                                            <div class="accordion mt-4 mb-4" id="accordionExample">
                                                <div class="accordion-item border rounded">
                                                    <h2 class="accordion-header" id="headingOne{{ $key }}">
                                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $key }}" aria-expanded="true" aria-controls="collapseOne{{ $key }}">
                                                        {{  trans('lang.' .Locale::getDisplayName($locale)) }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne{{ $key }}" class="accordion-collapse collapse show mt-3" aria-labelledby="headingOne{{ $key }}" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                
            

                                                            {{-- title ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                    class="col-sm-2 col-form-label">{{ trans('admin.title_in') .  trans('lang.' .Locale::getDisplayName($locale)) }}</label>
                                                                    <div class="col-sm-10"> 
                                                                        <input class="form-control" type="text" name="{{ $locale }}[title]" disabled  value="{{ $tag->trans->where('locale',$locale)->first()->title }}" id="title{{ $key }}">
                                                                    </div>
                                                                    @if($errors->has( $locale . '.title'))
                                                                        <span class="missiong-spam">{{ $errors->first( $locale . '.title') }}</span>
                                                                    @endif
                                                                </div>

                                                            {{-- slug ------------------------------------------------------------------------------------- --}}
                                                                <div class="row mb-3 slug-section">
                                                                    <label for="example-text-input"
                                                                        class="col-sm-2 col-form-label">{{ trans('admin.slug_in') .  trans('lang.' .Locale::getDisplayName($locale))}}</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="{{ $locale }}[slug]"disabled value="{{ $tag->trans->where('locale',$locale)->first()->slug}}" id="slug{{ $key }}"
                                                                            class="form-control slug" required>
                                                                    </div>
                                                                    @if($errors->has( $locale . '.slug'))
                                                                    <span class="missiong-spam">{{ $errors->first( $locale . '.slug') }}</span>
                                                                    @endif
                                                                    <script>
                                                                        $(document).ready(function(){
                                                                            $("#title"+ {{ $key }}).on('keyup', function(){
                                                                                var Text = $(this).val();
                                                                                Text = Text.toLowerCase();
                                                                                Text = Text.replace(/[^a-zA-Z0-9ء-ي]+/g,'-');
                                                                                $("#slug"+{{ $key }}).val(Text);
                                                                            });
                                                                        });
                                                                    </script>
                                                                </div>
                    
                                                            {{-- description ------------------------------------------------------------------------------------- --}}
                                                            {{-- <div class="row mb-3">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label"> @lang('admin.description_in')  {{  trans('lang.' .Locale::getDisplayName($locale))}} </label>
                                                                <div class="col-sm-10 mb-2">
                                                                    <textarea id="description{{ $key }}" name="{{ $locale }}[description]" disabled> {{ $tag->trans->where('locale',$locale)->first()->description }} </textarea>
                                                                    @if($errors->has( $locale . '.description'))
                                                                        <span class="missiong-spam">{{ $errors->first( $locale . '.description') }}</span>
                                                                    @endif
                                                                </div>
                                
                                                                <script type="text/javascript">
                                                                    $(function () {
                                                                        CKEDITOR.replace('description{{$key}}');
                                                                        $('.textarea').wysihtml5()
                                                                    })
                                                                </script>
                                                            </div>            --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingTwo{{ $key }}">
                                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{ $key }}" aria-expanded="true" aria-controls="collapseTwo{{ $key }}">
                                                    @lang('admin.meta')
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo{{ $key }}" class="accordion-collapse collapse show mt-3" aria-labelledby="headingTwo{{ $key }}" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                            
                                                        @foreach ($languages as $key => $locale)
         --}}

                                                            {{-- meta_title_ ------------------------------------------------------------------------------------- --}}
                                                                {{-- <div class="row mb-3">
                                                                    <label for="example-text-input"
                                                                        class="col-sm-2 col-form-label">{{ trans('admin.meta_title_in') .  trans('lang.' .Locale::getDisplayName($locale))}}</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" type="text" name="{{ $locale }}[meta_title]"  disabled value="{{$tag->trans->where('locale',$locale)->first()->meta_title }} }}" id="title{{ $key }}">
                                                                    </div>
                                                                    @if($errors->has( $locale . '.meta_title'))
                                                                        <span class="missiong-spam">{{ $errors->first( $locale . '.meta_title') }}</span>
                                                                    @endif
                                                                </div> --}}

                                                                {{-- meta_description_ ------------------------------------------------------------------------------------- --}}
                                                                {{-- <div class="row mb-3">
                                                                    <label for="example-text-input" class="col-sm-2 col-form-label"> @lang('admin.meta_description_in') {{ trans('lang.' .Locale::getDisplayName($locale))}} </label>
                                                                    <div class="col-sm-10 mb-2">
                                                                        <textarea name="{{ $locale }}[meta_description]" class="form-control description" disabled> {{ $tag->trans->where('locale',$locale)->first()->meta_description }} </textarea>
                                                                        @if($errors->has( $locale . '.meta_description'))
                                                                            <span class="missiong-spam">{{ $errors->first( $locale . '.meta_description') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div> --}}

                                                                {{-- meta_key_ ------------------------------------------------------------------------------------- --}}
                                                                {{-- <div class="row mb-3">
                                                                    <label for="example-text-input" class="col-sm-2 col-form-label"> @lang('admin.meta_key_in')  {{  trans('lang.' .Locale::getDisplayName($locale))}} </label>
                                                                    <div class="col-sm-10 mb-2">
                                                                        <textarea  name="{{ $locale }}[meta_key]" class="form-control description" disabled> {{ $tag->trans->where('locale',$locale)->first()->meta_key }} </textarea>
                                                                        @if($errors->has( $locale . '.meta_key'))
                                                                            <span class="missiong-spam">{{ $errors->first( $locale . '.meta_key') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <hr> --}}
{{-- 
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div> 


                                    <div class="col-md-4">

                                        {{-- ------ Start Post Settings------ --}}
                                        <div class="accordion mt-4 mb-4" id="accordionExample">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        {{ trans('tags.Post_settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        @if( $tag->image != null)
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <a href="{{ asset($tag->image) }}" target="_blank">
                                                                        <img src="{{asset( $tag->image)}}" alt="" style="width:100%">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        {{-- image ------------------------------------------------------------------------------------- --}}
               
                                                        {{-- sort ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input" col-form-label>
                                                                    @lang('articles.sort'):</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="number"
                                                                        placeholder="@lang('articles.sort'):"
                                                                        id="example-number-input" name="sort"
                                                                        value="{{ $tag->sort }}" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- feature ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                for="available">{{ trans('admin.feature') }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-check form-switch" name="feature"
                                                                    type="checkbox" id="switch1" switch="success"
                                                                     value="1" {{ @$tag->feature == 1? 'checked':'' }} disabled>
                                                                <label class="form-label" for="switch1"
                                                                    data-on-label=" @lang('admin.yes') "
                                                                    data-off-label=" @lang('admin.no')"></label>
                                                            </div>
                                                        </div>
                                                        {{-- back_home ------------------------------------------------------------------------------------- --}}
                                                        {{-- <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                for="available">{{ trans('tags.back_home') }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-check form-switch" name="back_home"
                                                                    type="checkbox" id="switch2" switch="success"
                                                                    value="1" {{ @$tag->back_home == 1? 'checked':'' }} disabled>
                                                                <label class="form-label" for="switch2"
                                                                    data-on-label=" @lang('admin.yes') "
                                                                    data-off-label=" @lang('admin.no')"></label>
                                                            </div>
                                                        </div> --}}
                                                        {{-- Status ------------------------------------------------------------------------------------- --}}
                                                        <div class="col-12">
                                                            <label class="col-sm-12 col-form-label"
                                                                for="available">{{ trans('admin.status') }}</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-check form-switch" name="status"
                                                                    type="checkbox" id="switch3" switch="success"
                                                                     value="1" {{ @$tag->status == 1? 'checked':'' }} disabled>
                                                                <label class="form-label" for="switch3"
                                                                    data-on-label=" @lang('admin.yes') "
                                                                    data-off-label=" @lang('admin.no')"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ------ End Post Settings------ --}}


                                        {{-- ------ Start Appearance settings------ --}}
                                        {{-- <div class="accordion mt-4 mb-4" id="accordionExample2">
                                            <div class="accordion-item border rounded">
                                                <h2 class="accordion-header" id="headingOne2">
                                                    <button class="accordion-button fw-medium" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne2"
                                                        aria-expanded="true" aria-controls="collapseOne2">
                                                        {{ trans('tags.Appearance_settings') }}
                                                    </button>
                                                </h2>
                                                <div id="collapseOne2" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body"> --}}

                                                        {{-- image Background ------------------------------------------------------------------------------------- --}}
                                                        {{-- @if( $tag->background_image != null)
                                                        <div class="col-12">
                                                            <div class="row mb-3">
                                                                <div class="col-sm-12">
                                                                    <a href="{{ asset($tag->background_image) }}" target="_blank">
                                                                        <img src="{{asset( $tag->background_image)}}" alt="" style="width:100%">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif --}}
                                                        {{-- Color Background ------------------------------------------------------------------------------------- --}}
                                                        {{-- <div class="col-12">
                                                            <div class="row mb-3">
                                                                <label for="example-number-input"  col-form-label>@lang('tags.color_background') :</label>
                                                                <input type="text" name="background_color" value="{{$tag->background_color}}"disabled placeholder="#212529" class="form-control spectrum with-add-on colorpicker-showinput-intial" id="colorpicker-showinput-intial" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- ------ End Appearance settings------ --}}
                                    </div>
                                </div>


          

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- end row-->

    </div> <!-- container-fluid -->

@endsection


@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
@endsection
