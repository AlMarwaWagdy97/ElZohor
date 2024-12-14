@extends('site.app')

@section('title', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_title)
@section('meta_key', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_key)
@section('meta_description', @$aboutUs->trans->where('locale', $current_lang)->first()->meta_description)

@section('content')
    <div
        class="AboutUs mt-5 position-relative wow fadeInUpBig"
        data-wow-offset="300"
    >

        <div class="container position-relative z-3">
            <h1 class="text-capitalize text-center">    {{ @$aboutUs->trans->where('locale', $current_lang)->first()->title }}  </h1>
            <p class="mt-3">
                {!! @$aboutUs->trans->where('locale', $current_lang)->first()->content !!}
            </p>
            <div class="row text-center pt-2">
                <div class="Vision col-lg-3 col-12 px-3">
                    <div class="WhiteDiv mt-3 mb-3 mx-auto p-3">
                        <img
                            src="{{asset($aboutUs->image)}}"
                            class="img-fluid" alt=""/>
                    </div>


                    <div class="text text-center">
                        <h4 class="text-uppercase">    {{App\Settings\HomeSettingSingleton::getInstance()->getItem('mission')->trans[0]->title}}
                        </h4>
                        <p>
                            {!!  App\Settings\HomeSettingSingleton::getInstance()->getItem('mission')->trans[0]->description !!}
                        </p>
                    </div>
                </div>

                <div class="Vision col-lg-3 col-12 px-3">
                    <div class="WhiteDiv mt-3 mb-3 mx-auto p-3">
                        <img
                            src="{{asset($aboutUs->image)}}"
                            class="img-fluid" alt=""/>
                    </div>

                    <div class="text text-center">
                        <h4 class="text-uppercase">
                            {{App\Settings\HomeSettingSingleton::getInstance()->getItem('vision')->trans[0]->title}}</h4>
                        <p> {!!  App\Settings\HomeSettingSingleton::getInstance()->getItem('vision')->trans[0]->description !!}
                        </p>
                    </div>
                </div>

                <div class="Vision col-lg-3 col-12 px-3">
                    <div class="WhiteDiv mt-3 mb-3 mx-auto p-3">
                        <img
                            src="{{asset($aboutUs->image)}}"
                            class="img-fluid" alt=""/>
                    </div>

                    <div class="text text-center">
                        <h4 class="text-uppercase"> {{App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->trans[0]->title}}</h4>
                        <ul class="Item-list-1" >
                            <li id="more" >
                                {{      App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->trans[0]->description ?   substr(removeHTML( App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->trans[0]->description),0,10)   : ''  }}


                            </li>
                            <li class="hidden-text-1">
                                {{     App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->trans[0]->description ?   substr(removeHTML( App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->trans[0]->description),10,200)   : ''  }}


                            </li>
                            <a class="more-link"
                               href="{{App\Settings\HomeSettingSingleton::getInstance()->getItem('our_value')?->link??'#more'}}">المزيد</a>
                        </ul>
                    </div>
                </div>

                <div class="Vision col-lg-3 col-12 px-3">
                    <div class="WhiteDiv mt-3 mb-3 mx-auto p-3">
                        <img
                            src="{{asset($aboutUs->image)}}"
                            class="img-fluid" alt=""/>
                    </div>

                    <div class="text text-center">
                        <h4 class="text-uppercase">   {{App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->title}}</h4>
                        <ul class="Item-list-2">
 {{--                                {{  substr( App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->description,10,600)  }}--}}
                             <li id="more2">
                                {{      App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->description ?  substr(removeHTML( App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->description),0,10)   : ''  }}

                            </li>
                            <li class="hidden-text-2">
                                {{      App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->description ?  substr(removeHTML( App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->description),10,200)   : ''  }}

                            </li>

                            <a href="{{App\Settings\HomeSettingSingleton::getInstance()->getItem('our_advantage')?->trans[0]->link??'#more2'}}"
                               class="more-link">المزيد</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
