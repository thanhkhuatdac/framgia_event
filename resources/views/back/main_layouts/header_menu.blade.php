<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:void(0)" class="user-profile dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false">
                        {{ Html::image(config('asset.image_path.user_ava') . Auth::user()->image,
                            Auth::user()->name) }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-reply pull-right"></i>
                                {{ trans('back_header_menu.backFrontend') }}
                            </a>
                        </li>
                        <li><a href="#"><i class="fa fa-sign-out pull-right"></i>
                            {{ trans('back_header_menu.logOut') }}
                        </a></li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a href="javascript:void(0)" id="news-notice" class="dropdown-toggle info-number"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-globe"></i>
                        <span id="count-notice" class="badge bg-green"></span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu"></ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
