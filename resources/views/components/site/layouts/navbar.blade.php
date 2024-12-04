    <!--Header-->
    <header class="header">
      <div class="overlay "></div>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <a class="navbar-brand py-0 d-block" href="{{ route('site.home') }}">
                        <img src="{{ asset($settings->getItem('logo') ) }}"  style="width: 100px; height: 100px" alt="" />
                    </a>
                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto align-items-center mb-2 mb-lg-0 font-weight-bold fs-6">
                            @include('components.site.layouts.menuItem')

                            @if ($current_lang == 'ar')
                            <a class=" fs-5 text-white  d-block d-lg-none" href="{{ \LaravelLocalization::getLocalizedURL("en", \Request::fullUrl()) }}">EN</a>
                          @else
                            <a class=" fs-5 text-white  d-block d-lg-none" href="{{ \LaravelLocalization::getLocalizedURL("ar", \Request::fullUrl()) }}">AR</a>
                          @endif

                        </ul>
                    </div>

                        @if ($current_lang == 'ar')
                          <a class=" fs-5 text-white  d-none d-lg-block" href="{{ \LaravelLocalization::getLocalizedURL("en", \Request::fullUrl()) }}">EN</a>
                        @else
                          <a class=" fs-5 text-white  d-none d-lg-block" href="{{ \LaravelLocalization::getLocalizedURL("ar", \Request::fullUrl()) }}">AR</a>
                        @endif

                </div>
            </nav>
        </div>
    </header>
    <!--Header-->
