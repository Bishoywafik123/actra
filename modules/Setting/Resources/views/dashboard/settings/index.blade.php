@extends('dashboard::layout.main')

@section('pageHead')
<title>{{ __('setting::header.static settings') }} | Sengine</title>
<meta name="description"
content="put description here" />
<meta name="keywords"
content="put key words here" />
@endsection

@section('pageStyle')
<link href="{{ asset('/themes/metro8/assets/plugins/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css">

@endsection

@section('page_title')
<!--begin::Page title-->
<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}"
    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
    <!--begin::Title-->
    <h1 class="d-flex align-items-center fw-bolder fs-3 my-1 toolbar-main-title-color">{{ __('setting::header.static settings') }}</h1>
    <!--end::Title-->
</div>
<!--end::Page title-->
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl container-full-width">
        <!--begin::Card-->
        <div class="card">

            <!--begin::Card body-->
            <div class="card-body pt-0">
                
                
<div id="dt_modal">
    <!--begin::Form-->
    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="dt_modal_form"
        enctype="multipart/form-data">
        @csrf
        <!--begin::Modal header-->
        <div class="modal-header custom-modal-header" id="kt_modal_add_customer_header">
            <!--begin::Modal title-->
            <div class="d-flex flex-shrink-0 p-1">
            <span class="text-uppercase fs-3"><i class="fa fa-edit"></i>  {{ __('setting::modal.edit-setting') }}</span>                   
            </div>
            <!--end::Modal title-->

                 <!--begin::Actions buttons-->
            <div class="d-flex justify-content-end flex-shrink-0 p-1">
                <button type="button" id="dt_modal_fullscreen" current-state="minimised" data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-dark" data-bs-placement="top" href="javascript:;" class="btn btn-icon btn-active-color-primary btn-sm me-1">
              

                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                <span id="fullscreen-icon-1" class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z"
                                fill="#000000" opacity="0.3"
                                transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) " />
                            <path
                                d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
                <span id="fullscreen-icon-2" class="svg-icon svg-icon-2 d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                        viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M10,14 L5,14 C4.33333333,13.8856181 4,13.5522847 4,13 C4,12.4477153 4.33333333,12.1143819 5,12 L12,12 L12,19 C12,19.6666667 11.6666667,20 11,20 C10.3333333,20 10,19.6666667 10,19 L10,14 Z M15,9 L20,9 C20.6666667,9.11438192 21,9.44771525 21,10 C21,10.5522847 20.6666667,10.8856181 20,11 L13,11 L13,4 C13,3.33333333 13.3333333,3 14,3 C14.6666667,3 15,3.33333333 15,4 L15,9 Z"
                                fill="#000000" fill-rule="nonzero" />
                            <path
                                d="M3.87867966,18.7071068 L6.70710678,15.8786797 C7.09763107,15.4881554 7.73079605,15.4881554 8.12132034,15.8786797 C8.51184464,16.2692039 8.51184464,16.9023689 8.12132034,17.2928932 L5.29289322,20.1213203 C4.90236893,20.5118446 4.26920395,20.5118446 3.87867966,20.1213203 C3.48815536,19.7307961 3.48815536,19.0976311 3.87867966,18.7071068 Z M16.8786797,5.70710678 L19.7071068,2.87867966 C20.0976311,2.48815536 20.7307961,2.48815536 21.1213203,2.87867966 C21.5118446,3.26920395 21.5118446,3.90236893 21.1213203,4.29289322 L18.2928932,7.12132034 C17.9023689,7.51184464 17.2692039,7.51184464 16.8786797,7.12132034 C16.4881554,6.73079605 16.4881554,6.09763107 16.8786797,5.70710678 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>


                </button>

                
            </div>
            <!--begin::Actions buttons-->

        </div>
        <!--end::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body py-10 ajax-modal-body" style="height: 90vh !important;">



    <!--begin::Scroll-->
    <div class="scroll-y me-n7 pe-7 ajax-modal-scroll" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
        data-kt-scroll-offset="300px">






        <div id="errors-alert-wrapper" class="alert-wrapper d-none">
            <div class="alert alert-dismissible alert-danger d-flex align-items-center p-5 mb-10">
                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black"></path>
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-danger">{{__('core::global.Error validation')}}</h4>
                    <ul id="error-messages-list">
                    </ul>
                </div>
                {{-- <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button> --}}
            </div>
        </div>
        <div class="group-container mb-5">
            <div class="row">
            
                <h2 style="margin:17px 0;"> App Description </h2>
                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.app_description_en') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="app_description_en" placeholder="" name="app_description_en" style="height: 130px;">{{$option['app_description_en']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>

                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.app_description_ar') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control"  style="direction: rtl" id="app_description_ar" placeholder="" name="app_description_ar" style="height: 130px;">{{$option['app_description_ar']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>


                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.app_description_fr') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="app_description_fr" placeholder="" name="app_description_fr" style="height: 130px;">{{$option['app_description_fr']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>



                
                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.app_description_ja') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="app_description_ja" placeholder="" name="app_description_ja" style="height: 130px;">{{$option['app_description_ja']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>



                <br><br>

                <h2 style="margin:17px 0;"> About us Page </h2>

                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.about_en') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="about_en" placeholder="" name="about_en" style="height: 130px;">{{$option['about_en']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>

                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.about_ar') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control"  style="direction: rtl" id="about_ar" placeholder="" name="about_ar" style="height: 130px;">{{$option['about_ar']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>


                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.about_fr') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="about_fr" placeholder="" name="about_fr" style="height: 130px;">{{$option['about_fr']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>



                
                <div class="col-md-12">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.about_ja') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control custom-form-control" id="about_ja" placeholder="" name="about_ja" style="height: 130px;">{{$option['about_ja']}}</textarea>
                        <!--end::Input-->
                        
                    </div>
                    <!--end::Input group-->
                </div>


             

                <br><br>

