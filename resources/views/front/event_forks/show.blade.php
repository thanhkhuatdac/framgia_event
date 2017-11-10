@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
    {{ Html::script('js/edit-fork.js') }}
    {{ Html::script('js/live-chat.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg detail-breadcrumb"
    style="background-image:url({{ asset(config('asset.image_path.event_plan') . $eventFork->eventPlan->image) }});">
    <div class="container">
        <div class="page-title detail-header-02">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <h2>
                        {{ trans('event_forks_show.forkFrom') }}
                        {{ $eventFork->eventPlan->title }}
                    </h2>
                    <span class="labeling text-white mt-25">
                        <span>
                            {{ trans('event_forks_show.author') }}
                            {{ $eventFork->eventPlan->user->name }}
                        </span>
                    </span>
                    <span class="labeling text-white mt-25">
                        <span>
                            {{ trans('event_forks_show.userFork') }}
                            {{ $eventFork->user->name }}</span>
                    </span>
                    <br>
                    <ul class="list-with-icon list-inline-block">
                        <li><i class="ion-android-done text-primary"></i>
                            {{ $eventFork->eventPlan->subject->title }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper text-left">
            <ol class="breadcrumb"></ol>
        </div>
    </div>
</div>
<div class="multiple-sticky hidden-sm hidden-xs">
    <div class="multiple-sticky-inner">
        <div class="multiple-sticky-container container">
            <div class="multiple-sticky-item clearfix">
                <ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="pt-30 pb-50">
    <div class="container fork-page">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <h4 class="section-title">
                    {{ trans('event_forks_show.eventTitle') }}
                </h4>
                <input type="hidden" name="user-id" id="user-id" value="{{ Auth::user()->id }}">
                <div class="event-fork">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>
                                {{ trans('event_forks_show.startDate') }}
                            </label>
                            <input type="text" id='event-fork-start-date' class="form-control"
                                data-url-click="{{ route('forkClickElement', Auth::user()->id) }}"
                                data-url-loses="{{ route('forkLosesElement', Auth::user()->id) }}"
                                data-url-changed="{{ route('forkChangedData', Auth::user()->id) }}"
                                name="event_fork_start_date" value=""
                                placeholder="{{ trans('event_forks_show.dateTimePlace') }}"
                                required />
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="form-group">
                            <label>
                                {{ trans('event_forks_show.dueDate') }}
                            </label>
                            <input type="text" id='event-fork-due-date' class="form-control"
                                data-url-click="{{ route('forkClickElement', Auth::user()->id) }}"
                                data-url-loses="{{ route('forkLosesElement', Auth::user()->id) }}"
                                data-url-changed="{{ route('forkChangedData', Auth::user()->id) }}"
                                name="event_fork_due_date" value=""
                                placeholder="{{ trans('event_forks_show.dateTimePlace') }}"
                                required />
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="section-title">
                    {{ trans('event_forks_show.eventDetail') }}
                </h4>
                <form class="post-form-wrapper" action="" method="post">
                    {{ csrf_field() }}
                    <div class="row gap-20">
                        @foreach($eventFork->eventForkDetails as $forkDetail)
                            <div class="fork-detail-title">
                                <strong>#{{ $loop->iteration }}: </strong>
                                <strong class="detail-amount turquoise">
                                    {{ convert_vnd($forkDetail->amount) }}
                                </strong>
                            </div>
                            <div id="event-fork-detail-{{ $forkDetail->id }}" class="event-fork-detail">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('event_forks_show.name') }}</label>
                                        <input type="text" name="detail_name"
                                            data-url-click="{{ route('forkClickElement', Auth::user()->id) }}"
                                            data-url-loses="{{ route('forkLosesElement', Auth::user()->id) }}"
                                            data-url-changed="{{ route('forkChangedData', Auth::user()->id) }}"
                                            class="form-control fork-detail-name"
                                            id="fork-detail-name-{{ $forkDetail->id }}"
                                            value="{{ $forkDetail->name }}"
                                            placeholder="{{ trans('event_forks_show.namePlace') }}" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group detail-start-date">
                                        <label>
                                            {{ trans('event_forks_show.startDate') }}
                                        </label>
                                        <input type="text" id='fork-detail-start-date-{{ $forkDetail->id }}'
                                            data-url-click="{{ route('forkClickElement', Auth::user()->id) }}"
                                            data-url-loses="{{ route('forkLosesElement', Auth::user()->id) }}"
                                            data-url-changed="{{ route('forkChangedData', Auth::user()->id) }}"
                                            class="form-control fork-detail-start-date"
                                            name="fork_detail_start_date" value="" placeholder="{{ trans('event_forks_show.dateTimePlace') }}" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group detail-due-date">
                                        <label>
                                            {{ trans('event_forks_show.dueDate') }}
                                        </label>
                                        <input type="text" id='fork-detail-due-date-{{ $forkDetail->id }}'
                                            data-url-click="{{ route('forkClickElement', Auth::user()->id) }}"
                                            data-url-loses="{{ route('forkLosesElement', Auth::user()->id) }}"
                                            data-url-changed="{{ route('forkChangedData', Auth::user()->id) }}"
                                            class="form-control fork-detail-due-date"
                                            name="fork_detail_due_date" value="" placeholder="{{ trans('event_forks_show.dateTimePlace') }}" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-2">
                                    <label>&nbsp;</label><br>
                                    <a href="#"><i class="fa fa-close"></i></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            @foreach($forkDetail->forkPlanServices as $item)
                                <div class="fork-service">
                                    <span class="service-name">
                                        {{ $item->service->name }}:
                                    </span>
                                    <strong class="service-price orange">
                                        {{ convert_vnd($item->service->price) }}
                                    </strong>
                                </div>
                                <div class="clear"></div>
                            @endforeach
                            <hr><br>
                        @endforeach

                        <div class="clear"></div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div id="event-services" class="spaceY10">
                            </div>
                            <div class="spaceL20">
                                <strong><a href="javascript:void(0)" id="toggle-create-services">
                                    <i class="fa fa-plus"></i>
                                    {{ trans('event_forks_show.newService') }}
                                </a></strong>
                            </div>
                        </div>
                        <hr>
                        <div class="clear"></div>
                        <div class="clear mb-10"></div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">
                                {{ trans('event_forks_show.save') }}
                            </button>
                            <button type="reset" class="btn btn-primary btn-border">
                                {{ trans('event_forks_show.cancel') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4">
                <aside class="sidebar-wrapper">
                    <div class="hash-tag-wrapper clearfix mt-10 ml-10 ml-0-sm">
                        <div class="title-chat">
                            <h4 class="section-title">
                                {{ trans('event_forks_show.liveChat') }}
                            </h4>
                        </div>
                        <div class="content-chat">
                            <div class="you">
                                <span class="message-you"></span>
                            </div>
                            <div class="me">
                                <span class="message-me"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="input-chat">
                            <textarea class="form-control" name="input_chat"
                                placeholder="{{ trans('event_forks_show.inputChatPlace') }}">
                            </textarea>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>

@endsection
