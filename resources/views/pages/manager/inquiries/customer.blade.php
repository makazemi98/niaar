<x-default-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        @php
            $cols = ['Inquiry title', 'Inquiry number', 'Inq Date', 'Latest update', 'Status', 'Team member'];
            $data = ['Valve fr … ',  '2440',  '15.02.23',  '17.03.22', 'ordered', 'Aysha'];
            $CompanyName = '';
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
