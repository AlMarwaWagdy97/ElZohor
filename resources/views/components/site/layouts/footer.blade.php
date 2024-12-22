  <!--Footer-->
  <div id="my_footer" class="Footer mt-5 pt-4 position-relative  wow bounceInUp"   data-wow-offset="50">
      <div class="overlay "></div>
      <div class="container position-relative z-10">
          <div class="row align-items-center">

              <div class="col-lg-3 col-12">
                  <ul class="footer-menu" >
                      @forelse ($footerMenus as $key => $menu)
                      <li class="mt-1">
                          <a class="S_icon" href="{{ @$menu->type == "dynamic"?  @$menu->dynamic_url : @$menu->url }}">
                              {{ @$menu->trans?->where('locale', $current_lang)->first()->title }}
                          </a>
                      </li>
                      @empty
                        </ul>
                    </div>
                      @endforelse
                  </ul>
              </div>

              <div class="col-lg-4 col-12 row text-center">
                  <div class="info col-12 align-content-center">

                      <div
                          class="location d-flex justify-content-center justify-content-lg-start align-items-center mb-3"
                      >
                          <i class="bx bx-location-plus text-white ms-1"> </i>
                          <span>  {{ $settings->getItem('address') }}  </span>
                      </div>


                      <div class="email d-flex justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap align-items-center mb-3">
                          <i class="bx bx-envelope display-6 text-white ms-1"></i>
{{--                          <a href="mailto:{{ $settings->getItem('email') }}">--}}
                              <span dir="ltr" class="mx-1 mx-lg-0"> {{ $settings->getItem('email') }} </span>
{{--                          </a>--}}
                      </div>

                      <div class="phone d-flex justify-content-center justify-content-lg-start align-items-center mb-3">
                          <i class="bx bx-phone   text-white ms-1"></i>
                          @php
                            $mobile = explode('-',  $settings->getItem('mobile'));
                        @endphp
                        @forelse ($mobile as $key => $num)
{{--                            <a href="tel:{{$num }}">--}}
                                <span dir="ltr"> {{ $num }}</span>
{{--                            </a>--}}
                            @if( ($key + 1 ) < count($mobile ))<span class="mx-2">-</span>@endif
                        @empty
{{--                            <a href="tel:{{ $settings->getItem('mobile') }}">--}}
                                <span dir="ltr"> {{ $settings->getItem('mobile') }}</span>
{{--                            </a>--}}
                        @endforelse

                          {{-- <span class="mx-3">-</span> --}}
                          {{-- <a href=" https://wa.me/{{ $settings->getItem('whatsapp') }}" target="_blank">
                              <span dir="ltr"> {{ $settings->getItem('whatsapp') }} </span>
                          </a> --}}
                      </div>

{{--                      <div class="phone d-flex justify-content-center justify-content-lg-start align-items-center mb-3">--}}
{{--                        <i class="bx bxl-whatsapp display-6 text-white ms-1"></i>--}}
{{--                        <a href="https://wa.me/{{ $settings->getItem('whatsapp') }}" target="_blank">--}}
{{--                            <span dir="ltr"> {{ $settings->getItem('whatsapp') }} </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}

                  </div>
              </div>




                    <div class="soical col-lg-3 col-12 align-content-center mt-lg-0 mt-3">
                    <h5> @lang('Follow us on social media')</h5>
                    <div class="soical_icons d-flex justify-content-center justify-content-lg-start align-items-center mt-3">
                             <a class="p-2 S_icon"  href="{{ $settings->getItem('tiktok') }}">
                                <i class="bx bxl-tiktok display-6"></i>
                            </a>


                             <a class="p-2 S_icon" href="{{ $settings->getItem('instagram') }}" >
                                <i class="bx bxl-instagram display-6"></i>
                            </a>


                             <a class="p-2 S_icon" href="{{ $settings->getItem('linked_in') }}">
                                <i class="bx bxl-linkedin display-6"></i>
                            </a>


                             <a class="p-2 S_icon" href="{{ $settings->getItem('facebook') }}">
                                <i class="bx bxl-facebook display-6"></i>
                            </a>
                     </div>
                    </div>
{{--                </div>--}}
{{--              </div>--}}

             <hr class="bg-white w-100">

              <a class="text-center mt-1 text-white text-center"  style="font-weight: 500; font-size: 18px; padding: 3px; text-decoration: none"   href="https://www.hololnet.com/" target="_blank">
                  © @lang("Mama's sauces") {{ date('Y') }} | @lang('Privacy Policy') |  HOLOL Marketing Agency
              </a>
          </div>
      </div>

{{--      <a href="https://wa.me/{{ $settings->getItem('whatsapp') }}" target="_blank" class="whatsapp d-flex align-items-center justify-content-center text-white"><i class="bx bxl-whatsapp"></i></a>--}}


  {!! getScriptFooter() !!}

  </div>



  @if(request()->url() == url(app()->getLocale() . "/my_test") || strpos(request()->url(), url(app()->getLocale() . "/categories")) === 0)

  <script>
      document.getElementById('my_footer').classList.remove("bounceInUp" , 'wow');
  </script>
      @endif







