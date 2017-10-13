<div class="user-profile-wrapper">
    <div class="user-header">
        <div class="content">
            <div class="content-top">
                <div class="container">
                    <div class="inner-top">
                        <div class="image">
                            <img src="{{ asset(config('asset.image_path.user_ava').$user->image) }}" alt="image" />
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
                                            <li>
                                                <div class="user-social inline-block">
                                                    <a href="#"><i class="icon-social-twitter" data-toggle="tooltip" data-placement="top" title="twitter"></i></a>
                                                    <a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a>
                                                    <a href="#"><i class="icon-social-gplus" data-toggle="tooltip" data-placement="top" title="google plus"></i></a>
                                                    <a href="#"><i class="icon-social-instagram" data-toggle="tooltip" data-placement="top" title="instrgram"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-xs btn-border">{{ trans('user_header.follow') }}</a>
                                            </li>
                                            <li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="GridLex-col-5_sm-12_xs-12_xss-12">
                                    <div class="GridLex-inner">
                                        <div class="row gap-20">
                                            <div class="col-xss-6 col-xs-6 col-sm-6 col-md-12 text-right text-left-sm">
                                                <div class="rating-wrapper mb-10">
                                                    <div class="rating-item rating-item-lg">
                                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                                        <span class="block line14">{{ trans('user_header.based_on') }} <a href="#"> {{ trans('user_header.reviews') }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                            <li class="active"><a href="guide-detail.html">
                                {{ trans('user_header.profile') }}
                            </a></li>
                            <li><a href="guide-detail-offer.html">
                                {{ trans('user_header.events') }} <span></span>
                            </a></li>
                            <li><a href="guide-detail-reviews.html">
                                {{ trans('user_header.reviews') }}
                            </a></li>
                            <li><a href="guide-detail-following.html">
                                {{ trans('user_header.followings') }} <span></span>
                            </a></li>
                            <li><a href="guide-detail-follower.html">
                                {{ trans('user_header.followers') }} <span></span>
                            </a></li>
                            <li><a href="{{ route('userDashboard') }}">
                                {{ trans('user_header.dashboard') }}
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
