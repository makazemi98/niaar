<!--begin::Chart widget 36-->
<div class="card card-flush overflow-hidden h-lg-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-dark">Inquiries Statistics</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" data-kt-daterangepicker-range="today"
                class="btn btn-sm btn-light d-flex align-items-center px-4">
                <!--begin::Display range-->
                <div class="text-gray-600 fw-bold">Loading date range...</div>
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
            <!--end::Daterangepicker-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <div class="separator border-gray-200 mt-5"></div>
    <!--begin::Card body-->
    <div class="card-body row g-5">
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">open</div>
            <!--end::Label-->
            <!--begin::Number-->
            <div class="fw-semibold fs-6 text-gray-400">
                {{ $statusGroup[\App\Enums\InquiryStatusesEnum::OPEN->value]->count() }}
            </div>
            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">assigned</div>
            <!--end::Label-->
            <!--begin::Number-->

            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::ASSIGNED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::ASSIGNED->value]->count() : 0 }}
            </div>

            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">on progress</div>
            <!--end::Label-->
            <!--begin::Number-->
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::ON_PROGRESS->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::ON_PROGRESS->value]->count() : 0 }}
            </div>
            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">quotation prepared</div>
            <!--end::Label-->
            <!--begin::Number-->
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::QUOTATION_PREPARED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::QUOTATION_PREPARED->value]->count() : 0 }}
            </div>

            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">quoted</div>
            <!--end::Label-->
            <!--begin::Number-->
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::QUOTED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::QUOTED->value]->count() : 0 }}
            </div>
            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">rejected</div>
            <!--end::Label-->
            <!--begin::Number-->
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::REJECTED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::REJECTED->value]->count() : 0 }}
            </div>
            <!--end::Number-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">approved</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::APPROVED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::APPROVED->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">paid</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::PAID->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::PAID->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">ordered</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::ORDERED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::ORDERED->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">supplier paid</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::SUPPLIER_PAID->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::SUPPLIER_PAID->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">delivered</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::DELIVERED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::DELIVERED->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div
            class="d-flex flex-column justify-content-center align-items-center col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded py-5">
            <!--begin::Label-->
            <div class="fs-2 fw-bold counted text-center">tax submitted</div>
            <div class="fw-semibold fs-6 text-gray-400">
                {{ isset($statusGroup[\App\Enums\InquiryStatusesEnum::TAX_SUBMITTED->value]) ? $statusGroup[\App\Enums\InquiryStatusesEnum::TAX_SUBMITTED->value]->count() : 0 }}
            </div>
        </div>
        <!--end::Col-->


        <!--begin::Row-->
        {{-- <div class="row g-5">
            <!--begin::Col-->
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
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
            <div class="col-6 col-sm-4 col-md-3 border border-gray-300 border-dashed rounded">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <!--begin::Section-->
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">pezhman</span>
                            <!--end::Number-->
                            <!--begin::Number-->
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">0</span>
                            <!--end::Number-->
                        </div>
                        <!--end::Section-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
        </div> --}}
        <!--end::Row-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Chart widget 36-->