<h2 style="margin:17px 0;">Vision and Mission Page</h2>

<div class="col-md-12">
    <!-- Vision Section -->
    <h3 style="margin:17px 0;">Vision</h3>
    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.vision_en') }}</label>
        <textarea class="form-control custom-form-control" id="vision_en" name="vision_en" style="height: 130px;">{{$option['vision_en']}}</textarea>
    </div>
    
    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.vision_ar') }}</label>
        <textarea class="form-control custom-form-control" id="vision_ar" name="vision_ar" style="direction: rtl; height: 130px;">{{$option['vision_ar']}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.vision_fr') }}</label>
        <textarea class="form-control custom-form-control" id="vision_fr" name="vision_fr" style="height: 130px;">{{$option['vision_fr']}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.vision_ja') }}</label>
        <textarea class="form-control custom-form-control" id="vision_ja" name="vision_ja" style="height: 130px;">{{$option['vision_ja']}}</textarea>
    </div>
</div>


<div class="col-md-12">
    <!-- Mission Section -->
    <h3 style="margin:17px 0;">Mission</h3>
    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.mission_en') }}</label>
        <textarea class="form-control custom-form-control" id="mission_en" name="mission_en" style="height: 130px;">{{$option['mission_en']}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.mission_ar') }}</label>
        <textarea class="form-control custom-form-control" id="mission_ar" name="mission_ar" style="direction: rtl; height: 130px;">{{$option['mission_ar']}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.mission_fr') }}</label>
        <textarea class="form-control custom-form-control" id="mission_fr" name="mission_fr" style="height: 130px;">{{$option['mission_fr']}}</textarea>
    </div>

    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.mission_ja') }}</label>
        <textarea class="form-control custom-form-control" id="mission_ja" name="mission_ja" style="height: 130px;">{{$option['mission_ja']}}</textarea>
    </div>
</div>



             
<h2 style="margin:17px 0;">Video Slider</h2>

<div class="col-md-12">
    <!-- Mission Section -->
    <div class="fv-row mb-7">
        <label class="control-label fs-6 mb-2">Upload video</label>
        <input type="file" accept="video/mp4,video/x-m4v,video/*" class="form-control" name="video">

        @if($option['video']!=null)
        <source src="{{asset('system/storage/app/public/video_slider/'.$option['video'])}}" type="video/mp4">
        @endif
    </div>

</div>

                <br><br>


                <h2 style="margin:17px 0;">Contact us</h2>

                
                <div class="col-md-6">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">email address</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="email1" value="{{$option['email1']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                       
                <div class="col-md-6">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">phone number</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="phone1" value="{{$option['phone1']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                       


                <br><br>


                <h2 style="margin:17px 0;"> Cookies page</h2>


                <div class="col-md-12">
                    <!-- Vision Section -->
                    <div class="fv-row mb-7">
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.cookies_en') }}</label>
                        <textarea class="form-control custom-form-control" id="cookies_en" name="cookies_en" style="height: 130px;">{{$option['cookies_en']}}</textarea>
                    </div>
                    
                    <div class="fv-row mb-7">
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.cookies_ar') }}</label>
                        <textarea class="form-control custom-form-control" id="cookies_ar" name="cookies_ar" style="direction: rtl; height: 130px;">{{$option['cookies_ar']}}</textarea>
                    </div>
                
                    <div class="fv-row mb-7">
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.cookies_fr') }}</label>
                        <textarea class="form-control custom-form-control" id="cookies_fr" name="cookies_fr" style="height: 130px;">{{$option['cookies_fr']}}</textarea>
                    </div>
                
                    <div class="fv-row mb-7">
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.cookies_ja') }}</label>
                        <textarea class="form-control custom-form-control" id="cookies_ja" name="cookies_ja" style="height: 130px;">{{$option['cookies_ja']}}</textarea>
                    </div>
                </div>

            


                <h2 style="margin:17px 0;"> {{ __('setting::modal.form.setting.social media links') }} </h2>
                <hr>
                
                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.facebook-label') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="facebook" value="{{$option['facebook']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>

                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.twitter-label') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="twitter" value="{{$option['twitter']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                       
             
                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.instgram-label') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="instgram" value="{{$option['instgram']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                       
                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">{{ __('setting::modal.form.setting.linkedin-label') }}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="linkedin" value="{{$option['linkedin']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>


                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">whatsapp</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="whatsapp" value="{{$option['whatsapp']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>


                <div class="col-md-4">
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="control-label fs-6 mb-2">Youtube</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                    <input type="text" class="form-control custom-form-control" name="youtube" value="{{$option['youtube']}}">
                   
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                
                       
           

            </div>
              
        </div>
        
    </div>
    <!--end::Scroll-->

    </div>
    <!--end::Modal body-->
    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <!--begin::Button-->
        <button type="reset" id="dt_modal_cancel" class="btn btn-white me-3">{{ __('setting::modal.form.cancel') }}</button>
        <!--end::Button-->
        <!--begin::Button-->
        <!-- Prevent implicit submission of the form -->
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <button type="submit" id="dt_modal_submit" class="btn btn-primary">
            <span class="indicator-label">{{ __('setting::modal.form.submit') }}</span>
            <span class="indicator-progress">{{ __('setting::modal.form.loading_submit') }}...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
    <!--end::Modal footer-->
    <div></div>
    </form>
    <!--end::Form-->
    
</div>


<style>
    textarea{
        height: 174px;

    }
</style>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection


@section('pageScripts')
@javascript($ajax_params)


<script src="{{asset('/themes/metro8/assets/plugins/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('/themes/metro8/assets/js/bundle/datatable.js')}}"></script>
<script src="{{asset('/themes/metro8/assets/js/bundle/form_validation_without_modal.js')}}"></script>
<script src="{{asset('/themes/metro8/assets/js/bundle/ckeditor-classic.bundle.js')}}"></script>

<script src="{{asset('/themes/metro8/assets/modules/setting/js/setting.js')}}"></script>

<script src="{{asset('/themes/metro8/assets/js/bundle/dt_media_query.js')}}"></script>


@endsection