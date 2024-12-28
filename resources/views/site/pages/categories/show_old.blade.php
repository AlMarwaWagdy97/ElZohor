@extends('site.app')


@section('content')
    {{--    800080--}}

    {{--         <link rel="stylesheet" href="{{ asset('css/livewire-component.css') }}">--}}


    {{--        <style>--}}
    {{--            /*.myBtnLiveWire{*/--}}
    {{--            /*    display: none !important;*/--}}
    {{--            /*}*/--}}



    {{--        </style>--}}



    <style>

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        section {
            overflow: hidden;
            background-color: var(--main-bg-purple-color);
        }


        /* Basic page style */
        /*body {*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    overflow: hidden; !* Hide any content that goes outside the viewport *!*/
        /*}*/

        /* Style the div */
        .moving-div {
            position: absolute; /* Needed for movement */
            top: 20%; /* Start from the top */
            left: 15%; /* Center horizontally */
            /*width: 100px; !* Set width *!*/
            /*height: 100px; !* Set height *!*/
            width: 7%; /* Set width */

            z-index: 5;
            animation: moveDown 5s linear infinite; /* Call the animation */
            animation-delay: 2s;
            opacity: 0.001;

        }


        .moving-div2 {
            position: absolute; /* Needed for movement */
            top: 20%; /* Start from the top */
            /*left: 75%; !* Center horizontally *!*/
            right: 15%; /* Center horizontally */
            width: 7%; /* Set width */

            /*width: 100px; !* Set width *!*/
            /*height: 100px; !* Set height *!*/
            z-index: 5;
            animation: moveDown 7s infinite; /* Call the animation */
            animation-delay: 2s;
            opacity: 0.001;

        }


        .moving-div3 {
            position: absolute; /* Needed for movement */
            top: 20%; /* Start from the top */
            right: 7%; /* Center horizontally */
            width: 7%; /* Set width */
            /*height: 10%; !* Set height *!*/
            z-index: 5;
            animation: moveDown 15s infinite; /* Call the animation */
            animation-delay: 2s;
            opacity: 0.001;

        }
        .moving-div4 {
            position: absolute; /* Needed for movement */
            top: 20%; /* Start from the top */
            left: 7%; /* Center horizontally */
            width: 7%; /* Set width */
            /*height: 10%; !* Set height *!*/
            z-index: 5;
            animation: moveDown 15s infinite; /* Call the animation */
            animation-delay: 4s;
            opacity: 0.001;


        }


        /* Define the animation */
        @keyframes moveDown {

            0% {
                top: 20%;
                transform: rotate(0deg); /* Start at 0 degrees */
                opacity: 1;

            }

            100% {
                top: 100%;
                transform: rotate(360deg); /* Complete one full rotation */
                opacity: 0.1;

            }
        }


        .moving-div, .moving-div2 , .moving-div3 , .moving-div4 {
            will-change: transform, opacity; /* يساعد على تحسين الأداء */
        }


        .main_image {
            {{--background-image: url("{{url('attachments/products/test2.png')}}");--}}
             background-image: url("{{$category->image ? url($category->image) : ''}}");
            background-size: contain;
            background-position: center;

            /*width: 40rem;*/
            /*height: 25rem;*/

            width: 39rem;
            height: 25rem;

            min-width: 22rem;
            min-height: 18rem;


            background-repeat: no-repeat;
        }


        .main_p {
            color: white;
            font-size: 22px;
            width: 60%;
            text-align: center;


        }

        .caontainer_main_image {
            padding-top: 10rem;
            padding-bottom: 10rem;
            align-items: center;
            flex-direction: column;
        }

        @media (max-width: 424px) {
            .main_image {
                width: 25rem;
                height: 15rem;
            }


            .moving-div {
                left: 13%;
            }

            .moving-div2 {
                left: 63%;
            }
        }


        .main_title {
            color: white;
        }


        .products_container .card {
            background-color: var(--main-bg-purple-color);
            border: 0.001rem solid rgba(299, 299, 299, 0.6);
            border-radius: 15px;
        }

        .products_container {

            flex-direction: row-reverse;
        }


        /********************************/

        .image_card:hover {
            /*position: absolute; !* Needed for movement *!*/
            /*top: 0; !* Start from the top *!*/
            /*left: 85%; !* Center horizontally *!*/
            /*width: 100px; !* Set width *!*/
            /*height: 100px; !* Set height *!*/
            /*z-index: 1;*/
            animation: rotate 1s ease-in-out; /* Call the animation */
        }


        /* Define the animation */
        @keyframes rotate {
            /*0% {*/
            /*    top: 0;  !* Start at the top *!*/
            /*}*/


            /*100% {*/
            /*    top: 100%; !* Move to the bottom of the viewport *!*/
            /*    opacity: 0.1;*/
            /*}*/
            0% {
                /*top: 20%;*/
                transform: rotate(0deg); /* Start at 0 degrees */
            }
            /*50% {*/
            /*    top: 50%;*/
            /*    transform: rotate(180deg); !* Rotate halfway (180 degrees) *!*/
            /*}*/
            100% {
                /*top: 100%;*/
                transform: rotate(360deg); /* Complete one full rotation */
                /*opacity: 0.1;*/

            }
        }

        /*********************************/

        .image_card:not(:hover) {
            animation: rotateViceVerse 1s ease-in-out; /* Call the animation */
        }

        @keyframes rotateViceVerse {
            0% {
                transform: rotate(0deg); /* Start at 0 degrees */
            }
            100% {
                transform: rotate(-360deg); /* Complete one full rotation */
            }
        }





    </style>







    <section class=" primaryBgColor">
        <img class="moving-div" src="{{asset('site/images/candy1.png')}}">
        <img class="moving-div2" src="{{asset('site/images/candy2.png')}}">
        <img class="moving-div3" src="{{asset('site/images/flowers/yellow.png')}}">
        <img class="moving-div4" src="{{asset('site/images/flowers/pink.png')}}">

        {{--        C:\laragon\www\ElZohor\public\site\images\flowers--}}
        <div class="container">

            <div class="row">
                <div class="d-flex caontainer_main_image">

                    <div class="main_image">

                    </div>

                    <div class="mt-5 main_p">

                        {{optional($category->transNow)->description}}
                    </div>

                </div>
            </div>


            <div class="row">


                <h2 class="text-start main_title ">
                    {{optional($category->transNow)->title}}
                </h2>
                <br>
                <div class="row products_container py-5 d-flex">
                    @if($category->products)
                        @foreach($category->products as $product)
                            @livewire('show-product-component' , ['product_id'=>$product->id , 'product_image' => asset($product->image) , 'product_name' => optional($product->transNow)->name  , 'product_description' => optional($product->transNow)->description  ])
                        @endforeach
                    @endif

                </div>

                {{--                <div class="row products_container py-5">--}}
                {{--                    <div class="col-4">--}}
                {{--                        <div class="card">--}}

                {{--                            <img class="image_card"--}}
                {{--                                 src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}"/>--}}
                {{--                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>--}}


                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-4">--}}
                {{--                        <div class="card">--}}
                {{--                            <img class="image_card"--}}
                {{--                                 src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}"/>--}}
                {{--                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-4">--}}
                {{--                        <div class="card">--}}
                {{--                            <img class="image_card"--}}
                {{--                                 src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}"/>--}}
                {{--                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>


        </div>

    </section>







@endsection







