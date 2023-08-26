<!--begin::Feeds Widget 2-->
<div class="card mb-5 mb-xxl-8" style="@if ($item->type === 'confidential') border: 1px solid #ff0707; @endif">
    {{--  --}}
    <!--begin::Body-->
    <div class="card-body pb-0">
        <!--begin::Header-->
        <div class="d-flex align-items-center mb-5">
            <!--begin::User-->
            <div class="d-flex align-items-center  flex-grow-1 justify-content-between">
                <!--begin::Avatar-->
                <a href="{{ route('manager.profile', auth()->user()->id) }}"
                    class="d-flex align-items-center  flex-grow-1">
                    <div class="symbol symbol-45px me-5">
                        <img src="{{ asset($item->creator->avatar ?? 'assets/media/avatars/300-1.jpg') }}"
                            alt="">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column">
                        <div class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $item->creator->full_name }}</div>
                        <span class="text-gray-400 fw-bold">{{ $item->created_at }}</span>
                    </div>
                </a>
                <!--end::Info-->
                <div>
                    @if ($item->type === App\Enums\CommentTypesEnum::QUESTION->value)
                        <p>
                            <i style="font-weight: bold !important;color:#0b44ff;font-size: 24px"
                                class="fa fa-question-circle" aria-hidden="true"></i>
                        </p>
                    @endif

                    @if ($item->type === App\Enums\CommentTypesEnum::REPLY->value)
                        <p>
                            <i style="font-weight: bold !important;color:#0b44ff;font-size: 24px" class="fa fa-reply"
                                aria-hidden="true"></i>
                        </p>
                    @endif


                </div>

            </div>
            <!--end::User-->
            <!--begin::Menu-->
            {{-- <div class="my-0">
                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-category fs-6">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                </button>
                <!--begin::Menu 2-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mb-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Ticket</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Customer</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                        <!--begin::Menu item-->
                        <a href="#" class="menu-link px-3">
                            <span class="menu-title">New Group</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--end::Menu item-->
                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Admin Group</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Staff Group</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Member Group</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu sub-->
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">New Contact</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu separator-->
                    <div class="separator mt-3 opacity-75"></div>
                    <!--end::Menu separator-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content px-3 py-3">
                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu 2-->
            </div> --}}
            <!--end::Menu-->
        </div>
        <!--end::Header-->
        <!--begin::Post-->
        <div class="mb-5">
            <!--begin::Text-->
            @if ($item->type === 'reply')
                <p style="font-weight: bold !important;color:#0b44ff;">@ {{ $item->reply->full_name }}</p>
            @endif

            <div class="text-gray-800 fw-normal mb-5">{!! nl2br($item->body) !!}</div>

        </div>

    </div>
    <!--end::Body-->
</div>
<!--end::Feeds Widget 2-->
