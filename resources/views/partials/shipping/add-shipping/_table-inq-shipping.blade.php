<div id="kt_app_content">
    <div id="kt_app_content_container">
        <div class="card card-flush">
            <div class="card-header align-items-center p-8">
                <div class="card-title">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <div class="d-flex flex-column flex-row-fluid">
                            <div class="d-flex align-items-center flex-wrap mb-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">Total Boxes: </a>
                                <span class="text-gray-400 fw-semibold fs-5">{{ $table['Total Boxes'] }}</span>
                            </div>
                            <div class="d-flex align-items-center flex-wrap mb-1">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">Total Volume:
                                </a>
                                <span class="text-gray-400 fw-semibold fs-5">{{ $table['Total Volume'] }}</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <button class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_new_row_ship">Add New Row</button>
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
                                            Box No.
                                        </div>
                                    </th>
                                    @foreach ($table['cols'] as $item)
                                        <th class="min-w-175px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                            aria-label="Order ID: activate to sort column descending"
                                            aria-sort="ascending">{{ $item }}</th>
                                    @endforeach
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                                @foreach ($table['data'] as $row)
                                    <tr>
                                        @foreach ($row as $item)
                                            @if ($item == 'Box No.')
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">

                                                    </div>
                                                </td>
                                            @else
                                                <td class="">
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <a href="#"
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $item }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        @endforeach
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/apps/ecommerce/sales/edit-order.html"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="dataTables_length" id="kt_ecommerce_sales_table_length"><label><select
                                        name="kt_ecommerce_sales_table_length" aria-controls="kt_ecommerce_sales_table"
                                        class="form-select form-select-sm form-select-solid">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label></div>
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers"
                                id="kt_ecommerce_sales_table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="kt_ecommerce_sales_table_previous"><a href="#"
                                            aria-controls="kt_ecommerce_sales_table" data-dt-idx="0" tabindex="0"
                                            class="page-link"><i class="previous"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="kt_ecommerce_sales_table" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_ecommerce_sales_table" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item next" id="kt_ecommerce_sales_table_next"><a
                                            href="#" aria-controls="kt_ecommerce_sales_table" data-dt-idx="6"
                                            tabindex="0" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>

    </div>
    <!--end::Content container-->
</div>


<div class="modal fade" id="kt_modal_add_new_row_ship" tabindex="-1" aria-modal="true" role="dialog" style="">
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
                <form id="kt_modal_add_new_row_ship_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('shipping.add.box', [$shipping->id]) }}" method="POST">
                    @csrf
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Add New Row To Table</h1>
                    </div>

                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-12 col-sm-6 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Sign</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Sign for future usage and reference"
                                    data-bs-original-title="Specify a Sign for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Sign"
                                name="sign">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-12 col-sm-6 fv-row fv-plugins-icon-container">


                            <label class="fs-6 fw-semibold mb-2">
                                <span class="required">Client</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Sign for future usage and reference"
                                    data-bs-original-title="Specify a Sign for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <select name="client_id" class="form-select form-select-solid smartsearch_keyword"
                                data-control="select2" data-hide-search="true" data-placeholder="Client">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->full_name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- <div class="fv-plugins-message-container invalid-feedback">asd</div> --}}
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::row-->
                    <!--begin::row-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-12 col-sm-6 fv-row fv-plugins-icon-container">


                            <label class="fs-6 fw-semibold mb-2">
                                <span class="required">INQ No</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a Sign for future usage and reference"
                                    data-bs-original-title="Specify a Sign for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <select name="inquiry_id" class="form-select form-select-solid smartsearch_keyword"
                                data-control="select2" data-hide-search="true" data-placeholder="Inquiry">
                                @foreach ($inquiries as $inquiry)
                                    <option value="{{ $inquiry->id }}">Ni{{ $inquiry->getInquiryNum() }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- <div class="fv-plugins-message-container invalid-feedback">asd</div> --}}
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-12 col-sm-6 fv-row fv-plugins-icon-container">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Content</span>
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    aria-label="Specify a content for future usage and reference"
                                    data-bs-original-title="Specify a content for future usage and reference"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="Enter content"
                                name="content">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::row-->
                    <!--begin::row-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div id="kt_ecommerce_add_product_shipping" class="mt-10">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Volume</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input type="text" name="volume" class="form-control form-control-solid mb-2"
                                    placeholder="Volume" value="">
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a product volume in kilograms (kg).</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Dimension</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                    <input type="number" name="width" class="form-control form-control-solid mb-2"
                                        placeholder="Width (w)" value="">
                                    <input type="number" name="height" class="form-control form-control-solid mb-2"
                                        placeholder="Height (h)" value="">
                                    <input type="number" name="length" class="form-control form-control-solid mb-2"
                                        placeholder="Lengtn (l)" value="">
                                </div>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center my-5">
                        <button type="reset" id="kt_modal_add_new_row_ship_cancel"
                            class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_add_new_row_ship_submit" class="btn btn-primary">
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

<!--end::Modal - add new row-->
