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
                    <form class="post-form-wrapper">
                        <div class="row gap-20">
                            <h4 class="section-title">
                                {{ trans('dashboard_create_detail.step2') }}
                            </h4>
                            <div class="clear"></div>
                            <strong><a href="javascript:void(0)">
                                <i class="fa fa-circle"></i>
                                {{ trans('dashboard_create_detail.eventDetail') }}
                            </a></strong>
                            <div class="clear"></div>
                            <div id="event-detail">
                                <div class="col-xs-12 col-sm-6 col-md-5">
                                    <div class="form-group">
                                        <label>{{ trans('dashboard_create_detail.name') }}</label>
                                        <input type="text" class="form-control" value="" placeholder="{{ trans('dashboard_create_detail.namePlace') }}" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>
                                            {{ trans('dashboard_create_detail.startDate') }}
                                        </label>
                                        <input type="text" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>
                                            {{ trans('dashboard_create_detail.dueDate') }}
                                        </label>
                                        <input type="text" class="form-control" value="" />
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
                            <hr>
                            <div class="clear"></div>
                            <div class="col-xs-12 col-sm-6 col-md-12">
                                <strong><a href="javascript:void(0)" id="toggle-create-event-detail">
                                    <i class="fa fa-circle"></i>
                                    {{ trans('dashboard_create_detail.eventServices') }}
                                </a></strong>
                                <div class="clear"></div>
                                <div id="event-services" class="spaceY10">
                                </div>
                                <div class="spaceL20">
                                    <strong><a href="#" id="toggle-create-services">
                                        <i class="fa fa-plus"></i>
                                        {{ trans('dashboard_create_detail.newService') }}
                                    </a></strong>
                                </div>
                            </div>
                            <hr>
                            <div class="clear"></div>
                            <div class="clear mb-10"></div>
                            <div class="col-sm-12">
                                <a href="#" class="btn btn-primary">
                                    {{ trans('dashboard_create_detail.save') }}
                                </a>
                                <a href="#" class="btn btn-primary btn-border">
                                    {{ trans('dashboard_create_detail.cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
