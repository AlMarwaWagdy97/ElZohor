<!DOCTYPE html>
<html lang="{{ $current_lang }}" dir="{{ $current_lang == 'ar' ? 'rtl' : 'ltr' }}">
@include('site.layouts.header')

<body>

    <!-- nav bar -->
    <x-site.layouts.navbar/>
    <!-- End nav bar -->

    @yield('content')

    <!-- Footer -->
    <x-site.layouts.footer/>
    <!---End Footer-->

    <div class="spinner-border text-success htmx-indicator position-fixed top-50 start-50" id="loading" role="status" style="z-index: 2;">
        <span class="visually-hidden">Loading...</span>
    </div>

    <!-- script  -->
    @include('site.layouts.script')
    <!--</script> -->
</body>

</html>
