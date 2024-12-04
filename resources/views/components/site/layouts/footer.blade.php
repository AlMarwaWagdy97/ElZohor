<!--Footer-->
<div class="footer py-5">
    <div class="container">
        <div class="row">

            <div class=" col-12 col-lg-3 text-center">
                <div class="title my-5">
                    <h4 class="text-secound">{{ $homeSetting->getItem('about')->trans->where('locale', $current_lang)->first()->title }}</h4>
                </div>
                <p>
                    {!! removeHTML(@$homeSetting->getItem('about')->trans->where('locale', $current_lang)->first()->description) !!}
                </p>

                <div class="icons d-flex text-center justify-content-center">
                    <a href="{{ $settings->getItem('facebook') }}"><i class="fa-brands fa-facebook-f fs-4 my-auto me-3"></i></a>
                    <a href="{{ $settings->getItem('twitter') }}"><i class="fa-brands fa-x-twitter fs-4 my-auto mx-3"></i></a>
                    <a href="{{ $settings->getItem('instagram') }}"><i class="fa-brands fa-instagram fs-4 my-auto mx-3"></i></a>
                </div>
            </div>

            @forelse ($footerMenus->Where('parent_id', NULL) as $menu)
            <div class="col-12 col-lg-3 text-center">
                <div class="title my-5">
                    <h4 class="text-secound">{{ $menu->trans->where('locale', $current_lang)->first()->title }}</h4>
                </div>
                <ul>
                    @forelse ( $menu->children as $child)
                        <a href="{{  @$child->type == "dynamic"?  @$child->dynamic_url : @$child->url }}">
                            <li class="p-1">{{ $child->trans->where('locale', $current_lang)->first()->title }}</li>
                        </a>
                    @empty

                    @endforelse
                </ul>
            </div>
            @empty

            @endforelse

            <div class="col-12 col-lg-3 text-center" style="background-size: contain; background-repeat: no-repeat; background-position: center; background-image: url({{asset('site/images/social.jpeg')}});">
{{--                <div class="title my-5">--}}
{{--                    <h4 class="text-secound">{{ $homeSetting->getItem('subscribe')->trans->where('locale', $current_lang)->first()->title }}</h4>--}}
{{--                </div>--}}
{{--                <p>--}}
{{--                    {!! removeHTML(@$homeSetting->getItem('subscribe')->trans->where('locale', $current_lang)->first()->description) !!}--}}
{{--                </p>--}}
{{--                <div>--}}
{{--                    @livewire('site.form-subscribe')--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <a href="https://wa.me/{{ $settings->getItem('whatsapp')}}" target="_blank" class="whatsapp d-flex align-items-center justify-content-center text-white">
        <i class="fa-brands fa-whatsapp"></i>
    </a>


    {!! getScriptFooter() !!}
</div>
