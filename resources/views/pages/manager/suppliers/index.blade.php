<x-default-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
        <!--begin::Col-->
        @php
            $cols = ['company', 'Product category', 'contact detail', 'customer name'];
            $data = $suppliers;
            $CompanyName = '';
            $titleTabel = 'Suppliers';
            $add = ' New Supplier ';
            $address = 'addsuppliers';
        @endphp


        <div class="card mb-5   mb-xxl-10 ">
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
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter Name" name="target_title">
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
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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


                    <div class="card-title">
                        <!--begin::Search-->

                        <div data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"
                            class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13" placeholder="Search"
                                style="padding: 0.5rem 1rem">
                        </div>
                        <!--end::Search-->
                    </div>

                    <div class="my-1 me-4">
                        <!--begin::Select-->
                        <select class="form-select form-select-sm form-select-solid w-125px" data-control="select2"
                            data-placeholder="Select Hours" data-hide-search="true">
                            <option value="1" selected="selected">Last 7 Days</option>
                            <option value="2">Last 30 Days</option>
                            <option value="3">Last year</option>
                        </select>
                        <!--end::Select-->
                    </div>


                    <div class="d-flex justify-content-end m-3">
                        <a href="{{ route('admin.supplier.create') }}"
                            class="btn btn-sm btn-primary my-1 btn-success">{{ $add }}</a>

                    </div>
                </div>

                <!--end::Toolbar-->
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
                                        <div class="text-hover-primary text-gray-600">{{ $value->company }}</div>
                                    </td>
                                    <td>
                                        <div class="text-hover-primary text-gray-600">{{ $value->company }}</div>
                                    </td>
                                    <td>
                                        <div class="text-hover-primary text-gray-600">{{ $value->company }}</div>
                                    </td>
                                    <td>
                                        <div class="text-hover-primary text-gray-600">{{ $value->company }}</div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>

                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                    {{-- <p style="margin-left: 30px">{{ $CompanyName }}</p> --}}

                </div>
                <!--end::Table wrapper-->
                {{-- <div class="row my-5">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous" id="kt_table_users_previous"><a
                                        href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0"
                                        class="page-link"><i class="previous"></i></a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_table_users" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="kt_table_users" data-dt-idx="2" tabindex="0"
                                        class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#"
                                        aria-controls="kt_table_users" data-dt-idx="3" tabindex="0"
                                        class="page-link">3</a></li>
                                <li class="paginate_button page-item next" id="kt_table_users_next"><a href="#"
                                        aria-controls="kt_table_users" data-dt-idx="4" tabindex="0"
                                        class="page-link"><i class="next"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}

            </div>
            <!--end::Card body-->

        </div>


        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-default-layout>
