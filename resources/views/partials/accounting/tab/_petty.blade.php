<div class="elementToFadeInAndOut2">
    <!--begin::Table container-->
    <div class="table-responsive">

        <div class="col-12 mb-5">
            @foreach ($info['Petty'] as $key => $value)
                <div class="d-flex align-items-center flex-wrap mb-1">
                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">{{ $key }}:</a>
                    <span class="text-gray-400 fw-semibold fs-7">{{ $value }}</span>
                </div>
            @endforeach
        </div>
        <div class="separator separator-dashed mb-5"></div>

        <div class="d-flex align-items-center justify-content-between mb-5">
            <!--begin::Heading-->
            @include('partials/accounting/filter/_search-filter')
            <!--begin::Action-->
            @include('partials/accounting/action-buttons/_new-petty')
            <!--end::Action-->
            <!--end::Heading-->
        </div>

        <div class="separator separator-dashed mb-5"></div>

        <!--begin::Table-->
        @include('partials/accounting/_table', [($table = $tables['Petty'])])
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>
