<div id="kt_app_content_future_dues" class="app-content flex-column-fluid"
    data-select2-id="select2-data-kt_app_content_future_dues">
    <div id="kt_app_content_container" data-select2-id="select2-data-kt_app_content_container">
        <div class="card card-flush" data-select2-id="select2-data-123-c840">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            {{ $table['title'] }}</h1>
                    </div>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5"
                    data-select2-id="select2-data-122-xbx6">
                    <button class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_future_dues">Add New Row</button>
                </div>
            </div>
            <div class="card-body pt-0">

                <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_ecommerce_sales_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-50px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="" style="width: 29.8828px;">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            No.
                                        </div>
                                    </th>
                                    <th class="min-w-175px sorting text-left">INQ No</th>
                                    <th class="min-w-175px sorting text-left">Customer</th>
                                    <th class="min-w-175px sorting text-left">Description</th>
                                    <th class="min-w-175px sorting text-left">Bill to</th>
                                    <th class="min-w-175px sorting text-left">Payee name</th>
                                    <th class="min-w-175px sorting text-left">Payable amount</th>
                                    <th class="min-w-175px sorting text-left">Receivable amount</th>
                                    <th class="min-w-175px sorting text-left">Currency</th>
                                    <th class="min-w-175px sorting text-left">Due date</th>
                                    <th class="min-w-175px sorting text-left">Is paid</th>
                                    <th class="text-end min-w-100px sorting_disabled text-left" rowspan="1"
                                        colspan="1" aria-label="Actions" style="width: 143.672px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                                @for ($i = 0; $i < count($futureDues); $i++)
                                    @php
                                        $futureDue = $futureDues[$i];
                                    @endphp
                                    <tr>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $i + 1 }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $name }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $client->full_name }} </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->bill_to }} </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->bill_to }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->payee_name }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->payable_amount }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->receivable_amount }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->currency }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->due_date }}
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            <div class="d-flex align-items-center">
                                                {{ $futureDue->is_paid === 1 ? 'Paid' : 'Unpaid' }}
                                            </div>
                                        </td>

                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="kt_modal_add_future_dues" tabindex="-1" aria-modal="true" role="dialog" style="">
    <div class="modal-dialog modal-dialog-centered mw-850px">
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
                <form id="kt_modal_add_kt_modal_add_future_dues_form"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('inquiries.future.dues.store', $inquiry->id) }}" method="POST">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Add New Row To Future Dues</h1>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="fs-6 fw-semibold mb-2">Bill to</label>
                            <select name="bill_to" class="form-select form-select-solid smartsearch_keyword"
                                data-control="select2" data-hide-search="true" data-placeholder="Suppliers">
                                <option value="Niaar"> Niaar</option>
                                <option value="Client">Client</option>
                                <option value="Supplier">Supplier</option>
                            </select>

                        </div>

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="fs-6 fw-semibold mb-2">Payee Name</label>
                            <select name="payee_name" class="form-select form-select-solid smartsearch_keyword"
                                data-control="select2" data-hide-search="true" data-placeholder="Suppliers">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->supplier->id }}">{{ $supplier->supplier->company }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="row mb-4">

                        <div class="col-12 col-sm-6 col-md-6 fv-row fv-plugins-icon-container">

                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Payable amount</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Payable Amount for future usage and reference"
                                    data-bs-original-title="Specify a Payable Amount for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="number" class="form-control form-control-solid"
                                placeholder="Enter Payable Amount" name="payable_amount"
                                value="{{ old('payable_amount') }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Receivable amount</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Receivable Amount for future usage and reference"
                                    data-bs-original-title="Specify a Receivable Amount for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="number" class="form-control form-control-solid"
                                placeholder="Enter Receivable Amount" name="receivable_amount"
                                value="{{ old('receivable_amount') }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12 col-sm-6 col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Currency</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Currency for future usage and reference"
                                    data-bs-original-title="Specify a Currency for future usage and reference"
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
                                placeholder="Enter Currency" name="currency" value="{{ old('currency') }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Due Date</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Quoted Due Date for future usage and reference"
                                    data-bs-original-title="Specify a Quoted Due Date for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="date" class="form-control form-control-solid"
                                placeholder="Enter Due Date" name="due_date" value="{{ old('due_date') }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>

                    </div>

                    <div class="d-flex flex-stack mb-8">
                        <div class="me-5">
                        </div>
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" name="is_paid" type="checkbox" value="1"
                                checked="checked">
                            <span class="form-check-label fw-semibold text-muted">Is Paid</span>
                        </label>
                    </div>

                    <div class="d-flex flex-column mb-8">
                        <label class="fs-6 fw-semibold mb-2">Description</label>
                        <textarea class="form-control form-control-solid resize-none" rows="3" name="description"
                            placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="reset" id="kt_modal_add_new_row_cancel"
                            class="btn btn-light me-3">Reset</button>
                        <button type="submit" id="kt_modal_add_new_row_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
