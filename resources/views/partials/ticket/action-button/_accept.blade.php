<!--begin::Actions-->
<div class="d-flex flex-column align-items mb-5">
    <button class="btn btn-success er fs-6 px-8 py-4" data-bs-toggle="modal"
        data-bs-target="#kt_modal_accept">Accept</button>
</div>
<!--end::Actions-->


<!--begin::Modal - status update-->
<div class="modal fade" id="kt_modal_accept" tabindex="-1" aria-modal="true" role="dialog" style="padding-left: 0px;">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <div>
                    <!--begin:Form-->
                    <form id="kt_modal_approve_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        action="{{ route('inquiries.change.status.quoted.or.rejected', ['inquiry' => $inquiry->id]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="status" value="1">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Changed Badge to QUOTED</h1>
                            <!--end::Title-->
                            <!--begin::state-->
                            <!--end::state-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                Comment
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a target name for future usage and reference"
                                    data-bs-original-title="Specify a target name for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <textarea class="form-control form-control-solid resize-none" rows="5" name="reason" placeholder=""></textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">

                            <button type="submit" id="kt_modal_approve_submit" class="btn btn-success">
                                <span class="indicator-label">Accept</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
</div>
<!--end::Modal - status update-->
