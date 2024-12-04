<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>EL zohar</title>
    <!-- Custom Stylsheet-->
    <link rel="stylesheet" href="{{asset('assets/asset/css/style.css')}}" />

    <!--Bootstrap cdn -->
    <link rel="stylesheet" href="{{asset('assets/asset/css/bootstrap.min.css')}}" />
    <!--Font awsome-->
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    />
    <!--Animation -->
    <link rel="stylesheet" href="{{asset('assets/asset/css/animate.css')}}" />
    <!--Swiper-->
    <link rel="stylesheet" href="{{asset('assets/asset/css/swiper.min.css')}}" />

    <!--Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap"
        rel="stylesheet"
    />
</head>
<body>
<!--Header-->
<header class="header">
    <div class="overlay"></div>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand py-0 d-block" href="#">
                    <img
                        src="{{asset('assets/asset/imgs/Logo100-100.png')}}"
                        style="width: 100px; height: 100px"
                        alt=""
                    />
                </a>
                <button
                    class="navbar-toggler custom-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul
                        class="navbar-nav mx-auto align-items-center mb-2 mb-lg-0 font-weight-bold fs-6"
                    >
                        <li class="nav-item item ms-3">
                            <a class="nav-link" aria-current="page" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#"> عن الزهور </a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#"> منتجاتنا </a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#">الوظائف الشاغرة </a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#">المقالات</a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#">الاخبار </a>
                        </li>
                        <li class="nav-item item mx-3">
                            <a class="nav-link" href="#">التواصل معانا </a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <i class="bx bx-globe fs-2"></i>
                        </li>
                    </ul>
                </div>

                <a
                    class="nav-link justify-content-center font-weight-bold fs-6 text-white me-5 d-none d-lg-block"
                    href="#"
                >
                    <i class="bx bx-globe fs-2"></i>
                </a>
            </div>
        </nav>
    </div>
</header>
<!--Header-->

<!--Hero section -->
<div class="Hero wow bounceInUp">
    <div class="text-center">
        <!-- Slider main container -->
        <div class="swiper x">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide slide-1">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center text-white middle">
                                <div class="TextArea mt-5 py-5">
                                    <h1 class="Hero_text almarai-extrabold my-3 q">
                                        أهلًا بكم في عالم الزهور
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-2">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center text-white middle">
                                <div class="TextArea mt-5 py-5">
                                    <h1 class="Hero_text my-3 q">
                                        الزهور أصل الحلو في مصر من سنين
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide slide-3">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center text-white middle">
                                <div class="TextArea mt-5 py-5">
                                    <h1 class="Hero_text my-3 q">
                                        نصنع تاريخ حلويات الزهور معكم من ٩٢ عام
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
<!--Hero section -->

<!--Leadership section-->
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
                        <img src="{{asset('assets/asset/imgs/Logo100-100.png')}}" class="mb-3" alt="" />
                    </div>
                    <h1 class="text-capitalize">نبذة عن الزهور</h1>
                </div>
            </div>
        </div>

        <div class="leaders mt-5 p-3">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-6 Img">
                    <img src="{{asset('assets/asset/imgs/AboutUs.jpg')}}" class="img-fluid" alt="" />
                </div>
                <div
                    class="col-12 col-lg-6 Text d-flex flex-column align-items-center justify-content-center"
                >
                    <p>
                        في " الزهور" نستخدم أجود المكونات المحلية والعالمية، مع تقنيات
                        إنتاج حديثة لضمان تقديم منتجات مميزة لعملائنا الكرام، يشهد على
                        ذلك إرثنا الطويل في السوق وثقة العملاء المستمرة.
                    </p>
                    <button class="btn btn-more mt-5 px-5 py-3">Learn more</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Leadership section-->

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
                <img src="{{asset('assets/asset/imgs/Logo100-100.png')}}" class="mb-3" alt="" />
            </div>
            <h1 class="text-capitalize">منتجاتنا</h1>
        </div>

        <div class="row mt-lg-5 py-3">
            <div class="col-lg-4 col-12 px-5 mb-lg-0 mb-3 mt-lg-5">
                <div class="yellowDiv position-relative">
                    <img src="{{asset('assets/asset/imgs/boomboom.png')}}" class="w-50" alt="" />
                    <div class="prodectInfo bg-white rounded p-2 text-center">
                        <h4>لبان</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 px-5 mb-lg-0 mb-3 mt-5">
                <div class="yellowDiv position-relative">
                    <img src="{{asset('assets/asset/imgs/boomboom١.png')}}" class="w-50" alt="" />
                    <div class="prodectInfo bg-white rounded p-2 text-center">
                        <h4>بونبون</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 px-5 mb-lg-0 mb-3 mt-5">
                <div class="yellowDiv position-relative">
                    <img src="{{asset('assets/asset/imgs/chocoroll.png')}}" class="w-50" alt="" />
                    <div class="prodectInfo bg-white rounded p-2 text-center">
                        <h4>مصاصة</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <button class="btn btn-more mt-5 px-5 py-3 mx-auto">
                    Learn more
                </button>
            </div>
        </div>
    </div>
