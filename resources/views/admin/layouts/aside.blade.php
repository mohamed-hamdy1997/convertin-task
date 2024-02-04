<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6 border-0" id="kt_app_sidebar_logo">
        <div class="box-user-data box-user-data rounded p-2 w-100">
            <div class="d-flex">
                <div class="img">
                    <img src="{{ asset('admin/media/small-logo.png') }}"
                         class='h-40px w-40px rounded me-2' alt="">
                </div>
                <div class="txt text-white ">
                    <h5 class='mb-0 text-white'>{{ auth()->user()->name }}</h5>
                    <span>{{ auth()->user()->type }}</span>
                </div>
            </div>
        </div>
    </div>
    <!--end::Logo-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">


                <!--begin:Menu item-->

                {{--                Tasks --}}
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ isActiveRoute(['admin.tasks.view', 'admin.tasks.create.view']) ? ' hover show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 448 512" fill="none">
                                <path d="M353.2 32H94.8C42.4 32 0 74.4 0 126.8v258.4C0 437.6 42.4 480 94.8 480h258.4c52.4 0 94.8-42.4 94.8-94.8V126.8c0-52.4-42.4-94.8-94.8-94.8zM144.9 200.9v56.3c0 27-21.9 48.9-48.9 48.9V151.9c0-13.2 10.7-23.9 23.9-23.9h154.2c0 27-21.9 48.9-48.9 48.9h-56.3c-12.3-.6-24.6 11.6-24 24zm176.3 72h-56.3c-12.3-.6-24.6 11.6-24 24v56.3c0 27-21.9 48.9-48.9 48.9V247.9c0-13.2 10.7-23.9 23.9-23.9h154.2c0 27-21.9 48.9-48.9 48.9z"
                                      fill="{{ isActiveRoute(['admin.tasks.view', 'admin.tasks.create.view'])  ? '#70D80E' : '#808080' }}"/>
                            </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title"> Tasks </span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-accordion {{ isActiveRoute(['admin.tasks.view', 'admin.tasks.create.view']) ? ' show' : '' }}"
                        style="{{ !isActiveRoute(['admin.tasks.view', 'admin.tasks.create.view']) ? ' display: none; overflow: hidden;' : '' }}"
                        kt-hidden-height="78">

                        <div class="menu-item {{ isActiveRoute('admin.tasks.view') ? 'active' : '' }}">
                            <a class="menu-link  " href="{{ route('admin.tasks.view') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All</span>
                            </a>
                        </div>

                        <div class="menu-item {{ isActiveRoute('admin.tasks.create.view') ? 'active' : '' }}">
                            <a class="menu-link  " href="{{ route('admin.tasks.create.view') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create Task</span>
                            </a>
                        </div>
                    </div>
                </div>

{{--                Statistics--}}
                <div class="menu-item {{ Request::segment(2) == 'statistics' ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('admin.statistics.view') }}">
                        <span class="menu-icon">
                             <svg width="24" height="24" viewBox="0 0 28 28" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.05263 26H3.26316C2.92815 26 2.60686 25.8669 2.36997 25.63C2.13308 25.3931 2 25.0719 2 24.7368V14.6316C2 14.2966 2.13308 13.9753 2.36997 13.7384C2.60686 13.5015 2.92815 13.3684 3.26316 13.3684H7.05263C7.38764 13.3684 7.70893 13.5015 7.94582 13.7384C8.18271 13.9753 8.31579 14.2966 8.31579 14.6316V24.7368C8.31579 25.0719 8.18271 25.3931 7.94582 25.63C7.70893 25.8669 7.38764 26 7.05263 26ZM15.8947 26H12.1053C11.7703 26 11.449 25.8669 11.2121 25.63C10.9752 25.3931 10.8421 25.0719 10.8421 24.7368V3.26316C10.8421 2.92815 10.9752 2.60686 11.2121 2.36997C11.449 2.13308 11.7703 2 12.1053 2H15.8947C16.2297 2 16.551 2.13308 16.7879 2.36997C17.0248 2.60686 17.1579 2.92815 17.1579 3.26316V24.7368C17.1579 25.0719 17.0248 25.3931 16.7879 25.63C16.551 25.8669 16.2297 26 15.8947 26ZM24.7368 26H20.9474C20.6124 26 20.2911 25.8669 20.0542 25.63C19.8173 25.3931 19.6842 25.0719 19.6842 24.7368V10.8421C19.6842 10.5071 19.8173 10.1858 20.0542 9.94892C20.2911 9.71203 20.6124 9.57895 20.9474 9.57895H24.7368C25.0719 9.57895 25.3931 9.71203 25.63 9.94892C25.8669 10.1858 26 10.5071 26 10.8421V24.7368C26 25.0719 25.8669 25.3931 25.63 25.63C25.3931 25.8669 25.0719 26 24.7368 26Z"
                                        fill="{{ isActiveRoute('admin.statistics.view') ? '#70D80E' : '#808080' }}"/>
                                </svg>
                        </span>
                        <span class="menu-title">Statistics</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
