@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/create-event.js') }}
@endpush
@section('content')

<div class="spaceY70"></div>
@include('front.users._sections.user_header')
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            @include('front.users._sections.dashboard_menu')
            <div class="col-xs-12 col-sm-8 col-md-9 mt-20">
                <div class="dashboard-wrapper">
                    @if(Session::has('created_event'))
                        <div class="alert alert-success">
                            {{ session('created_event') }}
                        </div>
                    @endif
                    @if(Session::has('addDetailSuccess'))
                        <div class="alert alert-success">
                            {{ session('addDetailSuccess') }}
                        </div>
                    @endif
                    @if(Session::has('addDetailError'))
                        <div class="alert alert-danger">
                            {{ session('addDetailError') }}
                        </div>
                    @endif
                    @if(Session::has('detailRemoved'))
                        <div class="alert alert-success">
                            {{ session('detailRemoved') }}
                        </div>
                    @endif
                    @if(Session::has('removeError'))
                        <div class="alert alert-error">
                            {{ session('removeError') }}
                        </div>
                    @endif
                    <form class="post-form-wrapper" action="{{ route('userDashboardPostCreateEventDetail', Auth::user()->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="detail_amount" id="input-detail-amount" class="form-control" value="0"/>
                        <input type="hidden" name="detail_event_plan_id" id="input-detail-plan-id" class="form-control" value="{{ $eventPlan->id }}"/>
                        <input type="hidden" name="detail_event_plan_slug" id="input-detail-plan-slug" class="form-control" value="{{ $eventPlan->slug }}"/>
                        <input type="hidden" name="user_id" id="user-id" class="form-control" value="{{ $user->id }}"/>
                        <div class="row gap-20">
                            <h4 class="section-title">
                                {{ trans('dashboard_create_detail.step2') }}
                            </h4>
                            <div class="clear"></div>
                            <h3><a href="javascript:void(0)">
                                <i class="fa fa-plus"></i>
                                {{ trans('dashboard_create_detail.eventDetail') }}
                            </a></h3>
                            <div class="clear"></div>
                            <div id="event-detail">
                                <div class="col-xs-12 col-sm-6 col-md-5">
                                    <div class="form-group">
                                        <label>{{ trans('dashboard_create_detail.name') }}</label>
                                        <input type="text" name="detail_name" class="form-control" value="" placeholder="{{ trans('dashboard_create_detail.namePlace') }}" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>
                                            {{ trans('dashboard_create_detail.startDate') }}
                                        </label>
                                        <input type="text" id='datetimepicker-start-date' class="form-control" name="detail_start_date" value="" placeholder="mm/dd/yyyy 0:00 AM" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>
                                            {{ trans('dashboard_create_detail.dueDate') }}
                                        </label>
                                        <input type="text" id='datetimepicker-due-date' class="form-control" name="detail_due_date" value="" placeholder="mm/dd/yyyy 0:00 AM" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-7">
                                    <div class="form-group">
                                        <label class="floatLeft">
                                            {{ trans('dashboard_create_detail.amount') }}
                                        </label>
                                        <div id="detail-amount" class="floatLeft"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <div class="clear"></div>
                                <div id="event-services" class="spaceY10">
                                </div>
                                <div class="spaceL20">
                                    <strong><a href="javascript:void(0)" id="toggle-create-services">
                                        <i class="fa fa-plus"></i>
                                        {{ trans('dashboard_create_detail.newService') }}
                                    </a></strong>
                                </div>
                            </div>
                            <hr>
                            <div class="clear"></div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('dashboard_create_detail.save') }}
                                </button>
                                &nbsp;
                                @if($eventPlan->active == 0)
                                    <a href="{{ route('showDemoEvent',
                                        ['id' => Auth::user()->id, 'slug' => $eventPlan->slug]) }}"
                                        class="btn btn-primary btn-border"
                                        target="__blank">
                                        {{ trans('dashboard_create_detail.preView') }}
                                    </a>
                                @elseif($eventPlan->active == 1)
                                    <a href="{{ route('eventPlanIndex', $eventPlan->slug) }}"
                                        class="btn btn-primary btn-border"
                                        target="__blank">
                                        {{ trans('dashboard_create_detail.view') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="clear mb-30"></div>
                    <hr>
                    <div class="available-detail">
                        <h3>
                            <a href="javascript:void(0)">
                                <i class="fa fa-hashtag"></i>
                                {{ trans('dashboard_create_detail.availableService') }} &#10141;
                                {{ convert_vnd($eventPlan->amount) }}
                            </a>
                        </h3>
                        <div class="clear mb-10"></div>
                        <ul class="list-group" id="available-event-detail">
                            @foreach($eventPlan->eventPlanDetails as $detail)
                                <span>{{ $loop->iteration }}.</span>
                                <li class="list-group-item">
                                    {{ $detail->name }} &#10141; {{ convert_vnd($detail->amount) }}
                                </li>
                                <a href="{{ route('getRemoveDetail',
                                    ['id' => Auth::user()->id,
                                    'eventPlanId' => $eventPlan->id, 'detailId' => $detail->id]) }}">
                                    <i class="fa fa-close"></i>
                                </a>
                                <div class="clearfix"></div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
