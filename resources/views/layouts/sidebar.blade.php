<div class="air__menuLeft">
    <div class="air__menuLeft__outer">
        <div class="air__menuLeft__mobileToggleButton air__menuLeft__mobileActionToggle">
            <span></span>
        </div>
        <div class="air__menuLeft__toggleButton air__menuLeft__actionToggle">
            <span></span>
            <span></span>
        </div>
        <a href="javascript: void(0);" class="air__menuLeft__logo">
            <img src="{{ asset('design/components/core/img/favicon.png')}}" style="width:50px; height:50px" alt="IGR LOGO" />

            <div class="air__menuLeft__logo__name">LASECO</div>
        </a>
        <a href="javascript: void(0);" class="air__menuLeft__user">

            <!-- <div class="air__menuLeft__user__avatar">
                <img src="{{ asset('design/components/core/img/jetrho.jpg')}}" style="width:50px; height:50px" alt="Name" />
            </div> -->

            <div class="air__menuLeft__user__name">
                {{Auth::user()->first_name . ' '. Auth::user()->last_name}}
            </div>
            <div class="air__menuLeft__user__role">
                {{Auth::user()->role}}
            </div>
        </a>
        <div class="air__menuLeft__container air__customScroll">
            <ul class="air__menuLeft__list">

                <li class="air__menuLeft__item">
                    <a href="{{ route('administrator.dashboard') }}" class="air__menuLeft__link air__sidebar__actionToggle">
                    <i class="fe fe-home air__menuLeft__icon"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                @if(( Auth::user()->email_verified_at) == "")

                    <li class="air__menuLeft__item">
                        <a href="{{ route('verification.resend') }}" class="air__menuLeft__link">
                        <i class="fe fe-mail air__menuLeft__icon"></i>
                        <span>Resend Link</span>
                        </a>
                    </li>
                @else

                    @if(Auth::user()->hasRole('Administrator'))

                        <li class="air__menuLeft__item">
                            <a href="{{ route('user.index') }}" class="air__menuLeft__link air__sidebar__actionToggle">
                            <i class="fe fe-users air__menuLeft__icon"></i>
                            <span>Users</span>
                            </a>
                        </li>
                        <li class="air__menuLeft__item">
                            <a href="{{ route('upload.index')}}" class="air__menuLeft__link air__sidebar__actionToggle">
                            <i class="fe fe-folder air__menuLeft__icon"></i>
                            <span>Upload File</span>
                            </a>
                        </li>
                        <li class="air__menuLeft__item air__menuLeft__submenu">
                            <a href="javascript: void(0)" class="air__menuLeft__link">
                                <i class="fe fe-bar-chart-2 air__menuLeft__icon"></i>
                                <span>House Hold Assets</span>
                                <span class="badge text-white bg-blue-light float-right mt-1 px-2"></span>
                            </a>
                            <ul class="air__menuLeft__list">
                                <li class="air__menuLeft__item">
                                    <a href="{{ route('appliances.index') }}" class="air__menuLeft__link">
                                    <span>Appliances</span>
                                    </a>
                                </li>
                                <li class=" air__menuLeft__item">
                                    <a href="{{ route('appliances.other') }}" class="air__menuLeft__link">
                                    <span>Others</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @elseif(Auth::user()->hasRole('Admin'))
                        <li class="air__menuLeft__item">
                            <a href="" class="air__menuLeft__link air__sidebar__actionToggle">
                            <i class="fe fe-user air__menuLeft__icon"></i>
                            <span>Staff Managements</span>
                            </a>
                        </li>

                    @elseif(Auth::user()->hasRole('Staff'))


                        <li class="air__menuLeft__item">
                            <a href="" class="air__menuLeft__link air__sidebar__actionToggle">
                            <i class="icmn-books air__menuLeft__icon"></i>
                            <span>Revenue Mgt</span>
                            </a>
                        </li>

                        <li class="air__menuLeft__item">
                            <a href="" class="air__menuLeft__link air__sidebar__actionToggle">
                            <i class="icmn-cloud-upload air__menuLeft__icon"></i>
                            <span>Log Management</span>
                            </a>
                        </li>

                    @else


                    @endif

                @endif
                <li class="air__menuLeft__item">
                    <a href="{{ route('logout')}}" class="air__menuLeft__link">
                    <i class="fe fe-lock air__menuLeft__icon"></i>
                    <span>Log Out</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>
</div>
