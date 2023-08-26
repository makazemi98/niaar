<x-default-layout>
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
        <div class="col-12 col-md-6">
            @include('partials/widgets/charts/_widget-1', ['title' => 'Monthly Profit / Month'])
        </div>
        <div class="col-12 col-md-6">
            @include('partials/widgets/charts/_widget-1', ['title' => 'Monthly Inquiries / Month'])
        </div>
        <div class="col-12 col-md-6">
            @include('partials/widgets/charts/_widget-1', ['title' => 'Monthly Customers / Month'])
        </div>
        <div class="col-12 col-md-6">
            @include('partials/widgets/charts/_widget-1', ['title' => 'Monthly Orders / Month'])
        </div>
    </div>
</x-default-layout>
