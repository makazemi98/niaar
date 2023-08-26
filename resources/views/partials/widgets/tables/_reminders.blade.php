<!--begin::Tables Widget 12-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Reminders </span>
        </h3>
        {{-- <div class="card-toolbar">
            <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                data-bs-target="#kt_modal_new_target">Set Reminder</a>
        </div> --}}
        <!--begin::Modal-->
        <div class="modal fade " id="kt_modal_new_target" tabindex="-1" aria-modal="true" role="dialog"
            style="display: none;">
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
                        <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                            action="#">
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <!--begin::Title-->
                                <h1 class="mb-3">Set Reminder</h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                {{-- <div class="text-muted fw-semibold fs-5">
                                    <a href="#" class="fw-bold link-primary"></a>.
                                </div> --}}
                                <!--end::Description-->
                            </div>
                            <!--end::Heading-->
                            <div class="row g-9 mb-8">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column col-md-6 mb-8 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Team Member</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Team Member"
                                            data-bs-original-title="Specify a target name for future usage and reference"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter Team Member" name="Team_Member">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column col-md-6 mb-8 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Customer Name</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Customer Name"
                                            data-bs-original-title="Specify a target name for future usage and reference"
                                            data-kt-initialized="1">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter Customer Name" name="Customer_Name">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--begin::Input group-->
                            </div>
                            <div class="row g-9 mb-8">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-6 fw-semibold mb-2">INQ No</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter INQ No" name="INQ No">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold mb-2">Due Date</label>
                                    <!--begin::Input-->
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                        </i>
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12 flatpickr-input"
                                            placeholder="Select a date" name="due_date" type="text"
                                            readonly="readonly">
                                        <!--end::Datepicker-->
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8">
                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                <textarea class="form-control form-control-solid" rows="3" name="Description" placeholder="Type Description"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Cancel</button>
                                <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
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
        <!--end::Modal-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-150px rounded-start">Ttile</th>
                        <th class="min-w-150px">Reminder Date</th>
                        <th class="min-w-150px">INQ No</th>
                        <th class="min-w-150px">Customer</th>
                        <th class="min-w-150px rounded-end">Description</th>
                        <th class="min-w-150px rounded-end text-end">Action</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($reminders as $reminder)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bold  mb-1 fs-6">{{ $reminder->title }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bold  mb-1 fs-6">{{ $reminder->reminder_date }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bold  mb-1 fs-6">
                                        NI{{ $reminder->inquiry->getInquiryNum() }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bold  mb-1 fs-6">{{ $reminder->title }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-start flex-column">
                                    <div class="text-dark fw-bold  mb-1 fs-6">{{ $reminder->body }}</div>
                                </div>
                            </td>
                            <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                <div class="d-flex justify-content-end">

                                    <div class="ms-2">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-dots-square fs-5 m-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                            data-kt-menu="true" style="">
                                            <!--begin::Menu item-->

                                            <div class="menu-item px-3">
                                                <form action="{{ route('inquiries.reminder.delete', $reminder->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-100 px-3 btn btn-danger">Delete</button>
                                                </form>

                                            </div>

                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::More-->
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>

    </div>
    <!--begin::Body-->
</div>
