@extends('front.main_layouts.master')
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            @include('front.users._sections.dashboard_menu')
            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                <div class="dashboard-wrapper">
                    <h4 class="section-title">{{ trans('dashboard_event_plans.title') }}</h4>
                    @if(Session::has('removed'))
                        <div class="alert alert-success">
                            {{ session('removed') }}
                        </div>
                    @endif
                    <p class="mmt-15 mb-20">
                        <a href="{{ route('userDashboardCreateNewEvent', $user->id) }}" class="btn btn-primary btn-sm">
                            {{ trans('dashboard_event_plans.create') }}
                        </a>
                    </p>
                    <div class="trip-list-wrapper no-bb-last">
                        @foreach($eventPlans as $eventPlan)
                            <div class="trip-list-item">
                                <div class="image-absolute">
                                    <div class="image image-object-fit image-object-fit-cover">
                                        @if($eventPlan->active != 0)
                                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                                                {{ Html::image(config('asset.image_path.event_plan') . $eventPlan->image, $eventPlan->slug) }}
                                            </a>
                                        @else
                                            <a href="{{ route('showDemoEvent', [Auth::user()->id, $eventPlan->slug]) }}">
                                                {{ Html::image(config('asset.image_path.event_plan') . $eventPlan->image, $eventPlan->slug) }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="GridLex-gap-20 mb-5">
                                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                            <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                                <div class="GridLex-inner">
                                                    @if($eventPlan->active != 0)
                                                        <h6>
                                                            <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}">
                                                                {{ $eventPlan->title }}
                                                            </a>
                                                        </h6>
                                                        <span class="font-italic font14">&nbsp;</span>
                                                    @else
                                                        <h6>
                                                            <a href="{{ route('showDemoEvent', [Auth::user()->id, $eventPlan->slug]) }}">
                                                                {{ $eventPlan->title }}
                                                            </a>
                                                        </h6>
                                                        <span class="font-italic font14">&nbsp;</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="GridLex-col-1_sm-4_xs-4_xss-4">
                                                <div class="GridLex-inner text-center text-left-sm line-1 font14 text-muted spacing-1">
                                                    <span class="block text-primary font22 font700 mb-1"><i class="fa fa-shopping-cart font14"></i> {{ $eventPlan->event_forks_count }}</span>   {{ trans('dashboard_event_plans.forks') }}
                                                </div>
                                            </div>
                                            <div class="GridLex-col-4_sm-8_xs-8_xss-8">
                                                <div class="GridLex-inner text-right">
                                                    @if($eventPlan->active != 0)
                                                        <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}" class="btn btn-primary btn-sm">
                                                            {{ trans('dashboard_event_plans.view') }}
                                                        </a>
                                                    @else
                                                        <a href="{{ route('showDemoEvent', [Auth::user()->id, $eventPlan->slug]) }}" class="btn btn-success btn-sm">
                                                            {{ trans('dashboard_event_plans.preview') }}
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('userDashboardCreateEventDetail', [Auth::user()->id, $eventPlan->slug]) }}" class="btn btn-info btn-sm">
                                                        {{ trans('dashboard_event_plans.edit') }}
                                                    </a>
                                                    <a href="{{ route('getRemoveEventPlan', [Auth::user()->id, $eventPlan->id]) }}" class="btn btn-danger btn-sm">
                                                        {{ trans('dashboard_event_plans.delete') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
            </div>
        </div>
    </div>
</div>

@endsection
