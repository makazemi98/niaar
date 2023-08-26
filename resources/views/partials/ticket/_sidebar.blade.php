<!--begin::Sidebar-->
<div class="flex-column flex-lg-row-auto mb-10 order-1 order-lg-2">
    <!--begin::Card-->
    <div class="card card-flush p-3 p-md-6  mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary"
        data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" style="">
        {{-- data-kt-sticky-zindex="95" --}}
        <!--begin::Card header-->
        <div class="card-header justify-content-center rounded bg-light mb-5">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="text-center">{{ $INQ }}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        @php
            $color = ['success', 'warning', 'primary', 'info', 'danger'];
        @endphp
        <div class="card-body px-3 pt-0 mt-5 fs-6">
            @foreach ($sidebar as $item)
                @include('partials/widgets/cards/_simple-card', [
                    $item['name'],
                    $item['created_at'],
                    $item['by'],
                    ($index = $loop->index),
                ])
            @endforeach
            <!--begin::Section-->
            {{-- @include('partials/widgets/cards/_simple-card') --}}
            <!--end::Section-->

            <!--begin::Section Actions-->


            @if (
                !str_contains($url, 'docs') &&
                    !str_contains($url, 'confidential') &&
                    !str_contains($url, 'calculation') &&
                    !str_contains($url, 'reminder'))


                {{-- @can('action:inquiry_docs_download')
                @endcan --}}




                @if ($inquiry->isCanceled())
                    @can('action:inquiry_comment_add_confidential')
                        @include('partials/ticket/action-button/_confidential')
                    @endcan
                @else
                    @can('action:inquiry_cancel')
                        @include('partials/ticket/action-button/_canceled')
                    @endcan
                    @can('action:inquiry_assign')
                        @include('partials/ticket/action-button/_assign')
                    @endcan
                    @if ($inquiry->stage === \App\Enums\InquiryStatusesEnum::BY_CLIENT_OPEN->value)
                        @can('action:inquiry_open')
                            @include('partials/ticket/action-button/_change2open')
                        @endcan
                    @else
                        @if ($inquiry->stage !== \App\Enums\InquiryStatusesEnum::OPEN->value)
                            @hasrole('procurement')
                                @if ($inquiry->stage === \App\Enums\InquiryStatusesEnum::ASSIGNED->value)
                                    @include('partials/ticket/action-button/_start')
                                @endif
                            @endhasrole
                            @can('action:inquiry_comment_add_confidential')
                                @include('partials/ticket/action-button/_confidential')
                            @endcan
                            @can('action:inquiry_comment_add_question')
                                @include('partials/ticket/action-button/_question')
                            @endcan

                            @can('action:inquiry_docs_download')
                                @include('partials/ticket/action-button/_status-update')
                            @endcan
                            @can('action:inquiry_re_assign')
                                @include('partials/ticket/action-button/_reAssign')
                            @endcan
                            @can('action:inquiry_reminder')
                                @include('partials/ticket/action-button/_setReminder')
                            @endcan



                            @if ($inquiry->stage !== \App\Enums\InquiryStatusesEnum::ASSIGNED->value)
                                @hasrole('manager|team-leader|procurement')
                                    @if ($inquiry->stage === \App\Enums\InquiryStatusesEnum::ON_PROGRESS->value)
                                        @include('partials/ticket/action-button/_supplier')
                                    @endif
                                @endhasrole

                                @hasrole('manager|team-leader')
                                    @if ($inquiry->stage === \App\Enums\InquiryStatusesEnum::QUOTATION_PREPARED->value)
                                        @include('partials/ticket/action-button/_accept')
                                        @include('partials/ticket/action-button/_decline')
                                    @endif

                                    @if ($inquiry->reasign_id)
                                        @include('partials/ticket/action-button/reassign/_accept')
                                        @include('partials/ticket/action-button/reassign/_decline')
                                    @endif
                                @endhasrole

                                @if ($permissionToAnswer)
                                    @include('partials/ticket/action-button/_answer')
                                @endif


                                {{-- @include('partials/ticket/action-button/_approve')
                    @include('partials/ticket/action-button/_decline') --}}
                            @endif
                        @endif
                    @endif
                @endif



            @endif



            {{-- @permissioncontrol('action:inquiry_start')
                @include('partials/ticket/action-button/_start')
            @endpermissioncontrol('action:inquiry_start') --}}


            {{-- @if ($rule == 'manager' || $rule == 'team-lead')
                    @include('partials/ticket/action-button/_reAssign')
                    @include('partials/ticket/action-button/_status-update')
                    @include('partials/ticket/action-button/_supplier')
                    @include('partials/ticket/action-button/_setReminder')
                @elseif($rule == 'procurement')
                    @include('partials/ticket/action-button/_decline')
                    @include('partials/ticket/action-button/_approve')
                    @include('partials/ticket/action-button/_reAssign')
                    @include('partials/ticket/action-button/_status-update')
                    @include('partials/ticket/action-button/_supplier')
                    @include('partials/ticket/action-button/_setReminder')
                @elseif($rule == 'accountant')
                    @include('partials/ticket/action-button/_accept')
                    @include('partials/ticket/action-button/_decline')
                    @include('partials/ticket/action-button/_status-update')
                    @include('partials/ticket/action-button/_setReminder')
                @else
                    @include('partials/ticket/action-button/_decline')
                    @include('partials/ticket/action-button/_approve')
                    @include('partials/ticket/action-button/_status-update')
                @endif --}}
            <!--end::Section Actions-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Sidebar-->
