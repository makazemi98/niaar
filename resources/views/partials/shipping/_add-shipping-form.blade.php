<div id="kt_app_content">
    <div id="kt_app_content_container">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Shipping Detail</h3>
                </div>
            </div>
            <div class="separator mb-5"></div>
            <div class="card-body">
                @include('partials.errors')
                <div class="d-flex flex-column flex-lg-row ">
                    <div class="flex-lg-row-fluid">

                        <form
                            action="{{ isset($shipping) ? route('shipping.update', $shipping->id) : route('shipping.store') }}"
                            class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" id="kt_careers_form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column mb-5 fv-row">
                                <label class="fs-5 fw-semibold mb-2 required">Captain Info</label>
                                <input class="form-control form-control-solid" placeholder="Captain..."
                                    name="captain_info"
                                    value="{{ old('captain_info', isset($shipping) ? $shipping->captain_info : '') }} ">
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-5 fw-semibold mb-2">Agent</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Agent Name" name="agent_name"
                                        value="{{ old('agent_name', isset($shipping) ? $shipping->agent_name : '') }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-5 fw-semibold mb-2">Agent No.</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Phone Number" name="agent_no"
                                        value="{{ old('agent_no', isset($shipping) ? $shipping->agent_no : '') }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <label class="required fs-5 fw-semibold mb-2">Sign</label>
                                    <input class="form-control form-control-solid" placeholder="Signature"
                                        name="sign"
                                        value="{{ old('sign', isset($shipping) ? $shipping->sign : '') }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2 required">Handover date to Capt.</label>
                                    <input class="form-control form-control-solid ps-12 flatpickr-input"
                                        placeholder="Select a date" type="date" name="handed_over_date"
                                        value="{{ old('handed_over_date', isset($shipping) ? $shipping->handed_over_date : '') }}">
                                </div>
                            </div>

                            <div id="kt_app_content">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container">
                                    <div class="card card-flush py-0">
                                        <!--begin::Card header-->
                                        <div class="card-header align-items-center px-0">
                                            <div class="card-title">
                                                <h2>Delivery Note</h2>
                                            </div>
                                            <div class="toolbar w-100 mb-5">
                                                <div class="w-100">
                                                    <!--begin::Select2-->

                                                    <select
                                                        class="form-select form-select-solid select2-hidden-accessible text-capitalize"
                                                        data-control="select2" data-hide-search="false" name="status"
                                                        data-placeholder="Status"
                                                        data-kt-ecommerce-order-filter="status"
                                                        data-select2-id="select2-data-10-1tff" tabindex="-1"
                                                        aria-hidden="true">
                                                        @foreach (App\Enums\ShippingStatusEnum::values() as $statusEnum)
                                                            <option value="{{ $statusEnum }}">
                                                                {{ str_replace('_', ' ', strval($statusEnum)) }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body pt-2 px-0 w-100">
                                            <div class="d-flex my-2">
                                                <label for="uplode-file-add-inquiries" class="w-100">
                                                    <div class="dropzone dz-clickable"
                                                        id="kt_ecommerce_add_product_media">
                                                        {{-- <label for="import-file"> --}}
                                                        <!--begin::Message-->
                                                        <div class="dz-message needsclick align-items-center">
                                                            <!--begin::Icon-->
                                                            <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            <!--end::Icon-->
                                                            <!--begin::Info-->
                                                            <div class="d-flex my-2">
                                                                <label for="uplode-file-add-inquiries"
                                                                    class="fs-5 fw-bold text-gray-900 mb-1">
                                                                    Upload To Invoice File (pdf)
                                                                    <h3></h3>
                                                                </label>

                                                            </div>
                                                            <!--end::Info-->
                                                        </div>
                                                        {{-- </label> --}}
                                                    </div>
                                                </label>
                                                <input type="file" style="display:none"
                                                    id="uplode-file-add-inquiries" accept=" .pdf " name="delivery_doc">
                                            </div>
                                            <!--end::Controls-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end">
                                <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
                                    <span class="indicator-label">Save</span>
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
</div>

{{-- 
<div class="flatpickr-calendar hasTime animate arrowTop arrowLeft" tabindex="-1"
    style="top: 356.391px; left: 692.625px; right: auto;">
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
                        tabindex="-1">30</span><span class="flatpickr-day today" aria-label="July 1, 2023"
                        aria-current="date" tabindex="-1">1</span><span class="flatpickr-day"
                        aria-label="July 2, 2023" tabindex="-1">2</span><span class="flatpickr-day"
                        aria-label="July 3, 2023" tabindex="-1">3</span><span class="flatpickr-day"
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
</div> --}}
