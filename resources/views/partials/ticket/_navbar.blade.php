<div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <!--begin: Pic-->

            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            @if ($inquiry->isCanceled())
                                <div class="text-danger  fs-2 fw-bold me-1">

                                    <i class="ki-duotone  ki-tablet-delete text-danger" style="font-size: 40px;">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>

                                </div>
                            @endif
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $name }}
                            </a>

                            @if ($inquiry->isCanceled())
                                <div class="text-gray-600  fs-2 fw-bold me-1">
                                    -
                                </div>
                                <div class="text-danger  fs-2 fw-bold me-1">
                                    Canceled
                                </div>
                            @else
                                <a href="#">
                                    <i class="ki-duotone ki-verify fs-1 text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            @endif


                        </div>

                        <!--end::Name-->
                        <!--begin::Info-->

                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                    <!--begin::Actions-->
                    <div class="d-flex my-4">
                        <a href="{{ route('manager.profile', $client->id) }}"
                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>{{ $client->full_name }}</a>

                        <!--end::Menu-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            {{-- @foreach ($listItems as $listItem)
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    @if ($listItem == 'LOG')
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains(request()->url(), 'ticket') }}"
                            href="{{ '/' . $rule . '/ticket' }}">{{ $listItem }}</a>
                    @else
                        <a class="nav-link text-active-primary ms-0 me-10 py-5"
                            href="{{ '/' . $rule . '/ticket/' . strtolower($listItem) }}">{{ $listItem }}</a>
                    @endif
                </li>
                <!--end::Nav item-->
            @endforeach --}}


            @php
                $url = request()->url();
            @endphp

            <!--begin::Nav item-->

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains($url, 'log') ? 'active' : '' }}"
                    href="{{ route('inquiries.log', [$inquiry->id]) }}">Log</a>
            </li>
            @can('tab:inquiry_docs')
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains($url, 'docs') ? 'active' : '' }}"
                        href="{{ route('inquiries.docs', [$inquiry->id]) }}">Docs</a>
                </li>
            @endcan

            @can('tab:inquiry_confidential')
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains($url, 'confidential') ? 'active' : '' }}"
                        href="{{ route('inquiries.confidential', [$inquiry->id]) }}">Confidential</a>
                </li>
            @endcan

            @can('tab:inquiry_calculation')
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains($url, 'calculation') ? 'active' : '' }}"
                        href="{{ route('inquiries.calculation', [$inquiry->id]) }}">Calculation</a>
                </li>
            @endcan


            @unless ($inquiry->isCanceled())

                @can('tab:inquiry_reminder')
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ str_contains($url, 'reminder') ? 'active' : '' }}"
                            href="{{ route('inquiries.reminder', [$inquiry->id]) }}">Reminder</a>
                    </li>
                @endcan
            @endunless






            <!--end::Nav item-->

            {{-- <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="/manager/ticket">LOG</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="/manager/ticket/docs">DOCS</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5"
                    href="/manager/ticket/confidential">CONFIDENTIAL</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5"
                    href="/manager/ticket/calculation">CALCULATION</a>
            </li>
            <!--end::Nav item--> --}}
        </ul>
        <!--begin::Navs-->
    </div>
</div>
