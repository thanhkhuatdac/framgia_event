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
                    <h4 class="section-title">
                        {{ trans('dashboard_request_events.titleFork') }}
                    </h4>
                    @if(Session::has('removed'))
                        <div class="alert alert-success">
                            {{ session('removed') }}
                        </div>
                    @endif
                    <div class="trip-list-wrapper no-bb-last">
                        @foreach($eventForks as $eventFork)
                            <div class="trip-list-item">
                                <div class="content">
                                    <div class="GridLex-gap-20 mb-5">
                                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                            <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                                <div class="GridLex-inner">
                                                    <h6>{{ $eventFork->eventPlan->title }}</h6>
                                                    <span class="font-italic font14">&nbsp;</span>
                                                </div>
                                            </div>
                                            <div class="GridLex-col-1_sm-4_xs-4_xss-4">
                                                <div class="GridLex-inner text-center text-left-sm line-1 font14 text-muted spacing-1">
                                                    <span class="block text-primary font16 font700 mt-1">
                                                        {{ $eventFork->created_at->format('H:i, d/m/Y') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="GridLex-col-4_sm-8_xs-8_xss-8">
                                                <div class="GridLex-inner text-right">
                                                    <a href="{{ route('showEventFork', [$user->id ,$eventFork->id]) }}" class="btn btn-primary btn-sm">{{ trans('dashboard_request_events.view') }}</a>
                                                    <a href="{{ route('getRemoveEventFork', [Auth::user()->id ,$eventFork->id]) }}" class="btn btn-danger btn-sm">{{ trans('dashboard_request_events.delete') }}</a>
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
                                    {{ $eventForks->links() }}
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
