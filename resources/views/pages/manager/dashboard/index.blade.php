<x-default-layout>
    <div class="row g-5 g-xl-10 mt-5 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-12 mb-5">
            @include('partials/widgets/cards/_widget-36')
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Average Response Time</h3>
                    <hr>
                    <div>
                        <h6> Accountant: <span class="font-weight-bold"> 0 days - 6 hours - 8 minutes</span></h6>
                        <h6> Team Leader: <span class="font-weight-bold"> 0 days - 6 hours - 8 minutes</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            @include('partials/widgets/tables/_procurements-activities')
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            @include('partials/widgets/tables/_clients-status')
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            @include('partials/widgets/tables/_last-inquiries')
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12">
            @include('partials/widgets/tables/_reminders')
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
