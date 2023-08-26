<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex justify-content-end flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column  flex-wrap">
                <!--begin::search date-->
                <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                    class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                    <!--begin::Display range-->
                    <div class="text-gray-600 fw-bold">4 Jun 2023 - 3 Jul 2023</div>
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
                <!--end::search date-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Row-->
            <div class="row gy-4 g-xl-6">
                @foreach ($statistics as $key => $value)
                    <!--begin::Col-->
                    <div class="col-6 col-xs-4 col-sm-3 col-xl-2">
                        <!--begin::Card widget 2-->
                        <div class="card h-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <!--begin::Section-->
                                <div class="d-flex flex-column align-items-center">
                                    <!--begin::Title-->
                                    <span
                                        class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">{{ $key }}</span>
                                    <!--end::Title-->
                                    <!--begin::info-->
                                    <span class="fw-semibold fs-4 text-gray-600">{{ $value }}</span>
                                    <!--end::info-->
                                    <span class="fw-semibold fs-4 text-gray-600">AED</span>
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                @endforeach

                {{-- <!--begin::Col-->
                <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                    <!--begin::Card widget 2-->
                    <div class="card h-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex flex-column align-items-center">
                                <!--begin::Title-->
                                <span
                                    class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">{{}}</span>
                                <!--end::Title-->
                                <!--begin::info-->
                                <span class="fw-semibold fs-4 text-gray-400">{{ $statistics[''] }}</span>
                                <!--end::info-->
                                <span class="fw-semibold fs-4 text-gray-400">AED</span>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                    <!--begin::Card widget 2-->
                    <div class="card h-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex flex-column align-items-center">
                                <!--begin::Title-->
                                <span class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">ORDER
                                    RATIO</span>
                                <!--end::Title-->
                                <!--begin::Number-->
                                <span class="fw-semibold fs-4 text-gray-400">12</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                    <!--begin::Card widget 2-->
                    <div class="card h-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex flex-column align-items-center">
                                <!--begin::Title-->
                                <span class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">PENDING
                                    QUOTATIONS
                                </span>
                                <!--end::Title-->
                                <!--begin::Number-->
                                <span class="fw-semibold fs-4 text-gray-400">12</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                    <!--begin::Card widget 2-->
                    <div class="card h-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex flex-column align-items-center">
                                <!--begin::Title-->
                                <span class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">BALANCE</span>
                                <!--end::Title-->
                                <!--begin::Number-->
                                <span class="fw-semibold fs-4 text-gray-400">3200</span>
                                <!--end::Number-->
                                <!--begin::Unit-->
                                <span class="fw-semibold fs-4 text-gray-400">AED</span>
                                <!--end::Unit-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-6 col-sm-4 col-md-3 col-xxl-2">
                    <!--begin::Card widget 2-->
                    <div class="card h-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <!--begin::Section-->
                            <div class="d-flex flex-column align-items-center">
                                <!--begin::Title-->
                                <span class="fw-bold fs-4 text-gray-800 lh-1 ls-n2 text-center mb-5">BUSINESS
                                    MADE</span>
                                <!--end::Title-->
                                <!--begin::Number-->
                                <span class="fw-semibold fs-4 text-gray-400">123,200</span>
                                <!--end::Number-->
                                <!--begin::Unit-->
                                <span class="fw-semibold fs-4 text-gray-400">AED</span>
                                <!--end::Unit-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col--> --}}
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>


<div class="daterangepicker ltr show-ranges opensleft show-calendar"
    style="display: none; top: 469.359px; left: auto; right: 59.2659px;">
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
                        <th colspan="5" class="month">Jun 2023</th>
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
                        <td class="weekend off ends available" data-title="r0c0">28</td>
                        <td class="off ends available" data-title="r0c1">29</td>
                        <td class="off ends available" data-title="r0c2">30</td>
                        <td class="off ends available" data-title="r0c3">31</td>
                        <td class="available" data-title="r0c4">1</td>
                        <td class="available" data-title="r0c5">2</td>
                        <td class="weekend available" data-title="r0c6">3</td>
                    </tr>
                    <tr>
                        <td class="weekend active start-date available" data-title="r1c0">4</td>
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
                        <td class="in-range available" data-title="r4c3">28</td>
                        <td class="in-range available" data-title="r4c4">29</td>
                        <td class="in-range available" data-title="r4c5">30</td>
                        <td class="weekend off ends in-range available" data-title="r4c6">1</td>
                    </tr>
                    <tr>
                        <td class="weekend off ends in-range available" data-title="r5c0">2</td>
                        <td class="today off ends active end-date in-range available" data-title="r5c1">3</td>
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
    <div class="drp-calendar right">
        <div class="calendar-table">
            <table class="table-condensed">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="5" class="month">Jul 2023</th>
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
                        <td class="weekend off ends in-range available" data-title="r0c0">25</td>
                        <td class="off ends in-range available" data-title="r0c1">26</td>
                        <td class="off ends in-range available" data-title="r0c2">27</td>
                        <td class="off ends in-range available" data-title="r0c3">28</td>
                        <td class="off ends in-range available" data-title="r0c4">29</td>
                        <td class="off ends in-range available" data-title="r0c5">30</td>
                        <td class="weekend in-range available" data-title="r0c6">1</td>
                    </tr>
                    <tr>
                        <td class="weekend in-range available" data-title="r1c0">2</td>
                        <td class="today active end-date in-range available" data-title="r1c1">3</td>
                        <td class="available" data-title="r1c2">4</td>
                        <td class="available" data-title="r1c3">5</td>
                        <td class="available" data-title="r1c4">6</td>
                        <td class="available" data-title="r1c5">7</td>
                        <td class="weekend available" data-title="r1c6">8</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r2c0">9</td>
                        <td class="available" data-title="r2c1">10</td>
                        <td class="available" data-title="r2c2">11</td>
                        <td class="available" data-title="r2c3">12</td>
                        <td class="available" data-title="r2c4">13</td>
                        <td class="available" data-title="r2c5">14</td>
                        <td class="weekend available" data-title="r2c6">15</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r3c0">16</td>
                        <td class="available" data-title="r3c1">17</td>
                        <td class="available" data-title="r3c2">18</td>
                        <td class="available" data-title="r3c3">19</td>
                        <td class="available" data-title="r3c4">20</td>
                        <td class="available" data-title="r3c5">21</td>
                        <td class="weekend available" data-title="r3c6">22</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r4c0">23</td>
                        <td class="available" data-title="r4c1">24</td>
                        <td class="available" data-title="r4c2">25</td>
                        <td class="available" data-title="r4c3">26</td>
                        <td class="available" data-title="r4c4">27</td>
                        <td class="available" data-title="r4c5">28</td>
                        <td class="weekend available" data-title="r4c6">29</td>
                    </tr>
                    <tr>
                        <td class="weekend available" data-title="r5c0">30</td>
                        <td class="available" data-title="r5c1">31</td>
                        <td class="off ends available" data-title="r5c2">1</td>
                        <td class="off ends available" data-title="r5c3">2</td>
                        <td class="off ends available" data-title="r5c4">3</td>
                        <td class="off ends available" data-title="r5c5">4</td>
                        <td class="weekend off ends available" data-title="r5c6">5</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="calendar-time" style="display: none;"></div>
    </div>
    <div class="drp-buttons"><span class="drp-selected">06/04/2023 - 07/03/2023</span><button
            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button
            class="applyBtn btn btn-sm btn-primary" type="button">Apply</button> </div>
</div>
