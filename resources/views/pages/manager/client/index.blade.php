<x-default-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
        <!--begin::Col-->
        @php
            $cols = ['All', 'Assigned', 'Submitted', 'Canceled', 'Order Ratio', 'Balances'];
            $data = ['Aysha', '18', '2', '2', '5', '', ''];
            $CompanyName = 'Bahmanyar';
            $titleTabel = 'Clients';
            $address = 'Addclient';
            $add = 'New Client';
        @endphp

        <div class="card mb-5   mb-xxl-10 ">
            <!--begin::Card header-->


            <div class="card-header">
                <!--begin::Heading-->
                <div class="card-title">
                    <h3>{{ $titleTabel }}</h3>
                </div>
                <!--end::Heading-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">


                    {{--              
                    <div class="my-1 me-4">
                        <!--begin::Select-->
                        <select class="form-select form-select-sm form-select-solid w-125px" data-control="select2"
                            data-placeholder="Select Hours" data-hide-search="true">
                            <option value="1" selected="selected">Last 7 Days</option>
                            <option value="2">Last 30 Days</option>
                            <option value="3">Last year</option>
                        </select>
                        <!--end::Select-->
                    </div> --}}


                    <div class="d-flex justify-content-end m-3">
                        <a href="{{ route('manager.clients.create') }}"
                            class="btn btn-sm btn-primary my-1 btn-success">{{ $add }}</a>

                    </div>
                </div>



                <!--end::Toolbar-->
            </div>
            <div class="">

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
                                            <span class="required">Name</span>
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
                                            placeholder="Enter Client" name="name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row fv-plugins-icon-container">
                                        <!--end::Label-->
                                        <label class=" fs-5 fw-semibold mb-2">Order</label>
                                        <select class="form-select  form-select-solid" data-control="select2"
                                            data-placeholder="Order" data-hide-search="true" name="order">
                                            <option value=""> Select an Option</option>
                                            <option value="asc"> ASC</option>
                                            <option value="desc"> DESC</option>
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
        
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Reg. Date From</label>
                                        <div class="input-group">
                                            <input
                                                class="form-control form-control-solid rounded rounded-end-0 flatpickr-input"
                                                placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr"
                                                type="date" name="from_created_at">

                                        </div>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">Reg. Date To</label>
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
                            @foreach ($result as $key => $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('manager.profile', $user->id) }}"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                    <td>
                                        <a href="#"
                                            class="text-hover-primary text-gray-600">{{ $user->abbreviation }}</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>

                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                    {{-- <p style="margin-left: 30px">{{ $CompanyName }}</p> --}}

                </div>

            </div>
            <!--end::Card body-->

        </div>


        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-default-layout>
