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
                    <h4 class="section-title">{{ trans('dashboard_request_events.title') }}</h4>
                    <p class="mmt-15 mb-20">
                        <a href="{{ route('userDashboardCreateNewEvent', $user->id) }}" class="btn btn-primary btn-sm">
                            {{ trans('dashboard_request_events.create') }}
                        </a>
                    </p>
                    <div class="trip-list-wrapper no-bb-last">
                        @foreach($requestEvents as $requestEvent)
                            <div class="trip-list-item">
                                <div class="content">
                                    <div class="GridLex-gap-20 mb-5">
                                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                            <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                                <div class="GridLex-inner">
                                                    <h6>{{ $requestEvent->title }}</h6>
                                                    <span class="font-italic font14">&nbsp;</span>
                                                </div>
                                            </div>
                                            <div class="GridLex-col-1_sm-4_xs-4_xss-4">
                                                <div class="GridLex-inner text-center text-left-sm line-1 font14 text-muted spacing-1">
                                                    <span class="block text-primary font22 font700 mb-1"><i class="fa fa-comment-o font17"></i> {{ $requestEvent->comments_count }}</span>   {{ trans('dashboard_request_events.comments') }}
                                                </div>
                                            </div>
                                            <div class="GridLex-col-4_sm-8_xs-8_xss-8">
                                                <div class="GridLex-inner text-right">
                                                    <a href="{{ route('requestEventIndex', [$requestEvent->id ,$requestEvent->slug]) }}" class="btn btn-primary btn-sm">{{ trans('dashboard_request_events.view') }}</a>
                                                    <a href="#" class="btn btn-danger btn-sm">{{ trans('dashboard_request_events.delete') }}</a>
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
                                {{ trans('dashboard_request_events.showing') }}
                            </div>
                            <div class="clearfix">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="active"><a href="#"></a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
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
