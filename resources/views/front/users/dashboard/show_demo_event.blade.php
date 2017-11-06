@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('js/show-event.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg detail-breadcrumb"
    style="background-image:url({{ asset(config('asset.image_path.event_plan') . $eventPlan->image) }});">
    <div class="container">
        <div class="page-title detail-header-02">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <h2>{{ $eventPlan->title }}</h2>
                    <span class="labeling text-white mt-25">
                        <span>{{ $user->name }}</span>
                    <span>{{ convert_vnd($eventPlan->amount) }}</span>
                    </span>
                    <div class="rating-item rating-item-lg mb-25">
                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o"
                            data-fractions="2" data-readonly value="{{ $eventPlan->total_rate }}" />
                        <div class="rating-text">
                            <a href="#">({{ $eventPlan->reviews_count }} {{ trans('event_plans_index.reviews') }})</a>
                        </div>
                    </div>
                    <ul class="list-with-icon list-inline-block">
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_plans_index.protect') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_plans_index.professional') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_plans_index.supportIdea') }}
                        </li>
                        <li><i class="ion-android-done text-primary"></i>
                            {{ trans('event_plans_index.satisfy') }}
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
                            {{ trans('event_plans_index.Overview') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-02">
                            {{ trans('event_plans_index.Gallery') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-03">
                            {{ trans('event_plans_index.Details') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-05">
                            {{ trans('event_plans_index.Reviews') }}
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
                        <h2 class="font-lg">
                            {{ trans('event_plans_index.Overview') }}
                        </h2>
                        <p class="lead">
                            {{ $eventPlan->content }}
                        </p>
                        <div class="bt mt-30 mb-30"></div>
                        <div class="mb-25"></div>
                        <div class="user-long-sm-item clearfix">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.user_ava') . $user->image, $user->name) }}
                            </div>
                            <div class="content">
                                <span class="labeling">
                                    {{ trans('event_plans_index.OfferedBy') }}
                                 </span>
                                <h4>{{ $user->name }}</h4>
                                <ul class="user-meta">
                                    <li>
                                        {{ $user->event_plans_count }}
                                        {{ trans('event_plans_index.events') }}
                                    </li>
                                    <li>
                                        {{ $user->reviews_count }}
                                        {{ trans('event_plans_index.reviews') }}
                                    </li>
                                    <li>
                                        {{ $user->score }}
                                        {{ trans('event_plans_index.scores') }}
                                    </li>
                                </ul>
                                <a href="{{ route('userProfile', $user->id) }}">
                                {{ trans('event_plans_index.ViewProfile') }}
                                <i class="ion-android-arrow-forward"></i></a>
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                    <div id="detail-content-sticky-nav-02">
                        <h2 class="font-lg">
                            {{ trans('event_plans_index.Gallery') }}
                        </h2>
                        <div class="gallery-grid-3-2-wrapper mb-30">
                            <div id="gallery1" class="imgs-grid imgs-grid-5">
                                <div class="imgs-grid-image" id="imgs-grid-image">
                                    <div class="image-wrap" id="images-gallery">
                                        <div class="photoset-grid-lightbox" data-layout="23">
                                            @foreach($eventPlan->albums as $album)
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
                        <h2 class="font-lg">Plan Details</h2>
                        <div class="itinerary-toggle-wrapper mb-40">
                            <div class="panel-group bootstrap-toggle">
                                @php $stt = 1; @endphp
                                @foreach($planDetails as $detail)
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-{{ $stt }}">
                                                    <div class="itinerary-day">
                                                        <span class="number">{{ $stt }}</span>
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
                                        <div id="bootstarp-toggle-one-{{ $stt }}" class="panel-collapse collapse">
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
                                    @php $stt++; @endphp
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
                            {{ trans('event_plans_index.#') }}
                            {{ $eventPlan->subject->title }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_plans_index.#') }}
                            {{ trans('event_plans_index.professional') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_plans_index.#') }}
                            {{ trans('event_plans_index.supportIdea') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_plans_index.#') }}
                            {{ trans('event_plans_index.satisfy') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('event_plans_index.#') }}
                            {{ trans('event_plans_index.protect') }}
                        </a>
                    </div>
                </aside>
                <br><hr>
                <aside class="sidebar-wrapper">
                    <div class="hash-tag-wrapper clearfix mt-10 ml-10 ml-0-sm">
                        <h3>{{ trans('event_plans_index.demoPage') }}</h3>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

@endsection
