<form action="{{ route('admin.supplier.store') }}" class="form p-5 fv-plugins-bootstrap5 fv-plugins-framework"
    method="post" id="kt_careers_form">
    @csrf
    @include('partials.errors')

    <!--begin::Input group-->
    <div class="row mb-5">
        {{-- <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class=" fs-5 fw-semibold mb-2">To Client :</label>
            <select class="form-select  form-select-solid" data-control="select2" data-placeholder="Select Hours"
                data-hide-search="true">
                <option value="1">sorry, no matching option.</option>

            </select>
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div> --}}
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">
                Company</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Company..." name="company"
                value="{{ old('company') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--end::Label-->
            <label class=" fs-5 fw-semibold mb-2">Country</label>
            <select class="form-select  form-select-solid" data-control="select2" data-placeholder="Select Hours"
                data-hide-search="true" value="{{ old('country') }}" name="country">
                <option value="Iran">Iran</option>
                <option value="Afghanistan">Afghanistan</option>

            </select>

            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">
                E-mail</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Email" name="email"
                value="{{ old('email') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">
                Phone</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Phone..." name="phone"
                value="{{ old('phone') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->

    </div>
    <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">
                Mobile</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Mobile..." name="mobile"
                value="{{ old('mobile') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class=" fs-5 fw-semibold mb-2">
                Website</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Website..." name="website"
                value="{{ old('website') }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container ">
                <div data-field="newpassword" data-validator="notEmpty">Pattern: https://website.com</div>
            </div>

            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
        <!--end::Col-->

    </div>
    <div class="row mb-5">

        <!--begin::Col-->
        {{-- <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class=" fs-5 fw-semibold mb-2">
                In charge</label>


        </div> --}}
        <!--end::Col-->

    </div>
    {{-- <div class="row mb-5">
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <form action="">
                <label class=" fs-5 fw-semibold mb-2">
                    Product Category</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="Product Category"
                    name="first_name" value="">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>


                <button type="reset" class="btn btn-light me-3 my-3" id="kt_careers_submit_button">
                    <!--begin::Indicator label-->
                    <span class="indicator-label "> Reset </span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </form>

        </div>
        <!--begin::Col-->
        <div class="col-md-6 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <form action="">
                <label class=" fs-5 fw-semibold mb-2">
                    Supplying Brands</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" placeholder="Supplying Brands"
                    name="first_name" value="">
                <!--end::Input-->
                <div class="fv-plugins-message-container invalid-feedback"></div>


            </form>

        </div>
        <!--end::Col-->

    </div> --}}
    <!--end::Input group-->
    <!--begin::Input group-->




    <div class="d-flex align-items-center justify-content-end mt-0">
        <button type="submit" class="btn btn-primary " id="kt_careers_submit_button">
            <span class="indicator-label"> Save </span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>
