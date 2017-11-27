@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                <h4 class="section-title">
                    {{ trans('list_follow.follower') }}
                </h4>
                <div class="folloer-wrapper user-long-sm-wrapper">
                    <div class="GridLex-gap-10">
                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                            @foreach($userFollowings as $userFollowing)
                                <div class="GridLex-col-12_sm-12_xs-12">
                                    <div class="user-long-sm-item bg-light border pl-15 pt-15 pr-15 pb-5 clearfix">
                                        <div class="image">
                                            {{ Html::image(config('asset.image_path.user_ava') .
                                                $userFollowing->image, $userFollowing->name) }}
                                        </div>
                                        <div class="content">
                                            <div class="block">
                                                @if(check_freelancer($userFollowing))
                                                    <span class="label label-info">{{ $userFollowing->role }}</span>
                                                @else
                                                    <span class="label label-warning">{{ $userFollowing->role }}</span>
                                                @endif
                                            </div>
                                            <h4>{{ $userFollowing->name }}</h4>
                                            <ul class="user-meta">
                                                <li><i class="fa fa-map-marker"></i> {{ $userFollowing->address }}</li>
                                            </ul>
                                            <div class="row gap-10">
                                                <div class="col-xs-12 col-sm-9">
                                                    <ul class="user-meta">
                                                        @if(check_freelancer($userFollowing))
                                                            <li>
                                                                {{ $userFollowing->event_plans_count }}
                                                                {{ trans('list_follow.eventPlans') }}
                                                            </li>
                                                            <li>
                                                                {{ $userFollowing->reviews_count }}
                                                                {{ trans('list_follow.reviews') }}
                                                            </li>
                                                            <li>
                                                                {{ $userFollowing->score }}
                                                                {{ trans('list_follow.score') }}
                                                            </li>
                                                        @else
                                                            <li>
                                                                {{ $userFollowing->request_events_count }}
                                                                {{ trans('list_follow.requestEvents') }}
                                                            </li>
                                                            <li>
                                                                {{ $userFollowing->event_forks_count }}
                                                                {{ trans('list_follow.eventForks') }}
                                                            </li>
                                                            <li>
                                                                {{ $userFollowing->comments_count }}
                                                                {{ trans('list_follow.comments') }}
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="col-xs-12 col-sm-3">
                                                    <a href="{{ route('userProfile', $userFollowing->id) }}"
                                                        class="block mt-10 mt-0-xs text-right text-left-xs">
                                                        {{ trans('list_follow.viewProfile') }}
                                                        <i class="ion-android-arrow-forward"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
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
