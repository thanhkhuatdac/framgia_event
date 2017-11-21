@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                <h4 class="section-title">
                    {{ trans('user_detail_profile.profile') }}
                </h4>
                <p class="lead">{{ $user->description }}</p>
                <div class="bt mt-10 mb-10"></div>
                <ul class="featured-list-with-h">
                    @if(check_freelancer($user))
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5>
                                        <i class="ti-user text-primary mr-5"></i>
                                        {{ trans('user_detail_profile.score') }}
                                        <span class="text-primary">{{ $user->score }}</span>
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5>
                                        <i class="fa fa-file-text-o text-primary mr-5"></i>
                                        {{ trans('user_detail_profile.events') }}
                                        <span class="text-primary">{{ $user->event_plans_count }}</span>
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm"></span>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if(check_customer($user))
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5>
                                        <i class="fa fa-file-text-o text-primary mr-5"></i>
                                        {{ trans('user_detail_profile.requestEvent') }}
                                        <span class="text-primary">{{ $user->request_events_count }}</span>
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm"></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5>
                                        <i class="fa fa-file-text-o text-primary mr-5"></i>
                                        {{ trans('user_detail_profile.eventForks') }}
                                        <span class="text-primary">{{ $user->event_forks_count }}</span>
                                    </h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm"></span>
                                </div>
                            </div>
                        </li>
                    @endif
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h5>
                                    <i class="fa fa-comment-o text-primary mr-5"></i>
                                    {{ trans('user_detail_profile.comments') }}
                                    <span class="text-primary">{{ $user->comments_count }}</span>
                            </h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h5>
                                    <i class="fa fa-envelope-o text-primary mr-5"></i>
                                    {{ trans('user_detail_profile.email') }}
                                    <span class="text-primary">{{ $user->email }}</span>
                                </h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h5>
                                    <i class="fa fa-phone text-primary mr-5"></i>
                                    {{ trans('user_detail_profile.phone') }}
                                    <span class="text-primary">{{ $user->phone }}</span>
                                </h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h5>
                                    <i class="fa fa-map-marker text-primary mr-5"></i>
                                    {{ trans('user_detail_profile.location') }}
                                    <span class="text-primary">{{ $user->address }}</span>
                                </h5>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                <span class="pl-sm"></span>
                            </div>
                        </div>
                    </li>
                    @foreach($user->socialLinks as $socialLink)
                        @if($socialLink->name == 'facebook')
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h5>
                                            <i class="icon-social-facebook text-primary mr-5"></i>
                                            {{ trans('user_detail_profile.facebook') }}
                                            <a href="{{ $socialLink->link }}" target="__blank">
                                                {{ $socialLink->link }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                        <span class="pl-sm"></span>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @if($socialLink->name == 'twitter')
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h5>
                                            <i class="icon-social-twitter text-primary mr-5"></i>
                                            {{ trans('user_detail_profile.twitter') }}
                                            <a href="{{ $socialLink->link }}" target="__blank">
                                                {{ $socialLink->link }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                        <span class="pl-sm"></span>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @if($socialLink->name == 'instagram')
                            <li>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h5>
                                            <i class="icon-social-instagram text-primary mr-5"></i>
                                            {{ trans('user_detail_profile.instagram') }}
                                            <a href="{{ $socialLink->link }}" target="__blank">
                                                {{ $socialLink->link }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                        <span class="pl-sm"></span>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="mb-30"></div>
            </div>
            <div id="sidebar-sticky" class="col-xs-12 col-sm-5 col-md-4 mt-20">
                <aside class="sidebar-wrapper with-box-shadow">
                    <div class="sidebar-booking-box">
                        <div class="sidebar-booking-header clearfix">
                            <div class="price">
                                {{ trans('user_detail_profile.topUsers') }}
                            </div>
                        </div>
                        <div class="sidebar-booking-inner">
                            <ul>
                                @foreach($topUsers as $userInTop)
                                    <li>
                                        <div class="user-long-sm-item clearfix">
                                            <div class="image">
                                                {{ Html::image(config('asset.image_path.user_ava') . $userInTop->image, $userInTop->name) }}
                                            </div>
                                            <div class="content">
                                                <h4>
                                                    <a href="{{ route('userProfile', $userInTop->id) }}">
                                                        {{ $userInTop->name }}
                                                    </a>
                                                </h4>
                                                <ul class="user-meta">
                                                    <li>
                                                        {{ trans('event_plans_index.event') }}
                                                        <span class="turquoise service-name">
                                                            {{ $userInTop->event_plans_count }}
                                                        </span>
                                                    </li>
                                                    <li>
                                                        {{ trans('event_plans_index.score') }}
                                                        <span class="turquoise service-name">
                                                            {{ $userInTop->score }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
