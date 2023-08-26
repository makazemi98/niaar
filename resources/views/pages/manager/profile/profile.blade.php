<x-default-layout>
    @php
        $rule = $user->role;
        $data = [
            'ruleName' => $user->full_name,
            'avatar' => asset($user->avatar) ?? '../../assets/media/avatars/blank.png',
            'contactPhone' => ['number' => $user->phone ?? ' - ', 'state' => 'verified'],
            'contactEmail' => ['email' => $user->email, 'state' => 'verified'],
            'companyName' => $user->company_name ?? ' - ',
            'companyPhone' => ['number' => $user->company_number ?? ' - ', 'state' => 'verified'],
            'contactPhone2' => ['number' => $user->contact_name_2 ?? ' - ', 'state' => 'verified'],
            'companyAbb' => $user->company_abbreviation ?? ' - ',
            'cofidentialNote' => $user->company_abbreviation ?? ' - ',
            'shippingAddress' => ' - ',
        ];
    @endphp
    <!--begin::Row-->
    <div class="container">

        <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
            @include('partials/profile/_profile', [$rule, $data])
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
