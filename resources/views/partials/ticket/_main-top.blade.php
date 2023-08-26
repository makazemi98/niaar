<div class="d-flex flex-column flex-row-fluid bg-white p-5 mb-5 mb-xxl-8 col-12 rounded">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mb-1">
        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold me-2">TITLE</a>
        <span class="text-gray-600 fw-semibold fs-6">{{ $inquiry->title }}</span>
    </div>
    <!--end::Info-->
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mb-1">
        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold me-2">INQ NO</a>
        <span class="text-gray-600 fw-semibold fs-6">{{ 'NI' . $inquiry->getInquiryNum() }}</span>
    </div>
    <!--end::Info-->
</div>
<div class="d-flex flex-column flex-row-fluid bg-white p-5 mb-5 mb-xxl-8 col-12 rounded">
    
    <div class="d-flex align-items-center flex-wrap mb-1">
        <span class="text-gray-600 fw-semibold fs-4">{!! nl2br($inquiry->description) !!}</span>
        <span class="text-gray-600 fw-semibold fs-4"></span>
    </div>
    {{-- <div class="d-flex align-items-center flex-wrap mb-1">
        <span class="text-gray-600 fw-semibold fs-4">MTL 4573 OR MTL 4575</span>
        <span class="text-gray-600 fw-semibold fs-4"></span>
    </div>
    <div class="d-flex align-items-center flex-wrap mb-1">
        <span class="text-gray-600 fw-semibold fs-4">Qty : </span>
        <span class="text-gray-600 fw-semibold fs-4">60 pcs </span>
    </div>
    <div class="d-flex align-items-center flex-wrap mb-1">
        <span class="text-gray-600 fw-semibold fs-4">European brand preferably</span>
        <span class="text-gray-600 fw-semibold fs-4"></span>
    </div> --}}
    {{-- <div class="d-flex flex-column mb-1">
                        <span class="text-gray-600 fw-semibold fs-4">MTL 4573 OR MTL 4575</span>
                        <span class="text-gray-600 fw-semibold fs-4">Qty : 60 pcs</span>
                        <span class="text-gray-600 fw-semibold fs-4">European brand preferably</span>
                    </div> --}}
    <!--end::Info-->
</div>
