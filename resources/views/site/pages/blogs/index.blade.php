@extends('site.app')

{{-- @section('title', @$page->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$page->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$page->trans->where('locale', $current_lang)->first()->meta_description) --}}

@section('content')
    <div class="Blogs mt-5">
        <div class="container">

            @foreach($blogs as $key => $val)
                @if( $key % 2 == 0 || $key == 0)
                    <div   class="row blog text-center wow bounceInRight">
                        <div class="col-12 col-lg-6">
                            <img    onclick="window.location.href=`{{url(route('site.blogs.show' , optional($val->transNow)->slug ?? $val->id))}}`" src="{{asset($val->image)}}" class="img-fluid poniterClass" alt=""/>
                        </div>
                        <div
                            class="col-12 col-lg-6 text-end d-flex flex-column justify-content-center"
                        >
                            <h1 class="poniterClass"  onclick="window.location.href=`{{url(route('site.blogs.show' , optional($val->transNow)->slug ?? $val->id))}}`"> {{optional($val->transNow)->title}}</h1>
                            <p>

                                {!!       optional($val->transNow)->description   ?   substr(removeHTML(  optional($val->transNow)->description   ),0,500)  . " ......................... "  : ''  !!}

                                {{--                                <a href="{{route('site.blogs.show' ,  $val->slug ?? $val->id)}}" class=" btn-custom-blogs ">عرض</a>--}}

                            </p>

                        </div>
                    </div>
                @else

                    <div  class="row blog text-center wow bounceInLeft">
                        <div
                            class="col-12 col-lg-6 my-5 text-end d-flex flex-column justify-content-center"
                        >
                            <h1 class="poniterClass"  onclick="window.location.href=`{{url(route('site.blogs.show' , optional($val->transNow)->slug ?? $val->id))}}`">{{optional($val->transNow)->title}}</h1>
                            <p>
                                {!!       optional($val->transNow)->description   ?   substr(removeHTML(  optional($val->transNow)->description   ),0,500)  . " ......................... "   : ''  !!}
{{--                                <a href="{{route('site.blogs.show' ,  $val->slug ?? $val->id)}}" class=" btn-custom-blogs ">عرض</a>--}}

                            </p>

                        </div>
                        <div class="col-12 col-lg-6">
                            <img   onclick="window.location.href=`{{url(route('site.blogs.show' , optional($val->transNow)->slug ?? $val->id))}}`" src="{{asset($val->image)}}" class="img-fluid poniterClass" alt=""/>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

@endsection
