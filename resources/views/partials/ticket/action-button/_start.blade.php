<!--begin::Actions-->
<div class="d-flex flex-column align-items mb-5">
    <button class="btn btn-success er fs-6 px-8 py-4" data-bs-toggle="modal"
        data-bs-target="#kt_modal_start">Start</button>
</div>


<div class="modal fade" id="kt_modal_start" tabindex="-1" aria-modal="true" role="dialog" style="padding-left: 0px;">
    <div class="modal-dialog modal-dialog-centered mw-650px">
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
                <div>
                    <form id="kt_modal_approve_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        action="{{route('inquiries.change.status.start', $inquiry->id)}}" method="POST">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Changed Status to On Progress</h1>
                        </div>

                        <div class="text-center">

                            <button type="submit" id="kt_modal_approve_submit" class="btn btn-primary">
                                <span class="indicator-label">Start</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
