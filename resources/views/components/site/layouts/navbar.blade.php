  <!--Navbar-->
  <header class="nav mt-3">
      <div class="container">
          <div class="row ">
              <div class="navInfo col-lg-6  d-flex justify-content-lg-start justify-content-center  align-content-center mb-lg-0 mb-3">
                  <div class="nav_eamil me-2">
                      <i class="fa-solid fa-envelope"></i>
                      <span> {{ $settings->getItem('email') }} </span>
                  </div>
                  <div class="nav_phone me-2">
                      <i class="fa-solid fa-phone"></i>
                      <span> {{ $settings->getItem('mobile') }} </span>
                  </div>
              </div>
              
              <div class="icons col-lg-6 d-flex justify-content-lg-end justify-content-center  align-content-center my-auto">
                  <a href="{{ $settings->getItem('facebook') }}">
                      <i class="fa-brands fa-facebook-f fs-4 my-auto me-3"></i>
                  </a>
                  <a href="{{ $settings->getItem('twitter') }}">
                      <i class="fa-brands fa-x-twitter fs-4 my-auto mx-3"></i>
                  </a>
                  <a href="{{ $settings->getItem('instagram') }}">
                      <i class="fa-brands fa-instagram fs-4 my-auto mx-3"></i>
                  </a>

                  <div class="vr my-auto mx-2"></div>

                  <div class="dropdown">
                      <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          @if ($current_lang == 'en')
                          EN
                          @else
                          AR
                          @endif
                      </span>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          @foreach ($locals as $local)
                          <a class="dropdown-item" href="{{ \LaravelLocalization::getLocalizedURL($local, \Request::fullUrl()) }}">
                              {{ Locale::getDisplayName($local) }}
                          </a>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <hr class="mt-3 w-100" />

      <div class="container">
          <div class="menu">
              <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand mx-xl-auto " href="{{ route('site.home') }}">
                      <img src="{{ asset($settings->getItem('logo') ) }}" width="80" height="80" alt="" />
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse  justify-content-end  " id="navbarSupportedContent">
                      <ul class="navbar-nav">

                          @include('components.site.layouts.menuItem')

                          {{-- <li class="nav-item ms-xl-5">
                              <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                          </li> --}}

                      </ul>
                  </div>
              </nav>
          </div>
      </div>
  </header>
  <!--Navbar-->
