<!--begin::Form-->
<form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="dt_modal_form"
    enctype="multipart/form-data">
    @csrf
    <!--begin::Modal header-->
    <div class="modal-header custom-modal-header" id="kt_modal_add_customer_header">
        <!--begin::Modal title-->
        <div class="d-flex flex-shrink-0 p-1">
            <p class="main-modal-title"><span class="svg-icon svg-icon-2 me-2"><i class="far fa-edit fs-2"></span></i><span class="text-uppercase fs-3">{{ __('project::modal.edit-title') }}</span></p>
        </div>
        <!--end::Modal title-->
        <!--begin::Actions buttons-->
        <div class="d-flex justify-content-end flex-shrink-0 p-1">
            <a id="dt_modal_fullscreen" href="javascript:;" class="btn btn-icon btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <i id="fullscreen-icon" class="fas fa-expand" style="font-size: 20px;"></i>
                </span>
            </a>
            <a id="dt_modal_close" href="javascript:;" class="btn btn-icon btn-active-color-danger btn-sm">
                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                <span class="svg-icon svg-icon-1">
                    <i class="far fa-times" style="font-size: 20px;"></i>
                </span>
                <!--end::Svg Icon-->
            </a>
        </div>
        <!--begin::Actions buttons-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body py-10 ajax-modal-body">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7 ajax-modal-scroll" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
            <div id="errors-alert-wrapper" class="alert-wrapper d-none">
                <div class="alert alert-dismissible alert-danger d-flex align-items-center p-5 mb-10">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3"
                                d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                fill="black"></path>
                            <path
                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="d-flex flex-column">
                        <h4 class="mb-1 text-danger">{{ __('project::modal.form.errors') }}</h4>
                        <ul id="error-messages-list">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="group-container mb-5">


                <div class="card tab-content col-md-12" id="myTabContent">

                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Product information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">	How to use </a>
                        </li>
                    </ul>
                    <br><br>
    
                    
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">


                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.title_en-label') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control custom-form-control" placeholder="" name="title_en" value="{{ $project->title_en }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>


                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.title_ar-label') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control custom-form-control"  style="direction: rtl" placeholder="" name="title_ar" value="{{ $project->title_ar }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
            


                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.title_fr-label') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control custom-form-control" placeholder="" name="title_fr" value="{{ $project->title_fr }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>


                    <div class="col-md-6">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.title_ja-label') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control custom-form-control" placeholder="" name="title_ja" value="{{ $project->title_ja }}">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
            
                    
                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.description_en-label')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->    
                            <textarea name="description_en" class="form-control" >{{ $project->description_en }}</textarea>
                            <!--end::Input-->
                            
                        </div>
                        <!--end::Input group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.description_ar-label')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->    
                            <textarea name="description_ar"  style="direction: rtl" class="form-control" >{{ $project->description_ar }}</textarea>
                            <!--end::Input-->
                            
                        </div>
                        <!--end::Input group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.description_fr-label')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->    
                            <textarea name="description_fr" class="form-control" >{{ $project->description_fr }}</textarea>
                            <!--end::Input-->
                            
                        </div>
                        <!--end::Input group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.description_ja-label')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->    
                            <textarea name="description_ja" class="form-control" >{{ $project->description_ja }}</textarea>
                            <!--end::Input-->
                            
                        </div>
                        <!--end::Input group-->
                    </div>


                    <div class="col-md-12">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">{{ __('project::modal.form.main_photo-label') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_1">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                </div>
                                <input type="hidden" value="{{$project->main_photo}}" name="main_photo">

                            </div>
                            
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>

                  
        

                    <div class="col-md-12 category-label">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="control-label required fs-6 mb-2">Select category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select data-control="select2" class="form-select" name="category_id">
                                @foreach($categories as $index => $category)
                                <option value="{{ $category->id }}" @if($project->category_id==$category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>


                </div>
                    </div>



                    
                    <div class="tab-pane fade show" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                        <span class="btn btn-primary btn-sm plus_option" style="cursor: pointer;"><i class="fa fa-plus "></i> Add row</span>

                        <div class="option row">
                            @php
                            // Define the language suffixes
                            $languages = ['en' => 'English', 'ar' => 'Arabic', 'fr' => 'French', 'ja' => 'China'];
                        @endphp
                        
                        @foreach($project->options as $key => $option)
                            <div class="new_row row">
                                <i class="fa fa-times close-option" style="cursor: pointer;text-align: right; color:red"></i>
                                
                                @foreach($languages as $langCode => $langName)
                                    <div class="col-md-6">
                                        <!--begin::Input group for Name -->
                                        <div class="fv-row mb-7">
                                            <label class="control-label fs-6 mb-2">Name ({{ $langName }})</label>
                                            <input type="text" name="name_{{ $langCode }}[]" value="{{ $option->{'name_' . $langCode} }}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <!--begin::Input group for Color -->
                                        <div class="fv-row mb-7">
                                            <label class="control-label fs-6 mb-2">Color ({{ $langName }})</label>
                                            <input type="text" name="color_{{ $langCode }}[]" value="{{ $option->{'color_' . $langCode} }}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <!--begin::Input group for Description -->
                                        <div class="fv-row mb-7">
                                            <label class="control-label fs-6 mb-2">Description ({{ $langName }})</label>
                                            <textarea style="height: 150px;" name="option_description_{{ $langCode }}[]" class="form-control">{{ $option->{'description_' . $langCode} }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        

                        </div>


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
        <button type="reset" id="dt_modal_cancel" class="btn btn-white me-3">{{ __('project::modal.form.cancel') }}</button>
        <!--end::Button-->
        <!--begin::Button-->
        <!-- Prevent implicit submission of the form -->
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
        <button type="submit" id="dt_modal_submit" class="btn btn-primary">
            <span class="indicator-label">{{ __('project::modal.form.submit') }}</span>
            <span class="indicator-progress">{{ __('project::modal.form.loading_submit') }}...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
    <!--end::Modal footer-->
    <div></div>
</form>
<!--end::Form-->

<!-- messages -->
@javascript($ajax_params)




<script>

     
     
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


// main photo upload
$('#kt_dropzone_1').dropzone({
   url: "{{route('project.upload_mainphoto')}}", // Set the url for your upload script location
   paramName: "photos", // The name that will be used to transfer the file
   maxFilesize: 10, // MB
   maxFiles: 1,
   acceptedFiles: 'image/*',
   renameFile: function(file) {
   var dt = new Date();
   var time = dt.getTime();
   var photoname = time+file.name;
   return time+file.name;
   },
   addRemoveLinks: true,
   params:{
       "_token": "{{ csrf_token() }}",
   },
   accept: function(file, done) {
   done();
   },
   success:function(response){
       console.log(response);
       var array = [response];
       array.forEach(res => {
           $('#kt_dropzone_1').append(' <input type="hidden" name="main_photo" value="'+res.upload.filename+'" > ');
       });
   },
   removedfile: function(file) 
   {

       var name = file.name;
       $.ajax({

           type: 'delete',
           url: '{{ route("project.delete_mainphoto") }}',
           data: {filename: name,project_id : "{{ $project->id }}"},
           success: function (data){
               console.log("File deleted successfully!!");
              $('#kt_dropzone_1').find('input[name="main_photo"]').remove();
           },
           error: function(e) {
               console.log(e);
           }
       });

           
           var fileRef;
           return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
   },


   
   init:function() {

    // Get images
    var myDropzone = this;
    $.ajax({
        url: "{{route('project.get_mainphoto')}}", // Set the url for your upload script location
        type: 'GET',
        data: {project_id:"{{$project->id}}"},
        success: function(data){
        //console.log(data);
        $.each(data, function (key, value) {

            var file = {name: value.name, size: value.size};
            myDropzone.options.addedfile.call(myDropzone, file);
            myDropzone.options.thumbnail.call(myDropzone, file, value.path);
            myDropzone.emit("complete", file);
        });
        }
    });
    },

});


$('.plus_option').on('click', function(e) {
    e.preventDefault();
    
    const languages = ['en', 'ar', 'fr', 'ja']; // Define your language suffixes
    let htmlContent = `
        <div class="new_row row">
            <i class="fa fa-times close-option" style="cursor: pointer;text-align: right; color:red"></i>
    `;
    
    languages.forEach(function(lang) {
        htmlContent += `
            <div class="col-md-6">
                <!-- Name field -->
                <div class="fv-row mb-7">
                    <label class="control-label fs-6 mb-2">Name (${lang.toUpperCase()})</label>
                    <input type="text" name="name_${lang}[]" class="form-control">
                </div>
            </div>
            
            <div class="col-md-6">
                <!-- Color field -->
                <div class="fv-row mb-7">
                    <label class="control-label fs-6 mb-2">Color (${lang.toUpperCase()})</label>
                    <input type="text" name="color_${lang}[]" class="form-control">
                </div>
            </div>
            
            <div class="col-md-12">
                <!-- Description field -->
                <div class="fv-row mb-7">
                    <label class="control-label fs-6 mb-2">Description (${lang.toUpperCase()})</label>
                    <textarea style="height: 150px;" name="option_description_${lang}[]" class="form-control"></textarea>
                </div>
            </div>
        `;
    });

    htmlContent += `</div>`; // Close the main div

    $('.option').append(htmlContent); // Append the HTML to .option
});



    $(document).on('click','.close-option',function(e){
         e.preventDefault();
         $(this).parent().remove();
     });




    </script>