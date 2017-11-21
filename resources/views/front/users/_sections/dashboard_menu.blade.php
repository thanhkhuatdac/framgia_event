<div class="col-xs-12 col-sm-4 col-md-3 mt-20">
    <aside class="sidebar-wrapper pr-15 pr-0-xs">
        <div class="common-menu-wrapper">
            <ul class="common-menu-list">
                <li class="active"><a href="{{ route('userDashboard', Auth::user()->id) }}">
                    {{ trans('dashboard_menu.dashboard') }}
                </a></li>
                <li>
                    <a href="{{ route('getEditProfile', Auth::user()->id) }}">
                        {{ trans('dashboard_menu.editProfile') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('getChangePassword', Auth::user()->id) }}">
                        {{ trans('dashboard_menu.changePassword') }}
                    </a>
                </li>
                @if(check_freelancer(Auth::user()))
                    <li>
                        <a href="{{ route('userDashboardEvents', Auth::user()->id) }}">
                            {{ trans('dashboard_menu.myEvents') }}
                        </a>
                    </li>
                @endif
                @if(check_customer(Auth::user()))
                    <li>
                        <a href="{{ route('listRequestEvent', Auth::user()->id) }}">
                            {{ trans('dashboard_menu.myRequestEvents') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('listForkEvent', Auth::user()->id) }}">
                            {{ trans('dashboard_menu.myForkEvents') }}
                        </a>
                    </li>
                @endif
                <li><a data-toggle="modal" href="javascript:void(0)" onclick="logout()">
                    {{ trans('dashboard_menu.logout') }}
                </a></li>
            </ul>
        </div>
    </aside>
</div>
