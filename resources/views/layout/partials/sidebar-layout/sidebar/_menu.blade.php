<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">
            <!--begin:Menu item-->
            @can('update')
            @endcan

            <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                {{-- menu-item here show menu-accordion --}}
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                    <span class="menu-title">Dashboards</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    @hasrole('manager')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.charts') }}">
                                {{-- <a class="menu-link active" href="{{ route('manager.charts') }}"> --}}
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Charts</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Avg Response Time</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Procurements Activities</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.clients.status') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Clients Status</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.reminders') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reminders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Statistics</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('manager.inquiries.statistics') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Inquiries</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('manager.inquiries.statistics') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Statistics</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                    @endhasrole
                    @hasrole('team-leader')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Statistics</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Avg Response Time</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Task</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Procurements Activities</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.clients.status') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Clients Status</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.reminders') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reminders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endhasrole
                    @hasrole('procurement')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Statistics</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Avg Response Time</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Task</span>
                            </a>
                            <!--end:Menu link-->
                        </div>


                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.clients.status') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Clients Status</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.reminders') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reminders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endhasrole
                    @hasrole('accountant')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Avg Response Time</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Task</span>
                            </a>
                            <!--end:Menu link-->
                        </div>

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.reminders') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reminders</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endhasrole

                    @hasrole('client')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.response.time') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Inquiries Statistics</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.clients.status') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title"> Statistics</span>
                            </a>
                            <!--end:Menu link-->
                        </div>


                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('manager.procurements.activities') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pending Task</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endhasrole
                </div>
                <!--end:Menu sub-->
            </div>


            <!--end:Menu item-->
            <!--begin:Menu item-->
            @hasrole('manager|team-leader|accountant|procurement')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Team Member</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('manager.team.members') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('manager.team.members.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create </span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>
            @endhasrole

            @hasrole('manager|team-leader|accountant|procurement|client')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Inquiries</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('inquiries.list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        @hasrole('manager|team-leader|client')
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{ route('inquiries.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Create </span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endhasrole

                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>
            @endhasrole

            @hasrole('manager|team-leader|accountant|procurement')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Clients</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('manager.clients') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('manager.clients.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create </span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>
            @endhasrole

            @hasrole('manager|team-leader|accountant|procurement')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Suppliers</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('admin.supplier.list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('admin.supplier.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create </span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>
            @endhasrole

            @hasrole('manager|team-leader')
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Shipping</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('shipping.list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('shipping.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create </span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">{!! getIcon('user', 'fs-2') !!}</span>
                        <span class="menu-title">Accounting</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">

                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('admin.accounting.list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ route('shipping.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create </span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>


                    <!--end:Menu sub-->
                </div>
            @endhasrole
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
