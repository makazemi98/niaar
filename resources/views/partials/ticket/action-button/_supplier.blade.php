<div class="d-flex flex-column align-items mb-5">
    <button class="btn btn-info er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_set_supplier">
        Supplier
    </button>
</div>
<!--end::Actions-->


<!--end::Modal - setReminder-->
<div class="modal fade " id="kt_modal_set_supplier" tabindex="-1" aria-modal="true" role="dialog"
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
                <!--begin:Form-->
                <form id="kt_modal_set_reminder_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('inquiries.add.suppliers', $inquiry->id) }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Select Suppliers</h1>
                        <!--end::Title-->
                    </div>

                    <div class="d-flex flex-column mb-8">
                        <label class="fs-6 fw-semibold mb-2">Suppliers</label>
                        <select name="suppliers[]" class="form-select form-select-solid smartsearch_keyword"
                            data-control="select2" data-hide-search="true" data-placeholder="Suppliers"
                            multiple="multiple">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->company }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="d-flex flex-column mb-8">
                        <label class="fs-6 fw-semibold mb-2">Details</label>
                        <textarea class="form-control form-control-solid resize-none" rows="5" name="details" placeholder="Comments">{{ old('details') }}</textarea>
                    </div>

                    <div class="fv-plugins-message-container mb-8">
                        <div data-field="newpassword" data-validator="notEmpty">
                            Submitted and got to the next step (Quotation Prepared) .
                        </div>
                    </div>



                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_set_reminder_cancel"
                            class="btn btn-light me-3">Reset</button>
                        <button type="submit" id="kt_modal_set_reminder_submit" class="btn btn-primary">
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

{{-- 
@section('script')
    <script>
        $(".smartsearch_keyword").select2({
            multiple: true,
        });
    </script>
@endsection --}}