</div>
<!--PRODUCTS-->

<!--Our Vision-->
<div
    class="OurVision mt-5 mb-5 position-relative wow fadeInUpBig"
    data-wow-offset="300"
>
    <div class="overlay"></div>
    <div class="container position-relative z-3">
        <h1 class="text-capitalize text-center text-white">أخر الأخبار</h1>
        <div class="row text-center pt-5">
            <div class="Vision col-lg-4 col-12 px-3">
                <div class="WhiteDiv mt-3 mb-3 mx-auto">
                    <img
                        src="{{asset('assets/asset/imgs/company-vision.png')}}"
                        class="img-fluid"
                        alt=""
                    />
                </div>

                <div class="text text-center">
                    <h4 class="text-uppercase">
                        بدء توزيع منتجات الزهور في جميع انحاء الجمهورية
                    </h4>
                </div>
            </div>

            <div class="Vision col-lg-4 col-12 px-3">
                <div class="WhiteDiv mt-3 mb-3 mx-auto">
                    <img
                        src="{{asset('assets/asset/imgs/company-vision.png')}}"
                        class="img-fluid"
                        alt=""
                    />
                </div>

                <div class="text text-center">
                    <h4 class="text-uppercase">
                        على مدار ٩٢ عام تم إنتاج أكثر من ٤٠ منتج
                    </h4>
                </div>
            </div>

            <div class="Vision col-lg-4 col-12 px-3">
                <div class="WhiteDiv mt-3 mb-3 mx-auto">
                    <img
                        src="{{asset('assets/asset/imgs/company-vision.png')}}"
                        class="img-fluid"
                        alt=""
                    />
                </div>

                <div class="text text-center">
                    <h4 class="text-uppercase">
                        تصدير منتجات الزهور لأكثر من ٥ دول في الشرق الأوسط
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Our Vision-->

<!--AboutUs-->
<div
    class="AboutUs mt-5 pt-3 text-center wow slideInDown"
    data-wow-offset="400"
>
    <div class="container">
        <div class="row">
            <div class="sauce col-lg-4 col-12 p-3">
                <div class="number pb-2">
                    <img
                        src="{{asset('assets/asset/imgs/sauce.png')}}"
                        class="my-3"
                        style="width: 100px"
                        alt=""
                    />
                    <h1 class="num" data-val="100">0+</h1>
                    <p class="text-uppercase">Products</p>
                </div>
            </div>

            <div class="rating col-lg-4 col-12 p-3">
                <div class="number pb-2">
                    <img
                        src="{{asset('assets/asset/imgs/rating.png')}}"
                        class="my-3"
                        style="width: 100px"
                        alt=""
                    />
                    <h1 class="num" data-val="100">0+</h1>
                    <p class="text-uppercase">CLIENTS</p>
                </div>
            </div>

            <div class="award col-lg-4 col-12 p-3">
                <div class="number pb-2">
                    <img
                        src="{{asset('assets/asset/imgs/award.png')}}"
                        class="my-3"
                        style="width: 100px"
                        alt=""
                    />
                    <h1 class="num" data-val="80">0+</h1>
                    <p class="text-uppercase">award</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--AboutUs-->

