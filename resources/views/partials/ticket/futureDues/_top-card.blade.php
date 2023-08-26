<div class="d-flex flex-column flex-row-fluid bg-white p-5 mb-5 mb-xxl-8 col-12 rounded">
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mb-5">
        <a href="#" class="text-gray-900 text-hover-primary fs-4 fw-bold me-2">Conﬁdential Notes for {{$client->full_name}}</a>
        <span class="text-gray-600 fw-semibold fs-6"></span>
    </div>
    <!--end::Info-->
    <!--begin::Info-->
    
    <div class="mb-5">
        <div class="text-gray-800 fw-normal mb-5">{!! nl2br($client->full_name) !!}</div>
    </div>
</div>
