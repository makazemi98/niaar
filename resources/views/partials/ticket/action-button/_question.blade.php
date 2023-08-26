@can('action:inquiry_comment_add_confidential')
<div class="d-flex flex-column align-items mb-5">

    <button class="btn btn-light-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
        data-bs-target="#kt_modal_question">Question</button>
</div>
<!--end::Actions-->

<!--begin::Modal - status update-->
<div class="modal fade" id="kt_modal_question" tabindex="-1" aria-modal="true" role="dialog"
    style="padding-left: 0px;">
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
                    <form id="kt_modal_status_update_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        action="{{ route('inquiries.add.question', $inquiry->id) }}" method="POST">
                        @csrf
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Question To Client </h1>
                            <a href="{{ route('manager.profile', $client->id) }}"
                                class=" text-gray-400 text-hover-primary me-5 mb-2">
                                <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>{{ $client->full_name }}</a>
                        </div>
                        {{-- <div class="d-flex flex-column mb-8">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                Team Member
                                <span class="required"></span>
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
                            <select name="to" aria-label="Select a User" data-control="select2"
                                data-placeholder="date_period" class="form-select form-select-sm form-select-solid"
                                data-minimum-results-for-search="Infinity">
                                <option value="12">Mak</option>

                            </select>
                        </div> --}}
                        <div class="d-flex flex-column mb-8">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                Question
                                <span class="required"></span>
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
                            <textarea class="form-control form-control-solid resize-none" rows="5" name="body" placeholder="????">{{ old('body') }}</textarea>
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="text-center">
                            <button type="reset" id="kt_modal_status_update_cancel"
                                class="btn btn-light me-3">Reset</button>
                            <button type="submit" id="kt_modal_status_update_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
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
@endcan
