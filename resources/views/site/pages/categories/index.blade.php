@extends('site.app')


@section('content')
    {{--    <!DOCTYPE html>--}}
    {{--<html lang="en">--}}
    {{--<head>--}}
    {{--    <meta charset="UTF-8">--}}
    {{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--    <title>Scroll Animation</title>--}}
    <style>

        /*.section_padding{*/
        /*    padding-left: 10rem;*/
        /*    padding-right: 10rem;*/

        /*}*/
        /*************sections **************/
        .section_p {
            font-size: 20px;
            color: white;
            width: 23rem;
            margin: auto;

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


        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 2000px; /* for demonstration purposes */
        }

        .scroll-animation {
            /*opacity: 0;*/
            /*transform: translateY(100px);*/
            /*transition: opacity 1s ease-out, transform 1s ease-out;*/
        }

        /*.scroll-animation.visible {*/
        /*    opacity: 1;*/
        /*    transform: translateY(0);*/


        /*}*/


        @keyframes shake {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-10px); /* Move left */
            }
            50% {
                transform: translateX(10px); /* Move right */
            }
            75% {
                transform: translateX(-10px); /* Move left again */
            }
            100% {
                transform: translateX(0); /* Return to original position */
            }
        }

        .scroll-animation:hover {
            animation: shake 0.8s ease-in-out;
        }


        /*@keyframes swing {*/
        /*    0% {*/
        /*        transform: rotate(0deg);*/
        /*    }*/
        /*    25% {*/
        /*        transform: rotate(-20deg); !* Swing to the left *!*/
        /*    }*/
        /*    50% {*/
        /*        transform: rotate(20deg); !* Swing to the right *!*/
        /*    }*/
        /*    75% {*/
        /*        transform: rotate(-20deg); !* Swing to the left again *!*/
        /*    }*/
        /*    100% {*/
        /*        transform: rotate(0deg); !* Return to the original position *!*/
        /*    }*/

        /*}*/
        section {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
        }

        @media (max-width: 991px) {
            section {
                padding-top: 10%;
                padding-bottom: 20%;
            }

            .child_div_section {
                padding-top: 10%;
                padding-bottom: 10%;

            }


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
        }

    </style>
    {{--</head>--}}
    {{--<body>--}}
    {{--<section class="row px-5 py-5">--}}
    {{--    <div class="col-lg-6 col-md-12 text-center child_div_section" >--}}
    {{--        <div class="scroll-animation visible"><img class="section_img"  src="{{asset('attachments/products/test2.png')}}" /></div>--}}
    {{--    </div>--}}
    {{--    <div class="col-lg-6 col-md-12 text-center">--}}
    {{--        <div>--}}
    {{--            <p class="section_p"  style="font-size: 20px;">The first generic brand name of packed croissants in Egypt and the region, Molto was launched in 1997 to introduce the concept of packed croissants to consumers. The brand is available in multiple savory and sweet variations.</p>--}}
    {{--            <div class="button_align align_center mt-2"><a class="button  button_size_2" href="https://edita.com.eg/molto" style="border:2px solid #fff!important;color:#fff;"><span class="button_label">Discover</span></a></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    {{--
    The first generic brand name of packed croissants in Egypt and the region, Molto was launched in 1997 to introduce the concept of packed croissants to consumers. The brand is available in multiple savory and sweet variations.
    --}}

    @foreach($categories as $key => $val)
        <!-------------right --------------->

        @if($key%2 != 0)
            <section class="row px-5 py-5">
                <div class="col-lg-6 col-md-12 text-center child_div_section">
                    <div class="scroll-animation visible"><img class="section_img" src="{{asset($val->image)}}"/></div>
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                    <div>
                        <p class="section_p" style="font-size: 20px;">{{$val->description}}</p>
                        <div class="button_align align_center mt-2"><a class="button  button_size_2"
                                                                       href="{{url(route('site.categories.show' , $val->slug))}}"
                                                                       style="border:2px solid #fff!important;color:#fff;"><span
                                    class="button_label">Discover</span></a></div>
                    </div>
                </div>
            </section>
            <!-------------end right --------------->
        @else

            <!-------------start left --------------->
            <section class="row px-5 py-5">
                <div class="col-lg-6 col-md-12 text-center child_div_section">
                    <div>
                        <p class="section_p" style="font-size: 20px;">{{$val->description}}</p>
                        <div class="button_align align_center mt-2"><a class="button  button_size_2"
                                                                       href="{{url(route('site.categories.show' , $val->slug))}}"
                                                                       style="border:2px solid #fff!important;color:#fff;"><span
                                    class="button_label">Discover</span></a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center">
                    <div class="scroll-animation visible"><img class="section_img" src="{{asset($val->image)}}"/></div>
                </div>
            </section>
            <!-------------end left --------------->
        @endif
    @endforeach


    {{--<section>--}}
    {{--    <div class="scroll-animation visible"><img width="300" height="300" src="{{asset('attachments/products/RIkwhysE9Py17X4rf7wN9guBrCRnREw3ZnDm2X4R.png')}}" /></div>--}}
    {{--</section>--}}

    <script>


        // Detect elements in viewport while scrolling
        const elements = document.querySelectorAll('section');

        function checkVisibility() {
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom >= 0) {
                    // element.classList.add('visible');
                    element.firstChild.firstChild.classList.add('bb');


                } else {
                    // element.classList.remove('visible');
                    element.firstChild.firstChild.classList.remove('bb');


                }
            });
        }

        window.addEventListener('scroll', checkVisibility);
        checkVisibility(); // Initial check
    </script>
    {{--</body>--}}
    {{--</html>--}}

@endsection
