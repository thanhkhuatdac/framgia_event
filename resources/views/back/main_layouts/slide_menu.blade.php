<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="https://trungquandev.com/" target="__blank" class="site_title">
                <i class="fa fa-paw"></i> <span>{{ trans('back_slide_menu.title01') }}</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_pic">
                {{ Html::image(config('asset.image_path.user_ava') . Auth::user()->image,
                    Auth::user()->name, array('class' => 'img-circle profile_img')) }}
            </div>
            <div class="profile_info">
                <span>{{ trans('back_slide_menu.welcome') }}</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ trans('back_slide_menu.general') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('homeDashboard') }}">
                        <i class="fa fa-dashboard"></i>
                            {{ trans('back_slide_menu.dashboard') }}
                            <span class="fa fa-chevron-right"></span>
                        </a>
                    </li>
                    <li>
                        <a><i class="fa fa-edit"></i> {{ trans('back_slide_menu.eventPlans') }}
                            @if(isset($pendingEventCount))
                                <span class="count-pending-news">
                                    &nbsp;{{ $pendingEventCount }}&nbsp;
                                </span>
                            @endif
                        <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('eventPlanPublished') }}">
                                {{ trans('back_slide_menu.published') }}
                            </a></li>
                            <li>
                                <a href="{{ route('eventPlanPending') }}">
                                    {{ trans('back_slide_menu.pending') }}
                                    @if(isset($pendingEventCount))
                                        <span class="count-pending-news">
                                            &nbsp;{{ $pendingEventCount }}&nbsp;
                                        </span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-user"></i>
                            {{ trans('back_slide_menu.users') }}
                        <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">
                                {{ trans('back_slide_menu.allUsers') }}
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
