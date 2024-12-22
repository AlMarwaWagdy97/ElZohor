@extends('site.app')


@section('content')


    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h4{
            color:white;
        }

        /*************sections **************/
        .section_p {
            padding-right: 5%;
            font-size: 20px;
            color: white;
            margin: auto;
            padding-left: 5%;
        }

        .button_size_2 {
            padding: 12px;
            padding-left: 15px;
            padding-right: 15px;
            margin-top: 20px;
            text-decoration: none;
            font-size: 19px;

        }

        /*************sections **************/

        .bb {
            width: 50px;
            height: 50px;
            transition: opacity 1s ease-out, 1s ease-out;

        }

        .original {
            width: 100px;
            height: 100px;
            transition: opacity 1s ease-out, 1s ease-out;

        }

        section{
            overflow: hidden;

        }












        section {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
        }


            section {
                padding-top: 10%;
                padding-bottom: 20%;
            }

            .child_div_section {
                padding-top: 10%;
                padding-bottom: 10%;

            }




        section:nth-child(odd) {
            /*background-color: #0157a8;*/
            background-color: var(--main-bg-purple-second-color);


        }

        section:nth-child(even) {
            /*background-color: #021788;*/
            background-color: var(--main-bg-purple-color);
        }


        .section_img {
            height: 75%;
            width: 75%;
            padding-top: 10%;
            padding-bottom: 10%;

        }



    </style>



{{--    .caontainer_main_image {--}}

    {{--
    The first generic brand name of packed croissants in Egypt and the region, Molto was launched in 1997 to introduce the concept of packed croissants to consumers. The brand is available in multiple savory and sweet variations.
    --}}

    @foreach($categories as $key => $val)
        <!-------------right --------------->

        @if($key%2 != 0)
            <section class="px-5 py-5">
                <div class="row">
                <div class="col-lg-6 col-md-12 text-center ">
                    <div    class="categories-scroll-animation visible wow  shake animated"  data-wow-duration="1500ms" data-wow-iteration="1"    ><img class="section_img" src="{{asset($val->image)}}"/></div>
                </div>
                <div class="col-lg-6 col-md-12 text-center child_div_section">
                    <div>
                        <h4>{{$val->transNow->title}}</h4>
                        <p class="section_p" style="font-size: 20px;">{{$val->transNow->description}}</p>
                        <div class="button_align align_center mt-2"><a class="button  button_size_2"
                                                                       href="{{url(route('site.categories.show' , $val->slug))}}"
                                                                       style="border:2px solid #fff!important;color:#fff;"><span
                                    class="button_label">اكتشف</span></a></div>
                    </div>
                </div>
                </div>
            </section>


{{--            <i class="fa fa-heart fa-5x icn_green wow bounce"data-wow-duration="800ms"></i>--}}

            <!-------------end right --------------->
        @else

            <!-------------start left --------------->
            <section class="px-5 py-5">
                <div class="row">
                <div class="col-lg-6 col-md-12 text-center child_div_section">
                    <div>
                        <h4>{{$val->transNow->title}}</h4>
                        <p class="section_p" style="font-size: 20px;">{{$val->transNow->description}}</p>
                        <div class="button_align align_center mt-2"><a class="button  button_size_2"
                                                                       href="{{url(route('site.categories.show' , $val->slug))}}"
                                                                       style="border:2px solid #fff!important;color:#fff;"><span
                                    class="button_label">اكتشف</span></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center ">
                    <div class="categories-scroll-animation visible wow  shake animated"  data-wow-duration="1500ms" data-wow-iteration="1"    ><img class="section_img" src="{{asset($val->image)}}"/></div>
                </div>
                </div>


            </section>
            <!-------------end left --------------->
        @endif
    @endforeach




@endsection



{{--wow bounceIn--}}
