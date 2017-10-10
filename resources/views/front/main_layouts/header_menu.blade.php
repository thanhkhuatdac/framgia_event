<header id="header">
    <nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
        <div class="container">
            <div class="logo-wrapper">
                <div class="logo">
                    <a href="#"><img src="{{config('asset.image_path.url')}}logo-white.png" alt="Logo" /></a>
                </div>
            </div>
            <div id="navbar" class="navbar-nav-wrapper">
                <ul class="nav navbar-nav" id="responsive-menu">
                    <li>
                        <a href="">{{ trans('header_menu.home') }}</a>
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
                    <li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
                    <li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
                </ul>
            </div>
        </div>
        <div id="slicknav-mobile"></div>
    </nav>
</header>
