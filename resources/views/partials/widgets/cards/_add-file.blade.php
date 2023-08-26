<!--begin::file-->
<div id="kt_app_content">
    <!--begin::Content container-->
    <div id="kt_app_content_container">
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header align-items-center px-8">
                <div class="card-title">
                    <h2>Delivery Note</h2>
                </div>
                <div class="toolbar w-100 mb-5">
                    <div class="w-100">
                        <!--begin::Select2-->
                        <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2"
                            data-hide-search="false" data-placeholder="Status" data-kt-ecommerce-order-filter="status"
                            data-select2-id="select2-data-10-1tff" tabindex="-1" aria-hidden="true"
                            >
                            <option data-select2-id="select2-data-12-02nh"></option>
                            <option value="all">All</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Completed">Completed</option>
                            <option value="Denied">Denied</option>
                            <option value="Expired">Expired</option>
                            <option value="Failed">Failed</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Refunded">Refunded</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Delivering">Delivering</option>
                        </select>
                        {{-- <span
                            class="select2 select2-container select2-container--bootstrap5 select2-container--focus"
                            dir="ltr" data-select2-id="select2-data-11-zrut" style="width: 100%;"><span
                                class="selection"><span
                                    class="select2-selection select2-selection--single form-select form-select-solid"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-disabled="false" aria-labelledby="select2-ubtn-container"
                                    aria-controls="select2-ubtn-container"><span class="select2-selection__rendered"
                                        id="select2-ubtn-container" role="textbox" aria-readonly="true"
                                        title="Status"><span
                                            class="select2-selection__placeholder">Status</span></span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span> --}}
                        <!--end::Select2-->
                    </div>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <div class="fv-row mb-2">
                    <!--begin::Dropzone-->
                    <div class="dropzone dz-clickable" id="kt_ecommerce_add_product_media">
                        {{-- <label for="import-file"> --}}
                        <!--begin::Message-->
                        <div class="dz-message needsclick align-items-center">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-file-up text-primary fs-3x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                {{-- <label class="fs-5 fw-bold text-gray-900 mb-1" id="import-file">click to upload
                                    file.</label> --}}
                                {{-- <input type="file" name="import-file" id="import-file" class="d-none"> --}}
                            </div>
                            <!--end::Info-->
                        </div>
                        {{-- </label> --}}
                    </div>
                    <!--end::Dropzone-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card header-->
        </div>
    </div>
</div>
<!--end::file-->




{{-- <!--begin:: upload file-->
<div data-kt-stepper-element="content" class="current" data-select2-id="select2-data-151-lpsm">
    <!--begin::Wrapper-->
    <div class="w-100" data-select2-id="select2-data-150-9azh">
        <!--begin::Heading-->
        <div class="pb-10 pb-lg-12">
            <!--begin::Title-->
            <h1 class="fw-bold text-dark">Upload Files</h1>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-muted fw-semibold fs-4">If you need more info, please check
                <a href="#" class="link-primary">Campaign Guidelines</a>
            </div>
            <!--end::Description-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Dropzone-->
            <div class="dropzone dz-clickable" id="kt_modal_create_campaign_files_upload">
                <!--begin::Message-->
                <div class="dz-message needsclick">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-file-up fs-3hx text-primary">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <!--end::Icon-->
                    <!--begin::Info-->
                    <div class="ms-4">
                        <h3 class="dfs-3 fw-bold text-gray-900 mb-1">Drop campaign files here or click to upload.</h3>
                        <span class="fw-semibold fs-4 text-muted">Upload up to 10 files</span>
                    </div>
                    <!--end::Info-->
                </div>
            </div>
            <!--end::Dropzone-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end:: upload file--> --}}
