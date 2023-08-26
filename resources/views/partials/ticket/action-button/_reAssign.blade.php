@if ($inquiry->stage !== \App\Enums\InquiryStatusesEnum::OPEN->value)

    @can('action:inquiry_re_assign')
        <div class="d-flex flex-column align-items mb-5">
            <button class="btn btn-secondary er fs-6 px-8 py-4" data-bs-toggle="modal"
                data-bs-target="#kt_modal_re_assign">Re-Assign</button>
        </div>
        <!--end::Actions-->

        <!--begin::Modal - status update-->
        <div class="modal fade" id="kt_modal_re_assign" tabindex="-1" aria-modal="true" role="dialog"
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
                                action="{{ route('inquiries.assign', $inquiry->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="re_assign" value="1">
                                <div class="mb-13 text-center">
                                    <!--begin::Title-->
                                    <h1 class="mb-3">Re-Assign</h1>
                                </div>
                                <div class="d-flex flex-column mb-8">
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
                                    <select name="assign_to" aria-label="Select a User" data-control="select2"
                                        data-placeholder="date_period" class="form-select form-select-sm form-select-solid"
                                        data-minimum-results-for-search="Infinity">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="d-flex flex-column mb-8">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        Comment
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
                                    <textarea class="form-control form-control-solid resize-none" rows="5" name="body" placeholder="Comment">{{ old('body') }}</textarea>
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
@endif
