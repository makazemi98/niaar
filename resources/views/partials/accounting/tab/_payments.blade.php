<div class="elementToFadeInAndOut2">
    <!--begin::Table container-->
    <div class="table-responsive">
        <div class="col-12 mb-5">
            @foreach ($info['Payments'] as $key => $value)
                <div class="d-flex align-items-center flex-wrap mb-1">
                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">{{ $key }}:</a>
                    <span class="text-gray-400 fw-semibold fs-7">{{ $value }}</span>
                </div>
            @endforeach
        </div>
        <div class="separator separator-dashed mb-5"></div>

        <div class="d-flex align-items-center justify-content-end m-0">
            <!--begin::Heading-->
            <div class="collapsible py-3 toggle mb-0 me-3 active" data-bs-toggle="collapse" data-bs-target="#kt_job_5_2"
                aria-expanded="true">
                <!--begin::Action-->
                <h4 class="text-gray-700 fw-bold cursor-pointer btn btn-light fs-6 px-8 py-4 mb-0 fs-6 px-8 py-4">
                    Filter</h4>
                <!--end::Action-->
            </div>
            <!--begin::Action-->
            @include('partials/accounting/action-buttons/_new-payments')
            <!--end::Action-->
            <!--end::Heading-->
        </div>

        <div class="m-0">
            <!--begin::Body-->
            <div id="kt_job_5_2" class="fs-6 ms-1 collapse " style="">
                <!--begin::filter content-->
                @include('partials/accounting/filter/_filter-data')
                <!--end::filter content-->
            </div>
            <div class="separator separator-dashed my-5"></div>

        </div>
        <!--begin::Table-->
        @include('partials/accounting/_table', [($table = $tables['Payments'])])
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>
