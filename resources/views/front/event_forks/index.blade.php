@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
    {{ Html::script('js/show-event.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg detail-breadcrumb"
    style="background-image:url({{ asset(config('asset.image_path.event_plan') . $eventFork->eventPlan->image) }});">
    <div class="container">
        <div class="page-title detail-header-02">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <h2>
                        {{ $eventFork->eventPlan->title }}
                        {{ trans('event_fork_index.fork') }}
                    </h2>
                    <span class="labeling text-white mt-25">
                        <span>{{ $user->name }}</span>
                    <span>{{ convert_vnd($eventFork->amount) }}</span>
                    </span>
                    <ul class="list-with-icon list-inline-block">
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_fork_index.protect') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_fork_index.professional') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_fork_index.supportIdea') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_fork_index.satisfy') }}
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
                    <li>
                        <a href="#detail-content-sticky-nav-01">
                            {{ trans('event_fork_index.Overview') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-02">
                            {{ trans('event_fork_index.Gallery') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-03">
                            {{ trans('event_fork_index.Details') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-05">
                            {{ trans('event_fork_index.Reviews') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="content-wrapper">
                    <div id="detail-content-sticky-nav-01">
                        <div class="user-long-sm-item clearfix">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.user_ava') . $user->image, $user->name) }}
                            </div>
                            <div class="content">
                                <span class="labeling">
                                    {{ trans('event_fork_index.OfferedBy') }}
                                 </span>
                                <h4>{{ $user->name }}</h4>
                                <ul class="user-meta">
                                    <li>
                                        {{ $user->event_forks_count }}
                                        {{ trans('event_fork_index.forks') }}
                                    </li>
                                </ul>
                                <a href="{{ route('userProfile', $user->id) }}">
                                    {{ trans('event_fork_index.ViewProfile') }}
                                    <i class="ion-android-arrow-forward"></i>
                                </a>
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                    <div id="detail-content-sticky-nav-02">
                        <h2 class="font-lg">
                            {{ trans('event_fork_index.Gallery') }}
                        </h2>
                        <div class="gallery-grid-3-2-wrapper mb-30">
                            <div id="gallery1" class="imgs-grid imgs-grid-5">
                                <div class="imgs-grid-image" id="imgs-grid-image">
                                    <div class="image-wrap" id="images-gallery">
                                        <div class="photoset-grid-lightbox" data-layout="23">
                                            @foreach($eventFork->eventPlan->albums as $album)
                                                {{ Html::image(config('asset.image_path.album') . $album->image) }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                    <div id="detail-content-sticky-nav-03">
                        <h2 class="font-lg">{{ trans('event_fork_index.planDetails') }}</h2>
                        <div class="itinerary-toggle-wrapper mb-40">
                            <div class="panel-group bootstrap-toggle">
                                @foreach($forkDetails as $detail)
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-{{ $loop->iteration }}">
                                                    <div class="itinerary-day">
                                                        <span class="number">{{ $loop->iteration }}</span>
                                                    </div>
                                                    <div class="itinerary-header">
                                                        <h4>
                                                            {{ $detail->name }}
                                                        </h4>
                                                        <p class="font-md">
                                                            {{ $detail->start_date }}
                                                            -
                                                            {{ $detail->due_date }}
                                                        </p>
                                                        <div class="image" id="my-edit">
                                                            {{ convert_vnd($detail->amount) }}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="bootstarp-toggle-one-{{ $loop->iteration }}" class="panel-collapse collapse">
                                            @foreach($detail->forkPlanServices as $item)
                                                <div class="panel-body">
                                                    <p class="font-lg">
                                                        {{ $item->service->name }}
                                                        <span id="service-price">
                                                            {{ convert_vnd($item->service->price) }}
                                                        </span>
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                </div>
            </div>
            <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4">
                <aside class="sidebar-wrapper">
                    <div class="hash-tag-wrapper clearfix mt-10 ml-10 ml-0-sm">
                        <a href="#" class="hash-tag">
                            {{ trans('event_fork_index.#') }}
                            {{ $eventFork->eventPlan->subject->title }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_fork_index.#') }}
                            {{ trans('event_fork_index.professional') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_fork_index.#') }}
                            {{ trans('event_fork_index.supportIdea') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_fork_index.#') }}
                            {{ trans('event_fork_index.satisfy') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_fork_index.#') }}
                            {{ trans('event_fork_index.protect') }}
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>

@endsection
