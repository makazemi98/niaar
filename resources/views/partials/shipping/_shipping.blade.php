<div id="kt_app_content" class="app-content flex-column-fluid" data-select2-id="select2-data-kt_app_content">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl  mt-5"
        data-select2-id="select2-data-kt_app_content_container">
        <!--begin::Products-->
        <div class="card card-flush " data-select2-id="select2-data-125-f8mi">
            <!--begin::Card header-->
            <div class="card-header flex-column p-5 gap-2 gap-md-5" data-select2-id="select2-data-124-ff29">
                <!--begin::Card title-->
                <div class="card-title app-container container-xxl d-flex flex-stack">
                    <h3 class="fw-bold">Manage Shippings</h3>
                    <a href="{{ route('shipping.create') }}" class="btn fw-bold btn-primary">Add Shipping</a>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid align-items-center w-100"
                    data-select2-id="select2-data-123-omgf">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1 w-100">
                        <div class="w-100">

                            <div class="d-flex align-items-center justify-content-end m-0">
                                <div class="collapsible py-3 toggle mb-0 me-3 active" data-bs-toggle="collapse"
                                    data-bs-target="#kt_job_5_1" aria-expanded="true">
                                    <h4
                                        class="text-gray-700 fw-bold cursor-pointer btn btn-light fs-6 px-8 py-4 mb-0 fs-6 px-8 py-4">
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
                                                        <span class="required">Agent Name</span>
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
                                                        placeholder="Agent Name" name="agent_name">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                                    <!--end::Label-->
                                                    <label class=" fs-5 fw-semibold mb-2">Status</label>
                                                    <select class="form-select  form-select-solid text-capitalize"
                                                        data-control="select2" data-placeholder="Status"
                                                        data-hide-search="true" name="status">
                                                        <option value=""> Select an Option</option>

                                                        @foreach (\App\Enums\ShippingStatusEnum::values() as $shipping_status)
                                                            <option value="{{ $shipping_status }}">
                                                                {{ str_replace('_', ' ', strval($shipping_status)) }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>


                                            </div>

                                            <div class="text-center">
                                                <button type="reset" id="kt_Form_filter_new_transaction_cancel"
                                                    class="btn btn-light me-3">Reset</button>
                                                <button type="submit" id="kt_Form_filter_new_transaction_submit"
                                                    class="btn btn-primary">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
                    </div>

                    <!--begin::Menu-->
                    <div id="kt_ecommerce_report_shipping_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true" style="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to
                                clipboard</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as
                                Excel</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Export dropdown-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_ecommerce_report_shipping_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_ecommerce_report_shipping_table">
                            <thead>
                                <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                                    @foreach ($table['cols'] as $col)
                                        <th class="min-w-175px sorting" tabindex="0"
                                            aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                            colspan="1" aria-label="Date: activate to sort column ascending">
                                            {{ $col }}</th>
                                    @endforeach

                                    {{-- <th class="min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="Date: activate to sort column ascending"
                                        style="width: 146.234px;">Date</th>
                                    <th class="min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="Shipping Type: activate to sort column ascending"
                                        style="width: 192.516px;">Shipping Type</th>
                                    <th class="min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="Shipping ID: activate to sort column ascending"
                                        style="width: 171.391px;">Shipping ID</th>
                                    <th class="min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="Status: activate to sort column ascending"
                                        style="width: 148.172px;">Status</th>
                                    <th class="text-end min-w-75px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="No. Orders: activate to sort column ascending"
                                        style="width: 112.203px;">No. Orders</th>
                                    <th class="text-end min-w-100px sorting" tabindex="0"
                                        aria-controls="kt_ecommerce_report_shipping_table" rowspan="1"
                                        colspan="1" aria-label="Total: activate to sort column ascending"
                                        style="width: 148.234px;">Total</th> --}}
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                                @foreach ($shippings as $shipping)
                                    <tr>
                                        <td><a
                                                href="{{ route('shipping.edit', $shipping->id) }}">{{ $shipping->handed_over_date }}</a>
                                        </td>
                                        <td>{{ $shipping->captain_info }}</td>
                                        <td>{{ $shipping->agent_name }}</td>
                                        <td>{{ $shipping->agent_no }}</td>
                                        <td>---</td>
                                        <td>{{ $shipping->boxes_count }}</td>
                                        <td><a href="#">Download</a></td>

                                        {{-- <td>{{ $shipping->volumeBoxes() }}</td> --}}
                                        <td>0</td>
                                        <td class="text-capitalize">
                                            {{ str_replace('_', ' ', strval($shipping->status)) }}
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="daterangepicker ltr show-ranges opensright"
    style="display: none; top: 298.062px; left: 511.438px; right: auto;">
    <div class="ranges">
        <ul>
            <li data-range-key="Today">Today</li>
            <li data-range-key="Yesterday">Yesterday</li>
            <li data-range-key="Last 7 Days">Last 7 Days</li>
            <li data-range-key="Last 30 Days" class="active">Last 30 Days</li>
            <li data-range-key="This Month">This Month</li>
            <li data-range-key="Last Month">Last Month</li>
            <li data-range-key="Custom Range">Custom Range</li>
        </ul>
    </div>
    <div class="drp-calendar left">
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                    <tr>
                        <th class="prev available"><span></span></th>
                        <th colspan="5" class="month">May 2023</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="weekend off ends available" data-title="r0c0">30</td>
                        <td class="available" data-title="r0c1">1</td>
                        <td class="available" data-title="r0c2">2</td>
                        <td class="available" data-title="r0c3">3</td>
                        <td class="available" data-title="r0c4">4</td>
                        <td class="available" data-title="r0c5">5</td>
                        <td class="weekend available" data-title="r0c6">6</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r1c0">7</td>
                        <td class="available" data-title="r1c1">8</td>
                        <td class="available" data-title="r1c2">9</td>
                        <td class="available" data-title="r1c3">10</td>
                        <td class="available" data-title="r1c4">11</td>
                        <td class="available" data-title="r1c5">12</td>
                        <td class="weekend available" data-title="r1c6">13</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r2c0">14</td>
                        <td class="available" data-title="r2c1">15</td>
                        <td class="available" data-title="r2c2">16</td>
                        <td class="available" data-title="r2c3">17</td>
                        <td class="available" data-title="r2c4">18</td>
                        <td class="available" data-title="r2c5">19</td>
                        <td class="weekend available" data-title="r2c6">20</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r3c0">21</td>
                        <td class="available" data-title="r3c1">22</td>
                        <td class="available" data-title="r3c2">23</td>
                        <td class="available" data-title="r3c3">24</td>
                        <td class="available" data-title="r3c4">25</td>
                        <td class="available" data-title="r3c5">26</td>
                        <td class="weekend available" data-title="r3c6">27</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r4c0">28</td>
                        <td class="active start-date available" data-title="r4c1">29</td>
                        <td class="in-range available" data-title="r4c2">30</td>
                        <td class="in-range available" data-title="r4c3">31</td>
                        <td class="off ends in-range available" data-title="r4c4">1</td>
                        <td class="off ends in-range available" data-title="r4c5">2</td>
                        <td class="weekend off ends in-range available" data-title="r4c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend off ends in-range available" data-title="r5c0">4</td>
                        <td class="off ends in-range available" data-title="r5c1">5</td>
                        <td class="off ends in-range available" data-title="r5c2">6</td>
                        <td class="off ends in-range available" data-title="r5c3">7</td>
                        <td class="off ends in-range available" data-title="r5c4">8</td>
                        <td class="off ends in-range available" data-title="r5c5">9</td>
                        <td class="weekend off ends in-range available" data-title="r5c6">10</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-calendar right">
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="5" class="month">Jun 2023</th>
                        <th class="next available"><span></span></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="weekend off ends available" data-title="r0c0">28</td>
                        <td class="off ends active start-date available" data-title="r0c1">29</td>
                        <td class="off ends in-range available" data-title="r0c2">30</td>
                        <td class="off ends in-range available" data-title="r0c3">31</td>
                        <td class="in-range available" data-title="r0c4">1</td>
                        <td class="in-range available" data-title="r0c5">2</td>
                        <td class="weekend in-range available" data-title="r0c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r1c0">4</td>
                        <td class="in-range available" data-title="r1c1">5</td>
                        <td class="in-range available" data-title="r1c2">6</td>
                        <td class="in-range available" data-title="r1c3">7</td>
                        <td class="in-range available" data-title="r1c4">8</td>
                        <td class="in-range available" data-title="r1c5">9</td>
                        <td class="weekend in-range available" data-title="r1c6">10</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r2c0">11</td>
                        <td class="in-range available" data-title="r2c1">12</td>
                        <td class="in-range available" data-title="r2c2">13</td>
                        <td class="in-range available" data-title="r2c3">14</td>
                        <td class="in-range available" data-title="r2c4">15</td>
                        <td class="in-range available" data-title="r2c5">16</td>
                        <td class="weekend in-range available" data-title="r2c6">17</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r3c0">18</td>
                        <td class="in-range available" data-title="r3c1">19</td>
                        <td class="in-range available" data-title="r3c2">20</td>
                        <td class="in-range available" data-title="r3c3">21</td>
                        <td class="in-range available" data-title="r3c4">22</td>
                        <td class="in-range available" data-title="r3c5">23</td>
                        <td class="weekend in-range available" data-title="r3c6">24</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r4c0">25</td>
                        <td class="in-range available" data-title="r4c1">26</td>
                        <td class="active end-date in-range available" data-title="r4c2">27</td>
                        <td class="today available" data-title="r4c3">28</td>
                        <td class="available" data-title="r4c4">29</td>
                        <td class="available" data-title="r4c5">30</td>
                        <td class="weekend off ends available" data-title="r4c6">1</td>
                    </tr>
                    <tr>
                        <td class="weekend off ends available" data-title="r5c0">2</td>
                        <td class="off ends available" data-title="r5c1">3</td>
                        <td class="off ends available" data-title="r5c2">4</td>
                        <td class="off ends available" data-title="r5c3">5</td>
                        <td class="off ends available" data-title="r5c4">6</td>
                        <td class="off ends available" data-title="r5c5">7</td>
                        <td class="weekend off ends available" data-title="r5c6">8</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons"><span class="drp-selected">05/29/2023 - 06/27/2023</span><button
            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button
            class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div>
</div>

<div class="daterangepicker ltr show-ranges opensleft"
    style="display: none; top: 1336.87px; left: auto; right: 59.2651px;">
    <div class="ranges">
        <ul>
            <li data-range-key="Today">Today</li>
            <li data-range-key="Yesterday">Yesterday</li>
            <li data-range-key="Last 7 Days">Last 7 Days</li>
            <li data-range-key="Last 30 Days" class="active">Last 30 Days</li>
            <li data-range-key="This Month">This Month</li>
            <li data-range-key="Last Month">Last Month</li>
            <li data-range-key="Custom Range">Custom Range</li>
        </ul>
    </div>
    <div class="drp-calendar left">
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                    <tr>
                        <th class="prev available"><span></span></th>
                        <th colspan="5" class="month">May 2023</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="weekend off ends available" data-title="r0c0">30</td>
                        <td class="available" data-title="r0c1">1</td>
                        <td class="available" data-title="r0c2">2</td>
                        <td class="available" data-title="r0c3">3</td>
                        <td class="available" data-title="r0c4">4</td>
                        <td class="available" data-title="r0c5">5</td>
                        <td class="weekend available" data-title="r0c6">6</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r1c0">7</td>
                        <td class="available" data-title="r1c1">8</td>
                        <td class="available" data-title="r1c2">9</td>
                        <td class="available" data-title="r1c3">10</td>
                        <td class="available" data-title="r1c4">11</td>
                        <td class="available" data-title="r1c5">12</td>
                        <td class="weekend available" data-title="r1c6">13</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r2c0">14</td>
                        <td class="available" data-title="r2c1">15</td>
                        <td class="available" data-title="r2c2">16</td>
                        <td class="available" data-title="r2c3">17</td>
                        <td class="available" data-title="r2c4">18</td>
                        <td class="available" data-title="r2c5">19</td>
                        <td class="weekend available" data-title="r2c6">20</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r3c0">21</td>
                        <td class="available" data-title="r3c1">22</td>
                        <td class="available" data-title="r3c2">23</td>
                        <td class="available" data-title="r3c3">24</td>
                        <td class="available" data-title="r3c4">25</td>
                        <td class="available" data-title="r3c5">26</td>
                        <td class="weekend available" data-title="r3c6">27</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r4c0">28</td>
                        <td class="available" data-title="r4c1">29</td>
                        <td class="active start-date available" data-title="r4c2">30</td>
                        <td class="in-range available" data-title="r4c3">31</td>
                        <td class="off ends in-range available" data-title="r4c4">1</td>
                        <td class="off ends in-range available" data-title="r4c5">2</td>
                        <td class="weekend off ends in-range available" data-title="r4c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend off ends in-range available" data-title="r5c0">4</td>
                        <td class="off ends in-range available" data-title="r5c1">5</td>
                        <td class="off ends in-range available" data-title="r5c2">6</td>
                        <td class="off ends in-range available" data-title="r5c3">7</td>
                        <td class="off ends in-range available" data-title="r5c4">8</td>
                        <td class="off ends in-range available" data-title="r5c5">9</td>
                        <td class="weekend off ends in-range available" data-title="r5c6">10</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-calendar right">
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="5" class="month">Jun 2023</th>
                        <th class="next available"><span></span></th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="weekend off ends available" data-title="r0c0">28</td>
                        <td class="off ends available" data-title="r0c1">29</td>
                        <td class="off ends active start-date available" data-title="r0c2">30</td>
                        <td class="off ends in-range available" data-title="r0c3">31</td>
                        <td class="in-range available" data-title="r0c4">1</td>
                        <td class="in-range available" data-title="r0c5">2</td>
                        <td class="weekend in-range available" data-title="r0c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r1c0">4</td>
                        <td class="in-range available" data-title="r1c1">5</td>
                        <td class="in-range available" data-title="r1c2">6</td>
                        <td class="in-range available" data-title="r1c3">7</td>
                        <td class="in-range available" data-title="r1c4">8</td>
                        <td class="in-range available" data-title="r1c5">9</td>
                        <td class="weekend in-range available" data-title="r1c6">10</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r2c0">11</td>
                        <td class="in-range available" data-title="r2c1">12</td>
                        <td class="in-range available" data-title="r2c2">13</td>
                        <td class="in-range available" data-title="r2c3">14</td>
                        <td class="in-range available" data-title="r2c4">15</td>
                        <td class="in-range available" data-title="r2c5">16</td>
                        <td class="weekend in-range available" data-title="r2c6">17</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r3c0">18</td>
                        <td class="in-range available" data-title="r3c1">19</td>
                        <td class="in-range available" data-title="r3c2">20</td>
                        <td class="in-range available" data-title="r3c3">21</td>
                        <td class="in-range available" data-title="r3c4">22</td>
                        <td class="in-range available" data-title="r3c5">23</td>
                        <td class="weekend in-range available" data-title="r3c6">24</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r4c0">25</td>
                        <td class="in-range available" data-title="r4c1">26</td>
                        <td class="in-range available" data-title="r4c2">27</td>
                        <td class="today active end-date in-range available" data-title="r4c3">28</td>
                        <td class="available" data-title="r4c4">29</td>
                        <td class="available" data-title="r4c5">30</td>
                        <td class="weekend off ends available" data-title="r4c6">1</td>
                    </tr>
                    <tr>
                        <td class="weekend off ends available" data-title="r5c0">2</td>
                        <td class="off ends available" data-title="r5c1">3</td>
                        <td class="off ends available" data-title="r5c2">4</td>
                        <td class="off ends available" data-title="r5c3">5</td>
                        <td class="off ends available" data-title="r5c4">6</td>
                        <td class="off ends available" data-title="r5c5">7</td>
                        <td class="weekend off ends available" data-title="r5c6">8</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons"><span class="drp-selected">05/30/2023 - 06/28/2023</span><button
            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button
            class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div>
</div>

<span class="select2-container select2-container--bootstrap5 select2-container--focus"
    style="position: absolute; top: -43.1875px; left: 965.234px;"><span
        class="select2-dropdown select2-dropdown--above" dir="ltr" style="width: 150px;"><span
            class="select2-search select2-search--dropdown select2-search--hide"><input class="select2-search__field"
                type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false"
                role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search"
                aria-controls="select2-dg1i-results"
                aria-activedescendant="select2-dg1i-result-fbme-Cancelled"></span><span class="select2-results">
            <ul class="select2-results__options" role="listbox" id="select2-dg1i-results" aria-expanded="true"
                aria-hidden="false">
                <li class="select2-results__option select2-results__option--selectable"
                    id="select2-dg1i-result-cmz3-all" role="option"
                    data-select2-id="select2-data-select2-dg1i-result-cmz3-all" aria-selected="false">All</li>
                <li class="select2-results__option select2-results__option--selectable"
                    id="select2-dg1i-result-jn4y-Completed" role="option"
                    data-select2-id="select2-data-select2-dg1i-result-jn4y-Completed" aria-selected="false">Completed
                </li>
                <li class="select2-results__option select2-results__option--selectable"
                    id="select2-dg1i-result-nir6-In Transit" role="option"
                    data-select2-id="select2-data-select2-dg1i-result-nir6-In Transit" aria-selected="false">In
                    Transit</li>
                <li class="select2-results__option select2-results__option--selectable"
                    id="select2-dg1i-result-oi7e-Pending" role="option"
                    data-select2-id="select2-data-select2-dg1i-result-oi7e-Pending" aria-selected="false">Pending</li>
                <li class="select2-results__option select2-results__option--selectable select2-results__option--highlighted"
                    id="select2-dg1i-result-fbme-Cancelled" role="option"
                    data-select2-id="select2-data-select2-dg1i-result-fbme-Cancelled" aria-selected="true">Cancelled
                </li>
            </ul>
        </span>
    </span>
</span> --}}
