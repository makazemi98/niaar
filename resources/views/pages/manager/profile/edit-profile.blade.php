<x-default-layout>
    @php
        $rule = 'manager';
        $data = [
            'ruleFirstName' => 'pezhman',
            'ruleLastName' => 'latifi',
            'avatar' => '../../assets/media/svg/avatars/blank.svg',
            'contactPhone' => ['number' => '0443276454935', 'state' => 'verified'],
            'emailAddress' => ['email' => 'pouriya_n@yahoo.com', 'state' => 'verified'],
            'companyName' => 'BZR',
            'companyPhone' => ['number' => '0443276454935', 'state' => 'verified'],
            'contactPhone2' => ['number' => '0443276454935', 'state' => 'verified'],
            'companyAbb' => 'BZR',
            'cofidentialNote' => 'pezhman',
            'shippingAddress' => 'Iran, Qazvin',
        ];
        $shipping = [
            'shippingAdd1' => 'qazvin',
            'shippingAdd2' => 'qazvin',
            'city' => 'qazvin',
            'postCode' => 'qazvin',
            'state' => 'qazvin',
            'country' => 'Iran',
        ];
    @endphp
    <!--begin::Row-->
    <div class="container mt-5">

        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            @include('partials/profile/_edit-profile', [$rule, $data, $shipping])
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
