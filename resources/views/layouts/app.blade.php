<!DOCTYPE html>
<html lang="en" dir="{{ $current_lang == 'ar' ? 'rtl' : 'ltr' }}">

@include('site.layouts.header')

<body>

@if(App\Settings\SettingSingleton::getInstance()->getItemFeatured('navbar'))

    <!-- nav bar -->
    <x-site.layouts.navbar/>
    <!-- End nav bar -->

    @endif

<main>
@yield('content') <!-- Content from the child view will be inserted here -->
</main>

{{--@if($settings->getItemFeatured('footer'))--}}
    @if(App\Settings\SettingSingleton::getInstance()->getItemFeatured('footer'))
    <!-- Footer -->
    <x-site.layouts.footer/>
    <!---End Footer-->
    @endif


    {{-- <div class="spinner-border text-success htmx-indicator position-fixed top-50 start-50" id="loading" role="status"
        style="z-index: 2;">
        <span class="visually-hidden">Loading...</span>
    </div> --}}

    <!-- script  -->
    @include('site.layouts.script')
    <!--</script> -->
</body>

</html>
