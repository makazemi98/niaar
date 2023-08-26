<form action="m-0" class="form p-5 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_careers_form">
    <!--begin::Input group-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Title-->
        <div class="col-lg-8 d-flex ">
            <!--begin::Image input-->
            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper " style="background-image: none; width:70px;height:70px"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-pencil fs-7">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                    <input type="hidden" name="avatar_remove" value="1">
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Hint-->
            <div class="mx-5 align-self-end">
                <h3 class="fw-bold my-2">No file chosen</h3>


                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
   
            <!--end::Hint-->
        </div>
        <!--end::Title-->
        <!--begin::Controls-->
        <div class="d-flex my-2">
            <input type="file" style="display:none" id="uplode-file-add-inquiries">
            <label for="uplode-file-add-inquiries" class="btn btn-primary btn-sm">
                browse
            </label>
        </div>
        <!--end::Controls-->
    </div>
    
    <div class="row mb-5">
        
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class=" fs-5 fw-semibold mb-2">Gender</label>
            <select class="form-select  form-select-solid" data-control="select2" data-placeholder="Select Hours"
                data-hide-search="true" name="gender">
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="none">none</option>

            </select>
            {{-- <label class="required fs-5 fw-semibold mb-2">Customer Name</label>
            <!--end::Label-->
            <!--end::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="last_name">
            <!--end::Input--> --}}
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">First Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="first name..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    <div class="row mb-5">
       
        
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">Last Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Phone..." name="last name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">Abbreviation</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Abbreviation..."
                name="first_name" value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
    </div>
    <div class="row mb-5">
       
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">E-mail</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="email..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">contact person</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="contact person..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
    </div>
    <div class="row mb-5">
       
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">mobile number</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="mobile number..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">company number</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="company number..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
    </div>
    <div class="row mb-5">
       
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">contact name 2</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="contact name 2..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">mobile number 2</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="mobile number 2..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->
    </div>
    <div class="row mb-5">

        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">company abbreviation</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="company abbreviation..." name="first_name"
                value="">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="col-md-6">
            <div class="fv-row mb-0 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Password</label>
                <input type="password" class="form-control form-control-lg form-control-solid " name="newpassword"
                    id="newpassword">
                <div class="fv-plugins-message-container ">
                    <div data-field="newpassword" data-validator="notEmpty">Just enter alpha numeric password [Aa-Zz] [0-9]</div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column mb-8">
            <label class="fs-6 fw-semibold mb-2">Confidential Note</label>
            <textarea class="form-control form-control-solid" rows="4" name="application" placeholder="Confidential Note"></textarea>
        </div>


    </div>








    <div class="d-flex align-items-center justify-content-start mt-0">
        <!--begin::Submit-->
        <button type="submit" class="btn btn-primary " id="kt_careers_submit_button">
            <!--begin::Indicator label-->
            <span class="indicator-label"> Submit </span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
        {{-- <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button> --}}
        <button type="reset" class="btn btn-light me-3 mx-5" id="kt_careers_submit_button">
            <!--begin::Indicator label-->
            <span class="indicator-label "> Reset </span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
        <!--end::Submit-->
    </div>

</form>
