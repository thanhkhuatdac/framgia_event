@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
    {{ Html::script('js/show-event.js') }}
    {{ Html::script('js/add-review.js') }}
    {{ Html::script('js/add-reply-review.js') }}
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

                    <div id="detail-content-sticky-nav-05">
                        <h2 class="font-lg">
                            {{ trans('event_plans_index.Reviews') }}
                        </h2>
                        <div class="review-wrapper">
                            <div class="review-header">
                                <div class="GridLex-gap-30">
                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                                            <div class="review-rating">
                                                <div class="number" id="avg-rate">
                                                    {{ $eventPlan->total_rate }}
                                                </div>
                                                <div class="rating-wrapper">
                                                    <div class="rating-item rating-item-lg">
                                                        <input type="hidden" id="input-avg-rate" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o"
                                                            data-fractions="2" data-readonly
                                                            value="{{ $eventPlan->total_rate }}" />
                                                    </div>
                                                    <span id="count-reviews">
                                                        {{ $eventPlan->reviews_count }}
                                                    </span>
                                                    {{ trans('event_plans_index.reviews') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="GridLex-col-3_sm-4_xs-12_xss-12">
                                            <div class="GridLex-inner">
                                                <a href="#review-form" class="btn btn-primary btn-block anchor">
                                                    {{trans('event_plans_index.WriteReview')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!Auth::check())
                                <p>
                                    <a data-toggle="modal" href="#loginModal">
                                        {{ trans('event_plans_index.login') }}
                                    </a>
                                    {{ trans('event_plans_index.loginNotif') }}
                                </p>
                            @else
                                <div id="review-form" class="review-form">
                                    <h3 class="review-form-title">
                                        {{ trans('event_plans_index.LeaveYourReview') }}
                                    </h3>
                                    <form name="frm-add-comment" method="POST" action="">
                                        <input type="hidden" name="epId" id="epId" value="{{ $eventPlan->id }}">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        {{ trans('event_plans_index.YourRating') }}
                                                    </label>
                                                    <div class="rating-wrapper mt-5">
                                                        <div class="rating-item">
                                                            <input type="hidden" name="rate" id="rate" class="rating-label" data-filled="fa fa-star" data-empty="fa fa-star-o"
                                                                data-fractions="2" value="0"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>
                                                        {{ trans('event_plans_index.YourMessage') }}
                                                    </label>
                                                    <textarea class="form-control form-control-sm" name="content" id="content" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="clear mb-5"></div>
                                            <div class="col-sm-12 col-md-8">
                                                <button type="submit" class="btn btn-primary btn-lg btn-add-review">
                                                    {{ trans('event_plans_index.Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="review-content">
                                <ul class="review-list">
                                    @foreach($reviews as $review)
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                    <div class="review-header">
                                                        <h6>
                                                            {{ $review->user->name }}
                                                        </h6>
                                                        <span class="review-date">
                                                            ({{ $review->created_at->format('H:i, d/m/Y') }})
                                                        </span>
                                                        <div class="rating-item">
                                                            <input type="hidden" class="rating" data-filled="fa fa-star" data-empty="fa fa-star-o"
                                                                data-fractions="2" data-readonly
                                                                value="{{ $review->rate }}" />
                                                        </div>
                                                        <div class="link-reply">
                                                            <a href="#" class="btn btn-primary" id="{{ $review->id }}">
                                                                {{ trans('event_plans_index.Reply') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                    <div class="review-content">
                                                        <p>
                                                            {{ $review->content }}
                                                        </p>
                                                        <hr>
                                                    </div>
                                                    <hr>
                                                    <div id="replies-review-{{ $review->id }}">
                                                        @foreach($review->comments as $replied)
                                                            <div class="review-replied">
                                                                <div class="review-replied-header">
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-8 col-md-9">
                                                                            <strong>
                                                                                {{ $replied->user->name}}
                                                                            </strong>
                                                                            <span class="review-date">
                                                                                ({{ $replied->created_at->format('H:i, d/m/Y') }})
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-xs-12 col-sm-4 col-md-3 text-right text-left-xs">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="review-replied-content">
                                                                    <p>{{ $replied->content }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="frm-reply-review">
                                                        <form id="frm-reply-{{ $review->id }}" action="" method="post" accept-charset="utf-8">
                                                            <input type="hidden" id="input-review-id-{{ $review->id }}" value="{{ $review->id }}">
                                                            <label>
                                                                {{ trans('event_plans_index.Reply') }}
                                                            </label>
                                                            <br>
                                                            <div class="content-reply">
                                                                <textarea class="form-control form-control-sm" id="rep-content-{{ $review->id }}"></textarea>
                                                            </div>
                                                            <div class="btn-submit-reply">
                                                                <button type="submit" class="btn btn-primary" id="{{ $review->id }}">
                                                                    {{ trans('event_plans_index.Submit') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="#" class="review-load-more mb-40">
                                    {{ trans('event_plans_index.LoadMore') }}
                                </a>
                            </div>
                        </div>
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
                @if(check_customer(Auth::user()) && (Auth::user()->id != $eventPlan->user_id))
                    <aside class="sidebar-wrapper">
                        <div class="hash-tag-wrapper clearfix mt-10 ml-10 ml-0-sm">
                            <a href="{{ route('forkEventPlan', ['id' => Auth::user()->id, 'eventPlanId' => $eventPlan->id]) }}"
                                class="hash-tag" id="btn-forks">
                                {{ trans('event_plans_index.fork') }}
                            </a>
                        </div>
                    </aside>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>
<div class="bg-light pt-50 pb-70">
    <div class="container">
        <h2 class="font-lg">{{ trans('event_plans_index.RelatdedEvents') }}</h2>
        <div class="trip-guide-wrapper">
            <div class="GridLex-gap-20 GridLex-gap-10-mdd GridLex-gap-5-xs">
                <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-center">
                    @foreach($relatedEventPlans as $related)
                        <div class="GridLex-col-3_mdd-4_sm-6_xs-6_xss-12">
                            <div class="trip-guide-item">
                                <div class="trip-guide-image">
                                    {{ Html::image(config('asset.image_path.event_plan') . $related->image, $related->slug) }}
                                </div>
                                <div class="trip-guide-content">
                                    <h3>{{ $related->title }}</h3>
                                    <p class="related-content">
                                        {{ limit_characters($related->content, 85) }}
                                    </p>
                                </div>
                                <div class="trip-guide-bottom">
                                    <div class="trip-guide-person clearfix">
                                        <div class="image">
                                            {{ Html::image(config('asset.image_path.user_ava') . $related->user->image, $related->user->name, array('class' => 'img-circle')) }}
                                        </div>
                                        <p class="name">
                                            {{ trans('event_plans_index.by') }}
                                            <a href="#">
                                                {{ $related->user->name }}
                                            </a>
                                        </p>
                                    </div>
                                    <p>&nbsp;</p>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="trip-guide-price">
                                                {{ trans('event_plans_index.price') }}
                                                <span class="number">
                                                    {{ convert_vnd($related->amount) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2 text-right">
                                            <a href="#" class="btn btn-primary">
                                                {{ trans('event_plans_index.Details') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
