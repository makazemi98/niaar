<form action="{{ route('manager.team.members.store') }}" class="form p-5 fv-plugins-bootstrap5 fv-plugins-framework"
    method="post" id="kt_careers_form" enctype="multipart/form-data">
    @csrf
    <!--begin::Input group-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Title-->
        <div class="col-lg-8 d-flex ">
            <!--begin::Image input-->
            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
                style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper " style="background-image: none; width:70px;height:70px"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                    data-bs-original-title="Change avatar" data-kt-initialized="1">
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
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                    data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                    <i class="ki-duotone ki-cross fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                    data-bs-original-title="Remove avatar" data-kt-initialized="1">
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
        {{-- <div class="d-flex my-2">
            <input type="file" style="display:none" id="uplode-file-add-inquiries">
            <label for="uplode-file-add-inquiries" class="btn btn-primary btn-sm">
                browse
            </label>
        </div> --}}
        <!--end::Controls-->
    </div>
    <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class=" fs-5 fw-semibold mb-2">Role</label>
            <select class="form-select  form-select-solid" data-control="select2" data-placeholder="Select role"
                data-hide-search="true" name='role' >
                <option value="manager"  @if (old('role') == 'manager') selected @endif>Manager</option>
                <option value="team-leader"  @if (old('role') == 'team-leader') selected @endif>Team Leader</option>
                <option value="accountant"  @if (old('role') == 'accountant') selected @endif>Accountant</option>
                <option value="procurement"  @if (old('role') == 'procurement') selected @endif>Procurement</option>


            </select>

            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class=" fs-5 fw-semibold mb-2">Gender</label>
            <select class="form-select  form-select-solid" data-control="select2" data-placeholder="Select Hours"
                data-hide-search="true" name="gender">
                <option value="male" @if (old('gender') == 'male') selected @endif>male</option>
                <option value="female" @if (old('gender') == 'female') selected @endif>female</option>
                <option value="none" @if (old('gender') == 'none') selected @endif>none</option>

            </select>
            {{-- <label class="required fs-5 fw-semibold mb-2">Customer Name</label>
            <!--end::Label-->
            <!--end::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="" name="last_name">
            <!--end::Input--> --}}
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->

    </div>
    <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">First Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="first name..." name="firstName"
            value="{{ old('firstName') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">Last Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="last name..." name="lastName"
            value="{{ old('lastName') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->

    </div>
    <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">Abbreviation</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Abbreviation..."
                name="abbreviation" value="{{ old('abbreviation') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">E-mail</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="email..." name="email"
            value="{{ old('email') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->

    </div>

    <!--end::Input group-->
    <!--begin::Input group-->

    <div class="row mb-5">
        <div class="col-md-6">
            <div class="fv-row mb-0 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                <label for="password" class="form-label fs-6 fw-bold mb-3">Password</label>
                <input type="password" class="form-control form-control-lg form-control-solid " name="password"
                    id="password" value="{{ old('password') }}">
                <div class="fv-plugins-message-container ">
                    <div data-field="password" data-validator="notEmpty">Just enter alpha numeric password [Aa-Zz]
                        [0-9]</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="fv-row mb-0 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                <label for="renewal_date" class="form-label fs-6 fw-bold mb-3">Renewal date</label>
                <input class="form-control form-control-solid ps-12 flatpickr-input" placeholder="Select a date"
                    name="renewal_date" type="hidden" readonly="readonly">
                <input class="form-control form-control-solid ps-12 flatpickr-input flatpickr-mobile" tabindex="1"
                    type="date" placeholder="Select a date" name="renewal_date" value="{{ old('renewal_date') }}">
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="renewal_date" data-validator="notEmpty"></div>
                </div>
            </div>
        </div>


    </div>



    <div class="d-flex align-items-center justify-content-start mt-0">
        <!--begin::Submit-->
        <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
            <!--begin::Indicator label-->
            <span class="indicator-label"> Submit </span>
            <!--end::Indicator label-->
            <!--begin::Indicator progress-->
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator progress-->
        </button>
        {{-- <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button> --}}
        <button type="reset" class="btn btn-light me-3 mx-5 " id="kt_careers_submit_button">
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
