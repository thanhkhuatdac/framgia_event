@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                <h4 class="section-title">
                    {{ trans('user_detail_profile.events') }}
                </h4>
                @foreach($eventPlans as $eventPlan)
                    <div class="trip-list-item">
                        <div class="image-absolute">
                            <div class="image image-object-fit image-object-fit-cover">
                                {{ Html::image(config('asset.image_path.event_plan') . $eventPlan->image) }}
                            </div>
                        </div>
                        <div class="content">
                            <div class="GridLex-gap-20 mb-5">
                                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                    <div class="GridLex-col-6_sm-12_xs-12_xss-12">
                                        <div class="GridLex-inner">
                                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                                                <h6>{{ $eventPlan->title }}</h6>
                                            </a>
                                            <span class="font-italic font14">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="GridLex-col-3_sm-6_xs-7_xss-12">
                                        <div class="GridLex-inner line-1 font14 text-muted spacing-1">
                                            {{ trans('request_show_all.createdDate') }}
                                            <span class="block text-primary font16 font700 mt-1">
                                                {{ $eventPlan->created_at->format('H:i, d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="GridLex-col-3_sm-6_xs-5_xss-12">
                                        <div class="GridLex-inner text-right text-left-xss dropdown">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('eventPlanIndex', $eventPlan->slug) }}" >
                                                {{ trans('request_show_all.view') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mb-30"></div>
                <div class="pager-wrappper text-left clearfix bt mt-0 pt-20">
                    <div class="pager-innner">
                        <div class="clearfix">
                            <nav>
                                {{ $eventPlans->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
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
                                                        {{ $userInTop->event_plans_count }}
                                                        {{ trans('event_plans_index.events') }}
                                                    </li>
                                                    <li>
                                                        {{ $userInTop->reviews_count }}
                                                        {{ trans('event_plans_index.reviews') }}
                                                    </li>
                                                    <li>
                                                        {{ trans('event_plans_index.scores') }}
                                                        {{ $userInTop->score }}
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
