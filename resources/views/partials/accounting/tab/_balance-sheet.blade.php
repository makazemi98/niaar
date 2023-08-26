<div class="elementToFadeInAndOut2">
    <div class="table-responsive">

        <div class="col-12 mb-5">
            @foreach ($info['Balance Sheet'] as $key => $value)
                <div class="d-flex align-items-center flex-wrap mb-1">
                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">{{ $key }}:</a>
                    <span class="text-gray-400 fw-semibold fs-7">{{ $value }}</span>
                </div>
            @endforeach
        </div>
        <div class="separator separator-dashed mb-5"></div>

        <div class="d-flex align-items-center justify-content-end m-0">
            <div class="collapsible py-3 toggle mb-0 me-3 active" data-bs-toggle="collapse" data-bs-target="#kt_job_5_1"
                aria-expanded="true">
                <h4 class="text-gray-700 fw-bold cursor-pointer btn btn-light fs-6 px-8 py-4 mb-0 fs-6 px-8 py-4">
                    Filter</h4>
            </div>
            @include('partials/accounting/action-buttons/_new-transaction')
        </div>
        <div class="m-0">
            <div id="kt_job_5_1" class="fs-6 ms-1 collapse " style="">
                @include('partials/accounting/filter/_filter-data')
            </div>
            <div class="separator separator-dashed my-5"></div>

        </div>
        @php
            $table = $tables['Balance Sheet'];
        @endphp
        <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
            <thead>
                <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                    @foreach ($table['cols'] as $item)
                        <th class="min-w-125px">{{ $item }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($table['data'] as $row)
                    <tr>
                        @foreach ($row as $item)
                            @if (is_array($item))
                                <td class="pe-0 d-flex flex-column align-items-center">
                                    @foreach ($item as $key => $value)
                                        <div class="d-flex flex-column align-items-center">
                                            <span
                                                class="text-gray-800 fw-bold text-hover-primary d-block fs-6 border-bottom border-light">{{ $key }}:
                                            </span>
                                            <span
                                                class="text-gray-800 fw-bold text-hover-primary d-block fs-6">{{ $value }}</span>
                                        </div>
                                    @endforeach
                                </td>
                            @else
                                <td class="pe-0">
                                    <span
                                        class="text-gray-800 fw-bold text-hover-primary d-block fs-6">{{ $item }}</span>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
