<x-default-layout>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        @php
            $url = request()->url();
            $name = 'NI' . $inquiry->getInquiryNum();
            $client = $inquiry->client;
            $rule = auth()->user()->role;
            $fullname = auth()->user()->full_name;
            $avatar = auth()->user()->avatar ?? '../../../assets/media/avatars/blank.png';
            $listItems = ['LOG', 'DOCS', 'CONFIDENTIAL', 'CALCULATION'];
            
            $INQ = 'NI' . $inquiry->getInquiryNum();
            $sidebar = $status;
            // $comment = [
            //     [
            //         'src' => '../assets/media/avatars/300-23.jpg',
            //         'name' => 'Nick Logan',
            //         'date' => '22. March . 2022',
            //         'content' => 'Outlines keep you honest. They stop you from indulging in poorly
//         thought-out metaphors about driving and keep you focused on the overall structure of your post',
            //         'like' => '15',
            //         'reply' => '2',
            
            //     ],
            // ];
            $comment = $inquiry->comments;
            $tableCal = [
                'Calculation' => [
                    'title' => 'Calculation',
                    'cols' => ['INQ No', 'Customer', 'Quantity', 'Supplier', 'Buying Price', 'Buying Currency', 'Buying Total Price (AED)', 'Quoted Price', 'Quoted Currency', 'Quoted Price AED', 'Actual Ordered Price AED', 'Remark'],
                    'data' => [['1', 'NI5440', 'ITC', '', '', '', '', '', '', '', '', '', '', '']],
                ],
                'FutureDues' => [
                    'title' => 'Future Dues',
                    'cols' => ['INQ No', 'Customer', 'Desc', 'Quantity', 'Bill To', 'Payee Name', 'Payable Amount', 'Receivable Amount', 'Currency', 'Due Date', 'Paid'],
                    'data' => [['1', 'NI5440', 'ITC', '', '', '', '', '', '', '', '', '']],
                ],
                'Extra Charges' => [
                    'title' => 'Extra Charges',
                    'cols' => ['INQ No', 'Customer', 'Desc', 'Quantity', 'Supplier', 'Buying Price', 'Buying Currency', 'Buying Total Price (AED)', 'Quoted Price', 'Quoted Currency', 'Total Quoted AED Assumed Proﬁt', 'Actual Ordered', 'Price'],
                    'data' => [['1', 'NI5440', 'ITC', '', '', '', '', '', '', '', '', '', '', '']],
                ],
            ];
            $profit = ['Assumed Proﬁt' => 'Total Quoted - Total Purchasing', 'Actual Proﬁt' => 'TotalActual ordered - Total purchasing'];
        @endphp


        <div class="col-12 p-0 pt-5">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Navbar-->
                    @include('partials/ticket/_navbar', [$name, $rule, $listItems])
                    <!--end::Navbar-->

                    <!--begin::Row-->
                    <div class="row g-5 g-xxl-8">
                        {{-- @php
                            $url = request()->url();
                        @endphp --}}
                        <!--begin::Col-->
                        <div class="col-11 col-md-8">
                            @include('partials.errors')

                            @if (str_contains($url, 'docs'))
                                @can('tab:inquiry_docs')
                                    @include('partials/ticket/_table-file')
                                @endcan
                            @elseif(str_contains($url, 'confidential'))
                                @can('tab:inquiry_confidential')
                                    @include('partials/ticket/_table-file')
                                @endcan
                            @elseif (str_contains($url, 'calculation'))
                                @can('tab:inquiry_calculation')
                                    @include('partials/ticket/calculation/_top-card')
                                    @include('partials/ticket/calculation/_table', [
                                        ($table = $tableCal['Calculation']),
                                    ])
                                    @include('partials/ticket/calculation/_profit-card', [$profit])
                                    @include('partials/ticket/futureDues/_table', [
                                        ($table = $tableCal['FutureDues']),
                                    ])
                                    @include('partials/ticket/calculation/_table', [
                                        ($table = $tableCal['Extra Charges']),
                                    ])
                                @endcan
                            @elseif (str_contains($url, 'reminder'))
                                @can('tab:inquiry_reminder')
                                    @include('partials/ticket/_reminder')
                                @endcan
                            @else
                                @include('partials/ticket/_main-top')
                                {{-- show of list comments --}}
                                @foreach ($comment as $item)
                                    @include('partials/ticket/_comment')
                                @endforeach
                                {{-- add-comment --}}
                                @include('partials/ticket/_add-comment', [$name, $rule, $avatar])
                            @endif
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="d-none d-md-block col-md-4">
                            @include('partials/ticket/_sidebar', [$INQ, $sidebar, $url, $rule])
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="d-md-none col-1">
                            <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_app_ticket_sidebar_toggle">
                                <i class="ki-duotone ki-element-4 fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Content container-->
            </div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
</x-default-layout>


{{-- <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_ticket_sidebar_toggle">
    <i class="ki-duotone ki-element-4 fs-1">
        <span class="path1"></span>
        <span class="path2"></span>
    </i>
</div> --}}


<div class="app-header-menu app-header-mobile-drawer align-items-stretch drawer drawer-end "
    id="kt_app_ticket_sidebar_toggle" data-kt-drawer="true" data-kt-drawer-name="app-ticket-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_ticket_sidebar_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: ''}"
    style="width: 250px !important;">
    <!--begin::Menu-->
    <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
        id="kt_app_ticket_sidebar" data-kt-menu="true">
        @include('partials/ticket/_sidebar', [$INQ, $sidebar])
    </div>
    <!--end::Menu-->
</div>
{{-- <div style="z-index: 109;" class="drawer-overlay"></div> --}}
