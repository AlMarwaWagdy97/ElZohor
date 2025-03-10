@extends('site.app')
@section('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'home_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'home_meta_description_' . $current_lang)->first()->value)


@section('content')
    {{--    <style>--}}
    {{--        body > div.prodects.text-center.mt-5.position-relative.wow.fadeInDown > div > div.row.mt-lg-5.py-3 > div > div {--}}

    {{--            margin-top: 50px;--}}
    {{--            margin-bottom: 70px;--}}

    {{--        }--}}

    {{--        body > div.prodects.text-center.mt-5.position-relative.wow.fadeInDown > div > div.row.mt-lg-5.py-3 > div > div:hover {--}}
    {{--            cursor: pointer;--}}
    {{--        }--}}


    {{--        h1 {--}}
    {{--            /*font-family: SomarSans-Bold !important;*/--}}
    {{--            /*color: #8c1320;*/--}}
    {{--            /*font-size: 60px;*/--}}
    {{--        }--}}
    {{--    </style>--}}


    {{--{{dd($settings->getItem('pdf'))}}--}}
    <!--Hero section -->
    <div class="Hero  wow bounceInUp">
        <div class="text-center">
            <!-- Slider main container -->
            <div class="swiper Hero_slider">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    {{--                {{dd($settings->getItemFeatured('pdf') , 'dfdfd')}}--}}
                    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('slider'))

                        @php  $i = 0;  @endphp
                        @forelse ($sliders as $slider)

                            @if(substr($slider->image, -3) == "mp4")
                                <div class="swiper-slide">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="{{ asset($slider->image) }}" class="img-fluid" alt="" style="width: 100%" />
                                            </div>
                                        </div>
                                </div>

                            @else

                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="{{ asset($slider->image) }}" class="img-fluid" alt="" style="width: 100%" />
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    @endif
                </div>
            {{--                /*****************end star*******/--}}

            <!-- If we need pagination -->
                {{--                <div class="swiper-pagination"></div>--}}

            </div>
        </div>
    </div>
    <!--Hero section -->




    <!--About section-->
    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor'))
        <div
            class="leadership mt-lg-5 mt-3 py-lg-5 wow bounceInUp"
            data-wow-offset="20"
        >
            <div class="container">
                <div class="Title mb-5">
                    <div class="d-flex flex-wrap flex-md-nowrap">
                        <div
                            class="d-flex justify-content-center align-content-center align-items-center mx-auto"
                        >
                            <div
                                class="titleImg d-flex align-items-center align-content-center mx-3"
                            >
                                {{--                                <img src="{{asset('site/imgs/Logo100-100.png')}}" class="mb-3" alt="" />--}}

                                <img src="{{ asset($settings->getItem('logo') ) }}" alt=""/>

                            </div>
                            <h2 class="text-capitalize">نبذة عن الزهور</h2>
                        </div>
                    </div>
                </div>

                <div class="leaders mt-5 p-3">
                    <div class="row justify-content-center text-center">
                        <div class="col-12 col-lg-6 Img">
                            <img
                                src="{{asset(  App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor')->image  )}}"
                                class="img-fluid" alt=""/>
                        </div>
                        <div
                            class="col-12 col-lg-6 Text d-flex flex-column align-items-center justify-content-center"
                        >
                            <p>
                                {{--                                في " الزهور" نستخدم أجود المكونات المحلية والعالمية، مع تقنيات--}}
                                {{--                                إنتاج حديثة لضمان تقديم منتجات مميزة لعملائنا الكرام، يشهد على--}}
                                {{--                                ذلك إرثنا الطويل في السوق وثقة العملاء المستمرة.--}}
                                {!!    App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor')->trans[0]->description  !!}
                            </p>
                            {{--                            <button class="btn btn-more mt-5 px-5 py-3">Learn more</button>--}}
                            @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor')->button_featured)
                                <a
                                    href="{{app()->getLocale()  .  App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor')->url}}"
                                    class="btn btn-more mt-5 px-5 py-3"> {{  App\Settings\HomeSettingSingleton::getInstance()->getItem('about_zohoor')->trans[0]->button_title  }}  </a>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--About section-->










    <!--PRODUCTS-->
    <!-------here we represent the products in (HomeSettingSingleton and home page settings) equals the categories  here in this section -->
    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('products'))
        @if( $categories  &&  $categories->count())
            <!--PRODUCTS-->
            <div
                class="prodects text-center mt-5 position-relative wow fadeInDown"
                data-wow-delay=".5s"
                data-wow-duration=".5s"
            >
                <div class="container">
                    <div
                        class="Title mb-lg-5 mt-5 d-flex justify-content-center align-content-center align-items-center"
                    >
                        <div class="titleImg d-flex mx-3 text-center">
                            <img src="{{ asset($settings->getItem('logo') ) }}" class="mb-3" alt=""/>
                        </div>
                        <h2 class="text-capitalize">منتجاتنا</h2>
                    </div>

                    <div class="row mt-lg-5 py-3">
                        @forelse($categories->take(App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->num_of_items ?? 3) as $key => $category)
                            <div class="col-lg-4 col-12 px-5 mb-lg-0 mb-3 mt-lg-5">
                                <div class="yellowDiv position-relative"
                                     onclick="window.open('{{ url(app()->getLocale() . '/categories/' . @$category->trans[0]->slug) }}' , '_blank')">
                                    <img src="{{ asset($category->image) }}" class="w-50"
                                         alt="{{ @$category->trans[0]->name }}"/>
                                    <div class="prodectInfo bg-white rounded p-2 text-center">
                                        <h4>{{ @$category->trans->first()->title }}</h4>
                                    </div>
                                </div>
                            </div>
                        @empty


                        @endforelse


                        <div class="row">
                            <button onclick="window.location.href='{{url(route('site.categories.index'))}}'"
                                    class="btn btn-more mt-5 px-5 py-3 mx-auto">
                                المزيد
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--PRODUCTS-->
        @endif
    @endif
    <!--PRODUCTS-->


    {{--    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('products'))--}}
    {{--            @if( $categories  &&  $categories->count()) )--}}
    {{--        <!--PRODUCTS-->--}}
    {{--        <div class="prodects text-center mt-5 position-relative wow fadeInDown" data-wow-delay=".1s"--}}
    {{--             data-wow-duration=".1s">--}}
    {{--            <div class="container">--}}
    {{--                <div class="Title mb-lg-5 mt-5 d-flex justify-content-center align-content-center align-items-center">--}}
    {{--                    --}}{{-- <div class="titleImg d-flex mx-3 text-center">--}}
    {{--                        <img src="{{ asset('site/imgs/logo12.png') }}" class="mb-3" alt="" />--}}
    {{--                </div> --}}

    {{--                    --}}{{--                    <h1 class="text-capitalize">@lang('OUR PRODUCTS')</h1>--}}
    {{--                    <h1 class="text-capitalize"> {{App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->trans[0]->title}} </h1>--}}

    {{--                </div>--}}
    {{--                <div class="row mt-lg-5 py-3">--}}
    {{--                        @forelse($categories->take(App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->num_of_items) as $key => $category)--}}
    {{--                        <div class="col-lg-4 col-12 px-5 mb-lg-0 mb-3 mt-lg-5">--}}
    {{--                            <div class="yellowDiv position-relative bg-success"--}}
    {{--                                 onclick="window.open('{{ url(app()->getLocale() . '/products/' . @$category->trans[0]->slug) }}' , '_blank')">--}}
    {{--                                <img src="{{ asset($category->image) }}"--}}
    {{--                                     class="w-50" alt="{{ @$category->trans[0]->name }}"/>--}}
    {{--                                <div class="prodectInfo bg-white rounded p-3 text-start">--}}
    {{--                                    <h1 class="h5">{{ @$category->trans->first()->name }}</h1>--}}
    {{--                                    <p>--}}
    {{--                                        {{ removeHTML(Str::substr(@$category->trans->where('locale', $current_lang)->first()->description, 0, 120)) }}--}}
    {{--                                        ...--}}
    {{--                                    </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @empty--}}

    {{--                    @endforelse--}}

    {{--                    <div class="row">--}}
    {{--                        @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->button_featured && App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->trans && App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->trans[0]->button_title)--}}
    {{--                            <a href="{{ route('site.products') }}" class="btn btn-more mt-5 px-5 py-3 mx-auto">--}}
    {{--                                {{App\Settings\HomeSettingSingleton::getInstance()->getItem('products')->trans[0]->button_title}}--}}
    {{--                            </a>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!--PRODUCTS-->--}}
    {{--        @endif--}}
    {{--    @endif--}}





















    {{--@if(is_array($visions) && isset($visions[0])   )--}}
    <!--Our Vision-->
    <div
        class="OurVision  mb-5 position-relative wow fadeInUpBig"
        data-wow-offset="300"
    >
        <div class="overlay"></div>
        <div class="container position-relative z-3">
            <h1 class="text-capitalize text-center text-white">أخر الأخبار</h1>
            <div class="row text-center pt-5">
                {{--            {{dd($visions)}}--}}
                @forelse (App\Models\News::with('transNow')->active()->latest()->take(3)->get() as $itemOne)
                    <div class="Vision col-lg-4 col-12 px-3">
                        <div class="WhiteDiv poniterClass mt-3 mb-3 py-5 mx-auto"
                             onclick="window.location.href = '{{url(route('site.news.show' , optional($itemOne->transNow)->slug))}}'">
                            <img
                                src="{{ asset($itemOne->image ?? '') }}"
                                class="img-fluid"
                                alt=""
                            />
                        </div>

                        <div class="text text-center">
                            <h4 class="text-uppercase">
                                {{optional($itemOne->transNow)->title  ??''}}
                            </h4>
                        </div>
                    </div>

                @empty
                @endforelse

                {{--            <div class="Vision col-lg-4 col-12 px-3">--}}
                {{--                <div class="WhiteDiv mt-3 mb-3 mx-auto">--}}
                {{--                    <img--}}
                {{--                        src="{{asset('site/imgs/company-vision.png')}}"--}}
                {{--                        class="img-fluid"--}}
                {{--                        alt=""--}}
                {{--                    />--}}
                {{--                </div>--}}

                {{--                <div class="text text-center">--}}
                {{--                    <h4 class="text-uppercase">--}}
                {{--                        على مدار ٩٢ عام تم إنتاج أكثر من ٤٠ منتج--}}
                {{--                    </h4>--}}
                {{--                </div>--}}
                {{--            </div>--}}

                {{--            <div class="Vision col-lg-4 col-12 px-3">--}}
                {{--                <div class="WhiteDiv mt-3 mb-3 mx-auto">--}}
                {{--                    <img--}}
                {{--                        src="{{asset('site/imgs/company-vision.png')}}"--}}
                {{--                        class="img-fluid"--}}
                {{--                        alt=""--}}
                {{--                    />--}}
                {{--                </div>--}}

                {{--                <div class="text text-center">--}}
                {{--                    <h4 class="text-uppercase">--}}
                {{--                        تصدير منتجات الزهور لأكثر من ٥ دول في الشرق الأوسط--}}
                {{--                    </h4>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
            <div class="row">
                <button onclick="window.location.href='{{url(route('site.news'))}}'"
                        class="btn bg-white btn-more mt-5 px-5 py-3 mx-auto " id="newMainBtn">
                    المزيد
                </button>
            </div>

        </div>
    </div>
    <!--Our Vision-->
    {{--@endif--}}












    <!--AboutUs-->
    <div class="AboutUs mt-5 pt-3 text-center wow slideInDown" data-wow-offset="400">

        @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('about'))
            {{--    ///here//--}}
            @if((App\Settings\SettingSingleton::getInstance()->getItemFeatured('footer')) == false)

                <br>
                <br>
                <br>
            @endif
            {{--    ///here//--}}

            <div class="container w-100 h-100">

                <div class="row">

                    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('products_bottom_box'))
                        <div class="sauce col-lg-4 col-12 p-3">

                            <div class="number pb-2">
                                <img
                                    src="{{ asset(App\Settings\HomeSettingSingleton::getInstance()->getItem('products_bottom_box')->image) }}"
                                    class="my-3" style="width: 100px" alt=""/>
                                <h1 class="num bg_purple_h4"
                                    data-val="{{App\Settings\HomeSettingSingleton::getInstance()->getItem('products_bottom_box')->num_of_items}}">
                                    {{--                                    data-val="{{App\Settings\HomeSettingSingleton::getInstance()->getItem('products_bottom_box')->num_of_items}}">--}}
                                    0+</h1>
                                {{--                                <p class="text-uppercase">@lang('Products')</p>--}}
                                <p class="text-uppercase">{{App\Settings\HomeSettingSingleton::getInstance()->getItem('products_bottom_box')->trans[0]->title}}</p>
                            </div>
                        </div>
                    @endif

                    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('clients_bottom_box'))
                        <div class="rating col-lg-4 col-12 p-3">
                            <div class="number pb-2">
                                <img
                                    src="{{ asset(App\Settings\HomeSettingSingleton::getInstance()->getItem('clients_bottom_box')->image) }}"
                                    class="my-3"
                                    style="width: 100px" alt=""/>
                                <h1 class="num bg_purple_h4"
                                    data-val="{{  App\Settings\HomeSettingSingleton::getInstance()->getItem('clients_bottom_box')->num_of_items  }}">
                                    0+</h1>
                                <p class="text-uppercase">{{App\Settings\HomeSettingSingleton::getInstance()->getItem('clients_bottom_box')->trans[0]->title}}</p>
                            </div>
                        </div>
                    @endif





                    @if(App\Settings\HomeSettingSingleton::getInstance()->getItem('quality_bottom_box'))
                        <div class="award col-lg-4 col-12 p-3">
                            <div class="number pb-2">
                                <img
                                    src="{{ asset(App\Settings\HomeSettingSingleton::getInstance()->getItem('quality_bottom_box')->image) }}"
                                    class="my-3" style="width: 100px" alt=""/>
                                <h1 class="num bg_purple_h4"
                                    data-val="{{  App\Settings\HomeSettingSingleton::getInstance()->getItem('quality_bottom_box')->num_of_items  }}">
                                    0+</h1>
                                <p class="text-uppercase">{{App\Settings\HomeSettingSingleton::getInstance()->getItem('quality_bottom_box')->trans[0]->title}}</p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        @endif

    </div>

    <!--AboutUs-->





@endsection
