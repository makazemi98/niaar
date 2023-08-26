<x-default-layout>

    @php
        $rule = 'manager';
        $table = [
            'Total Boxes' => '2',
            'Total Volume' => '0.535',
            'cols' => ['Sign', 'Client', 'INQ No.', 'Content', 'Height', 'Width', 'Length', 'Volume'],
            'data' => [['1', 'JLL', 'JLL', 'N2155', 'Electronics', '23 ', '23', '23', '0.124'], ['2', 'ITC', 'ITC', 'Others', 'personal', '34 ', '254', '23', '0.411']],
        ];
    @endphp
    <div class="container">

        <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-2">
            @include('partials/shipping/_add-shipping-form')
        </div>
        {{-- <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            @include('partials/widgets/cards/_add-file')
        </div> --}}

        @isset($shipping)
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                @include('partials/shipping/add-shipping/_comment-shipping')
            </div>
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                @include('partials/shipping/add-shipping/_table-inq-shipping')
            </div>
        @endisset

        <!--end::Row-->
        {{-- <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="./shipping" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div> --}}

    </div>
</x-default-layout>
