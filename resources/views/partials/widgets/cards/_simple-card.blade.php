<div class="d-flex flex-column align-items-center border border-gray-300 border-dashed rounded min-w-100px w-100 pt-2 mb-5 bg-opacity-25 "
    style="background-color: #ccc9ee85 !important;border: 1px solid #776deb91 !important;">
    <!--begin::title-->
    <span class="fs-6 text-gray-700 fw-bold py-3" style="text-transform: capitalize;">{{ str_replace('_', ' ', strval($item['name'])) }}</span>
    
    <!--end::title-->
    <!--begin::content-->
    <div class="fw-semibold text-gray-600 py-5">{{ $item['created_at'] }}</div>
    <!--end::content-->
    <div class="col-12  d-flex justify-content-start align-items-center p-5 bg-light rounded-bottom">
        <div class=" fw-semibold text-gray-600 d-block fs-8" style="margin-right: 10px;">By:</div>
        <div class="text-center fw-bold text-gray-800 text-hover-primary fs-7">{{ $item['creator']->full_name }}</div>
    </div>
</div>


{{-- bg-opacity-75 bg-{{ $color[$index] }} --}}
