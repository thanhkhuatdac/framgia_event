<div class="user-profile-wrapper">
    <div class="user-header">
        <div class="content">
            <div class="content-top">
                <div class="container">
                    <div class="inner-top">
                        <div class="image">
                            {{ Html::image(config('asset.image_path.user_ava') . $user->image, $user->name) }}
                        </div>
                        <div class="GridLex-gap-20">
                            <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
                                <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                    <div class="GridLex-inner">
                                        <div class="heading clearfix">
                                            <h3>{{ $user->name }}</h3>
                                        </div>
                                        <ul class="user-meta">
                                            <li><i class="fa fa-map-marker"></i> {{ $user->address }} <span class="mh-5 text-muted">|</span> <i class="fa fa-phone"></i> {{ $user->phone }}</li>
                                            <li>&nbsp;</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bottom">
                <div class="container">
                    <div class="inner-bottom">
                        <ul class="user-header-menu">
                            <li class="active">
                                <a href="{{ route('userProfile', $user->id) }}">
                                    {{ trans('user_header.profile') }}
                                </a>
                            </li>
                            @if(check_freelancer($user))
                                <li>
                                    <a href="{{ route('userEventPlans', $user->id) }}">
                                        {{ trans('user_header.events') }}
                                    </a>
                                </li>
                            @endif
                            @if(check_customer($user))
                                <li>
                                    <a href="{{ route('userRequestEvents', $user->id) }}">
                                        {{ trans('user_header.requestEvent') }}
                                    </a>
                                </li>
                            @endif
                            @if($user->id == Auth::user()->id)
                                <li>
                                    <a href="{{route('userDashboard', $user->id)}}">
                                        {{ trans('user_header.dashboard') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
