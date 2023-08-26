<div class="my-5">
    <!--begin:Form-->
    <form id="kt_Form_filter_new_transaction_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
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
                <input type="text" class="form-control form-control-solid" placeholder="Enter Client" name="client">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                    <span class="required">Team</span>
                    <span class="ms-1" data-bs-toggle="tooltip"
                        aria-label="Specify a Team for future usage and reference"
                        data-bs-original-title="Specify a Team for future usage and reference" data-kt-initialized="1">
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </span>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" placeholder="Enter Team" name="team">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row g-9 mb-8">
            <!--begin::Col-->
            <div class="col-md-6 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                    <span class="required">INQ No.</span>
                    <span class="ms-1" data-bs-toggle="tooltip"
                        aria-label="Specify a INQ No. for future usage and reference"
                        data-bs-original-title="Specify a INQ No. for future usage and reference"
                        data-kt-initialized="1">
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </span>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" placeholder="Enter INQ No."
                    name="inq_no">
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <label class="required fs-6 fw-semibold mb-2">Due Date</label>
                <div class="input-group">
                    <input class="form-control form-control-solid rounded rounded-end-0 flatpickr-input"
                        placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" type="hidden"
                        value=""><input class="form-control form-control-solid rounded rounded-end-0 input"
                        placeholder="Pick date range" tabindex="0" type="text" readonly="readonly">
                    <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8">
            <label class="fs-6 fw-semibold mb-2">Description or Remark</label>
            <textarea class="form-control form-control-solid resize-none" rows="3" name="des"
                placeholder="Type Description"></textarea>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="reset" id="kt_Form_filter_new_transaction_cancel" class="btn btn-light me-3">Cancel</button>
            <button type="submit" id="kt_Form_filter_new_transaction_submit" class="btn btn-primary">
                <span class="indicator-label">Save</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end:Form-->
</div>



<div class="flatpickr-calendar rangeMode animate arrowTop arrowLeft" tabindex="-1"
    style="top: 223.773px; left: 1032.56px; right: auto;">
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
                        tabindex="-1">2</span><span class="flatpickr-day" aria-label="July 3, 2023"
                        tabindex="-1">3</span><span class="flatpickr-day today" aria-label="July 4, 2023"
                        aria-current="date" tabindex="-1">4</span><span class="flatpickr-day"
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
</div>
