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
            color:black;
            position: relative;
            z-index: 2;

        }




        /*************sections **************/

        .upper_h{
            margin-bottom: 0;
            margin-top: 5%;
            color: white;
        }

            .section_p {
            /*padding-right: 5%;*/

            color:white;
            margin: auto;
            position: relative;
            z-index: 10;
            font-size: 19px;
            /*padding-left: 5%;*/
            /*    padding-right: 5%;*/

                padding-bottom: 3%;
        }

        .button_size_2 {
            padding: 1%;
            padding-left: 1%;
            padding-right: 1%;
            margin-bottom: 2%;
            text-decoration: none;
            font-size: 19px;
            border:2px solid #fff!important;
            color:white !important;
        }

        @media(max-width: 700px) {
            .section_p {
                z-index: 10;
                font-size: 12px;
            }

            .button_size_2 {
                font-size: 12px;
            }

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




            section {
                position: relative;
                overflow-x: hidden;
                overflow-y: hidden;

            }



        .section_img {
            height: 100%;
            width: 100%;
            /*padding-top: 10%;*/
            /*padding-bottom: 10%;*/
            margin: auto;
            position: relative;
            z-index: 1;
        }


        .categories_main_container{

        }

        .absolute_div{
            position: absolute;
            /*width: 100%;*/
            /*height: 100%;*/
            background-color: #00000054;

            z-index: 4;
            bottom: 10%;
            left: 27%;
            text-shadow: 4px 4px 10px black;
            /*width: 30%;*/
            /*height: 30%;*/
            overflow-y: auto;
            overflow-x: hidden;



        }


        .absolute_div_center{

            text-align: center;
            /* padding-top: 20%; */
            width: 48%;
            height: fit-content;
            padding-bottom: 2%;
            /* padding-top: 20%; */
        }

        .absolute_div_center div p{
            /*padding-right: 10%;*/
            width: 100%;
        }


        .absolute_div_right{

            text-align: right;
            padding-right: 128px;
        }
        .absolute_div_right div p{
            padding-left: 10%;
        }


        img {
            border-radius: unset;
        }


    </style>
    {{--
    The first generic brand name of packed croissants in Egypt and the region, Molto was launched in 1997 to introduce the concept of packed croissants to consumers. The brand is available in multiple savory and sweet variations.
    --}}

    @foreach($categories as $key => $val)
             <section class="">
                <div class="row">


                <div class="col-lg-12 col-md-12 text-center child_div_section">

                    <div    class="categories-scroll-animation categories_main_container"      >


                        <img class="section_img" src="{{asset($val->image)}}"/>

{{--                        --}}


                        <div  class="absolute_div absolute_div_center" >
                            <div  class=" visible wow  shake animated "  data-wow-duration="1500ms" data-wow-iteration="1">
                            <h4 class="upper_h mb-4  text-center">{{$val->transNow->title}}</h4>
                            <p class="section_p  text-center" >{{$val->transNow->description}}</p>
                            <div class="button_align align_center mt-2"><a class="button  button_size_2"
                                                                           href="{{url(route('site.categories.show' , $val->transNow->slug))}}"><span
                                        class="button_label">المزيد</span></a></div>
                            </div>
                        </div>



                    </div>

                </div>
                </div>
            </section>
    @endforeach




@endsection



{{--wow bounceIn--}}
