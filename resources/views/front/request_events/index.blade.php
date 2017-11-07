@extends('front.main_layouts.master')
@push('scripts')
    {{ Html::script('assets/pusher-js/dist/web/pusher.min.js') }}
    {{ Html::script('js/show-event.js') }}
    {{ Html::script('js/add-comment.js') }}
@endpush
@section('content')

<div class="breadcrumb-image-bg detail-breadcrumb"
    style="background-image:url({{ asset(config('asset.image_path.event_plan') . 'default-request-event.jpg') }});">
    <div class="container">
        <div class="page-title detail-header-02">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <h2>{{ $requestEvent->title }}</h2>
                    <span class="labeling text-white mt-25">
                        <span>{{ $requestEvent->user->name }}</span>
                    </span>
                    <div class="rating-item rating-item-lg mb-25">
                        <div class="rating-text">
                            <a href="javascript:void(0)">
                                (<span id="comments-count">
                                    {{ $requestEvent->comments_count }}
                                </span>
                                {{ trans('request_event_index.comments') }})
                            </a>
                        </div>
                    </div>
                    <ul class="list-with-icon list-inline-block">
                        <li><i class="ion-android-done text-primary"></i>
                            {{ $requestEvent->subject->title }}
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
                            {{ trans('request_event_index.Overview') }}
                        </a>
                    </li>
                    <li>
                        <a href="#detail-content-sticky-nav-05">
                            {{ trans('request_event_index.Reviews') }}
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
                            {{ trans('request_event_index.Overview') }}
                        </h2>
                        <p class="lead">
                            {{ $requestEvent->content }}
                        </p>
                        <div class="bt mt-30 mb-30"></div>
                        <div class="mb-25"></div>
                        <div class="user-long-sm-item clearfix">
                            <div class="image">
                                {{ Html::image(config('asset.image_path.user_ava') . $requestEvent->user->image, $requestEvent->user->name) }}
                            </div>
                            <div class="content">
                                <span class="labeling">
                                    {{ trans('request_event_index.RequestedBy') }}
                                 </span>
                                <h4>{{ $requestEvent->user->name }}</h4>
                                <a href="{{ route('userProfile', $requestEvent->user->id) }}">
                                {{ trans('request_event_index.ViewProfile') }}
                                <i class="ion-android-arrow-forward"></i></a>
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                    <div id="detail-content-sticky-nav-05">
                        <h2 class="font-lg">
                            {{ trans('request_event_index.Comments') }}
                        </h2>
                        <div class="review-wrapper">
                            @if(!Auth::check())
                                <p>
                                    <a data-toggle="modal" href="#loginModal">
                                        {{ trans('request_event_index.login') }}
                                    </a>
                                    {{ trans('request_event_index.loginNotif') }}
                                </p>
                            @else
                                <div id="review-form" class="review-form">
                                    <h3 class="review-form-title">
                                        {{ trans('request_event_index.LeaveYourComment') }}
                                    </h3>
                                    <form name="frm-add-comment" method="POST" action="">
                                        <input type="hidden" name="request_event_id" id="request-event-id" value="{{ $requestEvent->id }}">
                                        <div class="row">
                                            <div class="clear"></div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label>
                                                        {{ trans('request_event_index.YourMessage') }}
                                                    </label>
                                                    <textarea class="form-control form-control-sm" name="comment_content" id="comment-content" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="clear mb-5"></div>
                                            <div class="col-sm-12 col-md-8">
                                                <button type="submit" class="btn btn-primary btn-lg btn-add-comment">
                                                    {{ trans('request_event_index.Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="review-content">
                                <ul class="review-list" id="list-comment">
                                    @foreach($requestEvent->comments as $comment)
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4 col-md-3">
                                                    <div class="review-header">
                                                        <h6>
                                                            {{ $comment->user->name }}
                                                        </h6>
                                                        <span class="review-date">
                                                            ({{ $comment->created_at->format('H:i, d/m/Y') }})
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-9">
                                                    <div class="review-content">
                                                        <p>
                                                            {{ $comment->content }}
                                                        </p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="#" class="review-load-more mb-40">
                                    {{ trans('request_event_index.LoadMore') }}
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
                            {{ trans('request_event_index.#') }}
                            {{ $requestEvent->subject->title }}
                        </a>
                        <br><br>
                        <a href="#" class="hash-tag">
                            {{ trans('request_event_index.#') }}
                            {{ trans('request_event_index.professional') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('request_event_index.#') }}
                            {{ trans('request_event_index.supportIdea') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('request_event_index.#') }}
                            {{ trans('request_event_index.satisfy') }}
                        </a>
                        <a href="#" class="hash-tag">
                            {{ trans('request_event_index.#') }}
                            {{ trans('request_event_index.protect') }}
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div>

@endsection
