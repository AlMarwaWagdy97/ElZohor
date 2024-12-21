@extends('site.app')


@section('content')
{{--    800080--}}

    <style>



        section {
            overflow: visible;
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
            width: 100px; /* Set width */
            height: 100px; /* Set height */
            z-index: 5;
            animation: moveDown 5s linear  infinite; /* Call the animation */
            animation-delay: 2s;

         }


        .moving-div2 {
            position: absolute; /* Needed for movement */
            top: 20%; /* Start from the top */
            left: 85%; /* Center horizontally */
            width: 100px; /* Set width */
            height: 100px; /* Set height */
            z-index: 5;
            animation: moveDown 7s infinite; /* Call the animation */
            animation-delay: 2s;

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



        .moving-div, .moving-div2 {
            will-change: transform, opacity; /* يساعد على تحسين الأداء */
        }


        .main_image {
            background-image: url("{{url('attachments/products/test2.png')}}");
            width: 50%;
            height: 20rem;
            min-height: 50%;
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

        .main_title{
            color: white;
        }


        .products_container .card{
            background-color: var(--main-bg-purple-color);
            border: 0.001rem solid rgba(299 , 299 , 299 , 0.6);
            border-radius: 15px;
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



    </style>






    <section class="w-100 primaryBgColor">
        <img class="moving-div" src="{{asset('site/images/candy1.png')}}">
        <img class="moving-div2" src="{{asset('site/images/candy2.png')}}">


        <div class="container">

            <div class="row">
                <div class="d-flex caontainer_main_image">

                    <div class="main_image">

                    </div>

                    <div class="mt-5 main_p">
                        dfjd 3o3oi4o34 slslkdlskd qlkel lele
                    </div>

                </div>
            </div>





            <div class="row">



                <h2 class="text-start main_title ">
                    HoHos
                </h2>
<br>
                <div class="row products_container py-5">
                <div class="col-4">
                    <div class="card">

                        <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                        <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>


                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                        <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                        <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>
                    </div>
                </div>
                </div>

                <div class="row products_container py-5">
                    <div class="col-4">
                        <div class="card">

                            <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>


                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img class="image_card" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" />
                            <div class="product_title text-center py-3 text-light fw-bolder">HoHos</div>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </section>

@endsection
