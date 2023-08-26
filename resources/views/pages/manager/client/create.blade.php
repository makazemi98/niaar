<x-default-layout>
    <!--begin::Row-->

    <div class="container">

        @include('partials.errors')

        <div class="row g-5 g-xl-10 mb-5 mt-5 mb-xl-10 box-container">


            <div class=" card p-5">
                <form action="{{ route('manager.clients.store') }}" enctype="multipart/form-data"
                    class="form p-5 fv-plugins-bootstrap5 fv-plugins-framework" method="POST" id="kt_careers_form">
                    @csrf
                    <!--begin::Input group-->
                    <div class="d-flex flex-wrap flex-stack mb-6">
                        <!--begin::Title-->
                        <div class="col-lg-8 d-flex ">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
                                style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper "
                                    style="background-image: none; width:70px;height:70px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Change avatar" data-bs-original-title="Change avatar"
                                    data-kt-initialized="1">
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
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                    data-kt-initialized="1">
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
                                <h3 class="fw-bold my-2">Avatar</h3>


                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>

                            <!--end::Hint-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Controls-->

                        <!--end::Controls-->
                    </div>

                    <div class="row mb-5">

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class=" fs-5 fw-semibold mb-2">Gender</label>
                            <select name="gender" class="form-select  form-select-solid" data-control="select2" value="{{ old('gender') }}"
                                data-placeholder="Gender" data-hide-search="true">
                                <option value="male">male</option>
                                <option value="female">female</option>

                            </select>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label for="firstName" class=" fs-5 fw-semibold mb-2">First Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="first name..."
                                id='firstName' name="firstName" value="{{ old('firstName') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row mb-5">


                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="lastName">Last Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="last name..."
                               id="lastName" name="lastName" value="{{ old('lastName') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="abbreviation">Abbreviation</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="Abbreviation..."
                                name="abbreviation" id="abbreviation" value="{{ old('abbreviation') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--begin::Col-->
                    </div>
                    <div class="row mb-5">

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="email">E-mail</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="email" type="text" class="form-control form-control-solid" placeholder="Email..."
                                name="email" value="{{ old('email') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2">contact person</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="contact person..." name="first_name" value="">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-5">

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="contact_person">Mobile number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="contact_person" type="text" class="form-control form-control-solid"
                                placeholder="mobile number..." name="contact_person" value="{{ old('contact_person') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="company_number">company number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="company_number" type="text" class="form-control form-control-solid"
                                placeholder="company number..." name="company_number" value="{{ old('company_number') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-5">

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="contact_name_2">contact name 2</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="contact_name_2" type="text" class="form-control form-control-solid"
                                placeholder="contact name 2..." name="contact_name_2" value="{{ old('company_number') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="mobile_number_2">mobile number 2</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="mobile_number_2" type="text" class="form-control form-control-solid"
                                placeholder="mobile number 2..." name="mobile_number_2" value="{{ old('mobile_number_2') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-5">

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2" for="company_abbreviation">company abbreviation</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="company_abbreviation" type="text" class="form-control form-control-solid"
                                placeholder="company abbreviation..." name="company_abbreviation" value="{{ old('company_abbreviation') }}">
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="fv-row mb-0 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                <label for="password" class="form-label fs-6 fw-bold mb-3">Password</label>
                                <input id="password" type="password" class="form-control form-control-lg form-control-solid "
                                    name="password">
                                <div class="fv-plugins-message-container ">
                                    <div data-field="newpassword" data-validator="notEmpty">Just enter alpha numeric
                                        password [Aa-Zz] [0-9]</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column mb-8">
                            <label class="fs-6 fw-semibold mb-2" for="confidential">Confidential Note</label>
                            <textarea id="confidential" class="form-control form-control-solid" rows="4" name="cofidential" placeholder="Confidential Note">{{old('cofidential')}}</textarea>
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



            </div>

        </div>
        <!--end::Row-->
</x-default-layout>