<!--Footer-->
<div
    class="Footer mt-5 pt-4 position-relative wow bounceInUp"
    data-wow-offset="50"
>
    <div class="overlay"></div>
    <div class="container position-relative z-10">
        <div class="row align-items-center">
            <div class="col-12 col-lg-3">
                <ul class="footer-menu">
                    <li class="mt-1">
                        <a href="index.html">الرئيسية</a>
                    </li>
                    <li class="mt-1">
                        <a href="about.html">عن الزهور </a>
                    </li>
                    <li class="mt-1">
                        <a href="products.html">منتجاتنا</a>
                    </li>
                    <li class="mt-1">
                        <a href="contact.html">الوظائف الشاغرة</a>
                    </li>
                    <li class="mt-1">
                        <a href="blog.html">المقالات</a>
                    </li>
                    <li class="mt-1">
                        <a href="faq.html">الاخبار</a>
                    </li>
                    <li class="mt-1">
                        <a href="login.html">التواصل معانا</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-12 row text-center">
                <div class="info col-12 align-content-center">
                    <div
                        class="location d-flex justify-content-center justify-content-lg-start align-items-center mb-3"
                    >
                        <i class="bx bx-location-plus text-white ms-1"> </i>
                        <span> سمنود، الغربية "طريق المنصورة المحلة القديم</span>
                    </div>

                    <div
                        class="email d-flex justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap align-items-center mb-3"
                    >
                        <i class="bx bx-envelope text-white ms-1"></i>
                        <span dir="ltr" class="mx-1 mx-lg-0"
                        >elzohoursweet@gmail.coma
                </span>
                    </div>

                    <div
                        class="phone d-flex justify-content-center justify-content-lg-start align-items-center mb-3"
                    >
                        <i class="bx bx-phone text-white ms-1"></i>
                        <span dir="ltr">01008101679</span>
                        <span class="mx-3">-</span>
                        <span dir="ltr">01001782634</span>
                    </div>
                </div>
            </div>

            <div class="soical col-lg-3 col-12 align-content-center mt-lg-0 mt-3">
                <h5>تابعنا على وسائل التواصل الاجتماعي</h5>
                <div
                    class="soical_icons d-flex justify-content-center justify-content-lg-start align-items-center mt-3"
                >
                    <div class="p-2 S_icon">
                        <i class="bx bxl-tiktok display-6"></i>
                    </div>
                    <div class="p-2 S_icon">
                        <i class="bx bxl-instagram display-6"></i>
                    </div>
                    <div class="p-2 S_icon">
                        <i class="bx bxl-linkedin display-6"></i>
                    </div>
                    <div class="p-2 S_icon">
                        <i class="bx bxl-facebook display-6"></i>
                    </div>
                </div>
            </div>
            <hr class="bg-white w-100" />
            <h4 class="text-center mt-1 text-white text-center">
                © Mama Sauce 2024 | Privacy Policy | HOLOL Marketing Agency
            </h4>
        </div>
    </div>
</div>

<!--Footer-->

<!--Bootstrap cdn -->
<script src="{{asset('assets/asset/js/bootstrap.bundle.min.js')}}"></script>

<!--Swiper-->
<script src="{{asset('assets/asset/js/swiper.min.js')}}"></script>

<!--Animation-->
<script src="{{asset('assets/asset/js/wow.min.js')}}"></script>

<!--Custom Script-->
<script src="{{asset('assets/asset/js/main.js')}}"></script>
<script src="{{asset('assets/asset/js/test.js')}}"></script>
</body>
</html>
