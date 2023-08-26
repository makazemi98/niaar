<x-default-layout>

    @php
        $rule = 'manager';
        $table = [
            'cols' => ['Hand Over Date', 'Captain Name', 'Agent Name', 'Agent No', 'Consignees', 'No of Boxes', 'Delivery receipt', 'Volume', 'status'],
            'data' => [['13 Aug 22', 'Ahmad', 'Ms. Zarei', '0582347770', 'JLL . ITC , NOV. ARS. PRN', '18', '', '2.00', 'Handed to Capt'], ['13 Aug 22', 'Ahmad', 'Ms. Zarei', '0582347770', 'JLL . ITC , NOV. ARS. PRN', '18', '', '2.00', 'Handed to Capt']],
        ];
    @endphp

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        @include('partials/shipping/_shipping', [$rule, $table])
    </div>
</x-default-layout>
