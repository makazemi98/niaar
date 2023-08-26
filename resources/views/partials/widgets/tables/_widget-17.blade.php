<div class="card mb-5 mb-xxl-10 ">
    <!--begin::Card header-->

    <div class="modal fade show" id="kt_modal_new_target" tabindex="-1" style="display: none;" aria-modal="true"
        role="dialog">
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

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="">Name</span>

                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Name"
                                name="target_title">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-5 fw-semibold mb-2">order</label>
                                <select class="form-select  form-select-solid" data-control="select3"
                                    data-placeholder="Select Hours" data-hide-search="true">
                                    <option value="1" selected="selected">ascend</option>
                                    <option value="2">descend</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">

                                <label class=" fs-5 fw-semibold mb-2">User Type</label>
                                <select class="form-select  form-select-solid" data-control="select3"
                                    data-placeholder="Select Hours" data-hide-search="true">
                                    <option value="1">Does Not Matter</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Team Leader</option>
                                    <option value="4">Accountant</option>
                                    <option value="5">Procurement</option>
                                    <option value="6">Client</option>

                                </select>
                            </div>



                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class=" fs-6 fw-semibold mb-2">Reg. Date From</label>
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
                                        placeholder="No date selected" name="due_date" type="text"
                                        readonly="readonly">
                                    <!--end::Datepicker-->
                                </div>


                                <!--end::Input-->
                            </div>

                            <div class="col-md-6 fv-row">

                                <label class=" fs-6 fw-semibold mb-2">Reg. Date TO</label>
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
                                        placeholder="Select a date" name="due_date" type="hidden"
                                        readonly="readonly"><input
                                        class="form-control form-control-solid ps-12 flatpickr-input flatpickr-mobile"
                                        tabindex="1" type="datetime-local" placeholder="Select a date">
                                    <!--end::Datepicker-->

                                    <!--end::Input-->
                                </div>



                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->


                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-15 fv-row">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack">

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3"> Reset </button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label"> Filter </span>
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
    <div class="card-header">
        <!--begin::Heading-->
        <div class="card-title">
            <h3>{{ $titleTabel }}</h3>
        </div>
        <!--end::Heading-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">





            <div class="d-flex justify-content-end m-3">
                <a href="{{ route('inquiries.create') }}"
                    class="btn btn-sm btn-primary my-1 btn-success">{{ $add }}</a>

            </div>
        </div>


        <!--end::Toolbar-->
    </div>
    <div class="">

        <div class="d-flex align-items-center justify-content-end m-0">
            <div class="collapsible py-3 toggle mb-0 me-3 active" data-bs-toggle="collapse"
                data-bs-target="#kt_job_5_1" aria-expanded="true">
                <h4 class="text-gray-700 fw-bold cursor-pointer btn btn-light fs-6 px-8 py-4 mb-0 fs-6 px-8 py-4">
                    Filter
                </h4>
            </div>
        </div>
        <div class="m-0">
            <div id="kt_job_5_1" class="fs-6 ms-1 collapse " style="">
                <div class="my-5">
                    <!--begin:Form-->
                    <form id="kt_Form_filter_new_transaction_form"
                        class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Assigned To</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        aria-label="Specify a Client for future usage and reference"
                                        data-bs-original-title="Specify a Client for future usage and reference"
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
                                    placeholder="Assigned To" name="assignedTo">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class=" fs-5 fw-semibold mb-2">Order</label>
                                <select class="form-select  form-select-solid" data-control="select2"
                                    data-placeholder="Order" data-hide-search="true" name="order">
                                    <option value=""> Status</option>
                                    <option value="asc"> ASC</option>
                                    <option value="desc"> DESC</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Client</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        aria-label="Specify a Client for future usage and reference"
                                        data-bs-original-title="Specify a Client for future usage and reference"
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
                                    placeholder="Enter Client" name="client">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Inquiry Number</span>
                                    <span class="ms-1" data-bs-toggle="tooltip"
                                        aria-label="Specify a Client for future usage and reference"
                                        data-bs-original-title="Specify a Client for future usage and reference"
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
                                    placeholder="Inquiry Number" name="InquiryNumber">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row fv-plugins-icon-container">
                                <!--end::Label-->
                                <label class=" fs-5 fw-semibold mb-2">Status</label>
                                <select class="form-select  form-select-solid" data-control="select2"
                                    data-placeholder="Order" data-hide-search="true" name="status">

                                    <option value=""> Select an Option</option>
                                    <option value="open"> Open</option>
                                    <option value="assigned"> Assigned</option>
                                    <option value="on_progress"> On Progress</option>
                                    <option value="quotation_prepared"> Quotation Prepared</option>
                                    <option value="quoted"> Quoted</option>
                                    <option value="rejected"> Rejected</option>
                                    <option value="approved"> Approved</option>
                                    <option value="paid"> Paid</option>
                                    <option value="ordered"> Ordered</option>
                                    <option value="supplier_paid"> Supplier Paid</option>
                                    <option value="delivered"> Delivered</option>
                                    <option value="tax_submitted"> Tax Submitted</option>

                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>


                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Date From</label>
                                <div class="input-group">
                                    <input
                                        class="form-control form-control-solid rounded rounded-end-0 flatpickr-input"
                                        placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr"
                                        type="date" name="from_created_at">

                                </div>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Date To</label>
                                <div class="input-group">
                                    <input
                                        class="form-control form-control-solid rounded rounded-end-0 flatpickr-input"
                                        placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr"
                                        type="date" name="to_created_at">

                                </div>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="text-center">
                            <button type="reset" id="kt_Form_filter_new_transaction_cancel"
                                class="btn btn-light me-3">Reset</button>
                            <button type="submit" id="kt_Form_filter_new_transaction_submit"
                                class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>

            </div>
            <div class="separator separator-dashed my-5"></div>

        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr>
                        @foreach ($cols as $item)
                            <th class="min-w-150px">{{ $item }}</th>
                        @endforeach
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                    @foreach ($data as $value)
                        <tr>
                            <td>
                                <a href="{{ route('inquiries.log', [$value->id]) }}"
                                    class="text-hover-primary text-gray-600">{{ $value->client->first_name }}</a>
                            </td>
                            <td>
                                <div class="text-hover-primary text-gray-600">{{ $value->title }}</div>
                            </td>
                            <td>
                                <a href="{{ route('inquiries.log', [$value->id]) }}"
                                    class="text-hover-primary text-gray-600">NI{{ $value->getInquiryNum() }}</a>
                            </td>
                            <td>
                                <div class="text-hover-primary text-gray-600">{{ $value->created_at }}</div>
                            </td>
                            <td>
                                @if ($value->isCanceled())
                                    <span class="" style="font-style: italic;">Canceled</span>
                                @else
                                    <div class="text-hover-primary text-gray-600 text-capitalize">

                                        {{ str_replace('_', ' ', strval($value->stage)) }}

                                    </div>
                                @endif

                            </td>
                            <td>
                                @if ($value->isCanceled())
                                    <i class="ki-duotone  ki-tablet-delete text-danger" style="font-size: 40px;">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                @else
                                    <i class="ki-duotone ki-verify text-primary" style="font-size: 40px;">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                @endif



                            </td>


                            <td>
                                <div class="text-hover-primary text-gray-600">Sara</div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>

        </div>


    </div>
    <!--end::Card body-->

</div>
