<!--begin::Actions-->



@can('action:inquiry_update_status')

    @php
        $statusAccess = getPermissionsToInquiry();
    @endphp

    @if (count($statusAccess))
        <div class="d-flex flex-column align-items mb-5">
            <button class="btn btn-light-info er fs-6 px-8 py-4" data-bs-toggle="modal"
                data-bs-target="#kt_modal_status_update">Status Update</button>
        </div>
    @endif
    <!--end::Actions-->


    <!--begin::Modal - status update-->
    <div class="modal fade" id="kt_modal_status_update" tabindex="-1" aria-modal="true" role="dialog"
        style="padding-left: 0px;">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    @if (count($statusAccess))
                        <div>
                            <form id="kt_modal_status_update_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                action="{{ route('inquiries.change.status', $inquiry->id) }}" method="POST">
                                @csrf
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">INQUIRY STATUS</h1>
                                </div>
                                <div class="d-flex flex-column mb-8">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        Step
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
                                    <select name="stage" aria-label="Select a Status" data-control="select2"
                                        data-placeholder="date_period" class="form-select form-select-sm form-select-solid text-capitalize"
                                        data-minimum-results-for-search="Infinity">
                                        <option value="0" disabled>{{ $inquiry->stage }}</option>
                                        @foreach ($statusAccess as $per)
                                            <option value="{{ $per->id }}" class="text-capitalize">
                                                {{ str_replace('_', ' ', strval(str_replace('update-status:', ' ', strval($per->name)))) }}
                                            </option>
                                        @endforeach
                                        {{-- <option value="quotation_prepared">Quotation Prepared</option>
                                <option value="quoted">Quoted</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="paid">Paid</option>
                                <option value="ordered">Ordered</option>
                                <option value="supplier_paid">Supplier Paid</option>
                                <option value="delivered">Delivered</option>
                                <option value="tax_submitted">Tax Submitted</option> --}}

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
                                    <textarea class="form-control form-control-solid resize-none" rows="5" name="reason" placeholder="Comment">{{ old('reason') }}</textarea>
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
                            </form>
                        </div>
                    @else
                        <div>asd</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endcan
