<div class="elementToFadeInAndOut2">
    <!--begin::Table container-->
    <div class="table-responsive">

        <div class="d-flex align-items-center justify-content-between mb-5">
            <!--begin::Heading-->
            @include('partials/accounting/filter/_search-filter')
            <!--end::Heading-->
        </div>
        <div class="separator separator-dashed mb-5"></div>
        <!--begin::Table-->
        @include('partials/accounting/_table', [($table = $tables['Users With Credit In Hand'])])
        <!--end::Table-->
    </div>
    <!--end::Table container-->
</div>
