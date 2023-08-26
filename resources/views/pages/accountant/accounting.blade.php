<x-default-layout>

    @php
        $tabSelected = request()->get('tab');

        $rule = 'accountant';
        $info = [
            'Balance Sheet' => ['Total Balance' => '-46590', 'Total Creidt' => '760', 'Total Debit' => '33000'],
            'Payments' => ['Total Balance' => '-46590', 'Total Creidt' => '760', 'Total Debit' => '33000'],
            'Future Dues' => ['Total Balance' => '-46590', 'Total Creidt' => '760', 'Total Debit' => '33000'],
            'Petty' => ['Total Balance' => '-46590', 'Total Creidt' => '760', 'Total Debit' => '33000'],
        ];
        $tables = [
            'Balance Sheet' => [
                'cols' => ['Id', 'Date', 'INQ No.', 'Team', 'Supplier', 'Category', 'Paid', 'Recieved', 'Balance', 'Remark', 'Description'],
                'data' => [['19', '2023-03-30', '1', 'Farnoush Ebadi', 'asdas', 'salary', '18000.00', '110.00', '-32240.00', 'Remark', 'some text as description'], ['18', '2023-03-30', '1', 'Farnoush Ebadi', 'tedt', 'order_related', '15000.00', '650.00', '-14350.00', 'Remark', 'some text as description']],
            ],
            'Payments' => [
                'cols' => ['Id', 'Date', 'INQ No.', 'Customer', 'Team', 'Recieved', 'Paid', 'Balance', 'Description'],
                'data' => [['19', '01/05/2023 12:00', '1', 'Karim Aghaei', 'Farshid Sohrabiani', '0.00', '18000.00', '-32240.00', 'some text as description'], ['12', '01/05/2023 12:00', '1', 'Karim Aghaei', 'Farshid Sohrabiani', '0.00', '18000.00', '-32240.00', 'some text as description']],
            ],
            'Future Dues' => [
                'cols' => ['Id', 'Balance', 'Credit', 'Date', 'Debit', 'Description', 'INQ No.', 'Is Paid', 'Past Due'],
                'data' => [['13', '13240.00', '13240.00', '01/11/2023 12:00', '0.00', 'amount AED 13,240.00 | Collection from Intl. Business Tower - Business Bay', 'N3761', 'yes', 'yes']],
            ],
            'Petty' => [
                'cols' => ['Id', 'Balance', 'Credit', 'Date', 'Debit', 'Description', 'INQ No.', 'Invoice Number'],
                'data' => [['13', '13240.00', '13240.00', '01/11/2023 12:00', '0.00', 'amount AED 13,240.00 | Collection from Intl. Business Tower - Business Bay', 'N3761', '0142023'], ['13', '13240.00', '13240.00', '01/11/2023 12:00', '0.00', 'amount AED 13,240.00 | Collection from Intl. Business Tower - Business Bay', 'N3761', '0142023'], ['13', '13240.00', '13240.00', '01/11/2023 12:00', '0.00', 'amount AED 13,240.00 | Collection from Intl. Business Tower - Business Bay', 'N3761', '0142023'], ['13', '13240.00', '13240.00', '01/11/2023 12:00', '0.00', 'amount AED 13,240.00 | Collection from Intl. Business Tower - Business Bay', 'N3761', '0142023']],
            ],
            'Profit' => [
                'cols' => ['Id', 'Assigned to', 'Brand', 'Client', 'Created at', 'Quantity', 'Profit', 'Status', 'Title', 'Updated at'],
                'data' => [['13', 'Aysha Freydonfar', '', 'Ide Tajhiz Control', '01/13/2023 05:24', '', ['Assumed Profit' => '0', 'Actual Profit' => '0'], 'supplier_paid', '(104)-N3777-MEYLE(Germany)', '01/25/2023 04:36'], ['13', 'Aysha Freydonfar', '', 'Ide Tajhiz Control', '01/13/2023 05:24', '', ['Assumed Profit' => '0', 'Actual Profit' => '0'], 'supplier_paid', '(104)-N3777-MEYLE(Germany)', '01/25/2023 04:36'], ['13', 'Aysha Freydonfar', '', 'Ide Tajhiz Control', '01/13/2023 05:24', '', ['Assumed Profit' => '0', 'Actual Profit' => '0'], 'supplier_paid', '(104)-N3777-MEYLE(Germany)', '01/25/2023 04:36'], ['13', 'Aysha Freydonfar', '', 'Ide Tajhiz Control', '01/13/2023 05:24', '', ['Assumed Profit' => '0', 'Actual Profit' => '0'], 'supplier_paid', '(104)-N3777-MEYLE(Germany)', '01/25/2023 04:36'], ['13', 'Aysha Freydonfar', '', 'Ide Tajhiz Control', '01/13/2023 05:24', '', ['Assumed Profit' => '0', 'Actual Profit' => '0'], 'supplier_paid', '(104)-N3777-MEYLE(Germany)', '01/25/2023 04:36']],
            ],
            'Users With Credit In Hand' => [
                'cols' => ['Client Id', 'Client Full Name', 'First Name', 'Last Payment', 'Peyment Id', 'Total'],
                'data' => [['13', 'Aysha Freydonfar', 'Aysha', '01/11/2023 12:00', '247', '']],
            ],
        ];
        $statistics = [
            'Total Credit In-Hand' => '12,500',
            'Total Negative Balances' => '12,500',
            'Balance' => '12,500',
            'Total Future Payables' => '12,500',
            'Total Future Receivables' => '12,500',
            'Future Balance' => '12,500',
        ];
    @endphp
    <!--begin::Row-->
    {{-- <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12 d-flex align-items-center justify-content-end">
            <div>
                <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true"
                    data-placeholder="Select option" data-dropdown-parent="#kt_menu_641ac406c22af" data-allow-clear="true"
                    data-select2-id="select2-data-7-xwlo" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                    <option data-select2-id="select2-data-9-6e0t"></option>
                    <option value="1">All Customer</option>
                    <option value="2">Pending</option>
                    <option value="2">In Process</option>
                    <option value="2">Rejected</option>
                </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--focus"
                    dir="ltr" data-select2-id="select2-data-8-xxwv" style="width: 100%;"><span
                        class="selection"><span
                            class="select2-selection select2-selection--single form-select form-select-solid"
                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                            aria-disabled="false" aria-labelledby="select2-r04e-container"
                            aria-controls="select2-r04e-container"><span class="select2-selection__rendered"
                                id="select2-r04e-container" role="textbox" aria-readonly="true"
                                title="Select option"><span class="select2-selection__placeholder">Select
                                    option</span></span><span class="select2-selection__arrow" role="presentation"><b
                                    role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                        aria-hidden="true"></span></span>
            </div>
        </div>
    </div> --}}
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        @include('partials/accounting/_statistics', [$statistics])
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            <!--begin::Table widget 2-->
            <div class="card h-md-100">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 p-8">
                    <!--begin::Title-->
                    <h3 class="fw-bold text-gray-900 m-0">Accounting</h3>
                    <!--end::Title-->
                    <!--begin::Menu-->
                    {{-- <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                        <i class="ki-duotone ki-dots-square fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </button> --}}
                    {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                        data-kt-menu="true" style="">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator mb-3 opacity-75"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"> Add new Transaction</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"> Add new Future Dues</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"> Add new Payment</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"> Add new Petty</a>
                        </div>
                    </div> --}}
                    <!--end::Menu-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    @include('partials.errors')

                    <ul class="nav nav-pills nav-pills-custom mb-5" role="tablist">
                        <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden py-4 @if($tabSelected === 'balance-sheet' || empty($tabSelected)) active @endif"
                                href="{{ route('admin.accounting.list', ['tab' => 'balance-sheet']) }}"
                                aria-selected="true" role="tab">

                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">Balance Sheet</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>

                        <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden py-4 @if($tabSelected === 'payments') active @endif"
                                href="{{ route('admin.accounting.list', ['tab' => 'payments']) }}" aria-selected="false"
                                role="tab" tabindex="-1">
                                <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">Payments</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>

                        <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden  py-4 @if($tabSelected === 'future-dues') active @endif"
                                {{-- data-bs-toggle="pill" --}}
                                href="{{ route('admin.accounting.list', ['tab' => 'future-dues']) }}"
                                aria-selected="false" role="tab" tabindex="-1">
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Future Dues</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>
                        <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden py-4 @if($tabSelected === 'petty') active @endif"
                                href="{{ route('admin.accounting.list', ['tab' => 'petty']) }}" aria-selected="false"
                                role="tab" tabindex="-1">
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Petty</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>
                        <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden py-4 @if($tabSelected === 'profit') active @endif"
                                href="{{ route('admin.accounting.list', ['tab' => 'profit']) }}" aria-selected="false"
                                role="tab" tabindex="-1">
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Profit</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden py-4 @if($tabSelected === 'users-with-credit-hand') active @endif"
                                href="{{ route('admin.accounting.list', ['tab' => 'users-with-credit-hand']) }}"
                                aria-selected="false" role="tab" tabindex="-1">
                                <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Users With Credit In Hand</span>
                                <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="separator separator-dashed mb-5"></div>
                    <div class="tab-content">
                        @if ($tabSelected === 'payments')
                            @include('partials/accounting/tab/_payments')
                        @elseif ($tabSelected === 'petty')
                            @include('partials/accounting/tab/_petty')
                        @elseif ($tabSelected === 'future-dues')
                            @include('partials/accounting/tab/_future-dues')
                        @elseif ($tabSelected === 'profit')
                            @include('partials/accounting/tab/_profit')
                        @elseif ($tabSelected === 'users-with-credit-hand')
                            @include('partials/accounting/tab/_credit-in-hand')
                        @else
                            @include('partials/accounting/tab/_balance-sheet')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->

</x-default-layout>



<div class="flatpickr-calendar hasTime animate arrowTop arrowLeft" tabindex="-1"
    style="top: 478.672px; left: 692.625px; right: auto;">
    <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                <g></g>
                <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path>
            </svg></span>
        <div class="flatpickr-month">
            <div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month"
                    tabindex="-1">
                    <option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
                    <option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
                    <option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
                    <option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
                    <option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
                    <option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
                    <option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
                    <option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
                    <option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
                    <option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
                    <option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
                    <option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
                </select>
                <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1"
                        aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
            </div>
        </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                <g></g>
                <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
                </path>
            </svg></span>
    </div>
    <div class="flatpickr-innerContainer">
        <div class="flatpickr-rContainer">
            <div class="flatpickr-weekdays">
                <div class="flatpickr-weekdaycontainer">
                    <span class="flatpickr-weekday">
                        Sun</span><span class="flatpickr-weekday">Mon</span><span
                        class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span
                        class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span
                        class="flatpickr-weekday">Sat
                    </span>
                </div>
            </div>
            <div class="flatpickr-days" tabindex="-1">
                <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="June 25, 2023"
                        tabindex="-1">25</span><span class="flatpickr-day prevMonthDay" aria-label="June 26, 2023"
                        tabindex="-1">26</span><span class="flatpickr-day prevMonthDay" aria-label="June 27, 2023"
                        tabindex="-1">27</span><span class="flatpickr-day prevMonthDay" aria-label="June 28, 2023"
                        tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="June 29, 2023"
                        tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="June 30, 2023"
                        tabindex="-1">30</span><span class="flatpickr-day" aria-label="July 1, 2023"
                        tabindex="-1">1</span><span class="flatpickr-day" aria-label="July 2, 2023"
                        tabindex="-1">2</span><span class="flatpickr-day today" aria-label="July 3, 2023"
                        aria-current="date" tabindex="-1">3</span><span class="flatpickr-day"
                        aria-label="July 4, 2023" tabindex="-1">4</span><span class="flatpickr-day"
                        aria-label="July 5, 2023" tabindex="-1">5</span><span class="flatpickr-day"
                        aria-label="July 6, 2023" tabindex="-1">6</span><span class="flatpickr-day"
                        aria-label="July 7, 2023" tabindex="-1">7</span><span class="flatpickr-day"
                        aria-label="July 8, 2023" tabindex="-1">8</span><span class="flatpickr-day"
                        aria-label="July 9, 2023" tabindex="-1">9</span><span class="flatpickr-day"
                        aria-label="July 10, 2023" tabindex="-1">10</span><span class="flatpickr-day"
                        aria-label="July 11, 2023" tabindex="-1">11</span><span class="flatpickr-day"
                        aria-label="July 12, 2023" tabindex="-1">12</span><span class="flatpickr-day"
                        aria-label="July 13, 2023" tabindex="-1">13</span><span class="flatpickr-day"
                        aria-label="July 14, 2023" tabindex="-1">14</span><span class="flatpickr-day"
                        aria-label="July 15, 2023" tabindex="-1">15</span><span class="flatpickr-day"
                        aria-label="July 16, 2023" tabindex="-1">16</span><span class="flatpickr-day"
                        aria-label="July 17, 2023" tabindex="-1">17</span><span class="flatpickr-day"
                        aria-label="July 18, 2023" tabindex="-1">18</span><span class="flatpickr-day"
                        aria-label="July 19, 2023" tabindex="-1">19</span><span class="flatpickr-day"
                        aria-label="July 20, 2023" tabindex="-1">20</span><span class="flatpickr-day"
                        aria-label="July 21, 2023" tabindex="-1">21</span><span class="flatpickr-day"
                        aria-label="July 22, 2023" tabindex="-1">22</span><span class="flatpickr-day"
                        aria-label="July 23, 2023" tabindex="-1">23</span><span class="flatpickr-day"
                        aria-label="July 24, 2023" tabindex="-1">24</span><span class="flatpickr-day"
                        aria-label="July 25, 2023" tabindex="-1">25</span><span class="flatpickr-day"
                        aria-label="July 26, 2023" tabindex="-1">26</span><span class="flatpickr-day"
                        aria-label="July 27, 2023" tabindex="-1">27</span><span class="flatpickr-day"
                        aria-label="July 28, 2023" tabindex="-1">28</span><span class="flatpickr-day"
                        aria-label="July 29, 2023" tabindex="-1">29</span><span class="flatpickr-day"
                        aria-label="July 30, 2023" tabindex="-1">30</span><span class="flatpickr-day"
                        aria-label="July 31, 2023" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay"
                        aria-label="August 1, 2023" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay"
                        aria-label="August 2, 2023" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay"
                        aria-label="August 3, 2023" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay"
                        aria-label="August 4, 2023" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay"
                        aria-label="August 5, 2023" tabindex="-1">5</span></div>
            </div>
        </div>
    </div>
    <div class="flatpickr-time" tabindex="-1">
        <div class="numInputWrapper"><input class="numInput flatpickr-hour" type="number" aria-label="Hour"
                tabindex="-1" step="1" min="1" max="12" maxlength="2"><span
                class="arrowUp"></span><span class="arrowDown"></span></div><span
            class="flatpickr-time-separator">:</span>
        <div class="numInputWrapper"><input class="numInput flatpickr-minute" type="number" aria-label="Minute"
                tabindex="-1" step="5" min="0" max="59" maxlength="2"><span
                class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm"
            title="Click to toggle" tabindex="-1">PM</span>
    </div>
</div>
