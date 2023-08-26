<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Title-->
                            <h1
                                class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                Procurements Activities</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                        <!--begin::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    {{-- <div class="card-toolbar">
                        <div class="d-flex justify-content-end gap-5" data-kt-customer-table-toolbar="base">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-customer-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13"
                                    placeholder="Search Procurements">
                            </div>
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                data-kt-daterangepicker-range="today"
                                class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">16 Jun 2023</div>
                                <!--end::Display range-->
                                <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                            </div>
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-exit-up fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>Export Report</button>

                            <div id="kt_ecommerce_report_sales_export_menu"
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                data-kt-menu="true" style="">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to
                                        clipboard</a>
                                </div>
         
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as
                                        Excel</a>
                                </div>
      
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as
                                        CSV</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as
                                        PDF</a>
                                </div>
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div> --}}
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_customers_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="All">All</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Assigned">Assigned</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Canceled">Canceled</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Re-Asigned">Re-Asigned</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Success Ratio">Success Ratio</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Proﬁt">Proﬁt</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Avg Reps. Time">Avg Reps. Time</th>
                                        <th class="min-w-125px sorting" tabindex="0"
                                            aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                            aria-label="Actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    {{-- <tr class="odd">
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1">Aysha</div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1">18</div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1">2</div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1">5</div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1"></div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1"></div>
                                        </td>
                                        <td>
                                            <div class="text-gray-800 text-hover-primary mb-1"></div>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="../../demo1/dist/apps/customers/view.html"
                                                        class="menu-link px-3">View</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-customer-table-filter="delete_row">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr> --}}
                                    @foreach ($procurements as $procurement)
                                        <tr class="even">
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1">
                                                    {{ $procurement->full_name }}</div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1">18</div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1">2</div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1">5</div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1"></div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1"></div>
                                            </td>
                                            <td>
                                                <div class="text-gray-800 text-hover-primary mb-1"></div>
                                            </td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end">Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="../../demo1/dist/apps/customers/view.html"
                                                            class="menu-link px-3">View</a>
                                                    </div>

                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3"
                                                            data-kt-customer-table-filter="delete_row">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>

                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
