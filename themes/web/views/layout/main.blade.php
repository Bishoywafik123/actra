<!DOCTYPE html>
<html @if(app()->getLocale()=='ar') lang="ar" dir="rtl" @endif>
@include('web_theme::layout.base.head')
<!--begin::Body-->
@yield('page_style')


<body>

	<!-- Start Preloader Area -->
    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
		<!-- End Preloader Area -->

        
        @include('web_theme::layout.base.header')

    <!--begin::Main-->

        @yield('content')

        <!--begin::Footer-->
        @include('web_theme::layout.base.footer')
        <!--end::Footer-->

    @yield('extras')


    
    @jquery
    @toastr_js
    @toastr_render

    <!--end::Main-->
    <!-- PHP To Js Params -->
    @isset($app_params)
    @javascript($app_params)
    @endisset
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    @include('web_theme::layout.base.scripts')

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    @yield('pageScripts')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->


</body>
<!--end::Body-->

</html>