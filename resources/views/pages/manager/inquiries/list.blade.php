<x-default-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
        <!--begin::Col-->

        @php
            $cols = ['Client name', 'Inquiry title', 'Inquiry number', 'Open Date', 'Status','Canceled', 'Team member'];
            $data = $inquiries;
            $CompanyName = 'Bahmanyar';
            $titleTabel='Inquiry List';
            $add='NEW INQUIRY';
        $address='AddInquiries';

        @endphp

        @include('partials/widgets/tables/_widget-17', [
            $cols,
            $data,
            $CompanyName,
            $titleTabel,
            $add,
            $address
        ])


        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-default-layout>