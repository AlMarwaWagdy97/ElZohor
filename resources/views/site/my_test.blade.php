







@extends('site.app')
@section('title', @$metaSetting->where('key', 'home_meta_title_' . $current_lang)->first()->value)
@section('meta_key', @$metaSetting->where('key', 'home_meta_key_' . $current_lang)->first()->value)
@section('meta_description', @$metaSetting->where('key', 'home_meta_description_' . $current_lang)->first()->value)


@section('content')


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- إضافة GSAP عبر CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>

    <!-- إضافة ScrollTrigger عبر CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>


    <style>
        /* تخصيص بعض الأنماط */
        .card {
            margin: 10px;
            height: 200px;
            width: 150px;
            perspective: 1000px;
            display: inline-block;
        }

        .card-body {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightblue;
            transition: transform 0.5s;
            transform-style: preserve-3d;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        .container {
            padding-top: 50px;
        }
    </style>



    <div class="container">
        <div class="row">
            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->



            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->



            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->



            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->



            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->


            <!-- إنشاء 30 كارت باستخدام Bootstrap -->
            <div class="col-md-4 col-sm-6 col-12" id="card1">
                <div class="card">
                    <div class="card-body">Card 1</div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-12" id="card2">
                <div class="card">
                    <div class="card-body">Card 2</div>
                </div>
            </div>

            <!-- تكرار هذا الكود 30 مرة (يتم اختصاره هنا) -->
            <div class="col-md-4 col-sm-6 col-12" id="card3">
                <div class="card">
                    <div class="card-body">Card 3</div>
                </div>
            </div>

            <!-- ... تكرار باقي الكروت حتى الكارت رقم 30 -->

        </div>
    </div>

    <!-- إضافة GSAP عبر CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.0/ScrollTrigger.min.js"></script>

    <script>
        // تأكد من تسجيل ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // إنشاء حركة لكل كارت عند التمرير
        gsap.utils.toArray('.card').forEach(function(card) {
            gsap.to(card, {
                scrollTrigger: {
                    trigger: card, // العنصر الذي سيبدأ التمرير
                    start: "top 80%", // متى يبدأ التأثير
                    end: "top 30%",   // متى ينتهي التأثير
                    scrub: true,      // تجعل الحركة متزامنة مع التمرير
                },
                rotationY: 360,  // التدوير حول المحور Y
                duration: 2       // مدة الحركة
            });
        });





    </script>




    <script>
        // إضافة التأثيرات عند التحويم (Hover) باستخدام GSAP
        gsap.utils.toArray('.card').forEach(function(card) {
            const cardBody = card.querySelector('.card-body');

            // عند التحويم (mouseenter)
            card.addEventListener('mouseenter', () => {
                gsap.to(cardBody, {
                    rotationY: 360,  // التدوير حول المحور Y
                    duration: 1,     // مدة التدوير
                });
            });

            // عند الخروج من التحويم (mouseleave)
            card.addEventListener('mouseleave', () => {
                gsap.to(cardBody, {
                    rotationY: 0,  // إعادة العنصر للوضع الأصلي
                    duration: 1,   // مدة العودة
                });
            });
        });
    </script>

@endsection
