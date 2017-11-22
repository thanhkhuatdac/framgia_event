@extends('back.main_layouts.index')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="x_content">
                <div class="row">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-user"></i></div>
                            <div class="count">{{ $freelancerCount }}</div>
                            <h3>{{ trans('back_dashboard.freelancers') }}</h3>
                            <p>{{ trans('back_dashboard.totalFreelancers') }}</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-list"></i></div>
                            <div class="count">{{ $eventPlanCount }}</div>
                            <h3>{{ trans('back_dashboard.eventPlans') }}</h3>
                            <p>{{ trans('back_dashboard.totalAvailableEventPlans') }}</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-user"></i></div>
                            <div class="count">{{ $customerCount }}</div>
                            <h3>{{ trans('back_dashboard.customers') }}</h3>
                            <p>{{ trans('back_dashboard.totalCustomers') }}</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-list"></i></div>
                            <div class="count">{{ $requestEventCount }}</div>
                            <h3>{{ trans('back_dashboard.requestEvents') }}</h3>
                            <p>{{ trans('back_dashboard.totalRequestEvents') }}</p>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-list"></i></div>
                            <div class="count">{{ $eventForkCount }}</div>
                            <h3>{{ trans('back_dashboard.eventForks') }}</h3>
                            <p>{{ trans('back_dashboard.totalEventForks') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
