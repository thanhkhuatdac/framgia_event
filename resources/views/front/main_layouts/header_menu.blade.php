<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo-wrapper">
                <div class="logo">
                    <a href="#">
                        {{ HTML::image(config('asset.image_path.logo_fav') . '/logo-trungquandev.png', 'Logo', ['class' => 'thumb']) }}
                    </a>
                </div>
            </div>
            <div id="navbar" class="navbar-nav-wrapper">
                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="{{ route('home') }}">{{ trans('header_menu.home') }}</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                        {{ trans('header_menu.offeredEvent') }}
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                {{ trans('header_menu.wedding') }}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                {{ trans('header_menu.birthday') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">{{ trans('header_menu.requestedEvent') }}</a>
                    </li>
                </ul>
            </div>
            <div class="nav-mini-wrapper">
                <ul class="nav-mini">
                    @if(!Auth::check())
                        <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                        <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
                    @else
                        <li><a data-toggle="modal" href="{{ route('userDashboard', Auth::user()->id) }}">
                            <i class="icon-user" data-toggle="tooltip" data-placement="bottom" title="{{ Auth::user()->name }}"></i>
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                        <li>
                            <a data-toggle="modal" href="javascript:void(0)" onclick="logout()">
                                <i class="icon-logout" data-toggle="tooltip" data-placement="bottom" title="logout"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
</header>
